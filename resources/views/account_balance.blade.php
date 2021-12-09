@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body card-inner">
                    <h4>Миний MSC койн</h4>

                    <ul class="list-group mt-4">
                        <li class="list-group-item">
                            <div class="card-inner">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h6 style="margin-bottom: 6px; color: #83898f; text-transform: uppercase;" class="font-weight-500">
                                            Койны хэмжээ
                                        </h6>
                                        <span style="font-size: 1.6em; font-weight: 400; color: #f15a29;">{{ number_format(auth()->user()->token) }} MSC</span>
                                        <p style="margin-bottom: 0; font-size: 0.87em; color: #83898f;">
                                            @php $price = auth()->user()->token * 0.25; @endphp
                                            <span style="color: #505258; font-weight: 500;"> {{ number_format((float)$price, 2, '.', ',') }}₮</span>-тэй тэнцүү
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ url('/user/contribute') }}" class="btn btn-primary text-white font-weight-500">
                                            Койн худалдан авах
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        {{-- <li class="list-group-item">
                            <div class="card-inner">
                                <h5 style="margin-bottom: 0px; font-size: 1.1em; color: rgb(131, 137, 143);">
                                    Токены нийт дүн
                                </h5>
                                <span style="font-size: 1.4em; font-weight: 400; color: #505258;">0 COIN</span>
                            </div>
                        </li> --}}
                    </ul>
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
                        <button class="btn btn-info mt-3 text-white">Мэйл хаяг баталгаажуулах</button>
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