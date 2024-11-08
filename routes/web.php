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
        return view('accounting.transaction');
    })->name('transaction');

    Route::get('transaction_list', function () {
        return view('accounting.transaction_list');
    })->name('transaction_list');

    Route::get('create_transaction', function () {
        return view('accounting.create_transaction');
    })->name('create_transaction');



});
