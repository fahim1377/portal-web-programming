<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<table class="table table-sm">
    <thead>
    <tr>
        <th>id</th>
        <th>person id</th>
        <th>academic rank</th>
        <th>fname</th>
        <th>lname</th>
    </tr>
    </thead>
    <tbody>
    @foreach($teachers as $teacher)
        <tr>
            <td>{{$teacher->id}}</td>
            <td>{{$teacher->person_id}}</td>
            <td>{{$teacher->academic_rank}}</td>
            <td>{{$teacher->fname}}</td>
            <td>{{$teacher->lname}}</td>
            <td>
                {{--   this is fot link to edit students    --}}
                <a href="{{ url('/teachers/'.$teacher->id.'/edit') }}">ویرایش</a>
                {{--   this is fot link to edit students    --}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>