<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


show student
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>u_id</th>
            <th>group_id</th>
            <th>guide_teacher_id</th>
            <th>units_no</th>
            <th>grade</th>
            <th>fname</th>
            <th>lname</th>
            <th>email</th>
        </tr>
    </thead>
    <tbody>
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
                {{--   this is fot link to edit students    --}}
                <a href="{{ url('/students/'.$student->id.'/edit') }}">ویرایش</a>
                {{--   this is fot link to edit students    --}}
            </td>
        </tr>
    </tbody>
</table>

</body>
</html>
{{dd(session('remember_token'))}}