<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<br>
@foreach($students_grouped as $group => $students)

    {{--   this is fot link to teachers    --}}
    <form   action="../teachers" method="get">
        {{csrf_field()}}
        <input type="hidden" , name="field" value="{{$group}}">
        <input type="submit" name="submit" value="{{"اساتید ".\Illuminate\Support\Facades\Config::get("constants.groups.".strval($group))}}" >
    </form>
    {{--                                    --}}


    {{-- show table of student  --}}
    <table class="table table-sm">
        <thead>
            <tr>
                <th>id</th>
                <th>person_id</th>
                <th>educational_group_id</th>
                <th>guide_teacher_id</th>
                <th>units_no</th>
                <th>grade</th>
                <th>fname</th>
                <th>lname</th>
            </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->person_id}}</td>
                <td>{{$student->educational_group_id}}</td>
                <td>{{$student->guide_teacher_id}}</td>
                <td>{{$student->units_no}}</td>
                <td>{{$student->grade}}</td>
                <td>{{$student->fname}}</td>
                <td>{{$student->lname}}</td>
                <td>{{$student->field}}</td>
                <td>
                    {{--   this is fot link to edit students    --}}
                    <a href="{{ url('/students/'.$student->id.'/edit') }}">ویرایش</a>
                    {{--   this is fot link to edit students    --}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--                                            --}}

    <br><br><br><br><br>
@endforeach




</body>
</html>