<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="/teachers" class="buttons">اساتید</a>

<br>
@foreach($students as $student)
    <li>{{$student}}    <a href={{"/students/". $student->id .'/edit'}} class="buttons">ویرایش</a>
    </li>
@endforeach

<table class="table table-sm">
    <thead>
        <tr>
            <th>Statistics</th>
            <th>#1</th>
            <th>#2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Driver Name</td>
            <td>John Doe</td>
            <td>Mary Sue</td>
        </tr>
        <tr>
            <td>Origin</td>
            <td>Downtown</td>
            <td>Uptown</td>
        </tr>
    </tbody>
</table>


</body>
</html>