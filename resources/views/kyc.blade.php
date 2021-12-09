@extends('layouts.app')

@section('content')
<div class="container user-kyc-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7 text-center">
                @if(Session::has("alert_contribute"))
                    @if (auth()->user()->kyc)
                        @if (auth()->user()->kyc->status == 0)
                            <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                                Койны худалдаанд оролцохын тулд таны хувийн мэдээлэл заавал баталгаажсан байх шаардлагатай.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @elseif (auth()->user()->kyc->status == 1)
                            <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                                Таны өргөдлийн баталгаажуулалт явагдаж байгаа тул та түр хүлээнэ үү.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    @else
                        <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                            Койн худалдаанд оролцохын тулд хувийн мэдээлэл заавал баталгаажсан байх ёстой.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="page-header page-header-kyc">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xl-7 text-center">
                            <h2 class="page-title">Хэрэглэгчийн хувийн мэдээлэл баталгаажуулалт</h2>
                            <p class="large">Хэрэглэгч та мөнгө угаахын эсрэг (AML), харилцагчийг таньж мэдэх (KYC), терроризмыг санхүүжүүлэхтэй тэмцэх (CTF) зэрэг олон улсын стандарт, зохицуулалтуудыг дагаж мөрдөхийн тулд мэдээллээ бидэнд илгээх шаардлагатай тул доорх мэдээллийг үнэн зөв илгээхийг таниас хүсэж байна.</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-9">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body" style="padding: 40px; text-align: center;">
                                @if (auth()->user()->kyc)
                                    @if (auth()->user()->kyc->status == 0)
                                        <div class="status-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                                <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                                                <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                                            </svg>
                                        </div>
                                        <p class="status-text text-dark">
                                        Та хувийн мэдээллээ баталгаажуулахын тулд шаардлагатай бичиг баримтаа бүрдүүлж өгөөгүй байна. MSC койныг худалдаж авахын тулд хэн болохыг баталгаажуулна уу.</p>
                                        <p class="px-md-5">Хувийн мэдээлэл баталгаажуулалт хийхэд хүндрэлтэй зүйл гарвал бид танд туслахад үргэлж бэлэн.</p>
                                        <a href="{{ url('/user/kyc/status?value=new') }}" class="btn btn-primary">Та хувийн мэдээллээ энд дарж баталгаажуулна уу.</a>
                                    @elseif (auth()->user()->kyc->status == 1)
                                        <div class="status-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-link" viewBox="0 0 16 16">
                                                <path d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z"/>
                                                <path d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z"/>
                                            </svg>
                                        </div>
                                        <p class="status-text text-dark">
                                        Таны өргөдлийн баталгаажуулалт явагдаж байна.</p>
                                        <p class="px-md-5">Бид таны хувийн мэдээллийн баталгаажуулалтыг хүлээн авлаа.Бид таны мэдээллийг 10 миниутын дотор баталгаажуулж имэйлээр мэдэгдэх болно.</p>
                                    @endif
                                @else
                                    <div class="status-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                            <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                                            <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                                        </svg>
                                    </div>
                                    <p class="status-text text-dark">
                                    Та хувийн мэдээллээ баталгаажуулахын тулд шаардлагатай бичиг баримтаа бүрдүүлж өгөөгүй байна. MSC койныг худалдаж авахын тулд хэн болохыг баталгаажуулна уу.</p>
                                    <p class="px-md-5">Хувийн мэдээлэл баталгаажуулалт хийхэд хүндрэлтэй зүйл гарвал бид танд туслахад үргэлж бэлэн.</p>
                                    <a href="{{ url('/user/kyc/status?value=new') }}" class="btn btn-primary">Та хувийн мэдээллээ энд дарж баталгаажуулна уу.</a>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
