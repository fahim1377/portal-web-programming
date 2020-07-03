<?php

namespace App\Http\Controllers;

use App\EducationalGroup;
use App\User;
use App\PersonTeacherViews;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    //
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $group = EducationalGroup::where('name',$request->field)->get();
        $teachers = PersonTeacherViews::where('group_id',$group[0]->id)->get();
        return view('teachers/index',[
                'teachers' => $teachers
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
        $groups = EducationalGroup::all();
        return view('teachers/create',
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
        //TODO  if teacher fial to  create maybe person create correct it
        //TODO  if person exist what happened then? oooowww
        //      first create person then create teacher
        $user = new User();
        $user->id = $request->u_id;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->group_id = $request->group_id;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        //        now teacher
        $teacher = new Teacher();
        $teacher->id = $request->id;
        $teacher->u_id = $request->u_id;
        $teacher->academic_rank = $request->academic_rank;
        $teacher->save();

        $groups = EducationalGroup::all();                  //this is send to creat teacher page
        return view("teachers/create",[
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
        $teacher = PersonTeacherViews::find($id);
        return view('teachers/show',['teacher'=>$teacher]);
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
        $teacher = PersonTeacherViews::find($id);
        return view('teachers/edit',[
            'teacher'   =>  $teacher
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
            'field'     => $request->field,
            'email'     => $request->email
        ]);
        //        now teacher
        Teacher::where('id',$id)->update([
            'id'                    => $request->id,
            'u_id'             => $request->u_id,
            'academic_rank'         => $request->academic_rank
        ]);

        return redirect('teachers/'.$request->id);
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
        teacher::where('id',$id)->delete();
    }
}
