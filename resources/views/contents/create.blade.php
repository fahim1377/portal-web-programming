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

<form   action="../contents" method="post">
    {{csrf_field()}}
    {{$message??''}}
    <input type="text" , name="number">
    <input type="text" , name="course_id">
    <input type="text" , name="name">
    <input type="text" , name="media">
    <input type="submit">
</form>

</body>
</html>