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
    public function index(Request $request)
    {
        //
        $terms = array('1','2');
        $courses_grouped = array();                 //consist courses that grouped by term
        foreach ($terms as $term){
            $courses_grouped[$term] = Course::where([
                ['year','=',$request->year],
                ['group_id','=',$request->group_id],
                ['term' ,'=',$term]
            ])->get();
        }
        return view('courses/index',[
                'courses_grouped' => $courses_grouped
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
        $course->name = $request->name;
        $course->unit_no = $request->unit_no;
        $course->unit_no = $request->teacher_id;
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
            'name'      => $request->name,
            'unit_no'   => $request->unit_no,
            'course_id' => $request->teacher_id

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
