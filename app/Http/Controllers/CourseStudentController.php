<?php

namespace App\Http\Controllers;

use App\CourseStudents;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;

class CourseStudentController extends Controller
{
    //
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
        $user = Auth::user();
        $student = Student::where('u_id',$user->id)->get()[0]   ;
        $cart = $request->session()->get('cart');
        $items = $cart->items;
        foreach ($items as $item){
            $course = $item['course'];
            $take = new CourseStudents();
            $take->student_id   = $student->id;
            $take->course_id    = $course->id;
            $take->save();
        }
        $request->session()->remove('cart');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        //TODO validate
        /*************find student*****************************/
        $user_id = Auth::id();
        $student    = Student::where('u_id',$user_id)->get()[0];
        /***********************end part***********************/

        /********find courses that are taken*******************/
        $date = Jalalian::now();
        $this_year  = $date->getYear();
        $this_term  = 1;
        $courses    = $student->courses;
        $this_term_courses = array();
        foreach ($courses as $course){
            if($course->year == $this_year and $course->term == $this_term){
                array_push($this_term_courses,$course);
            }
        }
        /*******************find courses that are in session***************************/
        /*****************************************************************************/
        return view('takes/show',[
            'taken'=>$this_term_courses,
            'student_id' => $student->id
        ]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        //TODO validate
        CourseStudents::where([['course_id',$id],['student_id',$request->student_id]])->delete();
        return redirect('/takes/'.$request->student_id);
    }
}
