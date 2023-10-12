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
            $table->id('sno');
            $table->string('firstName',20);
            $table->string('middleName',20)->nullable();
            $table->string('lastName',20);
            $table->string('contactNumber',11);
            $table->string('address',15);
            $table->string('typeofservice');
            $table->string('maintenancerequired');
            $table->string('problemencountered');
            $table->string('assignedstaff');
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
