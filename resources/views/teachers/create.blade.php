<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
create form for teacher

<form   action="../teachers" method="post">
    {{csrf_field()}}
    {{$message??''}}
    <input type="text" , name="id" placeholder="id">
    <input type="text" , name="person_id" placeholder="person_id">
    <input type="text" , name="academic_rank" placeholder="academic_rank">
    <input type="text" , name="fname" placeholder="fname">
    <input type="text" , name="lname" placeholder="lname">
    <select id="group_id" name="group_id">
        @foreach($groups as $group)
            <option value={{$group->id}}>{{$group->name}}</option>
        @endforeach
    </select>
    <input type="submit">
</form>

</body>
</html>