<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule; // Add this line
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;



class TransactionController extends Controller
{
    public function index()
    {
        // Fetch active transactions that are not excluded, ordered by ID descending (newest at the bottom)
        $transactions = Transaction::where('exclude', 0)
            ->orderBy('id', 'DESC') // Order by id, to avoid confusion with reused IDs
            ->get();

        return view('accounting.accounting_dashboard', compact('transactions'));
    }

    public function create()
    {
        // Fetch active accounts from the database
        $accounts = Account::where('activate', 1)->get();

        // Store the previous URL in the session (from where the user clicked 'Add')
        session()->put('previous_url', url()->previous());

        return view('accounting.transactions.create_transaction', compact('accounts'));
    }

    public function store(Request $request)
    {
        // Remove commas and clean 'amount' values before validation
        if ($request->has('details')) {
            $details = $request->input('details');
            foreach ($details as &$detail) {
                if (isset($detail['amount'])) {
                    // Remove commas from the 'amount' field
                    $detail['amount'] = preg_replace('/,/', '', $detail['amount']);
                    // Convert amount to a float (or decimal)
                    $detail['amount'] = (float) $detail['amount'];
                }
            }
            $request->merge(['details' => $details]); // Merge cleaned data back into the request
        }

        // Validate the request data
        $validated = $request->validate([
            'transaction_date' => 'required|date',
            'jev' => 'required|string|max:255|unique:transactions,jev_no,NULL,id,exclude,0',
            'description' => 'nullable|string',
            'ref' => 'nullable|string|max:255',
            'payee' => 'required|string|max:255',
            'details' => 'required|array|min:1',
            'details.*.particulars' => 'required|string|max:255',
            'details.*.uacs_code' => 'required|string|max:255',
            'details.*.mode_of_payment' => 'required|string|in:Credit,Debit',
            'details.*.amount' => 'required|numeric|min:0|max:100000000000',
        ]);

        try {
            DB::beginTransaction();

            // Convert the transaction date to the correct format before saving it
            $validated['transaction_date'] = Carbon::createFromFormat('m/d/Y', $validated['transaction_date'])->format('Y-m-d');

            // Check if there is an excluded transaction to reuse
            $excludedTransaction = Transaction::where('exclude', 1)->first();

            if ($excludedTransaction) {
                // Reuse the excluded transaction
                $excludedTransaction->update([
                    'transaction_date' => $validated['transaction_date'],
                    'jev_no' => $validated['jev'], // Reuse the JEV number
                    'description' => $validated['description'],
                    'ref' => $validated['ref'],
                    'payee' => $validated['payee'],
                    'exclude' => 0, // Reactivate the transaction
                    'activate' => 1, // Set to active
                ]);

                // Remove all existing transaction details
                $excludedTransaction->details()->delete();

                // Insert the new details
                foreach ($validated['details'] as $detail) {
                    $excludedTransaction->details()->create([
                        'particulars' => $detail['particulars'],
                        'uacs_code' => $detail['uacs_code'],
                        'mode_of_payment' => $detail['mode_of_payment'],
                        'amount' => $detail['amount'], // Store the cleaned numeric value
                    ]);
                }

                DB::commit();

                // Redirect to the previous URL if available, otherwise to the dashboard
                $previousUrl = session()->get('previous_url', route('accounting_dashboard'));
                session()->forget('previous_url'); // Clear the previous URL from the session

                return redirect($previousUrl)->with('success', 'Excluded transaction reused successfully!');
            } else {
                // Create a new transaction if no excluded transaction exists
                $transaction = Transaction::create([
                    'transaction_date' => $validated['transaction_date'],
                    'jev_no' => $validated['jev'], // New JEV number
                    'description' => $validated['description'],
                    'ref' => $validated['ref'],
                    'payee' => $validated['payee'],
                    'activate' => 1, // Set as active
                    'exclude' => 0,  // Not excluded
                ]);

                // Insert the new details
                foreach ($validated['details'] as $detail) {
                    $transaction->details()->create([
                        'particulars' => $detail['particulars'],
                        'uacs_code' => $detail['uacs_code'],
                        'mode_of_payment' => $detail['mode_of_payment'],
                        'amount' => $detail['amount'], // Store the cleaned numeric value
                    ]);
                }

                DB::commit();

                // Redirect to the previous URL if available, otherwise to the dashboard
                $previousUrl = session()->get('previous_url', route('accounting_dashboard'));
                session()->forget('previous_url'); // Clear the previous URL from the session

                return redirect($previousUrl)->with('success', 'Transaction created successfully!');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Transaction error: ' . $e->getMessage()); // Log the error
            return redirect()->back()->withErrors(['An error occurred: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        // Include trashed transactions
        $transaction = Transaction::withTrashed()->findOrFail($id);
        $accounts = Account::all(); // Assuming you're fetching the accounts from the database

        // Store the previous URL in the session (from where the user clicked 'edit')
        session()->put('previous_url', url()->previous());

        // Pass transaction details to the view
        return view('accounting.transactions.edit_transaction', compact('transaction', 'accounts'));
    }

    public function update(Request $request, $id)
    {
        // Ensure 'activate' and 'exclude' are set to 0 if not present in the request (checkboxes unchecked)
        $request->merge([
            'activate' => $request->has('activate') ? 1 : 1, // Keep active as 1 by default (or adjust as needed)
            'exclude' => $request->has('exclude') ? 1 : 0,
        ]);

        // Remove commas and clean 'amount' values before validation
        if ($request->has('details')) {
            $details = $request->input('details');
            foreach ($details as &$detail) {
                if (isset($detail['amount'])) {
                    // Remove commas and convert to float
                    $detail['amount'] = preg_replace('/,/', '', $detail['amount']);
                    $detail['amount'] = (float) $detail['amount'];
                }
            }
            $request->merge(['details' => $details]); // Merge cleaned data back into the request
        }

        // Fetch the transaction, including excluded ones
        $transaction = Transaction::withTrashed()->findOrFail($id);

        // Validate the request
        $validated = $request->validate([
            'transaction_date' => 'required|date',
            'jev' => [
                'required',
                'string',
                'max:255',
                Rule::unique('transactions', 'jev_no')
                    ->ignore($transaction->id)
                    ->where(function ($query) use ($transaction) {
                        return $query->where('exclude', 0);
                    }),
            ],
            'description' => 'nullable|string',
            'ref' => 'nullable|string|max:255',
            'payee' => 'required|string|max:255',
            'details' => 'required|array|min:1',
            'details.*.particulars' => 'required|string|max:255',
            'details.*.uacs_code' => 'required|string|max:255',
            'details.*.mode_of_payment' => 'required|string|in:Credit,Debit',
            'details.*.amount' => 'required|numeric|min:0|max:100000000000',
            'activate' => 'nullable|boolean',
            'exclude' => 'nullable|boolean',
        ]);

        try {
            DB::beginTransaction();

            // Convert 'MM/DD/YYYY' format to 'YYYY-MM-DD' before saving
            $validated['transaction_date'] = \Carbon\Carbon::createFromFormat('m/d/Y', $validated['transaction_date'])->format('Y-m-d');

            // Update the transaction, preserving the 'active' field (do not overwrite it)
            $transaction->update([
                'transaction_date' => $validated['transaction_date'],
                'jev_no' => $validated['jev'],
                'description' => $validated['description'],
                'ref' => $validated['ref'],
                'payee' => $validated['payee'],
                'exclude' => $validated['exclude'],
                // Do not overwrite 'active'; keep it as is (or set to 1 if needed)
                'activate' => isset($validated['activate']) ? $validated['activate'] : 1,
            ]);

            // Remove all existing details (assumption: 'details' is a relationship with a 'hasMany' relation)
            $transaction->details()->delete();

            // Insert new details
            foreach ($validated['details'] as $detail) {
                $transaction->details()->create([
                    'particulars' => $detail['particulars'],
                    'uacs_code' => $detail['uacs_code'],
                    'mode_of_payment' => $detail['mode_of_payment'],
                    'amount' => $detail['amount'],
                ]);
            }

            DB::commit();

            // Redirect back to the previous URL or the dashboard
            $previousUrl = session()->get('previous_url', route('accounting_dashboard'));
            session()->forget('previous_url');

            // Flash success message
            return redirect($previousUrl)->with('success', 'Transaction updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['An error occurred while updating the transaction: ' . $e->getMessage()]);
        }
    }

    public function destroy($id, Request $request)
    {
        // Log the ID being deleted for debugging
        \Log::info('Destroying transaction with ID: ' . $id);

        // Find the transaction by ID
        $transaction = Transaction::findOrFail($id);

        // Check if the transaction is already excluded or deactivated
        if ($transaction->exclude == 1 || $transaction->activate == 0) {
            return redirect()->back()->withErrors('Transaction is already excluded or inactive.');
        }

        // Mark the transaction as excluded and deactivated
        $transaction->update([
            'exclude' => 1,  // Mark as excluded
            'activate' => 0, // Deactivate the transaction
        ]);

        // Log successful exclusion
        \Log::info('Transaction ID ' . $id . ' marked as excluded.');

        // Get the 'redirect_url' parameter or default to dashboard
        $redirectUrl = $request->input('redirect_url', route('accounting_dashboard'));

        return redirect($redirectUrl)->with('success', 'Transaction excluded successfully.');
    }

    public function show($id)
    {
        // Include trashed transactions
        $transaction = Transaction::withTrashed()->with('details')->findOrFail($id);
        // Calculate the grand total of all transaction details
        $totalAmount = $transaction->details->sum('amount');
        // Calculate the total amount for Credit
        $totalCredit = $transaction->details->where('mode_of_payment', 'Credit')->sum('amount');
        // Calculate the total amount for Debit
        $totalDebit = $transaction->details->where('mode_of_payment', 'Debit')->sum('amount');
        return view('accounting.transactions.view_transaction', [
            'transaction' => $transaction,
            'totalAmount' => $totalAmount,
            'totalCredit' => $totalCredit,
            'totalDebit' => $totalDebit,
        ]);
    }

    public function yearsIndex()
    {
        // Get distinct years from the transaction_date column where the transaction is active and not excluded
        $years = DB::table('transactions')
                    ->selectRaw('YEAR(transaction_date) as year')
                    ->distinct()
                    ->where('exclude', 0)  // Ensure transactions are not excluded
                    ->orderByDesc('year')  // Optional: to show the years in descending order
                    ->pluck('year');

        // Pass the years to the view
        return view('accounting.transactions.years', compact('years'));
    }

    public function monthsIndex($year)
    {
        // Initialize an array with all 12 months
        $months = collect(range(1, 12))->map(function($month) use ($year) {
            // For each month, count the number of transactions that are not excluded
            $transaction_count = DB::table('transactions')
                                    ->whereYear('transaction_date', $year)
                                    ->whereMonth('transaction_date', $month)
                                    ->where('exclude', 0) // Only count active transactions
                                    ->count();

            return (object)[
                'month' => $month,
                'transaction_count' => $transaction_count
            ];
        });

        return view('accounting.transactions.months', compact('year', 'months'));
    }

    public function entriesIndex($year, $month)
    {
        // Get the transactions for the selected year and month, where exclude is 0 (not excluded)
        $transactions = Transaction::whereYear('transaction_date', $year)
                                    ->whereMonth('transaction_date', $month)
                                    ->where('exclude', 0)  // Ensure transactions are not excluded
                                    ->with('details') // Eager load the 'details' relationship
                                    ->get();

        return view('accounting.transactions.index', compact('year', 'month', 'transactions'));
    }



}
