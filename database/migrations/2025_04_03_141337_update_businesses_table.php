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
        Schema::table('businesses', function (Blueprint $table) {
            $table->string('timezone')->nullable()->after('social_media');
            $table->string('google_id')->nullable()->after('timezone');
            $table->string('place_id')->nullable()->after('google_id');
            $table->json('details')->nullable()->after('place_id');
            $table->string('referance_json_file_path')->nullable()->after('details');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->dropColumn(['timezone', 'google_id', 'place_id', 'details','referance_json_file_path']);
        });

    }
};
