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
        Schema::create('program_profile', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->foreignId('user_id')->constrained();
            $table->string('idx_program_category_id');
            $table->foreignId('idx_program_category_id')->constrained('');
            $table->string('title', 50);
            $table->longtext('detail');
            $table->bigInteger('target_donation');
            $table->text('location');
            // $table->unsignedInteger('idx_location_id');
            // $table->foreign('idx_location_id')->references('id')->on('idx_location');
            $table->boolean('status');
            $table->date('date_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_profile');
    }
};
