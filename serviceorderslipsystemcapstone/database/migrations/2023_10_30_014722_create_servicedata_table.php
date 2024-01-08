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
            $table->unsignedBigInteger('staffnumber');
            $table->string('staffname');
            $table->string('customername');
            $table->string('typeofservice',100);
            $table->string('listofproblems',100);
            $table->string('customerpassword',100);
            $table->string('defectiveunits',100);
            $table->string('actionsrequired',100);
            $table->string('workprogress',100);
            $table->string('workremarks',100);
            $table->string('serviceprogress',100);
            $table->string('serviceremarks',100);
            $table->dateTime('dateandtime', $precision = 0);
            $table->dateTime('servicestarted', $precision = 0);
            $table->dateTime('serviceend', $precision = 0);
            $table->string('orderreferencecode')->nullable();
            $table->timestamps();
            $table->foreign('customerappointmentnumber')->references('customerappointmentnumber')->on('customerappointment');
            $table->foreign('staffnumber')->references('staffnumber')->on('staff');

            
        
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

