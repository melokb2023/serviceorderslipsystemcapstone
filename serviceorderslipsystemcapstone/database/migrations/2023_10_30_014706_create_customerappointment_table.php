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
            $table->string('firstname',100);
            $table->string('middlename',100);
            $table->string('lastname',100);
            $table->string('contactnumber',11);
            $table->string('email',100);
            $table->string('address',100);
            $table->string('appointmentpurpose',100);
            $table->string('appointmenttype',100);
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
