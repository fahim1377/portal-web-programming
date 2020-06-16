<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
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
        $contents = Content::all();
        return view('contents/index',[
                'contents' => $contents
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
        return view('contents/create');
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
        //TODO  if student fial to  create maybe contents create correct it
        //TODO  if contents exist what happened then? oooowww
        //      first create contents then create student
        $content = new Content();
        $content->number = $request->number;
        $content->course_id = $request->course_id;
        $content->name = $request->name;
        $content->media = $request->media;
        $content->save();

        return view('contents/create',[
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
    public function show(Request $request,$id)
    {
        // instance request http://localhost:8000/contents/9784?course_id=9784&number=1
        //TODO validate
        $content = Content::where([['course_id','=',$request->course_id],['number','=',$request->number]])->first();
        return view('contents/show',['content'=>$content]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //
        //TODO validate
        $content = Content::where([['course_id','=',$request->course_id],['number','=',$request->number]])->first();
        return view('contents/edit',['content'=>$content]);
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
        Content::where([['course_id','=',$request->course_id],['number','=',$request->pre_number]])->update([
            'number'            => $request->number,
            'course_id'         => $request->course_id,
            'name'              => $request->name,
            'media'             => $request->media
        ]);
        return redirect('contents/'.$request->id);
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
        Content::where([['course_id','=',$request->course_id],['number','=',$request->number]])->delete();
    }
}
