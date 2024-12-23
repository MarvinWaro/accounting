<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('accounting.transactions.transaction_list', compact('transactions'));
    }

    public function create()
    {
        // Fetch active accoun  ts from the database
        $accounts = Account::where('activate', 1)->get();
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

        // Define custom validation rules
        $validated = $request->validate([
            'transaction_date' => 'required|date',
            'jev' => 'required|string|max:255|unique:transactions,jev_no',
            'description' => 'nullable|string',
            'ref' => 'nullable|string|max:255',
            'payee' => 'required|string|max:255',
            'details' => 'required|array|min:1',
            'details.*.particulars' => 'required|string|max:255',
            'details.*.uacs_code' => 'required|string|max:255',
            'details.*.mode_of_payment' => 'required|string|in:Credit,Debit',
            'details.*.amount' => 'required|numeric|min:0|max:100000000000',
        ], [], [
            'transaction_date' => 'Transaction Date',
            'jev' => 'JEV Number',
            'description' => 'Description',
            'ref' => 'Reference',
            'payee' => 'Payee',
            'details' => 'Transaction Details',
            'details.*.particulars' => 'Particulars',
            'details.*.uacs_code' => 'UACS Code',
            'details.*.mode_of_payment' => 'Mode of Payment',
            'details.*.amount' => 'Amount',
        ]);

        try {
            DB::beginTransaction();

            $transaction = Transaction::create([
                'transaction_date' => $validated['transaction_date'],
                'jev_no' => $validated['jev'],
                'description' => $validated['description'],
                'ref' => $validated['ref'],
                'payee' => $validated['payee'],
            ]);

            foreach ($validated['details'] as $detail) {
                $transaction->details()->create([
                    'particulars' => $detail['particulars'],
                    'uacs_code' => $detail['uacs_code'],
                    'mode_of_payment' => $detail['mode_of_payment'],
                    'amount' => $detail['amount'],
                ]);
            }

            DB::commit();

            return redirect()->route('transaction.index')->with('success', 'Transaction created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['An error occurred: ' . $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $accounts = Account::all(); // Assuming you're fetching the accounts from the database

        // Pass transaction details to the view
        return view('accounting.transactions.edit_transaction', compact('transaction', 'accounts'));
    }

    public function update(Request $request, $id)
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

        // Define custom validation rules and custom attribute names
        $validated = $request->validate([
            'transaction_date' => 'required|date',
            'jev' => 'required|string|max:255|unique:transactions,jev_no,' . $id,
            'description' => 'nullable|string',
            'ref' => 'nullable|string|max:255',
            'payee' => 'required|string|max:255',
            'details' => 'required|array|min:1',
            'details.*.particulars' => 'required|string|max:255',
            'details.*.uacs_code' => 'required|string|max:255',
            'details.*.mode_of_payment' => 'required|string|in:Credit,Debit',
            'details.*.amount' => 'required|numeric|min:0|max:100000000000',
        ], [], [
            'transaction_date' => 'Transaction Date',
            'jev' => 'JEV Number',
            'description' => 'Description',
            'ref' => 'Reference',
            'payee' => 'Payee',
            'details' => 'Transaction Details',
            'details.*.particulars' => 'Particulars',
            'details.*.uacs_code' => 'UACS Code',
            'details.*.mode_of_payment' => 'Mode of Payment',
            'details.*.amount' => 'Amount',
        ]);

        try {
            DB::beginTransaction();

            // Update the transaction main data
            $transaction = Transaction::findOrFail($id);
            $transaction->update([
                'transaction_date' => $validated['transaction_date'],
                'jev_no' => $validated['jev'],
                'description' => $validated['description'],
                'ref' => $validated['ref'],
                'payee' => $validated['payee'],
            ]);

            // Remove all existing details first
            $transaction->details()->delete();

            // Insert new details after removing commas from amount
            foreach ($validated['details'] as $detail) {
                // Ensure the amount is already cleaned and converted to a float
                $transaction->details()->create([
                    'particulars' => $detail['particulars'],
                    'uacs_code' => $detail['uacs_code'],
                    'mode_of_payment' => $detail['mode_of_payment'],
                    'amount' => $detail['amount'],  // Store the cleaned numeric value
                ]);
            }

            DB::commit();

            return redirect()->route('transaction.index')->with('success', 'Transaction updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['An error occurred while updating the transaction: ' . $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        // Find the transaction by ID
        $transaction = Transaction::findOrFail($id);

        // Delete the transaction
        $transaction->delete();

        // Redirect back with a success message
        return redirect()->route('transaction.index')->with('success', 'Transaction deleted successfully.');
    }

    public function show($id)
    {
        $transaction = Transaction::with('details')->findOrFail($id);

        // Calculate the total amount of all transaction details
        $totalAmount = $transaction->details->sum('amount');

        return view('accounting.transactions.view_transaction', [
            'transaction' => $transaction,
            'totalAmount' => $totalAmount,
        ]);
    }





}
