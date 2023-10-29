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
            $table->unsignedBigInteger('customernumber');
            $table->string('firstname',100);
            $table->string('middlename',100);
            $table->string('lastname',100);
            $table->string('contactnumber',11);
            $table->string('address',100);
            $table->string('typeofservice',100);
            $table->string('maintenancerequired',100);
            $table->string('problemencountered',100);
            $table->string('customerpassword',100);
            $table->string('assignedstaff',100);
            $table->timestamps();
            $table->foreign('customernumber')->references('customernumber')->on('customerappointment');
            
        
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
