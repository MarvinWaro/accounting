<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appropriation extends Model
{
   use HasFactory;

   protected $fillable = ['document_type', 'document_number', 'date_received', 'amount', 'status'];

   public function details()
   {
      return $this->hasMany(AppropriationDetail::class);
   }

   public function adjustments()
   {
      return $this->hasMany(Adjustment::class);
   }

   public function processingSteps()
   {
      return $this->hasMany(ProcessingStep::class);
   }

   public function reports()
   {
      return $this->hasMany(Report::class);
   }
}
