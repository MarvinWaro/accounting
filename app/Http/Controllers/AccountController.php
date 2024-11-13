<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    // Show all accounts
    public function index()
    {
        // Fetch accounts that are not excluded
        $accounts = Account::where('exclude', 0)->get();
        return view('accounting.uacs.uacs_index', compact('accounts'));
    }


    // Show form to create a new account
    public function create()
    {
        return view('accounting.uacs.uacs_create');
    }

    // Store a newly created account
    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_no' => 'required|unique:accounts',
            'description' => 'required',
        ]);

        // Check if there is an excluded account to reuse
        $excludedAccount = Account::where('exclude', 1)->first();

        if ($excludedAccount) {
            // Reuse the excluded account
            $excludedAccount->update([
                'account_no' => $validated['account_no'],
                'description' => $validated['description'],
                'exclude' => 0, // Reactivate the account
                'activate' => 1, // Set to active
            ]);

            return redirect()->route('uacs_index')->with('success', 'Excluded account reused successfully.');
        } else {
            // Create a new account if no excluded account exists
            Account::create(array_merge($validated, ['exclude' => 0, 'activate' => 1]));

            return redirect()->route('uacs_index')->with('success', 'Account created successfully.');
        }
    }


    public function edit($id)
    {
        $account = Account::findOrFail($id);
        return view('accounting.uacs.uacs_edit', compact('account'));
    }



    // Update an existing account
    public function update(Request $request, $id)
    {
        // Validate the input
        $validated = $request->validate([
            'account_no' => 'required|unique:accounts,account_no,' . $id, // Allow the current account to keep its number
            'description' => 'required',
        ]);

        // Find the account by ID and update it
        $account = Account::findOrFail($id);
        $account->update($validated);

        return redirect()->route('uacs_index')->with('success', 'Account updated successfully.');
    }

    public function destroy($id)
    {
        $account = Account::findOrFail($id);

        $account->update([
            'exclude' => 1, // Mark as excluded
            'activate' => 0, // Deactivate the account
        ]);

        return redirect()->route('uacs_index')->with('success', 'Account deactivated successfully.');
    }



}
