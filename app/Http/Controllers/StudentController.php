<?php

namespace App\Http\Controllers;

use App\Person;
use App\Student;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::all();
        return view('students/index',[
            'students' => $students
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('students/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //      first create person then create student
        $person = new Person();
        $person->person_id = $request->person_id;
        $person->fname = $request->fname;
        $person->lname = $request->lname;
        $person->field = $request->field;
        //        now student
        $student = new Student();
        $student->student_id = $request->student_id;
        $student->person_id = $request->person_id;
        $student->educational_group_id = $request->educational_group_id;
        $student->guide_teacher_id = $request->guide_teacher_id;
        $student->units_no = $request->units_no;
        $student->grade = $request->grade;

        $person->save();
        $student->save();

        return back();



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
