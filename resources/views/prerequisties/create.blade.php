<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
create form for prerequisties

<form   action="../prerequisties" method="post">
    {{csrf_field()}}
    {{$message??''}}
    <input type="text" , name="course_id_doer">
    <input type="text" , name="course_id_been">
    <input type="submit">
</form>

</body>
</html>