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
        Schema::create('customerrating', function (Blueprint $table) {
            $table->id('ratingno');
            $table->unsignedBigInteger('customerappointmentnumber');
            $table->string('review');
            $table->integer('rating');
            $table->timestamps();
            $table->foreign('customerappointmentnumber')->references('customerappointmentnumber')->on('customerappointment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
