<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PivotLicensesLocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('license_location', function (Blueprint $table){
            $table->foreignId('location_id')->constrained();
            $table->foreignId('license_id')->constrained();
            $table->date('season_start');
            $table->date('season_end');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('license_location');
    }
}
