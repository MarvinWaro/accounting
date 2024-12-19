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
        // Clean up the 'amount' fields by removing commas
        if ($request->has('details')) {
            $details = $request->input('details');

            foreach ($details as &$detail) {
                if (isset($detail['amount'])) {
                    // Remove commas from the 'amount' field
                    $detail['amount'] = preg_replace('/,/', '', $detail['amount']);
                }
            }

            // Re-assign the cleaned 'details' array back to the request
            $request->merge(['details' => $details]);
        }

        // Validate the form data, especially the 'details' array
        $validated = $request->validate([
            'transaction_date' => 'required|date',
            'jev' => 'required|string|max:255|unique:transactions,jev_no',
            'description' => 'nullable|string',
            'ref' => 'nullable|string|max:255',
            'payee' => 'required|string|max:255',
            'details' => 'required|array|min:1',
            'details.*.particulars' => 'required|string|max:255',
            'details.*.uacs_code' => 'required|string',
            'details.*.mode_of_payment' => 'required|string|in:Credit,Debit',
            'details.*.amount' => 'required|numeric|min:0|max:100000000000', // Make sure it's numeric
        ], [
            'details.required' => 'There is no transaction made.',
            'details.min' => 'There is no transaction made.',
        ]);

        try {
            // Begin database transaction
            DB::beginTransaction();

            // Create the main transaction
            $transaction = Transaction::create([
                'transaction_date' => $validated['transaction_date'],
                'jev_no' => $validated['jev'],
                'description' => $validated['description'],
                'ref' => $validated['ref'],
                'payee' => $validated['payee'],
            ]);

            // Create transaction details
            foreach ($validated['details'] as $detail) {
                $transaction->details()->create([
                    'particulars' => $detail['particulars'],
                    'uacs_code' => $detail['uacs_code'],
                    'mode_of_payment' => $detail['mode_of_payment'],
                    'amount' => $detail['amount'],
                ]);
            }

            // Commit the transaction if everything is fine
            DB::commit();

            return redirect()->route('transaction.index')->with('success', 'Transaction created successfully!');
        } catch (\Exception $e) {
            // Rollback if any error occurs
            DB::rollBack();
            return redirect()->back()->withErrors(['An error occurred while creating the transaction: ' . $e->getMessage()]);
        }
    }

    

}
