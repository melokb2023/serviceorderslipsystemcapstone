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
        Schema::create('servicedata', function (Blueprint $table) {
            $table->id('serviceno');
            $table->unsignedBigInteger('customerappointmentnumber');
            $table->string('contactnumber',11);
            $table->string('address',100);
            $table->string('typeofservice',100);
            $table->string('maintenancerequired',100);
            $table->string('problemencountered',100);
            $table->string('customerpassword',100);
            $table->string('assignedstaff',100);
            $table->timestamps();
            $table->foreign('customerappointmentnumber')->references('customerappointmentnumber')->on('customerappointment');


            
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicedata');
    }
};

