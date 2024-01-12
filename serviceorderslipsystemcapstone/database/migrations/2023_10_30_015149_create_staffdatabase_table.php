
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
        Schema::create('staffwork', function (Blueprint $table) {
            $table->id('worknumber');
            $table->unsignedBigInteger('serviceno');
            $table->dateTime('workstarted', $precision = 0);
            $table->string('actionstaken');
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
