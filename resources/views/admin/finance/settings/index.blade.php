@extends('layouts.app')

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0">{{ __('Payment Settings') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa-solid fa-sack-dollar mr-2 fs-12"></i>{{ __('Admin') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.finance.dashboard') }}"> {{ __('Finance Management') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}"> {{ __('Payment Settings') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection
@section('content')	
	<!-- ALL PAYMENT CONFIGURATIONS -->					
	<div class="row">
		<div class="col-lg-8 col-md-12 col-xm-12">

			<form action="{{ route('admin.finance.settings.store') }}" method="POST" enctype="multipart/form-data">
				@csrf

				<div class="card border-0">
					<div class="card-header">
						<h3 class="card-title">{{ __('Setup Payment Settings') }}</h3>
					</div>		
					<div class="card-body">				

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">			
								<div class="input-box">	
									<h6>{{ __('Default Currency') }} <span class="text-muted">({{ __('Payments/Plans/System/Payouts') }})</span></h6>
									<select id="currency" name="currency" data-placeholder="Choose Default Currency:">			
										@foreach(config('currencies.all') as $key => $value)
											<option value="{{ $key }}" @if(config('payment.default_system_currency') == $key) selected @endif>{{ $value['name'] }} - {{ $key }} ({{ $value['symbol'] }})</option>
										@endforeach
									</select>									
									@error('currency')
										<p class="text-danger">{{ $errors->first('currency') }}</p>
									@enderror
								</div> 						
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="input-box">								
									<h6>{{ __('Tax Rate') }} (%)</h6>
									<div class="form-group">							    
										<input type="text" class="form-control @error('tax') is-danger @enderror" id="tax" name="tax" placeholder="Enter Tax Rate" value="{{ config('payment.payment_tax')}}">
									</div>
									@error('tax')
										<p class="text-danger">{{ $errors->first('tax') }}</p>
									@enderror 
								</div>							
							</div>									
						</div>
					
					</div>
				</div>

				<div class="card border-0">
					<div class="card-header">
						<h3 class="card-title"><span class="text-info">{{ __('Online') }} </span> {{ __('Payment') }}</h3>
					</div>
					<div class="card-body pb-6">

						<div class="card border-0 special-shadow">							
							<div class="card-body">
								<h6 class="fs-12 font-weight-bold mb-4"><i class="fa-brands fa-cc-paypal fs-16 mr-2"></i>PayPal Payment Gateway <span class="text-primary">({{ __('All Plans') }})</span></h6>
								
								<div class="row">
									<div class="col-md-6 col-sm-12 mb-2">
										<div class="form-group">
											<label class="custom-switch">
												<input type="checkbox" name="enable-paypal" class="custom-switch-input" @if (config('services.paypal.enable')  == 'on') checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">Use PayPal Prepaid</span>
											</label>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group mb-4">
											<label class="custom-switch">
												<input type="checkbox" name="enable-paypal-subscription" class="custom-switch-input" @if (config('services.paypal.subscription')  == 'on') checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">Use Paypal Subscription</span>
											</label>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">								
										<div class="input-box">								
											<h6>PayPal Client ID <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control @error('paypal_client_id') is-danger @enderror" id="paypal_client_id" name="paypal_client_id" value="{{ config('services.paypal.client_id') }}" autocomplete="off">
											</div> 
											@error('paypal_client_id')
												<p class="text-danger">{{ $errors->first('paypal_client_id') }}</p>
											@enderror
										</div> 
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">								
											<h6>PayPal Client Secret <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
											<div class="form-group">							    
												<input type="text" class="form-control @error('paypal_client_secret') is-danger @enderror" id="paypal_client_secret" name="paypal_client_secret" value="{{ config('services.paypal.client_secret') }}" autocomplete="off">
											</div> 
											@error('paypal_client_secret')
												<p class="text-danger">{{ $errors->first('paypal_client_secret') }}</p>
											@enderror
										</div> 
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">								
											<h6>Paypal Webhook URI <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
											<div class="form-group">							    
												<input type="text" class="form-control @error('paypal_webhook_uri') is-danger @enderror" id="paypal_webhook_uri" name="paypal_webhook_uri" value="{{ config('services.paypal.webhook_uri') }}" autocomplete="off">
											</div> 
											@error('paypal_webhook_uri')
												<p class="text-danger">{{ $errors->first('paypal_webhook_uri') }}</p>
											@enderror
										</div> 
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">								
											<h6>Paypal Webhook ID <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
											<div class="form-group">							    
												<input type="text" class="form-control @error('paypal_webhook_id') is-danger @enderror" id="paypal_webhook_id" name="paypal_webhook_id" value="{{ config('services.paypal.webhook_id') }}" autocomplete="off">
											</div> 
											@error('paypal_webhook_id')
												<p class="text-danger">{{ $errors->first('paypal_webhook_id') }}</p>
											@enderror
										</div> 
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">								
											<h6>PayPal Base URI <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
											<select id="paypal-url" name="paypal_base_uri" data-placeholder="{{ __('Choose Payment Option') }}:">			
												<option value="https://api-m.paypal.com" @if (config('services.paypal.base_uri')  == 'https://api-m.paypal.com') selected @endif>Live URL</option>
												<option value="https://api-m.sandbox.paypal.com" @if (config('services.paypal.base_uri')  == 'https://api-m.sandbox.paypal.com') selected @endif>Sandbox URL</option>
											</select>
											@error('paypal_base_uri')
												<p class="text-danger">{{ $errors->first('paypal_base_uri') }}</p>
											@enderror
										</div> 
									</div>
								
								</div>
	
							</div>
						</div>	


						<div class="card overflow-hidden border-0 special-shadow">							
							<div class="card-body">

								<h6 class="fs-12 font-weight-bold mb-4"><i class="fa-brands fa-cc-stripe fs-16 mr-2"></i>Stripe Payment Gateway <span class="text-primary">({{ __('All Plans') }})</span></h6>

								<div class="row">
									<div class="col-md-6 col-sm-12 mb-2">
										<div class="form-group">
											<label class="custom-switch">
												<input type="checkbox" name="enable-stripe" class="custom-switch-input" @if (config('services.stripe.enable')  == 'on') checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">Use Stripe Prepaid</span>
											</label>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group mb-4">
											<label class="custom-switch">
												<input type="checkbox" name="enable-stripe-subscription" class="custom-switch-input" @if (config('services.stripe.subscription')  == 'on') checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">Use Stripe Subscription</span>
											</label>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">								
										<!-- ACCESS KEY -->
										<div class="input-box">								
											<h6>Stripe Key <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control @error('stripe_key') is-danger @enderror" id="stripe_key" name="stripe_key" value="{{ config('services.stripe.api_key') }}" autocomplete="off">
											</div> 
											@error('stripe_key')
												<p class="text-danger">{{ $errors->first('stripe_key') }}</p>
											@enderror
										</div> <!-- END ACCESS KEY -->
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<!-- SECRET ACCESS KEY -->
										<div class="input-box">								
											<h6>Stripe Secret Key <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
											<div class="form-group">							    
												<input type="text" class="form-control @error('stripe_secret_key') is-danger @enderror" id="stripe_secret_key" name="stripe_secret_key" value="{{ config('services.stripe.api_secret') }}" autocomplete="off">
											</div> 
											@error('stripe_secret_key')
												<p class="text-danger">{{ $errors->first('stripe_secret_key') }}</p>
											@enderror
										</div> <!-- END SECRET ACCESS KEY -->
									</div>	
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">								
											<h6>Stripe Webhook URI <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
											<div class="form-group">							    
												<input type="text" class="form-control @error('stripe_webhook_uri') is-danger @enderror" id="stripe_webhook_uri" name="stripe_webhook_uri" value="{{ config('services.stripe.webhook_uri') }}" autocomplete="off">
											</div> 
											@error('stripe_webhook_uri')
												<p class="text-danger">{{ $errors->first('stripe_webhook_uri') }}</p>
											@enderror
										</div> 
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">								
											<h6>Stripe Webhook Secret <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
											<div class="form-group">							    
												<input type="text" class="form-control @error('stripe_webhook_secret') is-danger @enderror" id="stripe_webhook_secret" name="stripe_webhook_secret" value="{{ config('services.stripe.webhook_secret') }}" autocomplete="off">
											</div> 
											@error('stripe_webhook_secret')
												<p class="text-danger">{{ $errors->first('stripe_webhook_secret') }}</p>
											@enderror
										</div> 
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">								
											<h6>Stripe Base URI <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
											<div class="form-group">							    
												<input type="text" class="form-control @error('stripe_base_uri') is-danger @enderror" id="stripe_base_uri" name="stripe_base_uri" value="{{ config('services.stripe.base_uri') }}" autocomplete="off">
											</div> 
											@error('stripe_base_uri')
												<p class="text-danger">{{ $errors->first('stripe_base_uri') }}</p>
											@enderror
										</div> 
									</div>
									
								</div>
	
							</div>
						</div>


						<div class="card overflow-hidden border-0 special-shadow">							
							<div class="card-body">

								<h6 class="fs-12 font-weight-bold mb-4"><img src="{{ URL::asset('/img/payments/paystack.svg') }}" alt="Paystack" class="gateway-logo">Paystack Payment Gateway <span class="text-primary">({{ __('All Plans') }})</span></h6>

								<div class="row">
									<div class="col-md-6 col-sm-12 mb-2">
										<div class="form-group">
											<label class="custom-switch">
												<input type="checkbox" name="enable-paystack" class="custom-switch-input" @if (config('services.paystack.enable')  == 'on') checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">Use Paystack Prepaid</span>
											</label>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group mb-4">
											<label class="custom-switch">
												<input type="checkbox" name="enable-paystack-subscription" class="custom-switch-input" @if (config('services.paystack.subscription')  == 'on') checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">Use Paystack Subscription</span>
											</label>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">								
										<!-- ACCESS KEY -->
										<div class="input-box">								
											<h6>Paystack Public Key <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control @error('paystack_public_key') is-danger @enderror" id="paystack_public_key" name="paystack_public_key" value="{{ config('services.paystack.api_key') }}" autocomplete="off">
											</div> 
											@error('paystack_public_key')
												<p class="text-danger">{{ $errors->first('paystack_public_key') }}</p>
											@enderror
										</div> <!-- END ACCESS KEY -->
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<!-- SECRET ACCESS KEY -->
										<div class="input-box">								
											<h6>Paystack Secret Key <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
											<div class="form-group">							    
												<input type="text" class="form-control @error('paystack_secret_key') is-danger @enderror" id="paystack_secret_key" name="paystack_secret_key" value="{{ config('services.paystack.api_secret') }}" autocomplete="off">
											</div> 
											@error('paystack_secret_key')
												<p class="text-danger">{{ $errors->first('paystack_secret_key') }}</p>
											@enderror
										</div> <!-- END SECRET ACCESS KEY -->
									</div>	
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">								
											<h6>Paystack Webhook URI <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
											<div class="form-group">							    
												<input type="text" class="form-control @error('paystack_webhook_uri') is-danger @enderror" id="paystack_webhook_uri" name="paystack_webhook_uri" value="{{ config('services.paystack.webhook_uri') }}" autocomplete="off">
											</div> 
											@error('paystack_webhook_uri')
												<p class="text-danger">{{ $errors->first('paystack_webhook_uri') }}</p>
											@enderror
										</div> 
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">								
											<h6>Paystack Base URI <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
											<div class="form-group">							    
												<input type="text" class="form-control @error('paystack_base_uri') is-danger @enderror" id="paystack_base_uri" name="paystack_base_uri" value="{{ config('services.paystack.base_uri') }}" autocomplete="off">
											</div> 
											@error('paystack_base_uri')
												<p class="text-danger">{{ $errors->first('stripe_base_uri') }}</p>
											@enderror
										</div> 
									</div>
									
								</div>
	
							</div>
						</div>


						<div class="card overflow-hidden border-0 special-shadow">							
							<div class="card-body">

								<h6 class="fs-12 font-weight-bold mb-4"><img src="{{ URL::asset('/img/payments/razorpay.svg') }}" alt="Razorpay" class="gateway-logo">Razorpay Payment Gateway <span class="text-primary">({{ __('All Plans') }})</span></h6>

								<div class="row">
									<div class="col-md-6 col-sm-12 mb-2">
										<div class="form-group">
											<label class="custom-switch">
												<input type="checkbox" name="enable-razorpay" class="custom-switch-input" @if (config('services.razorpay.enable')  == 'on') checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">Use Razorpay Prepaid</span>
											</label>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group mb-4">
											<label class="custom-switch">
												<input type="checkbox" name="enable-razorpay-subscription" class="custom-switch-input" @if (config('services.razorpay.subscription')  == 'on') checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">Use Razorpay Subscription</span>
											</label>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">								
										<!-- ACCESS KEY -->
										<div class="input-box">								
											<h6>Razorpay Key ID <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control @error('razorpay_key_id') is-danger @enderror" id="razorpay_key_id" name="razorpay_key_id" value="{{ config('services.razorpay.key_id') }}" autocomplete="off">
											</div> 
											@error('razorpay_key_id')
												<p class="text-danger">{{ $errors->first('razorpay_key_id') }}</p>
											@enderror
										</div> <!-- END ACCESS KEY -->
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<!-- SECRET ACCESS KEY -->
										<div class="input-box">								
											<h6>Razorpay Key Secret <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
											<div class="form-group">							    
												<input type="text" class="form-control @error('razorpay_key_secret') is-danger @enderror" id="razorpay_key_secret" name="razorpay_key_secret" value="{{ config('services.razorpay.key_secret') }}" autocomplete="off">
											</div> 
											@error('razorpay_key_secret')
												<p class="text-danger">{{ $errors->first('razorpay_key_secret') }}</p>
											@enderror
										</div> <!-- END SECRET ACCESS KEY -->
									</div>	
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">								
											<h6>Razorpay Webhook URI <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
											<div class="form-group">							    
												<input type="text" class="form-control @error('razorpay_webhook_uri') is-danger @enderror" id="razorpay_webhook_uri" name="razorpay_webhook_uri" value="{{ config('services.razorpay.webhook_uri') }}" autocomplete="off">
											</div> 
											@error('razorpay_webhook_uri')
												<p class="text-danger">{{ $errors->first('razorpay_webhook_uri') }}</p>
											@enderror
										</div> 
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">								
											<h6>Razorpay Webhook Secret <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
											<div class="form-group">							    
												<input type="text" class="form-control @error('razorpay_webhook_secret') is-danger @enderror" id="razorpay_webhook_secret" name="razorpay_webhook_secret" value="{{ config('services.razorpay.webhook_secret') }}" autocomplete="off">
											</div> 
											@error('razorpay_webhook_secret')
												<p class="text-danger">{{ $errors->first('razorpay_webhook_secret') }}</p>
											@enderror
										</div> 
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">								
											<h6>Razorpay Base URI <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
											<div class="form-group">							    
												<input type="text" class="form-control @error('razorpay_base_uri') is-danger @enderror" id="razorpay_base_uri" name="razorpay_base_uri" value="{{ config('services.razorpay.base_uri') }}" autocomplete="off">
											</div> 
											@error('razorpay_base_uri')
												<p class="text-danger">{{ $errors->first('razorpay_base_uri') }}</p>
											@enderror
										</div> 
									</div>
									
								</div>
	
							</div>
						</div>


						<div class="card overflow-hidden border-0 special-shadow">							
							<div class="card-body">
	
								<h6 class="fs-12 font-weight-bold mb-4"><img src="{{ URL::asset('/img/payments/mollie.svg') }}" alt="Mollie" class="gateway-logo gateway-small-logo">Mollie Payment Gateway <span class="text-primary">({{ __('All Plans') }})</span></h6>
	
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group mb-4">
											<label class="custom-switch">
												<input type="checkbox" name="enable-mollie" class="custom-switch-input" @if (config('services.mollie.enable')  == 'on') checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">Use Mollie Prepaid</span>
											</label>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group mb-4">
											<label class="custom-switch">
												<input type="checkbox" name="enable-mollie-subscription" class="custom-switch-input" @if (config('services.mollie.subscription')  == 'on') checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">Use Mollie Subscription</span>
											</label>
										</div>
									</div>
								</div>
	
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">								
										<!-- ACCESS KEY -->
										<div class="input-box">								
											<h6>Mollie Public Key</h6>
											<div class="form-group">							    
												<input type="text" class="form-control @error('mollie_key_id') is-danger @enderror" id="mollie_key_id" name="mollie_key_id" value="{{ config('services.mollie.key_id') }}" autocomplete="off">
											</div>
												@error('mollie_key_id')
												<p class="text-danger">{{ $errors->first('mollie_key_id') }}</p>
											@enderror
										</div> <!-- END ACCESS KEY -->
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">								
										<div class="input-box">								
											<h6>Mollie Webhook URI</h6>
											<div class="form-group">							    
												<input type="text" class="form-control @error('mollie_webhook_uri') is-danger @enderror" id="mollie_webhook_uri" name="mollie_webhook_uri" value="{{ config('services.mollie.webhook_uri') }}" autocomplete="off">
											</div>
												@error('mollie_webhook_uri')
												<p class="text-danger">{{ $errors->first('mollie_webhook_uri') }}</p>
											@enderror
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">								
										<div class="input-box">								
											<h6>Mollie Base URI</h6>
											<div class="form-group">							    
												<input type="text" class="form-control @error('mollie_base_uri') is-danger @enderror" id="mollie_base_uri" name="mollie_base_uri" value="{{ config('services.mollie.base_uri') }}" autocomplete="off">
											</div>
												@error('mollie_base_uri')
												<p class="text-danger">{{ $errors->first('mollie_base_uri') }}</p>
											@enderror
										</div>
									</div>								
									
								</div>
	
							</div>
						</div>
	
	
						<div class="card border-0 special-shadow">							
							<div class="card-body">
	
								<h6 class="fs-12 font-weight-bold mb-4"><img src="{{ URL::asset('/img/payments/braintree.svg') }}" alt="Braintree" class="gateway-logo">Braintree Payment Gateway <span class="text-primary">({{ __('Prepaid Plans') }})</span></h6>
	
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group mb-4">
											<label class="custom-switch">
												<input type="checkbox" name="enable-braintree" class="custom-switch-input" @if (config('services.braintree.enable')  == 'on') checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">Use Braintree Prepaid</span>
											</label>
										</div>
									</div>
								</div>
	
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">								
										<!-- ACCESS KEY -->
										<div class="input-box">								
											<h6>Braintree Private Key</h6>
											<div class="form-group">							    
												<input type="text" class="form-control @error('braintree_private_key') is-danger @enderror" id="braintree_private_key" name="braintree_private_key" value="{{ config('services.braintree.private_key') }}" autocomplete="off">
											</div>
												@error('braintree_private_key')
												<p class="text-danger">{{ $errors->first('braintree_private_key') }}</p>
											@enderror
										</div> <!-- END ACCESS KEY -->
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">								
										<!-- ACCESS KEY -->
										<div class="input-box">								
											<h6>Braintree Public Key</h6>
											<div class="form-group">							    
												<input type="text" class="form-control @error('braintree_public_key') is-danger @enderror" id="braintree_public_key" name="braintree_public_key" value="{{ config('services.braintree.public_key') }}" autocomplete="off">
											</div>
												@error('braintree_public_key')
												<p class="text-danger">{{ $errors->first('braintree_public_key') }}</p>
											@enderror
										</div> <!-- END ACCESS KEY -->
									</div>									
									<div class="col-lg-6 col-md-6 col-sm-12">		
										<div class="input-box">								
											<h6>Braintree Merchant ID</h6>
											<div class="form-group">							    
												<input type="text" class="form-control @error('braintree_merchant_id') is-danger @enderror" id="braintree_merchant_id" name="braintree_merchant_id" value="{{ config('services.braintree.merchant_id') }}" autocomplete="off">
											</div>
												@error('braintree_merchant_id')
												<p class="text-danger">{{ $errors->first('braintree_merchant_id') }}</p>
											@enderror
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">								
											<h6>Braintree Environment</h6> 
											<select id="braintree" name="braintree_env" data-placeholder="Choose Braintree Environment:">			
												<option value="sandbox" @if (config('services.braintree.env')  == 'sandbox') selected @endif>Sandbox</option>
												<option value="production" @if (config('services.braintree.env')  == 'production') selected @endif>Production</option>
											</select>
											@error('braintree_env')
												<p class="text-danger">{{ $errors->first('braintree_env') }}</p>
											@enderror
										</div> 
									</div>
								</div>
	
							</div>
						</div>
					
					</div>
				</div>


				<div class="card border-0">
					<div class="card-header">
						<h3 class="card-title"><span class="text-info">Cryptocurrency </span> {{ __('Payment') }}</h3>
					</div>
					<div class="card-body pb-6">
	
						<div class="card overflow-hidden border-0 special-shadow">							
							<div class="card-body">
	
								<h6 class="fs-12 font-weight-bold mb-4"><img src="{{ URL::asset('/img/payments/coinbase.svg') }}" alt="Coinbase" class="gateway-logo">{{ __('Coinbase Commerce Payment Gateway') }} <span class="text-primary">({{ __('Prepaid Plans') }})</span></h6>
	
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group mb-4">
											<label class="custom-switch">
												<input type="checkbox" name="enable-coinbase" class="custom-switch-input" @if (config('services.coinbase.enable')  == 'on') checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">Use Coinbase Prepaid</span>
											</label>
										</div>
									</div>
								</div>
	
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">		
										<div class="input-box">								
											<h6>Coinbase API Key</h6>
											<div class="form-group">							    
												<input type="text" class="form-control @error('coinbase_api_key') is-danger @enderror" id="coinbase_api_key" name="coinbase_api_key" value="{{ config('services.coinbase.api_key') }}" autocomplete="off">
											</div>
												@error('coinbase_api_key')
												<p class="text-danger">{{ $errors->first('coinbase_api_key') }}</p>
											@enderror
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">		
										<div class="input-box">								
											<h6>Coinbase Webhook Secret</h6>
											<div class="form-group">							    
												<input type="text" class="form-control @error('coinbase_webhook_secret') is-danger @enderror" id="coinbase_webhook_secret" name="coinbase_webhook_secret" value="{{ config('services.coinbase.webhook_secret') }}" autocomplete="off">
											</div>
												@error('coinbase_webhook_secret')
												<p class="text-danger">{{ $errors->first('coinbase_webhook_secret') }}</p>
											@enderror
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">		
										<div class="input-box">								
											<h6>Coinbase Webhook URI</h6>
											<div class="form-group">							    
												<input type="text" class="form-control @error('coinbase_webhook_uri') is-danger @enderror" id="coinbase_webhook_uri" name="coinbase_webhook_uri" value="{{ config('services.coinbase.webhook_uri') }}" autocomplete="off">
											</div>
												@error('coinbase_webhook_uri')
												<p class="text-danger">{{ $errors->first('coinbase_webhook_uri') }}</p>
											@enderror
										</div>
									</div>
								</div>
	
							</div>
						</div>
					
					</div>					
				
				</div>


				<div class="card border-0">
					<div class="card-header">
						<h3 class="card-title"><span class="text-info">{{ __('Offline') }} </span> {{ __('Payment') }}</h3>
					</div>
					<div class="card-body">

						<div class="card overflow-hidden border-0 special-shadow">							
							<div class="card-body">

								<h6 class="fs-12 font-weight-bold mb-4"><i class="fa-solid fa-money-check-dollar-pen fs-16 mr-2"></i>{{ __('Bank Transfer Payment') }} <span class="text-primary">({{ __('All Plans') }})</span></h6>

								<div class="row">
									<div class="col-md-6 col-sm-12 mb-2">
										<div class="form-group">
											<label class="custom-switch">
												<input type="checkbox" name="enable-bank" class="custom-switch-input" @if (config('services.banktransfer.enable')  == 'on') checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">{{ __('Use Bank Transfer Prepaid') }}</span>
											</label>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group mb-4">
											<label class="custom-switch">
												<input type="checkbox" name="enable-bank-subscription" class="custom-switch-input" @if (config('services.banktransfer.subscription')  == 'on') checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">Use Bank Transfer Subscription</span>
											</label>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">								
										<div class="input-box">								
											<h6>{{ __('Customer Payment Intructions') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<textarea class="form-control" name="bank_instructions" id="bank_instructions" rows="6">{{ $bank['bank_instructions'] }}</textarea> 
											@error('bank_instructions')
												<p class="text-danger">{{ $errors->first('bank_instructions') }}</p>
											@enderror
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">								
											<h6>{{ __('Bank Account Requisites') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6> 
											<textarea class="form-control" name="bank_requisites" id="bank_requisites" rows="6">{{ $bank['bank_requisites'] }}</textarea>
											@error('bank_requisites')
												<p class="text-danger">{{ $errors->first('bank_requisites') }}</p>
											@enderror
										</div> 
									</div>										
									
								</div>
	
							</div>
						</div>		
			

						<!-- SAVE CHANGES ACTION BUTTON -->
						<div class="border-0 text-right mb-2 mt-1">
							<a href="{{ route('admin.finance.dashboard') }}" class="btn btn-cancel mr-2">{{ __('Cancel') }}</a>
							<button type="submit" class="btn btn-primary">{{ __('Save') }}</button>							
						</div>
					
					</div>					
				
				</div>		
			
			</form>
				
		</div>
	</div>
	<!-- END ALL PAYMENT CONFIGURATIONS -->	

@endsection
