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
    <input type="text" , name="student_id">
    <input type="text" , name="person_id">
    <input type="text" , name="educational_group_id">
    <input type="text" , name="guide_teacher_id">
    <input type="text" , name="units_no">
    <input type="text" , name="grade">
    <input type="text" , name="fname">
    <input type="text" , name="lname">
    <input type="text" , name="field">
    <input type="submit">
</form>

</body>
</html>