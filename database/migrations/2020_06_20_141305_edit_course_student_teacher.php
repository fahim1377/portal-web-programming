<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditCourseStudentTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('course_student_teachers', function (Blueprint $table) {
            $table->dropColumn('year');                //peresented on this year
            $table->dropColumn('term');           //peresented on this term
            $table->dropColumn('student_no');           //peresented on this term


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
