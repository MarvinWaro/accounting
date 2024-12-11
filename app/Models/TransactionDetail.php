<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'particulars',
        'uacs_code',
        'mode_of_payment',
        'amount',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}

