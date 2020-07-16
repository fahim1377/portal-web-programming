<?php

namespace App\Http\Controllers;


use App\EducationalGroup;
use App\Person;
use App\PersonStudent_view;
use App\PersonTeacherViews;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $groups = EducationalGroup::all();                      //needed for separate students by their educational groups
        $students_grouped = array();
        foreach ($groups as $group){
            //separate students by their groups
            $students_grouped[$group->name] =   PersonStudent_view::where([['group_id','=',$group->id]])->get();
        }


        //finally send grouped student to index view for show in separate tables
        return view('students/index',[
                'students_grouped' => $students_grouped
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


        //need when crate new student to choose what is it group
        $groups = EducationalGroup::all();

        return view('students/create',
            [
                'groups'    =>  $groups
            ]);
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
        $user = new User();
        $user->id = $request->u_id;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->group_id = $request->group_id;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        //        now student
        $student = new Student();
        $student->id = $request->student_id;
        $student->u_id = $request->u_id;
        //TODO replace group id with group name
        //TODO replace teachers id with teachers name
        $student->guide_teacher_id = $request->guide_teacher_id;
        $student->units_no = $request->units_no;
        $student->grade = $request->grade;

        $student->save();

        //need for create another new student
        $groups = EducationalGroup::all();
        return view('students/create',[
                'message' => 'successed',
                'groups'  => $groups
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
        $student = PersonStudent_view::find($id);                               //find student on id
        //find edudcational group name of student by id
        $educational_group = EducationalGroup::find($student->group_id);
        return view('students/show',[
            'student'       =>$student,
            'group_name'    =>$educational_group->name
        ]);
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
        $sutdent    = PersonStudent_view::where([['id','=',$id]])->get()[0];
        $groups     = EducationalGroup::all();
        $teachers   = PersonTeacherViews::where('group_id',$sutdent->group_id)->get();
        return view('students/edit',[
            'student'   =>  $sutdent,
            'groups'    =>  $groups,
            'teachers'  =>  $teachers
        ]);
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
        User::where('id',$request->u_id)->update([
            'id'        => $request->u_id,
            'fname'     => $request->fname,
            'lname'     => $request->lname,
            'group_id'  => $request->group_id,
            'email'     =>  $request->email
        ]);
        //        now student
        Student::where('id',$id)->update([
            'id'                    => $request->student_id,
            'u_id'             => $request->u_id,
            //TODO replace teachers id with teachers name
            'guide_teacher_id'      => $request->guide_teacher_id,
            'units_no'              => $request->units_no,
            'grade'                 => $request->grade
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
        $u_id = Student::where('id',$id)->get()[0]->u_id;
        Student::where('id',$id)->delete();
        User::where('id',$u_id)->delete();
        return redirect('../students');
    }
}
