<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditPersonTeacherview extends Migration
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
        CREATE VIEW person_teacher_views
         AS
             SELECT 
                 teachers.id,
                 teachers.u_id,
                 teachers.academic_rank,
                 users.fname,
                 users.lname,
                 users.group_id,
                 users.email
         from
            teachers,users
         where
            teachers.u_id = users.id
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
