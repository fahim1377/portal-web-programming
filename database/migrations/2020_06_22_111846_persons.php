<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Persons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('people', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->primary('id');
            $table->text('fname',30);
            $table->text('lname',30);
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('educational_groups')->onDelete('cascade')->onUpdate('cascade');
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
        //
        Schema::dropIfExists('people');
    }
}
