<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Event extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->index();
            $table->string('content')->index();

            $table->integer('gallery_id')->unsigned();
            $table->foreign('gallery_id')->references('id')->on('gallery');

            $table->string('location')->index();

            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('event');
    }
}
