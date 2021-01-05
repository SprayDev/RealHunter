<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licensies', function (Blueprint $table) {
            $table->id();
            $table->string('map_frame');
            $table->integer('cost');
            $table->unsignedBigInteger('location_id');
//            $table->foreign('location_id')
//                ->references('id')
//                ->on('locations')
//                ->onDelete('cascade');
            $table->string('title');
            $table->unsignedBigInteger('picture_id');
            $table->foreign('picture_id')
                ->references('id')
                ->on('pictures')
                ->onDelete('cascade');
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
        Schema::dropIfExists('licensies');
    }
}
