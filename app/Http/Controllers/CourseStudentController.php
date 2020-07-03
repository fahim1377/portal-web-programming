<?php

namespace App\Http\Controllers;

use App\CourseStudent;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseStudentController extends Controller
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
        $user = Auth::user();
        if($request->session()->remember_token !== $user->getRememberToken()){
            return back();
        }
        $student = Student::find($user->student_id);
        $cart = $request->session()->get('Cart');
        $items = $cart->items;
        foreach ($items as $item){
            $course = $item['item'];
            $take = new CourseStudent();
            $take->student_id   = $student->id;
            $take->course_id    = $course->id;
            $take->save();
        }
        return view('takes/create',[
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
        $takes = CourseStudent::find($id);
        $student = Student::find($id);
        //TODO find course in this term taked and related to group
//        $student->courses()->where([['group']);
        return view('takes/show',['takes'=>$takes]);
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
