<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonStudentViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW person_student_views
         AS
             SELECT
                 students.id,
                 students.person_id,
                 students.educational_group_id,
                 students.guide_teacher_id,
                 students.units_no,
                 students.grade,
                 people.fname,
                 people.lname,
                 people.field
         from
            students,people
         where
            students.person_id = people.id
         ;
         ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_student_views');
    }
}
