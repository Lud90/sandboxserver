<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('image');
            $table->string('cost');
            $table->string('url');
            $table->string('location');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->dateTime('publish_at');
            $table->string('tags');
            $table->string('snippet');
            $table->mediumText('content');
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
        Schema::drop('events');
    }
}
