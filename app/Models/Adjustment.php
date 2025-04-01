<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Adjustment extends Model
{
   use HasFactory;

   protected $fillable = ['appropriation_id', 'adjustment_type', 'amount'];

   public function appropriation()
   {
      return $this->belongsTo(Appropriation::class);
   }
}
