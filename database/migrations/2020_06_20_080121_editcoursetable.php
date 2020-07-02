<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Editcoursetable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('courses', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('teacher_id');
            $table->integer('student_no');          //max student that can have
            $table->integer('year');                //peresented on this year
            $table->smallInteger('term');           //peresented on this term
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('educational_groups');




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
    }
}
