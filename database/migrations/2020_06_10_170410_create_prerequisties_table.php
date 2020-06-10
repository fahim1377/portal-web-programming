<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrerequistiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prerequisties', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id_doer');
            $table->unsignedBigInteger('course_id_been');
            $table->foreign('course_id_doer')->references('id')->on('courses');
            $table->foreign('course_id_been')->references('id')->on('courses');
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
        Schema::dropIfExists('prerequisties');
    }
}
