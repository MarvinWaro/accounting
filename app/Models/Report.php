<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
   use HasFactory;

   protected $fillable = ['appropriation_id', 'report_type', 'generated_by', 'date_generated', 'file_path'];

   public function appropriation()
   {
      return $this->belongsTo(Appropriation::class);
   }

   public function user()
   {
      return $this->belongsTo(User::class, 'generated_by');
   }
}
