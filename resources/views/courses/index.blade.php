@extends('layouts.mainlayoutsession')

@section('contents')

<div class="album text-muted">

    <div class="jumbotron">
        <h3>دروس ارايه شده</h3>
        <label class="badge badge-dark">{{session()->get('message')??''}}</label>
        @php
        if (session()->has('message')){
        session()->remove('message');
        }
        @endphp
        <br><br><br>
        @foreach($courses_grouped as $group => $terms)
        <h4>{{"گروه ".$group}} </h4>
        @foreach($terms as $term => $courses)
        <h5>{{"term".$term}} </h5>
        <table class="customTable table table-md table-hover table-responsive" id="courses table">
            <thead>
                <tr>
                    <th>شماره درس</th>
                    <th>سال تحصیلی</th>
                    <th>ترم تحصیلی</th>
                    <th>نام درس</th>
                    <th>تعداد واحد</th>
                    <th>تعداد دانشجو</th>
                    <th>شماره استاد</th>
                    <th>شماره گروه</th>
                    <!-- <th></th> -->
                </tr>
            </thead>
            <tbody>>
                <tr>
                    @foreach($courses as $course)
                    <td>{{$course->id}}</td>
                    <td>{{$course->year}}</td>
                    <td>{{$course->term}}</td>
                    <td>{{$course->name}}</td>
                    <td>{{$course->unit_no}}</td>
                    <td>{{$course->student_no}}</td>
                    <td>{{$course->teacher_id}}</td>
                    <td>{{$course->group_id}}</td>
                    <td>
                        <!-- {{$course}} -->
                        <button class="btn btn-primary"><a class="text-light" href="{{ route('courses.addToCart',['id' => $course->id]) }}">
                        <i class=" fa fa-check fa-fw fa-1x" aria-hidden="true"></i>    
                        اخذ</a></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        @endforeach
        <br><br><br><br>
        @endforeach
        <!-- 
    <script>
        function insertAfter(referenceNode, newNode) {
            referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
        }
        var el = document.createElement("span");
        el.innerHTML = "test";
        var div = document.getElementById("foo");
        insertAfter(div, el);
    </script> -->
    </div>
</div>

@endsection('contents')