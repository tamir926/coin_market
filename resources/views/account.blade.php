@extends('layouts.app')

@section('content')
<div class="container user-account-container">
    <div class="row">
        <div class="col-lg-12">
            @include("flash_message")
        </div>

        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body card-inner user-profile-card">
                    <h6 class="card-title">Миний профайл</h6>

                    <ul class="nav nav-tabs nav-tabs-line" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                Хувийн мэдээлэл
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Нууц үг</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form action="{{ route('user.profile.update') }}" method="POST">
                                @csrf
                                @method("PUT")

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fname" class="font-weight-500">Нэр</label>
                                            <input type="text" class="form-control" id="fname" name="name" value="{{ auth()->user()->name }}"> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="femail" class="font-weight-500">Мэйл хаяг</label>
                                            <input type="email" class="form-control" id="femail" name="email" value="{{ auth()->user()->email }}"> 
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fphone" class="font-weight-500">Утасны дугаар</label>
                                            <input type="text" class="form-control" id="fphone" name="phone" value="{{ auth()->user()->phone }}"> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fdate" class="font-weight-500">Төрсөн огноо</label>
                                            <input type="date" class="form-control" id="fdate" name="birthday" value="{{ auth()->user()->birthday }}"> 
                                        </div>
                                    </div>
                                </div>

                                <country-update :country-name="{{ json_encode(auth()->user()->country) }}"></country-update>


                                <button type="submit" class="btn btn-primary mt-3"><span class="font-weight-500">Профайл шинэчлэх</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form action="{{ route('user.password.change') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="foldpass" class="font-weight-500">Хуучин нууц үг</label>
                                            <input type="password" class="form-control" id="foldpass" name="old_password" placeholder="******"> 
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fnewpass" class="font-weight-500">Шинэ нууц үг</label>
                                            <input type="password" class="form-control" id="fnewpass" name="new_password" placeholder="******"> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fnewpass2" class="font-weight-500">Шинэ нууц үг давт</label>
                                            <input type="password" class="form-control" id="fnewpass2" name="confirm_password" placeholder="******"> 
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3"><span class="font-weight-500">Профайл шинэчлэх</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4  mb-4">
            <div class="card user-status-card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Таны бүртгэлийн төлөв</h6>
                    @if (auth()->user()->hasVerifiedEmail())
                        <button class="btn btn-success mt-3">Мэйл хаяг баталгаажуулсан</button>
                    @else 
                        <form method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-info mt-3 text-white">Мэйл хаяг баталгаажуулах</button>
                        </form>
                    @endif
                    
                    @if (auth()->user()->kyc && auth()->user()->kyc->status == 2)
                        <button class="btn btn-success mt-3">Хэрэглэгч таних баталгаажуулсан</button>
                    @elseif (auth()->user()->kyc && auth()->user()->kyc->status == 1) 
                        <a href="{{ url('/user/kyc') }}" class="btn btn-info mt-3 text-white">Хэрэглэгч таних хүсэлт хүлээгдэж буй</a>
                    @else
                        <a href="{{ url('/user/kyc') }}" class="btn btn-info mt-3 text-white">Хэрэглэгч таних хүсэлт илгээх</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
