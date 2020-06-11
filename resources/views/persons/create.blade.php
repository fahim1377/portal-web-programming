<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
create form for person

<form   action="../persons" method="post">
    {{csrf_field()}}
    {{ $message ?? ''}}
    <br>
    <input type="text" , name="id">
    <input type="text" , name="fname">
    <input type="text" , name="lname">
    <input type="text" , name="field">
    <input type="submit">
</form>

</body>
</html>