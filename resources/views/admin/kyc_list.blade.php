@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 kyc-list-content">
            <div class="card border-0 shadow-sm">
				<div class="card-body">
					<h5>Хэрэглэгчийн хүсэлтүүд</h5>

					<table class="table mt-4">
					    <thead>
					        <tr>
					            <th scope="col">Овог нэр</th>
					            <th scope="col">Регистр</th>
					            <th scope="col">Утас</th>
					            <th scope="col">Файл</th>
					            <th scope="col">Төлөв</th>
					            <th scope="col"></th>
					        </tr>
					    </thead>
					    <tbody>
					    	@foreach ($kycs as $kyc)
							    <tr>
						            <td>{{ $kyc->lastname }} {{ $kyc->firstname }}</td>
						            <td>{{ $kyc->regnum }}</td>
						            <td>{{ $kyc->phone }}</td>
						            <td>
						            	
						            	@if ($kyc->doc_type == "nidcard")
						            		<div class="d-block text-muted mb-1" style="font-size:13px;">Иргэний үнэмлэх</div>
						            	@endif
						            	<img src="/storage/{{ $kyc->doc_one }}" style="max-height: 60px;">
						            </td>
						            <td>
						            	@if ($kyc->status == 0)
						            		<span class="badge badge-pill badge-warning font-weight-normal" style="padding: 8px 16px;">Тодорхойгүй</span>
						            	@elseif ($kyc->status == 1)
						            		<span class="badge badge-pill badge-warning font-weight-normal" style="padding: 8px 16px;">Хүлээгдэж буй</span>
						            	@elseif ($kyc->status == 2)
						            		<span class="badge badge-pill badge-success font-weight-normal" style="padding: 8px 16px;">Баталгаажсан</span>
						            	@endif
						            </td>
						            <td>
						            	<form action="{{ url("/admin/kyc/change-status") }}" method="post">
						            		@csrf
						            		<input type="hidden" name="kyc_id" value="{{ $kyc->id }}">

						            		@if ($kyc->status < 2)
						            			<input type="hidden" name="status" value="2">
												<button type="submit" class="btn btn-success">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
													  	<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
													  	<path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
													</svg>
													&nbsp;Баталгаажуулах
												</button>
											@else 
												<input type="hidden" name="status" value="1">
												<button type="submit" class="btn btn-warning">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
													  	<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
													  	<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 	1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
													</svg>
													&nbsp;Цуцлах
												</button>
											@endif
										</form>
						            </td>
						        </tr>
							@endforeach
					    </tbody>
					</table>
				</div>            	
            </div>
        </div>
    </div>
</div>
@endsection
