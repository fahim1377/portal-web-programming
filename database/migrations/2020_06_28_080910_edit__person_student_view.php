<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditPersonStudentView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::statement("
        CREATE VIEW person_student_views
         AS
             SELECT
                 students.id,
                 students.u_id,
                 students.guide_teacher_id,
                 students.units_no,
                 students.grade,
                 users.fname,
                 users.lname,
                 users.group_id,
                 users.email
         from
            students,users
         where
            students.u_id = users.id
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
        //
    }
}
