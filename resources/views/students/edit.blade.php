<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
show for edit student
<br>
<br><br><br>
<form   action="../../students/{{$student->id}}" method="post">
    {{--TODO Mr.Sulaiman write generic mode for this part because maybe will add some field here--}}
    {{--TODO hide or delete those fields that are not neccessary like id field--}}
    {{csrf_field()}}
    @method('PATCH')
    <input type="text" , name="student_id" value={{$student->id}}>
    <input type="text" , name="u_id" value={{$student->u_id}}>
    <select id="group_id" name="group_id">
        @foreach($groups as $group)
            @if($student->group_id == $group->id)
                <option value={{$group->id}}  selected="selected">{{$group->name}}</option>
            @else
                <option value={{$group->id}} >{{$group->name}}</option>
            @endif
        @endforeach
    </select>
    <input type="text" , name="guide_teacher_id" value={{$student->guide_teacher_id}}>
    <input type="text" , name="units_no" value={{$student->units_no}}>
    <input type="text" , name="grade" value={{$student->grade}}>
    <input type="text" , name="fname" value={{$student->fname}}>
    <input type="text" , name="lname" value={{$student->lname}}>
    <input type="text" , name="email" value={{$student->email}}>
    <input type="submit">
</form>

<form   action="../../students/{{$student->id}}" method="post">
    {{--TODO Mr.Sulaiman write generic mode for this part because maybe will add some field here--}}
    {{--TODO hide or delete those fields that are not neccessary like id field--}}
    {{csrf_field()}}
    @method('DELETE')
    <input type="text" , name="id" value={{$student->id}}>
    <input type="submit" value="delete">
</form>

</body>
</html>