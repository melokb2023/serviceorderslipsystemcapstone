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
            $table->string('firstName',20);
            $table->string('middleName',20)->nullable();
            $table->string('lastName',20);
            $table->string('contactNumber',11);
            $table->string('address',15);
            $table->string('typeofservice',50);
            $table->string('maintenancerequired',20);
            $table->string('problemencountered',20);
            $table->string('assignedstaff',25);
            $table->timestamps();
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
