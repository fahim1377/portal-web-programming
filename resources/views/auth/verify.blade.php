@extends('layouts.loginlayout')

@section('content')
<div class="container auth-page">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('تایید آدرس ایمیل') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('لینک تایید جدید به آدرس ایمیل‌ تان فرستاده شد') }}
                        </div>
                    @endif

                    {{ __('قبل ادامه لطفا ایمیل خود را جهت دریافت لینک تاییدی بررسی کنید') }}
                    {{ __('اگر ایمیل را دریافت ننموده اید') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('برا دریافت ایمیل تاییدی جدید اینجا کلیک کنید') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')
