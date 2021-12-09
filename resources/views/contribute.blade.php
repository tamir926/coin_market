@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm">
				<div class="card-body card-inner">
					<h4 style="padding: 15px 0;">MSC койн захиалга хийх</h4>
					{{-- <div class="alert alert-warning mt-4 mb-4" role="alert">
                      Койн захиалахад бэлэн болох хугацаа
                    </div>

                    <counter-down></counter-down> --}}

                    <payment-token></payment-token>
				</div>            	
            </div>
        </div>

        <div class="col-lg-4 mb-4">
        	<div class="card border-0 shadow-sm">
                <div class="card-body card-token p-2">
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

            <div class="card border-0 shadow-sm mt-4 mb-4">
                <div class="card-body">
                    <h5>Койн борлуулалт</h5>
                    <div class="mt-3 mb-2">
                        <span class="card-sub-title">MSC Койн үнэ</span>
                    </div>
                    <h4 class="text-dark" style="font-size:1.29em;">
                        1 MSC = <span style="color:#f15a29;">0.25 ₮</span>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
