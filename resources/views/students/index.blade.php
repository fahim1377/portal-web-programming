@extends('layouts.mainlayout')

@section('content')

<div class="album text-muted">

    <div class="jumbotron">
        <h3>دانشجویان</h3>
        <br>
        @foreach($students_grouped as $group => $students)

        {{-- this is fot link to teachers    --}}
        <form action="../teachers" method="get">
            {{csrf_field()}}
            <input type="hidden" , name="field" value="{{$group}}">
            <input type="submit" name="submit" value="{{"اساتید ".strval($group)}}">
        </form>
        {{-- --}}


        {{-- show table of student  --}}
        <table class="table table-sm" id="studentsTable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>userId</th>
                    <th>groupId</th>
                    <th>counselorId</th>
                    <th>unitsNo</th>
                    <th>grade</th>
                    <th>fname</th>
                    <th>lname</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->u_id}}</td>
                    <td>{{$student->group_id}}</td>
                    <td>{{$student->guide_teacher_id}}</td>
                    <td>{{$student->units_no}}</td>
                    <td>{{$student->grade}}</td>
                    <td>{{$student->fname}}</td>
                    <td>{{$student->lname}}</td>
                    <td>{{$student->field}}</td>
                    <td>{{$student->email}}</td>
                    <td>
                         {{--this is fot link to edit students    --}}
                        <form action="{{ url('/students/'.$student->id.'/edit') }}" method="post">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-primary" >ویرایش</button>
                        </form>
                        {{-- this is fot link to edit students    --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- --}}
        <br><br><br><br><br>
        @endforeach

        <script>
            // document.getElementById("studentsTable").innerHTML = "javascript run";
            var replacements = [
                ["id", "شماره دانشجویی"],
                ["userId", "شماره کاربری"],
                ["groupId", "شماره گروه"],
                ["counselorId", "شماره استاد گروه"],
                ["unitsNo", "تعداد واحدها"],
                ["grade", "درجه تحصیلی"],
                ["fname", "نام"],
                ["lname", "نام خانوادگی"],
                ["email", "ایمیل"]
            ];

            $(document).ready(
            function runReplacement() {
                $("#studentsTable th").each(function() {
                    // console.log($(this).text());
                    var $this = $(this);
                    var ih = $this.html();
                    $.each(replacements, function(i, arr) {
                        ih = ih.replace(arr[0], arr[1]);
                    });
                    $this.html(ih);
                });
            }
            );
        </script>
    </div>
</div>
@endsection