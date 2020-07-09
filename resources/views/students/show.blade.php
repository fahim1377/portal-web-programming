@extends('layouts.mainlayoutsession')

@section('contents')

<!-- TODO add padding to table headings and text-wrrap -->
<div class="album text-muted">

    <div class="jumbotron">
        <h3>مشاهده دانشجو</h3>
        <table id="studentsTable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>uID</th>
                    <th>gID</th>
                    <th>gTID</th>
                    <th>unitsNo</th>
                    <th>grade</th>
                    <th>fname</th>
                    <th>lname</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->u_id}}</td>
                    <td>{{$student->group_id}}</td>
                    <td>{{$student->guide_teacher_id}}</td>
                    <td>{{$student->units_no}}</td>
                    <td>{{$student->grade}}</td>
                    <td>{{$student->fname}}</td>
                    <td>{{$student->lname}}</td>
                    <td>{{$student->field}}</td>
                    <td>{{$student->email}}</td>
                    <td>
                        {{-- this is fot link to edit students    --}}
                        <button class="btn btn-primary"><a class="text-light" href="{{ url('/students/'.$student->id.'/edit') }}">ویرایش</a></button>
                        {{-- this is fot link to edit students    --}}
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
<script>
    // document.getElementById("studentsTable").innerHTML = "javascript run";
    var replacements = [
        ["id", "شماره دانشجویی"],
        ["uID", "شماره کاربری"],
        ["gID", "شماره گروه"],
        ["gTID", "شماره استاد گروه"],
        ["unitsNo", "تعداد واحدها"],
        ["grade", "درجه تحصیلی"],
        ["fname", "نام"],
        ["lname", "نام خانوادگی"],
        ["email", "ایمیل"]
    ];

    $(document).ready(
        function runReplacement() {
            $("#studentsTable th").each(function() {
                // console.log($(this).text());
                var $this = $(this);
                var ih = $this.html();
                $.each(replacements, function(i, arr) {
                    ih = ih.replace(arr[0], arr[1]);
                });
                $this.html(ih);
            });
        }
    );
</script>
@endsection('contents')