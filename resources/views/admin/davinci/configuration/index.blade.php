@extends('layouts.app')

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0">{{ __('Davinci Settings') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-microchip-ai mr-2 fs-12"></i>{{ __('Admin') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.davinci.dashboard') }}"> {{ __('Davinci Management') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="#"> {{ __('Davinci Settings') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection
@section('content')					
	<div class="row">
		<div class="col-lg-8 col-md-12 col-xm-12">
			<div class="card border-0">
				<div class="card-header">
					<h3 class="card-title"><i class="fa-sharp fa-solid fa-sliders mr-2 text-primary"></i>{{ __('Setup Davinci Settings') }}</h3>
				</div>
				<div class="card-body">
				
					<form action="{{ route('admin.davinci.configs.store') }}" method="POST" enctype="multipart/form-data">
						@csrf

						<div class="row">							

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="input-box">	
									<h6>{{ __('Default OpenAI Model') }} <span class="text-muted">({{ __('For Admin Group') }})</span><span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
										  <select id="default-model-admin" name="default-model-admin" data-placeholder="{{ __('Select Default Model') }}:">			
										<option value="text-ada-001" @if ( config('settings.default_model_admin')  == 'text-ada-001') selected @endif>{{ __('Ada') }} ({{ __('Cheapest & Fastest') }})</option>
										<option value="text-babbage-001" @if ( config('settings.default_model_admin')  == 'text-babbage-001') selected @endif>{{ __('Babbage') }}</option>
										<option value="text-curie-001" @if ( config('settings.default_model_admin')  == 'text-curie-001') selected @endif>{{ __('Curie') }}</option>
										<option value="text-davinci-003" @if ( config('settings.default_model_admin')  == 'text-davinci-003') selected @endif>{{ __('Davinci') }} ({{ __('Most Expensive & Most Capable') }})</option>
										<option value="gpt-3.5-turbo" @if ( config('settings.default_model_admin')  == 'gpt-3.5-turbo') selected @endif>{{ __('ChatGPT') }} ({{ __('New') }})</option>
									</select>
								</div>								
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="input-box">	
									<h6>{{ __('Default Language') }} <span class="text-muted">({{ __('For All Groups') }})</span><span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
										  <select id="language" name="language" data-placeholder="{{ __('Select Default Language') }}:">	
											@foreach ($languages as $language)
												<option value="{{ $language->language_code }}" data-img="{{ URL::asset($language->language_flag) }}" @if (config('settings.default_language') == $language->language_code) selected @endif> {{ $language->language }}</option>
											@endforeach
									</select>
								</div>								
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="input-box">
									<h6>{{ __('Tone of Voice Default State') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<select id="tone" name="tone" data-placeholder="{{ __('Select tone of voice') }}">
										<option value="funny" @if (config('settings.tone_default_state') == 'funny') selected @endif>{{ __('Funny') }}</option>
										<option value="casual" @if (config('settings.tone_default_state') == 'casual') selected @endif> {{ __('Casual') }}</option>																															
										<option value="excited" @if (config('settings.tone_default_state') == 'excited') selected @endif> {{ __('Excited') }}</option>																															
										<option value="professional" @if (config('settings.tone_default_state') == 'professional') selected @endif> {{ __('Professional') }}</option>																															
										<option value="witty" @if (config('settings.tone_default_state') == 'witty') selected @endif> {{ __('Witty') }}</option>																															
										<option value="sarcastic" @if (config('settings.tone_default_state') == 'sarcastic') selected @endif> {{ __('Sarcastic') }}</option>																															
										<option value="feminine" @if (config('settings.tone_default_state') == 'feminine') selected @endif> {{ __('Feminine') }}</option>																															
										<option value="masculine" @if (config('settings.tone_default_state') == 'masculine') selected @endif> {{ __('Masculine') }}</option>																															
										<option value="bold" @if (config('settings.tone_default_state') == 'bold') selected @endif> {{ __('Bold') }}</option>																															
										<option value="dramatic" @if (config('settings.tone_default_state') == 'dramatic') selected @endif> {{ __('Dramatic') }}</option>																															
										<option value="gumpy" @if (config('settings.tone_default_state') == 'gumpy') selected @endif> {{ __('Gumpy') }}</option>																															
										<option value="secretive" @if (config('settings.tone_default_state') == 'secretive') selected @endif> {{ __('Secretive') }}</option>																															
									</select>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="input-box">
									<h6>{{ __('Creativity Default State') }} <span class="text-muted">({{ __('For All Groups') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<select id="creativity" name="creativity" data-placeholder="{{ __('Select creativity state') }}">
										<option value="low" @if (config('settings.creativity_default_state') == 'low') selected @endif>{{ __('Low') }}</option>
										<option value="average" @if (config('settings.creativity_default_state') == 'average') selected @endif> {{ __('Average') }}</option>																															
										<option value="high" @if (config('settings.creativity_default_state') == 'high') selected @endif> {{ __('High') }}</option>																																																													
									</select>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="input-box">
									<h6>{{ __('Templates Access') }} <span class="text-muted">({{ __('For Admin Group') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
									<select id="templates-admin" name="templates-admin" data-placeholder="{{ __('Set Templates Access') }}">
										<option value="all" @if (config('settings.templates_access_admin') == 'all') selected @endif>{{ __('All Templates') }}</option>
										<option value="professional" @if (config('settings.templates_access_admin') == 'professional') selected @endif> {{ __('Only Professional Templates') }}</option>																															
										<option value="standard" @if (config('settings.templates_access_admin') == 'standard') selected @endif> {{ __('Only Standard Templates') }}</option>																																																													
									</select>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="input-box">								
									<h6>{{ __('Maximum Input Length for Content Text') }} <span class="text-muted">({{ __('In Characters') }}) ({{ __('For All Groups') }}) <span class="text-required"><i class="fa-solid fa-asterisk"></i></span> </span></h6>
									<div class="form-group">							    
										<input type="number" class="form-control @error('maximum-input-length') is-danger @enderror" id="maximum-input-length" name="maximum-input-length" placeholder="Ex: 1" value="{{ config('settings.input_length') }}" required>
										@error('maximum-input-length')
											<p class="text-danger">{{ $errors->first('maximum-input-length') }}</p>
										@enderror
									</div> 
								</div>							
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="input-box">	
									<h6>{{ __('Maximum Result Length') }} <span class="text-muted">({{ __('In Words') }}) ({{ __('For Admin Group') }})</span><span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('OpenAI has a hard limit based on Token limits for each model. Refer to OpenAI documentation to learn more. As a recommended by OpenAI, max result length is capped at 1500 words.') }}"></i></h6>
									<input type="number" class="form-control @error('max-results-admin') is-danger @enderror" id="max-results-admin" name="max-results-admin" placeholder="Ex: 10" value="{{ config('settings.max_results_limit_admin') }}" required>
									@error('max-results-admin')
										<p class="text-danger">{{ $errors->first('max-results-admin') }}</p>
									@enderror
								</div>								
							</div>
						</div>


						<div class="card border-0 special-shadow mb-7">							
							<div class="card-body">

								<h6 class="fs-12 font-weight-bold mb-4"><i class="fa fa-gift text-info fs-14 mr-2"></i>{{ __('Free Trial Options') }} <span class="text-muted">({{ __('User Group Only') }})</span></h6>

								<div class="row">			
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">	
											<h6>{{ __('Default OpenAI Model') }} <span class="text-muted">({{ __('For User Group') }})</span><span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="default-model-user" name="default-model-user" data-placeholder="{{ __('Select Default Model') }}:">			
												<option value="text-ada-001" @if ( config('settings.default_model_user')  == 'text-ada-001') selected @endif>{{ __('Ada') }} ({{ __('Cheapest & Fastest') }})</option>
												<option value="text-babbage-001" @if ( config('settings.default_model_user')  == 'text-babbage-001') selected @endif>{{ __('Babbage') }}</option>
												<option value="text-curie-001" @if ( config('settings.default_model_user')  == 'text-curie-001') selected @endif>{{ __('Curie') }}</option>
												<option value="text-davinci-003" @if ( config('settings.default_model_user')  == 'text-davinci-003') selected @endif>{{ __('Davinci') }} ({{ __('Most Expensive & Most Capable') }})</option>
												<option value="gpt-3.5-turbo" @if ( config('settings.default_model_user')  == 'gpt-3.5-turbo') selected @endif>{{ __('ChatGPT') }} ({{ __('New') }})</option>
											</select>
										</div>								
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('Templates Access') }} <span class="text-muted">({{ __('For User Group') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="templates-user" name="templates-user" data-placeholder="{{ __('Set Templates Access') }}">
												<option value="all" @if (config('settings.templates_access_user') == 'all') selected @endif>{{ __('All Templates') }}</option>
												<option value="professional" @if (config('settings.templates_access_user') == 'professional') selected @endif> {{ __('Only Professional Templates') }}</option>																															
												<option value="standard" @if (config('settings.templates_access_user') == 'standard') selected @endif> {{ __('Only Standard Templates') }}</option>																																																													
											</select>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">
											<h6>{{ __('AI Image Creation') }} <span class="text-muted">({{ __('For User Group') }})</span> <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<select id="image-feature-user" name="image-feature-user" data-placeholder="{{ __('Set AI Image Creation Permission') }}">
												<option value='allow' @if (config('settings.image_feature_user') == 'allow') selected @endif>{{ __('Allow') }}</option>
												<option value='deny' @if (config('settings.image_feature_user') == 'deny') selected @endif> {{ __('Deny') }}</option>																															
											</select>
										</div>
									</div>								
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">	
											<h6>{{ __('Maximum Result Length') }} <span class="text-muted">({{ __('In Words') }})</span><span class="text-required"><i class="fa-solid fa-asterisk"></i></span><i class="ml-3 text-dark fs-13 fa-solid fa-circle-info" data-tippy-content="{{ __('OpenAI has a hard limit based on Token limits for each model. Refer to OpenAI documentation to learn more. As a recommended by OpenAI, max result length is capped at 1500 words.') }}"></i></h6>
											<input type="number" class="form-control @error('max-results-user') is-danger @enderror" id="max-results-user" name="max-results-user" placeholder="Ex: 10" value="{{ config('settings.max_results_limit_user') }}" required>
											@error('max-results-user')
												<p class="text-danger">{{ $errors->first('max-results-user') }}</p>
											@enderror
										</div>								
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">								
											<h6>{{ __('Quantity of Words as a Gift upon Registration') }} <span class="text-muted">({{ __('One Time') }})<span class="text-required"><i class="fa-solid fa-asterisk"></i></span> </span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control @error('free-tier-words') is-danger @enderror" id="free-tier-words" name="free-tier-words" placeholder="Ex: 1000" value="{{ config('settings.free_tier_words') }}" required>
												@error('free-tier-words')
													<p class="text-danger">{{ $errors->first('free-tier-words') }}</p>
												@enderror
											</div> 
										</div>							
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">								
											<h6>{{ __('Quantity of Images as a Gift upon Registration') }} <span class="text-muted">({{ __('One Time') }})<span class="text-required"><i class="fa-solid fa-asterisk"></i></span> </span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control @error('free-tier-images') is-danger @enderror" id="free-tier-images" name="free-tier-images" placeholder="Ex: 1000" value="{{ config('settings.free_tier_images') }}" required>
												@error('free-tier-images')
													<p class="text-danger">{{ $errors->first('free-tier-images') }}</p>
												@enderror
											</div> 
										</div>							
									</div>
									
								</div>	
							</div>
						</div>


						<div class="card border-0 special-shadow">							
							<div class="card-body">

								<h6 class="fs-12 font-weight-bold mb-4"><img src="{{URL::asset('img/csp/openai-sm.png')}}" class="fw-2 mr-2" alt="">{{ __('OpenAI') }}</h6>

								<div class="row">
									<div class="col-lg-12 col-md-6 col-sm-12">								
										<!-- ACCESS KEY -->
										<div class="input-box">								
											<h6>{{ __('OpenAI Secret Key') }} <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control @error('secret-key') is-danger @enderror" id="secret-key" name="secret-key" value="{{ config('services.openai.key') }}" autocomplete="off">
												@error('secret-key')
													<p class="text-danger">{{ $errors->first('secret-key') }}</p>
												@enderror
											</div> 
										</div> <!-- END ACCESS KEY -->
									</div>							
								</div>
	
							</div>
						</div>			

						<!-- SAVE CHANGES ACTION BUTTON -->
						<div class="border-0 text-right mb-2 mt-1">
							<a href="{{ route('admin.davinci.dashboard') }}" class="btn btn-cancel mr-2">{{ __('Cancel') }}</a>
							<button type="submit" class="btn btn-primary">{{ __('Save') }}</button>							
						</div>				

					</form>
				</div>
			</div>
		</div>
	</div>
@endsection