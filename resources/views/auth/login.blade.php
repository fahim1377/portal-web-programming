@extends('layouts.loginlayout')

@section('content')
<div class="container auth-page">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ورود') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('شماره کاربری') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="id" class="form-control @error('id') is-invalid @enderror" name="id" placeholder="شماره کاربری خود را وارد نمایید" style="text-align: right;" value="{{ old('id') }}" required autocomplete="id" autofocus>

                                @error('id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('رمز عبور') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="رمز عبور خود را وارد نمایید" style="text-align: right;" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('مرا به خاطر داشته باش') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                <i class="fa fa-sign-in fa-fw fa-1x"></i>
                                    {{ __('ورود') }}
                                </button>

                                <!-- @if (Route::has('password.request')) -->
                                <a class="btn btn-primary" href="/register">
                                <i class="fa fa-user-circle-o fa-fw fa-1x"></i>
                                    {{ __('کاربر جدید | ثبت نام') }}
                                </a>
                                <!-- @endif -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')