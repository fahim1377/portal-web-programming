@extends('layouts.mainlayoutsession')

@section('contents')

<div class="album text-muted">

    <div class="jumbotron">
        <h3>دروس ارايه شده</h3>
        {{session()->get('message')??''}}
        @php
        if (session()->has('message')){
        session()->remove('message');
        }
        @endphp
        <br><br><br>
        @foreach($courses_grouped as $group => $terms)
        {{"گروه ".$group}} <br>
        @foreach($terms as $term => $courses)
        {{"term".$term}} <br>
        @foreach($courses as $course)
        <li>
            {{$course}}
            <a href="{{ route('courses.addToCart',['id' => $course->id]) }}">اخذ</a>
        </li>
        @endforeach
        <br>
        @endforeach
        <br><br><br><br>
        @endforeach
        <!-- 
    <script>
        function insertAfter(referenceNode, newNode) {
            referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
        }
        var el = document.createElement("span");
        el.innerHTML = "test";
        var div = document.getElementById("foo");
        insertAfter(div, el);
    </script> -->
    </div>
</div>

@endsection('contents')