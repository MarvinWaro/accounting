<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  // Add this line

class Transaction extends Model
{
    use HasFactory, SoftDeletes;  // Add SoftDeletes to the model

    protected $fillable = [
        'transaction_date',
        'jev_no',
        'description',
        'ref',
        'payee',
        'activate',
        'exclude',
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}


