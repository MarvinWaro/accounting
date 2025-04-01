<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppropriationDetail extends Model
{
   use HasFactory;

   protected $fillable = ['appropriation_id', 'allotment_class', 'allocated_amount'];

   public function appropriation()
   {
      return $this->belongsTo(Appropriation::class);
   }
}
