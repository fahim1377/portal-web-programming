@extends('layouts.mainlayoutsession')

@section('contents')

<div class="album text-muted">

    <div class="jumbotron">
        <h3>دروس اخذ شده</h3>
        <br>
        {{-- this is fot link to teachers    --}}
        {{--<form action="../teachers" method="get">--}}
        {{--{{csrf_field()}}--}}
        {{--<input type="hidden" , name="field" value="{{$group}}">--}}
        {{--<input type="submit" name="submit" value="{{"اساتید ".strval($group)}}" >--}}
        {{--</form>--}}
        {{-- --}}
        <h4>جدول نهایی</h4>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>شماره دانشجویی</th>
                    <th>سال</th>
                    <th>ترم</th>
                    <th>نام</th>
                    <th>تعداد واحد</th>
                    <th>تعداد دانشجویان</th>
                    <th>شماره استاد</th>
                    <th>شماره گروه</th>
                </tr>
            </thead>
            <tbody>
                @foreach($taken as $course)
                <tr>
                    <td>{{$course->id}}</td>
                    <td>{{$course->year}}</td>
                    <td>{{$course->term}}</td>
                    <td>{{$course->name}}</td>
                    <td>{{$course->unit_no}}</td>
                    <td>{{$course->student_no}}</td>
                    <td>{{$course->teacher_id}}</td>
                    <td>{{$course->group_id}}</td>
                    <td>
                        <form action="../../takes/{{$course->id}}" method="post">
                            {{csrf_field()}}
                            @method('DELETE')
                            <input type="hidden" , name="student_id" value={{$student_id}}>
                            <input type="submit" value="delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- --}}
        <br><br><br><br><br>
        <h4>جدول رزرو</h4>
        @if(session()->get('cart') != null)
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>شماره دانشجویی</th>
                    <th>سال</th>
                    <th>ترم</th>
                    <th>نام</th>
                    <th>تعداد واحد</th>
                    <th>تعداد دانشجویان</th>
                    <th>شماره استاد</th>
                    <th>شماره گروه</th>
                </tr>
            </thead>
            <tbody>
                @if(session()->get('cart')->items != null)
                @foreach(session()->get('cart')->items as $item)
                <tr>
                    <td>{{$item['course']->id}}</td>
                    <td>{{$item['course']->year}}</td>
                    <td>{{$item['course']->term}}</td>
                    <td>{{$item['course']->name}}</td>
                    <td>{{$item['course']->unit_no}}</td>
                    <td>{{$item['course']->student_no}}</td>
                    <td>{{$item['course']->teacher_id}}</td>
                    <td>{{$item['course']->group_id}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <form action="../takes" method="post">
            {{csrf_field()}}
            <input class="btn btn-primary text-light" type="submit" name="submit" value="{{"تایید نهایی"}}">
        </form>
        @endif

    </div>
</div>
@endsection('content')