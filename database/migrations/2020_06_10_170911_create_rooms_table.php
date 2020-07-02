<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->unsignedBigInteger('room_number');
            $table->unsignedBigInteger('person_id1');
            $table->unsignedBigInteger('person_id2');
            $table->foreign('person_id1')->references('id')->on('people');
            $table->foreign('person_id2')->references('id')->on('people');
            $table->primary(['room_number','person_id1','person_id2']);
            $table->char('type',15);
            $table->timestamps();        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
