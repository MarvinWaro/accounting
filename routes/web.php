<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

    Route::get('accounting_dashboard', function () {
        return view('accounting.accounting_dashboard');
    })->name('accounting_dashboard');

    // Display list of accounts
    Route::get('uacs_index', [AccountController::class, 'index'])->name('uacs_index');
    Route::get('uacs_create', [AccountController::class, 'create'])->name('uacs_create');
    Route::post('uacs_store', [AccountController::class, 'store'])->name('uacs_store');
    Route::get('uacs/{id}/edit', [AccountController::class, 'edit'])->name('uacs_edit');
    Route::put('uacs/{id}', [AccountController::class, 'update'])->name('uacs_update');
    Route::delete('uacs/{id}', [AccountController::class, 'destroy'])->name('uacs_destroy');


    Route::get('transaction_index', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('transaction_create', [TransactionController::class, 'create'])->name('transaction.create');
    Route::post('transaction_store', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('transaction/{id}/edit', [TransactionController::class, 'edit'])->name('transaction.edit');
    Route::put('transaction/{id}', [TransactionController::class, 'update'])->name('transaction.update'); // Route for updating the transaction
    Route::delete('/transaction/{id}', [TransactionController::class, 'destroy'])->name('transaction.destroy');
    Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transaction.show');

    // routes/web.php
    Route::get('transactions_years', [TransactionController::class, 'yearsIndex'])->name('transaction.years');

    Route::get('/transactions_years/{year}', [TransactionController::class, 'monthsIndex'])->name('transaction.months');

    Route::get('/transactions_years/{year}/{month}', [TransactionController::class, 'entriesIndex'])->name('transaction.entries');



});



    // Route::get('transaction', function () {
    //     return view('accounting.transactions.transaction');
    // })->name('transaction');

    // Route::get('transaction_list', function () {
    //     return view('accounting.transactions.transaction_list');
    // })->name('transaction_list');

    // Route::get('create_transaction', function () {
    //     return view('accounting.transactions.create_transaction');
    // })->name('create_transaction');

    // Route::get('month_transactions', function () {
    //     return view('accounting.transactions.month_transactions');
    // })->name('month_transactions');

    // Route::get('gj_recap', function () {
    //     return view('accounting.transactions.gj_recap');
    // })->name('gj_recap');
