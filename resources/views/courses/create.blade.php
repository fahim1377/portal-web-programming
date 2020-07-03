<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
create form for course

<form   action="../courses" method="post">
    {{csrf_field()}}
    {{$message??''}}
    <input type="text" , name="id" placeholder="id">
    <input type="text" , name="name" placeholder="name">
    <input type="text" , name="unit_no" placeholder="unit_no">
    <input type="text" , name="year" placeholder="year">
    <input type="text" , name="term" placeholder="term">
    <input type="text" , name="student_no" placeholder="student_no">
    <input type="text" , name="teacher_id" placeholder="teacher_id">
    <input type="text" , name="group_id" placeholder="group_id">
    <input type="submit">
</form>

</body>
</html>