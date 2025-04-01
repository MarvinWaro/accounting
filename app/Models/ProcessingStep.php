<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProcessingStep extends Model
{
   use HasFactory;

   protected $fillable = ['appropriation_id', 'step_name', 'processed_by', 'date_processed', 'remarks'];

   public function appropriation()
   {
      return $this->belongsTo(Appropriation::class);
   }

   public function user()
   {
      return $this->belongsTo(User::class, 'processed_by');
   }
}
