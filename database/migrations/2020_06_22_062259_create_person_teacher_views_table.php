<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonTeacherViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW person_teacher_views
         AS
             SELECT 
                 teachers.id,
                 teachers.person_id,
                 teachers.academic_rank,
                 people.fname,
                 people.lname,
                 people.group_id
         from
            teachers,people
         where
            teachers.person_id = people.id
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
        Schema::dropIfExists('person_teacher_views');
    }
}
