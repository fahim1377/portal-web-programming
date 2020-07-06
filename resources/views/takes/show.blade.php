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
    {{--   this is fot link to teachers    --}}
    {{--<form   action="../teachers" method="get">--}}
        {{--{{csrf_field()}}--}}
        {{--<input type="hidden" , name="field" value="{{$group}}">--}}
        {{--<input type="submit" name="submit" value="{{"اساتید ".strval($group)}}" >--}}
    {{--</form>--}}
    {{--                                    --}}
جدول نهایی
    <table class="table table-sm">
        <thead>
        <tr>
            <th>id</th>
            <th>year</th>
            <th>term</th>
            <th>name</th>
            <th>unit_no</th>
            <th>student_no</th>
            <th>teacher_id</th>
            <th>group_id</th>
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
                    <form   action="../../takes/{{$course->id}}" method="post">
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
    {{--                                            --}}
<br><br><br><br><br>

جدول رزرو
@if(session()->get('cart') != null)
    <table class="table table-sm">
        <thead>
        <tr>
            <th>id</th>
            <th>year</th>
            <th>term</th>
            <th>name</th>
            <th>unit_no</th>
            <th>student_no</th>
            <th>teacher_id</th>
            <th>group_id</th>
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
    <form   action="../takes" method="post">
    {{csrf_field()}}
    <input type="submit" name="submit" value="{{"تایید نهایی"}}" >
    </form>
@endif

</body>
</html>