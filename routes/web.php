<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

    Route::get('accounting_dashboard', function () {
        return view('accounting.accounting_dashboard');
    })->name('accounting_dashboard');

    Route::get('transaction', function () {
        return view('accounting.transactions.transaction');
    })->name('transaction');

    Route::get('transaction_list', function () {
        return view('accounting.transactions.transaction_list');
    })->name('transaction_list');

    Route::get('create_transaction', function () {
        return view('accounting.transactions.create_transaction');
    })->name('create_transaction');

    Route::get('month_transactions', function () {
        return view('accounting.transactions.month_transactions');
    })->name('month_transactions');

    Route::get('gj_recap', function () {
        return view('accounting.transactions.gj_recap');
    })->name('gj_recap');


    // UACS

    Route::get('uacs_index', function () {
        return view('accounting.uacs.uacs_index');
    })->name('uacs_index');

    Route::get('uacs_create', function () {
        return view('accounting.uacs.uacs_create');
    })->name('uacs_create');



});
