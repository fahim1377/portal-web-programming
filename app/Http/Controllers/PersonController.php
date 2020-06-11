<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $persons = Person::all();
        return view('students/index',[
                'students' => $persons
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
        return view('persons/create');
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
        $person = new Person();
        $person->id = $request->id;
        $person->fname = $request->fname;
        $person->lname = $request->lname;
        $person->field = $request->field;
        $person->save();

        return view('persons/create',[
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
        $person = Person::find($id);
        return view('persons/show',['person'=>$person]);
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
        $person = Person::find($id);
        return view('persons/edit',['person'=>$person]);
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
        Person::where('id',$request->id)->update([
            'id'        => $request->id,
            'fname'     => $request->fname,
            'lname'     => $request->lname,
            'field'     => $request->field
        ]);
        return redirect('persons/'.$request->id);
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
        Person::where('id',$id)->delete();
    }
}
