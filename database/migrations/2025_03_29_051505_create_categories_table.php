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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();                          
            $table->string('name');     
            $table->string('services')->nullable(); 
            $table->text('description')->nullable();     
            $table->string('img')->nullable();
            $table->enum('category_status', ['published', 'unpublished'])->default('unpublished');    
            $table->unsignedBigInteger('sector_id'); 
            $table->timestamps();
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
