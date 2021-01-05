<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_pictures', function (Blueprint $table) {
            $table->unsignedBigInteger('tour_id');
            $table->unsignedBigInteger('picture_id');
            $table->foreign('tour_id')
                ->references('id')
                ->on('tours')
                ->onDelete('cascade');
            $table->foreign('picture_id')
                ->references('id')
                ->on('pictures')
                ->onDelete('cascade');
            $table->primary(['tour_id', 'picture_id']);
            $table->string('type');
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
        Schema::dropIfExists('tour_pictures');
    }
}
