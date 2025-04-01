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
      Schema::create('adjustments', function (Blueprint $table) {
         $table->id();
         // $table->unsignedBigInteger('appropriation_id');

         // $table->foreign('appropriation_id')->references('id')->on('appropriations')->onDelete('cascade');
         $table->foreignId('appropriation_id')->constrained(
            table: 'appropriations'
         )->onDelete('cascade');
         $table->enum('adjustment_type', ['Increase', 'Decrease']);
         $table->decimal('amount', 20, 2);
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('adjustments');
   }
};
