<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
    * Run the migrations.
    */
   public function up(): void
   {
      Schema::create('appropriations', function (Blueprint $table) {
         $table->id();
         $table->enum('document_type', ['GAA', 'SARO', 'SUBARO', 'GAARO']); // Type of Appropriation
         $table->string('document_number', 50)->unique(); // Reference No.
         $table->date('date_received'); // When it was recorded in RAPAL
         $table->decimal('amount', 20, 2); // Total Amount Allocated
         $table->enum('status', ['Pending', 'In Progress', 'Completed'])->default('Pending');
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('appropriations');
   }
};
