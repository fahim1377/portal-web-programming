<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
show for edit content
<br>
<br><br><br>
<form   action="../../contents/{{$content->course_id}}" method="post">
    {{--TODO Mr.Sulaiman write generic mode for this part because maybe will add some field here--}}
    {{--TODO hide or delete those fields that are not neccessary like id field--}}
    {{csrf_field()}}
    @method('PATCH')
    <input type="text" , name="number" value={{$content->number}}>
    <input type="text" , name="course_id"value={{$content->course_id}}>
    <input type="text" , name="name"value={{$content->name}}>
    <input type="text" , name="media"value={{$content->media}}>
    <input type="hidden" , name="pre_number"value={{$content->number}}>
    <input type="submit">
</form>

<form   action="../../contents/{{$content->course_id}}" method="post">
    {{--TODO Mr.Sulaiman write generic mode for this part because maybe will add some field here--}}
    {{--TODO hide or delete those fields that are not neccessary like id field--}}
    {{csrf_field()}}
    @method('DELETE')
    <input type="text" , name="number" value={{$content->number}}>
    <input type="text" , name="course_id"value={{$content->course_id}}>
    <input type="text" , name="name"value={{$content->name}}>
    <input type="text" , name="media"value={{$content->media}}>
    <input type="submit" value="delete">
</form>

</body>
</html>