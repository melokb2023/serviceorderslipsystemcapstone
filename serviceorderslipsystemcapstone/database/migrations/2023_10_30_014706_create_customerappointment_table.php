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
        Schema::create('customerappointment', function (Blueprint $table) {
            $table->id('customerappointmentnumber');
            $table->foreignId('customerno')->constrained('users');
            $table->string('customername');
            $table->string('appointmentpurpose', 100);
            $table->string('appointmenttype', 100);
            $table->dateTime('dateandtime', $precision = 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customerappointment');
    }
};
