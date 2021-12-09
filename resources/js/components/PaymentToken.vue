<template>
	<div class="payment-content">
		<div class="row">
			<div class="col-6">
				<div class="payment-item">
					<div class="payment-name">MNT</div>
					<div class="payment-amount">0.25 ₮</div>
				</div>
			</div>
		</div>

		<div class="mt-4 mb-4"></div>
		<h4 style="font-size: 21px;">Сануулга</h4>
		<div class="token-text">
			<p>Захиалга хийх койны хэмжээг оруулан захиалга хийх товч дээр дарна уу. <br>Төлбөрийг банкны данс руу хийж төлнө.</p>
		</div>

		<div class="token-input-wrapper">
			<div class="token-input">
				<div class="input-group">
				  <input type="text" class="form-control token-number" id="formatNumber" 
				  	@keypress="isNumber($event)"
				  	@keyup="moneyFormat($event)"
				  >
				  <div class="input-group-append">
				    <span class="input-group-text token-name">MSC</span>
				  </div>
				</div>
			</div>
			<div class="token-result-number">
				<span class="token-equal">=</span>
				<span class="token-amount">{{ token_amount_string }}</span>
				<span style="font-size: 1.5em;margin-top: 4px;">₮</span>
			</div>
		</div>

		<div class="token-alert-number">
			<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
			  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
			</svg>
			<span style="margin-left: 5px;">Захиалга хийх доод хэмжээ. (400,000 MSC)</span>
		</div>

		<button class="btn btn-primary order-btn mt-3 mb-3" 
			:disabled="(token_amount/0.25) < 400000"
			@click="openPaymentModal"
		>
			<span class="mr-3">Койн захиалга хийх</span>
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-front" viewBox="0 0 16 16">
		  	<path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
		  	<path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
			</svg>
		</button>

		<hr>

		<div class="payment-info">
			<div style="color: #ff7300; margin-right: 20px;">
				<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
				  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
				</svg>
			</div>
			<div style="font-style:oblique; color: #505258; line-height: 20px;">Койн захиалга амжилттай бүртгэгдэж банкны дансруу гүйлгээ хийгдсэний дараа манай баг таны гүйлгээг шалган MSC койныг таны дансанд байршуулах болно.</div>
		</div>

		<!-- Payment Modal -->
		<div class="modal fade" id="paymentModal" data-backdrop="static" data-keyboard="false" tabindex="-1">
		  <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width:650px;">
		    <div class="modal-content">
		      <div class="modal-body">
		        <div class="card-inner">
		        	<div v-if="!order.is_finished">
			        	<h5>Төлбөр төлөх үйл явц</h5>
			        	<p class="lead">
			        		<strong><span style="color: #ff7300;">{{ token_unit }} MSC</span></strong> койн хүлээн авахын тулд
			        		<strong style="color: #ff7300;">{{ token_amount_string }} <span >MNT</span></strong>-ийн төлбөрийг төлнө үү
	            	</p>
	            	<p style="font-size:14px;">Та төлбөрөө төлөхдөө банкны дансны дугаар болон, хүлээн авагчийн нэрийг сайтар нягтлан гүйлгээ хийхийг анхааруулж байна. Гүйлгээ хийхдээ гүйлгээний утга дээр захиалгын дугаарыг заавал бичихийг анхаарна уу. Хэрэв гүйлгээний утга бичээгүй шилжүүлэг хийсэн тохиолдолд  7777-9990 дугаарт холбогдоно уу.</p>

	            	<div class="form-check term-accept">
	            		<input type="checkbox" name="term" id="term" class="form-check-input" v-model="term_accept"> 
	            		<label for="term" class="form-check-label" style="font-size:14px; color: #505258;">
	                  Би дээрх нөхцөлийг хүлээн зөвшөөрч захиалга хийж байна.
	                </label>
	              </div>
			        	
			        	<button class="btn btn-primary order-btn mt-3 mb-3" 
									:disabled="!term_accept"
									@click="submitOrder"
									v-if="!loading"
								>
									<span class="mr-3">Койн захиалга хийх</span>

									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
									  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
									</svg>
								</button>

								<button class="btn btn-primary order-btn mt-3 mb-3" type="button" disabled v-if="loading">
								  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
								  Уншиж байна...
								</button>

								<div class="payment-info">
									<div style="color: #ff7300; margin-right: 10px;">
										<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
										  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
										</svg>
									</div>
									<div style="color: #505258; font-size: 13px;">Захиалга өгсний дараа банкны дансны дэлгэрэнгүй мэдээлэл гарч ирнэ.</div>
								</div>
			        </div>
			        <div v-if="order.is_finished">
			        	<h5 style="color:green;">Tокен захиалга бүртгэгдлээ.</h5> 

			        	<div class="mt-3 mb-3">
				        	<div class="order-token">Захиалсан койн: <span>{{ token_unit }}</span></div>
				        	<div class="order-id">Захиалгын дугаар: <span>{{ order.data }}</span></div>
				        	<div class="order-id">Захиалгын дүн: <span>{{ token_amount_string }} ₮</span></div>
			        	</div>

			        	<div class="alert alert-danger mt-3 mb-3" role="alert" style="font-size:16px;">
								  Гүйлгээний утган дээр захиалгын дугаарыг заавал оруулна уу!
								</div>

								<h6>Шилжүүлэх данс</h6>
			        	<ul class="list-group list-group-flush">
							  	<li class="list-group-item" style="font-size: 14px;">
							  		<span class="mr-2">Голомт банк:</span>
							  		<span style="font-weight:700; font-size: 15px;">2705144818, Комплекс Дижитал Экосистем ХХК</span>
							  	</li>
								</ul>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Дуусгах</button>
			        </div>
			      </div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				token_unit: 0,
				token_amount: 0,
				token_amount_string: "0",
				term_accept: false,
				loading: false,
				order: {
					is_finished: false,
					data: ""
				}
			}
		},
		methods: {
			isNumber: function(evt) {
	      evt = (evt) ? evt : window.event;
	      let charCode = (evt.which) ? evt.which : evt.keyCode;
	      if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
	        evt.preventDefault();;
	      } else {
	        return true;
	      }
	    },
	    moneyFormat(evt) {
	    	let value = event.target.value;

	    	if (value) {
	    		let n = parseInt(value.replace(/\D/g,''), 10);
	    		this.token_unit = n;
	    		this.token_amount = (n * 0.25);
	    		this.token_amount_string = this.token_amount.toLocaleString();
	    		document.getElementById("formatNumber").value = n.toLocaleString();
	    	} else {
	    		this.token_unit = 0;
	    		this.token_amount = 0;
	    		this.token_amount_string = "0";
	    	}
	    },
	    openPaymentModal() {
	    	this.term_accept = false;
	    	this.order.is_finished = false;
	    	this.order.data = "";
	    	
	    	$("#paymentModal").modal({
	    		keyboard: false
	    	});
    	},
    	submitOrder() {
    		if (this.token_unit > 0 && this.token_amount > 0) {
    			this.loading = true;

	    		axios.post("/user/orders", { 
	    			"token": this.token_unit
	    		}).then((res) => {
	    			this.loading = false;

	    			if (res.data.success) {
	    				this.order.is_finished = true;
	    				this.order.data = res.data.orderId;
	    			} else {
	    				alert("Алдаа гарлаа. Дахин оролдоно уу!");
	    			}
	    			console.log(res);
	    		})
	    		.catch((err) => {
	    			this.loading = false;
	    			alert("Алдаа гарлаа. Дахин оролдоно уу!");
	    			console.log(err);
	    		})	
    		} else {
    			alert("Койноо оруулна уу!");
    		}
    	}
		}
	}
