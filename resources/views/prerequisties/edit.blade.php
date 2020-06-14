<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
show for edit prerequiste
<br>
<br><br><br>
for edit
@foreach($prerequisties as $prerequiste)
    <form   action="../../prerequisties/{{$prerequiste->course_id_doer}}" method="post">
        {{--TODO Mr.Sulaiman write generic mode for this part because maybe will add some field here--}}
        {{--TODO hide or delete those fields that are not neccessary like id field--}}
        {{csrf_field()}}
        @method('PATCH')
        <input type="text" , name="course_id_doer" value={{$prerequiste->course_id_doer}}>
        <input type="text" , name="course_id_been" value={{$prerequiste->course_id_been}}>
        {{--previous course id been--}}
        <input type="hidden" , name="course_id_been_pre" value={{$prerequiste->course_id_been}}>

        <input type="submit">
    </form>
    <br><br>
@endforeach

<br><br>
for delete
@foreach($prerequisties as $prerequiste)
    <form   action="../../prerequisties/{{$prerequiste->course_id_doer}}" method="post">
        {{--TODO Mr.Sulaiman write generic mode for this part because maybe will add some field here--}}
        {{--TODO hide or delete those fields that are not neccessary like id field--}}
        {{csrf_field()}}
        @method('DELETE')
        <input type="text" , name="course_id_doer" value={{$prerequiste->course_id_doer}}>
        <input type="text" , name="course_id_been" value={{$prerequiste->course_id_been}}>
        <input type="submit" value="delete">
    </form>
    <br><br>
@endforeach

</body>
</html>