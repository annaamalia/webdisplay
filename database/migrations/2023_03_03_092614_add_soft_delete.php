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
        Schema::table('idx_location', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('idx_program_category', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('idx_user_type', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('invoice', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('program_donatur', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('program_info', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('program_profile', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
