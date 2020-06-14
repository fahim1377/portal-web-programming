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
<form   action="../../courses/{{$course->id}}" method="post">
    {{--TODO Mr.Sulaiman write generic mode for this part because maybe will add some field here--}}
    {{--TODO hide or delete those fields that are not neccessary like id field--}}
    {{csrf_field()}}
    @method('PATCH')
    <input type="text" , name="id" value={{$course->id}}>
    <input type="text" , name="name"value={{$course->name}}>
    <input type="text" , name="unit_no"value={{$course->unit_no}}>
    <input type="submit">
</form>

<form   action="../../students/{{$course->id}}" method="post">
    {{--TODO Mr.Sulaiman write generic mode for this part because maybe will add some field here--}}
    {{--TODO hide or delete those fields that are not neccessary like id field--}}
    {{csrf_field()}}
    @method('DELETE')
    <input type="text" , name="id" value={{$course->id}}>
    <input type="submit" value="delete">
</form>

</body>
</html>