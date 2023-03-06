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
        Schema::create('program_donatur', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_profile_id')->constrained('program_profile');
            $table->integer('value');
            $table->text('comment')->nullable();
            $table->boolean('status');
            $table->boolean('anonim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_donatur');
    }
};
