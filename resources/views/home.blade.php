@extends('layouts.app')

@section('content')
<div class="container">
    @include("flash_message")

    <div class="row">
        <div class="col-lg-12 home-content">
            <div class="row">    
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body card-token p-0">
                            <div class="token-content">
                                <h6 class="token-title">Койны хэмжээ</h6>
                                <div class="token-title-with-text">
                                    <div class="token-balance-img">
                                        <img src="/img/logo3.png" width="120px;">
                                    </div>
                                    <div class="token-balance-text">
                                        <span class="amount">0 
                                            <span>
                                                msc
                                                <em data-toggle="tooltip" data-placement="right" title="~ ₮ -тэй тэнцүү">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                                    </svg>
                                                </em>

                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card exchange-rate-card border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="card-title">Ханшны мэдээлэл</h6>
                            <h3 class="rate text-dark">1 MSC = 0.25 ₮</h3>

                            <a class="btn btn-primary mt-3 text-white" href="{{ url('/user/contribute') }}">Койн захиалга хийх</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card exchange-rate-card border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="card-title">Таны бүртгэлийн төлөв</h6>
                            @if (auth()->user()->hasVerifiedEmail())
                                <button class="btn btn-success mt-3">Мэйл хаяг баталгаажуулсан</button>
                            @else 
                                <form method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-info mt-3 text-white">Мэйл хаяг баталгаажуулах</button>
                                </form>
                                {{-- <button class="btn btn-info mt-3 text-white">Мэйл хаяг баталгаажуулаагүй</button> --}}
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
    </div>
</div>
@endsection
