@extends('layouts.mainlayout')

@section('content')

<div class="album text-muted">

    <div class="jumbotron">
        <h3>اساتید گروه
            <!-- TODO fetch the group from request -->
            <!-- <label value="{{ app('request')->input('field') }}"></label> -->
        </h3>
        <table class="customTable table table-md table-hover table-responsive">
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
                        <button class="btn btn-primary"><a class="text-light" href="{{ url('/teachers/'.$teacher->id.'/edit') }}">
                        <i class=" fa fa-pencil fa-fw fa-1x" aria-hidden="true"></i>
                        ویرایش </a></button>
                        {{-- this is fot link to edit students    --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection('content')