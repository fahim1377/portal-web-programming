@extends('layouts.loginlayout')

@section('content')
<div class="container auth-page">
    <div id="headerAuthPage" class="card col-sm-12" style="padding: 20px;">
        <h3>ثبت نام</h3>
        <select name = "sORt" id="selectForm" class="browser-default custom-select col-md-2">
            <option selected>نوع کاربر</option>
            <option value="student">دانشجو</option>
            <option value="teacher">استاد</option>
        </select>
    </div>

    <div id="studentRegisterForm" class="row justify-content-md-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">{{ __('ثبت نام‌ دانشجو') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="first name" class="col-md-4 col-form-label text-md-right">{{ __('نام') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('name') }}" required autocomplete="fname" autofocus>
                                @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last name" class="col-md-4 col-form-label text-md-right">{{ __('نام خانوادگی') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>
                                @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('شماره کاربری') }}</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" required autocomplete="id" autofocus>
                                @error('id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="group" class="col-md-4 col-form-label text-md-right">{{ __('گروه') }}</label>


                            <div class="col-md-6">
                                <select id="group_id" name="group_id">
                                    @foreach($groups as $group)
                                    <option value={{$group->id}}>{{$group->name}}</option>
                                    @endforeach
                                </select>
                                @error('group_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="group" class="col-md-4 col-form-label text-md-right">{{ __('استاد راهنما') }}</label>


                            <div class="col-md-6">
                                <select id="guide_teacher_id" name="guide_teacher_id">
                                    @foreach($teachers as $teacher)
                                        <option value={{$teacher->id}}>{{$teacher->fname." ".$teacher->lname}}</option>
                                    @endforeach
                                </select>
                                @error('guide_teacher_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="group" class="col-md-4 col-form-label text-md-right">{{ __('مقطع') }}</label>


                            <div class="col-md-6">
                                <select id="grade" name="grade">
                                    <option value="کارشناسی">کارشناسی</option>
                                    <option value="کارشناسی ارشد">کارشناسی ارشد</option>
                                </select>
                                @error('grade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('آدرس ایمیل') }}</label>

                            <div class="col-md-6">
                                <input id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('رمز عبور') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تاییدی رمز عبور') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <input name="sORt" value="student" type="hidden" >

                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit">
                                    ثبت نام
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="teacherRegisterForm" class="row justify-content-md-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">{{ __('ثبت نام استاد') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="first name" class="col-md-4 col-form-label text-md-right">{{ __('نام') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('name') }}" required autocomplete="fname" autofocus>
                                @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last name" class="col-md-4 col-form-label text-md-right">{{ __('نام خانوادگی') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>
                                @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('شماره پرسنلی') }}</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" required autocomplete="id" autofocus>
                                @error('id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="academicRank" class="col-md-4 col-form-label text-md-right">{{ __('ٰمرتبه علمی') }}</label>


                            <div class="col-md-6">
                                <input id="academicRank" type="text" class="form-control @error('academic_rank') is-invalid @enderror" autofocus>
                                @error('academicRank')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="group" class="col-md-4 col-form-label text-md-right">{{ __('گروه') }}</label>


                            <div class="col-md-6">
                                <select id="group_id" name="group_id">
                                    @foreach($groups as $group)
                                        <option value={{$group->id}}>{{$group->name}}</option>
                                    @endforeach
                                </select>
                                @error('group_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('آدرس ایمیل') }}</label>

                            <div class="col-md-6">
                                <input id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('رمز عبور') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تاییدی رمز عبور') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <input name="sORt" value="teacher" type="hidden" >

                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit">
                                    ثبت نام
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#selectForm').on('change', function() {
            if (this.value == 'student')
            //.....................^.......
            {
                $("#studentRegisterForm").show();
                $("#teacherRegisterForm").hide();
            } else if (this.value == 'teacher') {
                $("#studentRegisterForm").hide();
                $("#teacherRegisterForm").show();
            }
        });
    });
</script>
<!-- hidden  name="s0Rp" key="student" -->
@endsection('content')