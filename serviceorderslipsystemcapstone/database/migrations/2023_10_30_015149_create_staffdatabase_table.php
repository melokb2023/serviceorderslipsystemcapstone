
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
            $table->unsignedBigInteger('serviceno');
            $table->string('actionstaken',100)->default('None');
            $table->string('workprogress')->default('Ongoing');
            $table->foreign('serviceno')->references('serviceno')->on('servicedata');
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
