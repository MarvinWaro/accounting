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
        return view('accounting.transactions.transaction_list');
    }

    public function create()
    {
        return view('accounting.transactions.create_transaction');
    }

    public function store(Request $request)
    {
        // Validate the form data, especially the 'details' array
        $validated = $request->validate([
            'transaction_date' => 'required|date',
            'jev' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ref' => 'nullable|string|max:255',
            'payee' => 'required|string|max:255',
            'details.*.particulars' => 'required|string|max:255',
            'details.*.uacs_code' => 'required|numeric',
            'details.*.mode_of_payment' => 'required|string|in:Credit,Debit',
            'details.*.amount' => 'required|numeric|min:0',
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

