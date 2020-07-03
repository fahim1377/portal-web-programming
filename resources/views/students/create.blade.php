<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
create form for student

<form   action="../students" method="post">
    {{csrf_field()}}
    <input type="text" , name="student_id" placeholder="student_id">
    <input type="text" , name="u_id" placeholder="u_id">
    <select id="group_id" name="group_id">
        @foreach($groups as $group)
            <option value={{$group->id}}>{{$group->name}}</option>
        @endforeach
    </select>
    <input type="text" , name="guide_teacher_id" placeholder="guide_teacher_id">
    <input type="text" , name="units_no" placeholder="units_no">
    <input type="text" , name="grade" placeholder="grade">
    <input type="text" , name="fname" placeholder="fname">
    <input type="text" , name="lname" placeholder="lname">
    <input type="text" , name="email" placeholder="email">
    <input type="text" , name="password" placeholder="password">
    <input type="submit">
</form>

</body>
</html>