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
    <input type="text" , name="id">
    <input type="text" , name="year">
    <input type="text" , name="term">
    <input type="text" , name="name">
    <input type="text" , name="unit_no">
    <input type="text" , name="student_no">
    <input type="submit">
</form>

</body>
</html>