<?php

namespace App\Http\Controllers;

use App\EducationalGroup;
use App\Person;
use App\PersonTeacherViews;
use App\Teacher;
use Illuminate\Http\Request;

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
        $teachers = PersonTeacherViews::where('group_id',strval($request->group_id))->get();
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
        $person = new Person();
        $person->id = $request->person_id;
        $person->fname = $request->fname;
        $person->lname = $request->lname;
        $person->group_id = $request->group_id;
        $person->save();
        //        now teacher
        $teacher = new Teacher();
        $teacher->id = $request->id;
        $teacher->person_id = $request->person_id;
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
        $teacher = Teacher::find($id);
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
        $teacher = Teacher::find($id);
        $person = Person::find($teacher->person_id);
        return view('teachers/edit',['teacher'=>$teacher,"person"=>$person]);
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
        //        now teacher
        Teacher::where('id',$id)->update([
            'id'                    => $request->id,
            'person_id'             => $request->person_id,
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
