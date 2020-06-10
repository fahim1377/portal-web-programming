<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('educational_group_id');
            $table->unsignedBigInteger('guide_teacher_id');
            $table->primary('id');
            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('guide_teacher_id')->references('id')->on('teachers');
            $table->foreign('educational_group_id')->references('id')->on('educational_groups');
            $table->smallInteger('units_no');
            $table->string('grade',30)->collation('utf8_general_ci');
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
        Schema::dropIfExists('students');
    }
}
