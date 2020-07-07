@extends('layouts.mainlayout')

@section('content')

<div class="album text-muted">

    <div class="jumbotron">
        <h3>ویرایش استاد</h3>
        <form class="form_inline" action="../../teachers/{{$teacher->id}}" method="post">
            <div class="row">
                {{--TODO Mr.Sulaiman write generic mode for this part because maybe will add some field here--}}
                {{--TODO hide or delete those fields that are not neccessary like id field--}}
                {{csrf_field()}}
                @method('PATCH')
                <div class="col-sm-6">
                    <h4>اطلاعات کاربری</h4>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="input_teacher_id">شماره استاد</label>
                            <br>
                            <input id="input_teacher_id" type="text" , name="id" value={{$teacher->id}}>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="input_u_id">شماره کاربری استاد</label>
                            <br>
                            <input id="input_u_id" type="text" , name="u_id" value={{$teacher->u_id}}>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <h4>اطلاعات اکادمیک</h4>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="input_academic_rank">رتبه علمی</label>
                            <br>
                            <input id="input_academic_rank" type="text" , name="academic_rank" value={{$teacher->academic_rank}}>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="input_group_id">شماره گروه درسی</label>
                            <br>
                            <input id="input_group_id" type="text" , name="field" value={{$teacher->group_id}}>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <h4>اطلاعات شخصی</h4>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="input_fname">نام</label>
                            <br>
                            <input id="input_fname" type="text" , name="fname" value={{$teacher->fname}}>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="input_lname">نام خانوادگی</label>
                            <br>
                            <input id="input_lname" type="text" , name="lname" value={{$teacher->lname}}>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="input_email">ایمیل </label>
                            <br>
                            <input id="input_email" style="width: 100%;" type="text" , name="email" value={{$teacher->email}}>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <input class="btn btn-primary" style="padding: 10px; margin: 10px;" type="submit" value="به روز رسانی">
            </div>
        </form>
        <hr>
        <form action="../../teachers/{{$teacher->id}}" method="post">
            {{--TODO Mr.Sulaiman write generic mode for this part because maybe will add some field here--}}
            {{--TODO hide or delete those fields that are not neccessary like id field--}}
            {{csrf_field()}}
            @method('DELETE')
            <div class="form-group col-sm-6">
                <h4>حذف استاد</h4>
                <input type="text" , name="id" value={{$teacher->id}}>
                <br>
                <input class="btn btn-danger" style="padding: 10px; margin: 10px;" type="submit" value="حذف">
            </div>
        </form>
    </div>
</div>
@endsection('content')