<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@foreach($courses_grouped as $group => $terms)
    {{"گروه ".$group}}  <br>
    @foreach($terms as $term => $courses)
        {{"term".$term}}    <br>
        @foreach($courses as $course)
            <li>
                {{$course}}
                <a href="{{ route('courses.addToCart',['id' => $course->id]) }}">اخذ</a>
            </li>
        @endforeach
        <br>
    @endforeach
    <br><br><br><br>
@endforeach
</body>
</html>
{{dd(session('cart'))}}