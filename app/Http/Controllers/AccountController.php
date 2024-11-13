<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    // Show all accounts
    public function index()
    {
        $accounts = Account::all();
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

        Account::create($validated);
        return redirect()->route('uacs_index')->with('success', 'Account created successfully.');
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
        $account->delete();

        return redirect()->route('uacs_index')->with('success', 'Account deleted successfully.');
    }


}

