@extends('layouts.mainlayout')

@section('content')

<div class="album text-muted">

    <div class="jumbotron">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>{{\Illuminate\Support\Facades\Config::get('constants.teacher_id')}}</th>
                    <th>{{\Illuminate\Support\Facades\Config::get('constants.user_id')}}</th>
                    <th>{{\Illuminate\Support\Facades\Config::get('constants.academic_rank')}}</th>
                    <th>{{\Illuminate\Support\Facades\Config::get('constants.fname')}}</th>
                    <th>{{\Illuminate\Support\Facades\Config::get('constants.lname')}}</th>
                    <th>{{\Illuminate\Support\Facades\Config::get('constants.email')}}</th>

                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $teacher)
                <tr>
                    <td>{{$teacher->id}}</td>
                    <td>{{$teacher->u_id}}</td>
                    <td>{{$teacher->academic_rank}}</td>
                    <td>{{$teacher->fname}}</td>
                    <td>{{$teacher->lname}}</td>
                    <td>{{$teacher->email}}</td>
                    <td>
                        {{-- this is fot link to edit students    --}}
                        <button class="btn btn-primary"><a class="text-light" href="{{ url('/teachers/'.$teacher->id.'/edit') }}"> ویرایش </a></button>
                        {{-- this is fot link to edit students    --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection('content')