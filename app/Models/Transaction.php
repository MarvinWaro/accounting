<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_date',
        'jev_no',
        'description',
        'ref',
        'payee',
        'activate', // Add activate to the fillable array
        'exclude',  // Add exclude to the fillable array
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}


