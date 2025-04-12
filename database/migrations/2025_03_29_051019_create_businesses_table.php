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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('name');                     
            $table->string('address')->nullable();  
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zip_code')->nullable();                
            $table->enum('gender', ['male', 'female', 'other'])->nullable();       
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('sector_id')->nullable();
            $table->float('ratings')->nullable();
            $table->json('reviews')->nullable();        
            $table->integer('review_count')->nullable();
            $table->text('description')->nullable();
            $table->json('price')->nullable();
            $table->json('hours')->nullable();
            $table->text('services')->nullable();
            $table->json('discount')->nullable();       
            $table->string('email')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->enum('bus_status', ['valid', 'permanently_closed'])->default('valid');
            $table->string('url')->nullable();
            $table->integer('views_count')->nullable()->default(0);
            $table->enum('page_status', ['published', 'draft', 'unpublished'])->default('unpublished');
            $table->string('specialization')->nullable();
            $table->string('img_1')->nullable();
            $table->string('img_2')->nullable();
            $table->string('img_3')->nullable();
            $table->json('img_more')->nullable();
            $table->string('organization')->nullable();        
            $table->json('license')->nullable();
            $table->date('since')->nullable();
            $table->string('latitude' , 50)->nullable(); //50
            $table->string('longitude' , 50)->nullable(); //50
            $table->json('phone_more')->nullable();       
            $table->json('email_more')->nullable();
            $table->string('website')->nullable();
            $table->json('social_media')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
