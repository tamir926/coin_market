@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card border-0 shadow-sm">
				<div class="card-body card-inner">
                    <div class="d-flex">
    					<h4 class="mr-auto">Гүйлгээний жагсаалт</h4>

                        <button class="btn btn-info text-white font-weight-500" data-toggle="modal" data-target="#paymentInfoModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-back" viewBox="0 0 16 16">
                                <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z"/>
                                <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z"/>
                            </svg> &nbsp;
                            Дансны мэдээлэл
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-borderless table-hover mt-4">
                            <thead>
                                <tr>
                                    <th style="color:#f15a29; text-transform: uppercase; font-weight: 600; font-size: 13px;">Захиалгын дугаар</th>
                                    <th style="color:#f15a29; text-transform: uppercase; font-weight: 600; font-size: 13px;">Койны хэмжээ</th>
                                    <th style="color:#f15a29; text-transform: uppercase; font-weight: 600; font-size: 13px;">Төгрөгийн хэмжээ</th>
                                    <th style="color:#f15a29; text-transform: uppercase; font-weight: 600; font-size: 13px;">Гүйлгээ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse (auth()->user()->orders as $order)
                                    <tr>
                                        <td>{{ $order->invoice_no }}</td>
                                        <td>{{ number_format($order->token_quantity) }}</td>
                                        <td>{{ number_format($order->token_amount, 2, '.', ',') }} ₮</td>
                                        <td>
                                            @if ($order->status == 2)
                                                <span class="badge badge-pill badge-success font-weight-normal" style="padding: 8px 16px;">Баталгаажсан</span>
                                            @else
                                                <span class="badge badge-pill badge-warning font-weight-normal" style="padding: 8px 16px;">Хүлээгдэж буй</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4">Гүйлгээ хийгдээгүй байна.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
				</div>            	
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="paymentInfoModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Дансны мэдээлэл</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Хэрвээ та худалдаж авсан койн гүйлгээний төлбөрийг төлж амжаагүй эсвэл мартсан бол доорх мэдээлэлийг харна уу</p>

                <div class="alert alert-danger" role="alert">
                    Гүйлгээний утган дээр захиалгын дугаар оруулахаа мартаж болохгүй!
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Хаан банк: <span class="font-weight-bold">5111450584</span>
                    </li>
                    <li class="list-group-item">
                        Данс эзэмшигч: <span class="font-weight-bold">АРИВАЙЗ</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
