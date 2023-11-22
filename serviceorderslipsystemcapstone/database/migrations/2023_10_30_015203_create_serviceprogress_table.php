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
        Schema::create('serviceprogress', function (Blueprint $table) {
            $table->id('serviceprogressno');
            $table->unsignedBigInteger('serviceno');
            $table->dateTime('dateandtime', $precision = 0);
            $table->string('serviceprogress');
            $table->string('serviceremarks',100);
            $table->timestamps();
            $table->foreign('serviceno')->references('serviceno')->on('servicedata');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serviceprogress');
    }
};









