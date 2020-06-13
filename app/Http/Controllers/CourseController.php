<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
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
        $courses = Course::all();
        return view('students/index',[
                'students' => $courses
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
        return view('courses/create');
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
        //TODO  if student fial to  create maybe courses create correct it
        //TODO  if courses exist what happened then? oooowww
        //      first create courses then create student
        $course = new Course();
        $course->id = $request->id;
        $course->year = $request->year;
        $course->term = $request->term;
        $course->name = $request->name;
        $course->unit_no = $request->unit_no;
        $course->student_no = $request->student_no;
        $course->save();

        return view('courses/create',[
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
        $course = Course::find($id);
        return view('courses/show',['course'=>$course]);
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
        $course = Course::find($id);
        return view('courses/edit',['course'=>$course]);
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
        Course::where('id',$request->id)->update([
            'id'        => $request->id,
            'year'      => $request->year,
            'term'      => $request->term,
            'name'      => $request->name,
            'unit_no'   => $request->unit_no,
            'student_no'      => $request->student_no

        ]);
        return redirect('courses/'.$request->id);
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
        Course::where('id',$id)->delete();
    }
}
