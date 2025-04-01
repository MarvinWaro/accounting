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
      Schema::create('processing_steps', function (Blueprint $table) {
         $table->id();
         $table->foreignId('appropriation_id')->constrained(
            table: 'appropriations'
         )->onDelete('cascade');

         $table->enum('step_name', ['RAPAL', 'RAOD', 'Accounting Processing']);

         $table->foreignId('processed_by')->nullable()->constrained(
            table: 'users'
         )->onDelete('set null');

         $table->timestamp('date_processed')->useCurrent();
         $table->text('remarks')->nullable();
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('processing_steps');
   }
};
