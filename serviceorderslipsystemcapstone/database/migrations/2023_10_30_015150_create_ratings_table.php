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
            $table->unsignedBigInteger('serviceno');
            $table->integer('reviewerid');
            $table->string('reviewername');
            $table->string('review');
            $table->integer('rating');
            $table->foreign('serviceno')->references('serviceno')->on('servicedata');
            $table->timestamps();
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
