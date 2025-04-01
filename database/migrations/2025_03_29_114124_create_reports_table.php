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
      Schema::create('reports', function (Blueprint $table) {
         $table->id();
         $table->foreignId('appropriation_id')->constrained(
            table: 'appropriations'
         )->onDelete('cascade');
         $table->enum('report_type', ['FAR 1B']);
         $table->foreignId('generated_by')->nullable()->constrained(
            table: 'users'
         )->onDelete('set null');
         $table->timestamp('date_generated')->useCurrent();
         $table->string('file_path')->nullable();
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('reports');
   }
};
