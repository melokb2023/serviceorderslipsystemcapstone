
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
            $table->id('worknumber');
            $table->unsignedBigInteger('serviceno');
            $table->string('staffname',100);
            $table->string('actionsrequired',100);
            $table->string('typeofservice',100);
            $table->dateTime('workstarted', $precision = 0);
            $table->string('workprogress',100);
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
