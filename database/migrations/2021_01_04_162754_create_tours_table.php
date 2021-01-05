<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->text('trophies');
            $table->text('hunting_area');
            $table->text('accommodation');
            $table->text('how_to_get');
            $table->text('conditions');
            $table->unsignedBigInteger('location_id');
//            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');;
            $table->integer('number_of_hunters_min');
            $table->integer('number_of_hunters_max');
            $table->integer('number_of_guests_min');
            $table->integer('number_of_guests_max');
            $table->boolean('transfer_included');
            $table->date('available_period_min');
            $table->date('available_period_max');
            $table->string('hunting_best_time');
            $table->integer('cost');
            $table->string('title');
            $table->boolean('license_included');
            $table->boolean('is_deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
