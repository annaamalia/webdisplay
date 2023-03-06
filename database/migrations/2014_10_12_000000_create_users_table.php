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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email', 33)->unique();
            $table->string('password')->nullable();
            $table->string('phone_number', 15);
            $table->string('name', 33);
            $table->text('profile_picture')->nullable();
            $table->unsignedInteger('idx_user_type_id');
            $table->foreignId('idx_user_type_id')->constrained('idx_user_type');
            $table->boolean('status');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
