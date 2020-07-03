<?php

namespace App\Http\Controllers;

use App\Course;
use App\EducationalGroup;
use App\Providers\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $groups = EducationalGroup::all();
        foreach ($groups as $group){
            foreach ($terms as $term) {
                $courses_grouped[$group->name][$term] = Course::where([
                    ['year', '=', $request->year],
                    ['term', '=', $term],
                    ['group_id','=',$group->id]
                ])->get();
            }
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
        $course->teacher_id = $request->teacher_id;
        $course->group_id = $request->group_id;
        $course->year = $request->year;
        $course->term = $request->term;
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

    public function add_to_cart(Request $request,$id){
//        dd($request->session());
        $course = Course::find($id);
        $old_cart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($old_cart);
        $is_success = $cart->add($course,$course->id);
        $request->session()->put('cart',$cart);
//        dd($request->session());
//        dd($is_success);
        return back(302,['message'=>$is_success]);
    }
}
