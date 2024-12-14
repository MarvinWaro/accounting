<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
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
        return view('accounting.transactions.create_transaction');
    }

    public function store(Request $request)
    {
        // Create a new array to store the cleaned data
        $details = $request->details;

        // Clean up the 'amount' fields by removing commas
        foreach ($details as &$detail) {
            $detail['amount'] = preg_replace('/,/', '', $detail['amount']); // Remove commas
        }

        // Re-assign the cleaned 'details' array back to the request
        $request->merge(['details' => $details]);

        // Validate the form data, especially the 'details' array
        $validated = $request->validate([
            'transaction_date' => 'required|date',
            'jev' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ref' => 'nullable|string|max:255',
            'payee' => 'required|string|max:255',
            'details' => 'required|array|min:1', // Ensure at least one transaction detail is present
            'details.*.particulars' => 'required|string|max:255',
            'details.*.uacs_code' => 'required|numeric',
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
            // Return detailed error message
            return redirect()->back()->withErrors(['An error occurred while creating the transaction: ' . $e->getMessage()]);
        }
    }




}

