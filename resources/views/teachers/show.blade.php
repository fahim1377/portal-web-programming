@extends('layouts.mainlayout')

@section('content')

<div class="album text-muted">

    <div class="jumbotron">
        <h3>نمایش استاد</h3>
        <table id="teacherTable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>pID</th>
                    <th>gID</th>
                    <th>aR</th>
                    <th>fname</th>
                    <th>lname</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$teacher->id}}</td>
                    <td>{{$teacher->person_id}}</td>
                    <td>{{$teacher->group_id}}</td>
                    <td>{{$teacher->academic_rank}}</td>
                    <td>{{$teacher->fname}}</td>
                    <td>{{$teacher->lname}}</td>
                    <td>
                        {{-- this is fot link to edit teacher    --}}
                        <button class="btn btn-primary"><a class="text-light" href="{{ url('/teachers/'.$teacher->id.'/edit') }}">ویرایش</a></button>
                        {{-- this is fot link to edit teacher    --}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    // document.getElementById("studentsTable").innerHTML = "javascript run";
    var replacements = [
        ["id", "شماره شناسایی"],
        ["pID", "شماره کاربری"],
        ["gID", "شماره گروه"],
        ["aR", "رتبه علمی"],
        ["fname", "نام"],
        ["lname", "نام خانوادگی"],
    ];

    $(document).ready(
        function runReplacement() {
            $("#teacherTable th").each(function() {
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
@endsection('content')