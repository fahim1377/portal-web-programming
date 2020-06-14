<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
show for edit teacher
<br>
<br><br><br>
<form   action="../../$prerequisties/{{$prerequiste->id}}" method="post">
    {{--TODO Mr.Sulaiman write generic mode for this part because maybe will add some field here--}}
    {{--TODO hide or delete those fields that are not neccessary like id field--}}
    {{csrf_field()}}
    @method('PATCH')
    <input type="text" , name="id" value={{$prerequiste->id}}>
    <input type="text" , name="person_id" value={{$prerequiste->person_id}}>
    <input type="text" , name="academic_rank" value={{$prerequiste->academic_rank}}>
    <input type="text" , name="fname" value={{$person->fname}}>
    <input type="text" , name="lname" value={{$person->lname}}>
    <input type="text" , name="field" value={{$person->field}}>
    <input type="submit">
</form>

<form   action="../../$prerequisties/{{$prerequiste->id}}" method="post">
    {{--TODO Mr.Sulaiman write generic mode for this part because maybe will add some field here--}}
    {{--TODO hide or delete those fields that are not neccessary like id field--}}
    {{csrf_field()}}
    @method('DELETE')
    <input type="text" , name="id" value={{$$prerequiste->id}}>
    <input type="submit" value="delete">
</form>

</body>
</html>