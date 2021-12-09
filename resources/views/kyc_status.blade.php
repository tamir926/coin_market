@extends('layouts.app')

@section('content')
<div class="container user-kyc-container">
    <div class="container>">
    	<div class="row">
			<div class="col-lg-12">
				<div class="page-header page-header-kyc">
				    <div class="row justify-content-center">
				        <div class="col-lg-8 col-xl-7 text-center">
				            <h2 class="page-title">Хувийн мэдээлэл <br>баталгаажуулалт</h2>
				            <p class="large">Койны худалдаанд оролцохын тулд та өөрийн хувийн мэдээллийг <br>баталгаажуулах шаардлагатай.</p>
				        </div>
				    </div>
				</div>

				@if (count($errors) > 0)
					<div class="row justify-content-center">
					    <div class="col-lg-10 col-xl-9">
						  	<div class="alert alert-danger">
						      	<ul>
						      		@foreach ($errors->all() as $error)
						          		<li>{{ $error }}</li>
						      		@endforeach
						      	</ul>
						  	</div>
						</div>
					</div>
				@endif

				<div class="row justify-content-center">
				    <div class="col-lg-10 col-xl-9">
				        <div class="card border-0 shadow-sm">
				        	<div class="card-body p-0">
				        		<form action="{{ url('/user/kyc/store') }}" method="POST">
				        			@csrf

				        			<div class="step-1">
				        				<div class="step-header card-inner">
				        					<div class="step-circle">01</div>
				        					<div class="step-title">
				        						<h4>Дэлгэрэнгүй мэдээлэл</h4>
			        						</div>
				        				</div>
				        				<div class="step-form-fields card-inner">
				        					<div class="info-text d-flex mb-3">
					        					<div class="mr-3">
						        					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
													  	<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
													  	<path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
													</svg>
												</div>
												<div>
													Мэдээлэл бөглөж дууссаны дараа сайтар нягталж үзнэ үү. Нэгэнт илгээсэн мэдээллийг засварлах боломжгүй.
												</div>
											</div>
											<div class="info-text d-flex mb-3">
												<div class="mr-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
													  	<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
													  	<path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
													</svg>
												</div>
												<div>
													Та өөрийн бүртгэлийн мэдээллийг "<b>крилл үсгээр</b>" оруулна уу. Латин үсгээр оруулсан бүртгэлийн мэдээлэл системээс буцаагдана.
												</div>
											</div>

											<div class="row">
											    <div class="form-group col-md-6">
											      	<label for="fname">Нэр <span class="text-danger">*</span></label>
											      	<input type="text" class="form-control" id="fname" name="firstname">
											    </div>
											    <div class="form-group col-md-6">
											      	<label for="lname">Овог <span class="text-danger">*</span></label>
											      	<input type="text" class="form-control" id="lname" name="lastname">
											    </div>
										  	</div>

										  	<div class="row">
											    <div class="form-group col-md-6">
											      	<label for="fregnum">Регистрийн дугаар - <span class="text-danger">Заавал крилл үсгээр бичнэ үү! *</span></label>
                                                    <div class="form-inline">
                                                        <select class="form-control" name="reg_first_char" style="width:70px;">
                                                            <option value=""></option>
                                                            <option value="А">А</option>
                                                            <option value="Б">Б</option>
                                                            <option value="В">В</option>
                                                            <option value="Г">Г</option>
                                                            <option value="Д">Д</option>
                                                            <option value="Е">Е</option>
                                                            <option value="Ё">Ё</option>
                                                            <option value="Ж">Ж</option>
                                                            <option value="З">З</option>
                                                            <option value="И">И</option>
                                                            <option value="Й">Й</option>
                                                            <option value="К">К</option>
                                                            <option value="Л">Л</option>
                                                            <option value="М">М</option>
                                                            <option value="Н">Н</option>
                                                            <option value="О">О</option>
                                                            <option value="Ө">Ө</option>
                                                            <option value="П">П</option>
                                                            <option value="Р">Р</option>
                                                            <option value="С">С</option>
                                                            <option value="Т">Т</option>
                                                            <option value="У">У</option>
                                                            <option value="Ү">Ү</option>
                                                            <option value="Ф">Ф</option>
                                                            <option value="Х">Х</option>
                                                            <option value="Ц">Ц</option>
                                                            <option value="Ч">Ч</option>
                                                            <option value="Ш">Ш</option>
                                                            <option value="Щ">Щ</option>
                                                            <option value="Ъ">Ъ</option>
                                                            <option value="Ы">Ы</option>
                                                            <option value="Ь">Ь</option>
                                                            <option value="Э">Э</option>
                                                            <option value="Ю">Ю</option>
                                                            <option value="Я">Я</option>
                                                        </select>
                                                        <select class="form-control" name="reg_second_char" style="width:70px;">
                                                            <option value=""></option>
                                                            <option value="А">А</option>
                                                            <option value="Б">Б</option>
                                                            <option value="В">В</option>
                                                            <option value="Г">Г</option>
                                                            <option value="Д">Д</option>
                                                            <option value="Е">Е</option>
                                                            <option value="Ё">Ё</option>
                                                            <option value="Ж">Ж</option>
                                                            <option value="З">З</option>
                                                            <option value="И">И</option>
                                                            <option value="Й">Й</option>
                                                            <option value="К">К</option>
                                                            <option value="Л">Л</option>
                                                            <option value="М">М</option>
                                                            <option value="Н">Н</option>
                                                            <option value="О">О</option>
                                                            <option value="Ө">Ө</option>
                                                            <option value="П">П</option>
                                                            <option value="Р">Р</option>
                                                            <option value="С">С</option>
                                                            <option value="Т">Т</option>
                                                            <option value="У">У</option>
                                                            <option value="Ү">Ү</option>
                                                            <option value="Ф">Ф</option>
                                                            <option value="Х">Х</option>
                                                            <option value="Ц">Ц</option>
                                                            <option value="Ч">Ч</option>
                                                            <option value="Ш">Ш</option>
                                                            <option value="Щ">Щ</option>
                                                            <option value="Ъ">Ъ</option>
                                                            <option value="Ы">Ы</option>
                                                            <option value="Ь">Ь</option>
                                                            <option value="Э">Э</option>
                                                            <option value="Ю">Ю</option>
                                                            <option value="Я">Я</option>
                                                        </select>

                                                        <input type="number" class="form-control" id="fregnum" name="reg_num" placeholder="Регистрийн дугаар">
                                                    </div>
											    </div>
											    <div class="form-group col-md-6">
											      	<label for="fphone">Утасны дугаар <span class="text-danger">*</span></label>
											      	<input type="text" class="form-control" id="fphone" name="phone">
											    </div>
										  	</div>

										  	<div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <label for="fbirth_year" style="font-weight: 500;">Төрсөн он</label>
                                                            <input type="number" class="form-control" placeholder="1999" name="birth_year" id="fbirth_year">
                                                        </div>
                                                        <div class="col">
                                                            <label for="fbirth_month" style="font-weight: 500;">Сар</label>
                                                            <input type="number" class="form-control" placeholder="10" name="birth_month" id="fbirth_month">
                                                        </div>
                                                        <div class="col">
                                                            <label for="fbirth_day" style="font-weight: 500;">Өдөр</label>
                                                            <input type="number" class="form-control" placeholder="09" name="birth_day" id="fbirth_day">
                                                        </div>
                                                  </div>
                                                </div>
										    </div>

										    <h4 class="mt-3 mb-3" style="font-size:18px; font-weight: 400;">
										    	Таны хаяг
										    </h4>

										    <div class="row">
											    <div class="form-group col-md-6">
											      	<label for="fcountry">Улс <span class="text-danger">*</span></label>
											      	<select2-country></select2-country>
											    </div>
											    <div class="form-group col-md-6">
											      	<label for="fcity">Хот / аймаг <span class="text-danger">*</span></label>
											      	<input type="text" class="form-control" id="fcity" name="city">
											    </div>
										    </div>	

										    <div class="row">
											    <div class="form-group col-md-6">
											      	<label for="faddress">Хаяг <span class="text-danger">*</span></label>
											      	<input type="text" class="form-control" id="faddress" name="address">
											      	<small class="form-text text-muted">Нэмэлт тайлбар: Та иргэний үнэмлэх дээрх албан ёсны хаягаа оруулна уу. (Хэрэв шилжилт хийлгэсэн цагаан хуудастай бол тухайн хуудас дээрх хамгийн сүүлийн албан ёсны хаягаа оруулна.)</small>
											    </div>
										    </div>
				        				</div>
				        			</div>

				        			<div class="step-2">
				        				<div class="step-header card-inner">
				        					<div class="step-circle">02</div>
				        					<div class="step-title">
				        						<h4>Баримт бичиг илгээх</h4>
				        						<p class="mt-1 mb-0" style="font-size: 1em;">Та хэн болохоо баталгаажуулахын тулд бидэнд доорх сонголтоос сонголт хийн мэдээллээ зурган хэлбэрээр илгээнэ үү.</p>
			        						</div>
				        				</div>
				        				<div class="step-form-fields card-inner">
				        					<div class="info-text d-flex mb-3">
												<div class="mr-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
													  	<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
													  	<path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
													</svg>
												</div>
												<div>
													Хувийн мэдээлэл баталгаажуулалт хийхийн тулд дараах баримт бичгүүдээс аль нэгийг сонгон заавал илгээх шаардлагатай.
												</div>
											</div>

											<document-list></document-list>

											<div class="doc-upload-container">
												<p style="font-weight: 700;">Хувийн мэдээлэл баталгаажуулалтыг амжилттай хийхийн тулд дараах шаардлагыг хангасан байх ёстойг анхаарна уу.</p>

												<ul class="list-check">
													<li>
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
														  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
														</svg>
														Илгээсэн баримт бичигийн хүчинтэй хугацаа дуусаагүй байх.
													</li>
													<li>
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
														  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
														</svg>
														Баримт бичигийн зураг сарниагүй, дээрх мэдээлэл нь тодорхой харагдахуйц байх.
													</li>
													<li>
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
														  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
														</svg>
														Файлын хэмжээ хамгийн багадаа 1МБ, хамгийн багадаа 300 dpi нягтаршилтай байх.
													</li>
												</ul>

												<div class="row mt-3 mb-3">
													<div class="col-md-6">
														<img src="/img/70.png" style="width: 100%">
													</div>
													<div class="col-md-6">
														<img src="/img/71.png" style="width: 100%">
													</div>
												</div>

												<dropzone-upload></dropzone-upload>
											</div>
				        				</div>

                                        <kyc-submit-button></kyc-submit-button>
				        				{{-- <div class="step-final">
					        				<div class="step-form-fields card-inner">
					        					<button class="btn btn-primary" type="submit">Баталгаажуулах хүсэлт илгээх</button>
					        				</div>
					        			</div> --}}
				        			</div>
				        		</form>
				        	</div>
				        </div>
				    </div>
				</div>
			</div>
    	</div>
    </div>
</div>
@endsection
