@extends('layouts.mainlayout')

@section('content')

<div class="album text-muted">

    <div class="jumbotron">
        <h3>ویرایش دانشجو</h3>
        <br>
        <form class="form_inline" action="../../students/{{$student->id}}" method="post">
            <div class="row">
                {{--TODO Mr.Sulaiman write generic mode for this part because maybe will add some field here--}}
                {{--TODO hide or delete those fields that are not neccessary like id field--}}
                {{csrf_field()}}
                @method('PATCH')
                <div class="col-sm-6">
                    <h4>اطلاعات کاربری</h4>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="input_student_id">شماره دانشجویی</label>
                            <br>
                            <input id="input_student_id" type="text" , name="student_id" value={{$student->id}}>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="input_u_id">شماره کاربری</label>
                            <br>
                            <input id="input_u_id" type="text" , name="u_id" value={{$student->u_id}}>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h4>اطلاعات درسی</h4>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="group_id">گروه</label>
                            <br>
                            <select id="group_id" name="group_id">
                                @foreach($groups as $group)
                                @if($student->group_id == $group->id)
                                <option value={{$group->id}} selected="selected">{{$group->name}}</option>
                                @else
                                <option value={{$group->id}}>{{$group->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="input_guide_teacher_id">شماره استاد راهنما</label>
                            <br>
                            <input id="input_guide_teacher_id" type="text" , name="guide_teacher_id" value={{$student->guide_teacher_id}}>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="input_unit_no">تعداد واحدها</label>
                            <br>
                            <input id="input_unit_no" type="text" , name="units_no" value={{$student->units_no}}>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="input_grade">مقطع تحصیلی</label>
                            <br>
                            <input id="input_grade" type="text" , name="grade" value={{$student->grade}}>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h4>اطلاعات شخصی</h4>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="input_fname">نام</label>
                            <br>
                            <input type="text" , name="fname" value={{$student->fname}}>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="input_lname">نام خانوادگی</label>
                            <br>
                            <input id="input_lname" type="text" , name="lname" value={{$student->lname}}>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="input_email">ایمیل</label>
                            <br>
                            <input id="input_email" style="width: 100%;" type="text" , name="email" value={{$student->email}}>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <input class="btn btn-primary" style="padding: 10px; margin: 10px;" type="submit" value="به روز رسانی">
            </div>
        </form>
        <hr>
        <form action="../../students/{{$student->id}}" method="post">
            <div class="form-group row">
                {{--TODO Mr.Sulaiman write generic mode for this part because maybe will add some field here--}}
                {{--TODO hide or delete those fields that are not neccessary like id field--}}
                {{csrf_field()}}
                @method('DELETE')
                <div class="form-group col-sm-6">
                    <h4>حدف دانشجو</h4>
                    <input type="text" , name="id" value={{$student->id}}>
                    <br>
                    <input class="btn btn-danger" style="padding: 10px; margin: 10px;" type="submit" value="حذف">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection('content')