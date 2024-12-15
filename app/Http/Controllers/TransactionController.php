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
        // Fetch active accounts from the database
        $accounts = Account::where('activate', 1)->get();
        return view('accounting.transactions.create_transaction', compact('accounts'));
    }

    public function store(Request $request)
    {
        // Copy the details array to a separate variable
        $details = $request->input('details');

        // Clean up the 'amount' fields by removing commas
        foreach ($details as &$detail) {
            $detail['amount'] = preg_replace('/,/', '', $detail['amount']); // Remove commas
        }

        // Merge the cleaned 'details' array back into the request
        $request->merge(['details' => $details]);

        // Validate the form data, including uniqueness for 'jev_no'
        $validated = $request->validate([
            'transaction_date' => 'required|date',
            'jev' => 'required|string|max:255|unique:transactions,jev_no', // Ensure 'jev_no' is unique
            'description' => 'nullable|string',
            'ref' => 'nullable|string|max:255',
            'payee' => 'required|string|max:255',
            'details' => 'required|array|min:1', // Ensure at least one transaction detail is present
            'details.*.particulars' => 'required|string|max:255',
            'details.*.uacs_code' => 'required|string|max:255', // Changed from numeric to string
            'details.*.mode_of_payment' => 'required|string|in:Credit,Debit',
            'details.*.amount' => 'required|numeric|min:0|max:100000000000', // Validate amount as a number
        ], [
            'details.required' => 'There is no transaction made.',
            'details.min' => 'There is no transaction made.', // Custom message if no transactions
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
                    'uacs_code' => $detail['uacs_code'], // This should now correctly handle any format
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
            // Return detailed error message
            return redirect()->back()->withErrors(['An error occurred while creating the transaction: ' . $e->getMessage()]);
        }
    }


}
