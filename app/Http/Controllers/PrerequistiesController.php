<?php

namespace App\Http\Controllers;

use App\Prerequisties;
use Illuminate\Http\Request;

class PrerequistiesController extends Controller
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
        $prerequisties = Prerequisties::all();
        return view('prerequisties/index',[
                'prerequisties' => $prerequisties
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
        //TODO send courses for guide
        return view('prerequisties/create');
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
        $prerequiste = new Prerequisties();
        $prerequiste->course_id_doer = $request->course_id_doer;
        $prerequiste->course_id_been = $request->course_id_been;
        $prerequiste->save();

        return view('prerequisties/create',[
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
        $prerequiste = Prerequisties::where('course_id_doer',$id)->get();
        return view('prerequisties/show',['prerequiste'=>$prerequiste]);
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
        $prerequisties = Prerequisties::where('course_id_doer',$id)->get();
        return view('prerequisties/edit',['prerequisties'=>$prerequisties]);
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
        Prerequisties::where([['course_id_doer','=',$request->course_id_doer],['course_id_been','=',$request->course_id_been_pre]])->update([
            'course_id_doer'        => $request->course_id_doer,
            'course_id_been'        => $request->course_id_been
        ]);
        return redirect('prerequisties/'.$request->course_id_doer);
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
        Prerequisties::where([['course_id_doer','=',$id],['course_id_been','=',$request->course_id_been]])->delete();
    }
}
