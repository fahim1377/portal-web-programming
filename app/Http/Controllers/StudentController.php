<?php

namespace App\Http\Controllers;


use App\Person;
use App\Student;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class StudentController extends Controller
{
    //
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
        //TODO validate
        //TODO send techers for guide
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
        //TODO  validate request
        //TODO  if student fial to  create maybe person create correct it
        //TODO  if person exist what happened then? oooowww
        //      first create person then create student
        $person = new Person();
        $person->id = $request->person_id;
        $person->fname = $request->fname;
        $person->lname = $request->lname;
        $person->field = $request->field;
        $person->save();
        //        now student
        $student = new Student();
        $student->id = $request->student_id;
        $student->person_id = $request->person_id;
        //TODO replace group id with group name
        $student->educational_group_id = $request->educational_group_id;
        //TODO replace teacher id with teacher name
        $student->guide_teacher_id = $request->guide_teacher_id;
        $student->units_no = $request->units_no;
        $student->grade = $request->grade;


        $student->save();

        return view('students/create',[
                'message' => 'successed'
            ]
        );

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
        //TODO validate
        $student = Student::find($id);
        return view('students/show',['student'=>$student]);
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
        //TODO validate
        $sutdent = Student::find($id);
        $person = Person::find($sutdent->person_id);
        return view('students/edit',['student'=>$sutdent,"person"=>$person]);
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
        Person::where('id',$request->person_id)->update([
            'id'        => $request->person_id,
            'fname'     => $request->fname,
            'lname'     => $request->lname,
            'field'     => $request->field
        ]);
        //        now student
        Student::where('id',$id)->update([
        'id'                    => $request->student_id,
        'person_id'             => $request->person_id,
        //TODO replace group id with group name
        'educational_group_id'  => $request->educational_group_id,
        //TODO replace teacher id with teacher name
        'guide_teacher_id'      => $request->guide_teacher_id,
        'units_no'              => $request->units_no,
        'grade'                 => $request->grade,
        ]);

        return redirect('students/'.$request->student_id);
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
        //TODO validate
        Student::where('id',$id)->delete();
    }
}
