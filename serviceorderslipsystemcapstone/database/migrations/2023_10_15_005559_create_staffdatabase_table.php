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
        Schema::create('staffdatabase', function (Blueprint $table) {
            $table->id('staffnumber');
            $table->string('listofproblems',50);
            $table->string('typeofservice',50);
            $table->string('maintenance',50);
            $table->string('defectiveunits',50);
            $table->string('viewtasks',100);
            $table->string('actionstaken',100);
            $table->string('workprogress')->default('Ongoing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffdatabase');
    }
};
