<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->unsignedBigInteger('message_id');
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('room_number');
            $table->unsignedBigInteger('person_id1');
            $table->unsignedBigInteger('person_id2');
            $table->foreign('person_id')->references('person_id')->on('people');
            $table->foreign(['room_number','person_id1','person_id2'])->references(['room_number','person_id1','person_id2'])->on('rooms');
            $table->primary('message_id');
            $table->date('date');
            $table->boolean('is_seen');
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
        Schema::dropIfExists('messages');
    }
}