</script>

<style lang="scss" scoped>
	.payment-content {
		margin-top: 20px;
		margin-bottom: 20px;
	}

	.payment-item {
		border: 2px solid #ffd7b6;
		background-color: #eff6ff;
		border-radius: 4px;

		display: flex;
		justify-content: space-between;
		align-items: center;
		cursor: pointer;
		padding: 10px 20px;

		.payment-name {
			font-size: 14px;
	    line-height: 30px;
	    font-weight: 700;
	    margin-left: 20px;
		}

		.payment-amount {
			font-size: 14px;
			font-weight: 400;
		}
	}

	.token-text {
		color: #505258;
	}

	.token-input-wrapper {
		display: flex;
		align-items: center;

		.token-input {
			max-width: 330px;
			display: flex;
 	    align-items: center;

			.token-number {
				padding: 20px;
				font-size: 1.5em;
			}

			.token-name {
				color: #83898f;
				font-size: 1.5em;
				background-color: #fff;
				font-weight: 500;
			}	
		}

		.token-result-number {
			display: inline-flex;
			align-items: center;

			.token-equal {
				color: #83898f;
		  	padding: 0 10px;
		  	font-size: 20px;
			}

			.token-amount {
				font-size: 1.8em;
				padding-right: 4px;
				color: #130e0e;
		    font-weight: 700;
			}
		}
	}

	.token-alert-number {
		margin-top: 10px;
		margin-bottom: 10px;
		font-size: 12px;
		color: #83898f;

		svg {
			color: #ff6868; 
		}
	}

	.order-btn {
		font-weight: 500;
		font-size: 14px;
		padding: 10px 20px;
	}

	.payment-info {
		display: flex;
    align-items: center;
    padding: 11px 0;
	}

	#paymentModal {
		font-size: 13px;

		.lead {
			font-size: 17px;
	    font-weight: 400;
	    margin-top: 15px;
		}
	}

	.order-token, .order-id {
		font-size: 14px;
		span {
			font-weight: 700;
		}
	}
</style>
