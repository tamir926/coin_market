@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="margin: 0 auto; max-width: 500px;">
                <div class="card border-0 shadow-sm" style="border-radius:0;">
                    {{-- <div class="card-header">{{ __('Register') }}</div> --}}

                    <div class="card-body">
                        <center>
                            <h4 style="font-size:20px; font-weight: 600;">Бүртгүүлэх</h4>
                        </center>

                        <div class="p-3"></div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Таны нэр') }}</label>

                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Имэйл хаяг') }}</label>

                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Нууц үг') }}</label>

                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Нууц үг давт') }}</label>

                                <div class="col-md-7">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-7 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Бүртгүүлэх') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div style="max-width: 420px; margin: 30px auto;">
                            <p class="text-danger"><strong>Жич:</strong></p>
                            <ul class="list-check mt-3">
                                <li class="d-flex">
                                    <div class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16" class="bi bi-check">
                                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"></path>
                                        </svg>
                                    </div>
                                    <div>Та бүртгүүлсэний дараа KYC буюу өөрийгөө таниулах шаардлагатай.</div>
                                </li>
                                <li class="d-flex">
                                    <div class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16" class="bi bi-check">
                                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"></path>
                                        </svg>
                                    </div>
                                    <div>Та хэрвээ төлбөрөө банкин дээр очиж гүйлгээ хийх бол шилжүүлгийн утга дээр овог нэр, регистерийн дугаар, TNX дугаараа оруулна уу.</div>
                                </li>
                            </ul>
                        </div>

                        <p class="text-center mt-5">
                            Бүртгэлтэй бол
                            <a href="{{ route('login') }}"><strong>энд дарж нэвтэрч орно уу</strong></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
