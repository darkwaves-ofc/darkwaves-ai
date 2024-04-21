@extends('layouts.app')

@section('css')
	<!-- Sweet Alert CSS -->
	<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
	<div class="row mt-24">

		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="card border-0">
				<div class="card-header border-0">
					<div class="mt-4">
						<h3 class="card-title mb-2 fs-20"><i class="fa-solid fa-microchip-ai mr-2 text-primary"></i>{{ __('Templates') }}</h3>
						<h6 class="text-muted">{{ __('Need to create a content? We got you covered! Checkout the list of templates that you can use') }}</h6>
					</div>
				</div>
				<div class="card-body pt-2 favorite-templates-panel">

					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
						  	<button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">{{ __('All') }}</button>
						</li>
						@if ($content)
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="content-tab" data-bs-toggle="tab" data-bs-target="#content" type="button" role="tab" aria-controls="content" aria-selected="false">{{ __('Content') }}</button>
							</li>
						@endif		
						@if ($blog)
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="blog-tab" data-bs-toggle="tab" data-bs-target="#blog" type="button" role="tab" aria-controls="blog" aria-selected="false">{{ __('Blog') }}</button>
							</li>
						@endif	
						@if ($website)
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="website-tab" data-bs-toggle="tab" data-bs-target="#website" type="button" role="tab" aria-controls="website" aria-selected="false">{{ __('Website') }}</button>
							</li>
						@endif						
						@if ($social)
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="social-media-tab" data-bs-toggle="tab" data-bs-target="#social-media" type="button" role="tab" aria-controls="social-media" aria-selected="false">{{ __('Social Media') }}</button>
							</li>
						@endif						
						@if ($email)
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="email-tab" data-bs-toggle="tab" data-bs-target="#email" type="button" role="tab" aria-controls="email" aria-selected="false">{{ __('Email') }}</button>
							</li>
						@endif	
						@if ($video)
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="video-tab" data-bs-toggle="tab" data-bs-target="#video" type="button" role="tab" aria-controls="video" aria-selected="false">{{ __('Video') }}</button>
							</li>
						@endif				
						@if ($other)
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="other-tab" data-bs-toggle="tab" data-bs-target="#other" type="button" role="tab" aria-controls="other" aria-selected="false">{{ __('Other') }}</button>
							</li>
						@endif						
					</ul>

					<div class="tab-content pt-5" id="myTabContent">

						<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
							<div class="row" id="templates-panel">
								@foreach ($favorite_templates as $template)
									<div class="col-lg-3 col-md-6 col-sm-12">
										<div class="template">
											<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
											<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}'">
												<div class="card-body pt-5">
													<div class="template-icon mb-4">
														{!! $template->icon !!}												
													</div>
													<div class="template-title">
														<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
													</div>
													<div class="template-info">
														<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
													</div>
													@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
												</div>
											</div>
										</div>							
									</div>
								@endforeach

								@foreach ($favorite_custom_templates as $template)
									<div class="col-lg-3 col-md-6 col-sm-12">
										<div class="template">
											<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatusCustom(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
											<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}/{{ $template->template_code }}'">
												<div class="card-body pt-5">
													<div class="template-icon mb-4">
														{!! $template->icon !!}												
													</div>
													<div class="template-title">
														<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
													</div>
													<div class="template-info">
														<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
													</div>
													@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
												</div>
											</div>
										</div>							
									</div>
								@endforeach
		
								@foreach ($other_templates as $template)
									<div class="col-lg-3 col-md-6 col-sm-12">
										<div class="template">
											<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
											<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}'">
												<div class="card-body pt-5">
													<div class="template-icon mb-4">
														{!! $template->icon !!}												
													</div>
													<div class="template-title">
														<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
													</div>
													<div class="template-info">
														<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
													</div>
													@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
												</div>
											</div>
										</div>							
									</div>
								@endforeach	
								
								@foreach ($custom_templates as $template)
									<div class="col-lg-3 col-md-6 col-sm-12">
										<div class="template">
											<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatusCustom(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
											<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}/{{ $template->template_code }}'">
												<div class="card-body pt-5">
													<div class="template-icon mb-4">
														{!! $template->icon !!}												
													</div>
													<div class="template-title">
														<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
													</div>
													<div class="template-info">
														<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
													</div>
													@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
												</div>
											</div>
										</div>							
									</div>
								@endforeach	
							</div>	
						</div>

						@if ($content)
							<div class="tab-pane fade" id="content" role="tabpanel" aria-labelledby="content-tab">
								<div class="row" id="templates-panel">
									@foreach ($favorite_templates as $template)
										@if ($template->group == 'text')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif									
									@endforeach

									@foreach ($favorite_custom_templates as $template)
										@if ($template->group == 'text')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatusCustom(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}/{{ $template->template_code }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif
									@endforeach
			
									@foreach ($other_templates as $template)
										@if ($template->group == 'text')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>	
										@endif									
									@endforeach		

									@foreach ($custom_templates as $template)
										@if ($template->group == 'text')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatusCustom(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}/{{ $template->template_code }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif
									@endforeach	
								</div>
							</div>
						@endif						
						
						@if ($blog)
							<div class="tab-pane fade" id="blog" role="tabpanel" aria-labelledby="blog-tab">
								<div class="row" id="templates-panel">
									@foreach ($favorite_templates as $template)
										@if ($template->group == 'blog')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif									
									@endforeach

									@foreach ($favorite_custom_templates as $template)
										@if ($template->group == 'blog')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatusCustom(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}/{{ $template->template_code }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif
									@endforeach
			
									@foreach ($other_templates as $template)
										@if ($template->group == 'blog')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>	
										@endif									
									@endforeach	
									
									@foreach ($custom_templates as $template)
										@if ($template->group == 'blog')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatusCustom(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}/{{ $template->template_code }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif
									@endforeach
								</div>
							</div>
						@endif						
						
						@if ($website)
							<div class="tab-pane fade" id="website" role="tabpanel" aria-labelledby="website-tab">
								<div class="row" id="templates-panel">
									@foreach ($favorite_templates as $template)
										@if ($template->group == 'web')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif									
									@endforeach

									@foreach ($favorite_custom_templates as $template)
										@if ($template->group == 'web')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatusCustom(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}/{{ $template->template_code }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif
									@endforeach
			
									@foreach ($other_templates as $template)
										@if ($template->group == 'web')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>	
										@endif									
									@endforeach		

									@foreach ($custom_templates as $template)
										@if ($template->group == 'web')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatusCustom(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}/{{ $template->template_code }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif
									@endforeach
								</div>
							</div>
						@endif						
						
						@if ($social)
							<div class="tab-pane fade" id="social-media" role="tabpanel" aria-labelledby="social-media-tab">
								<div class="row" id="templates-panel">
									@foreach ($favorite_templates as $template)
										@if ($template->group == 'social')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif									
									@endforeach

									@foreach ($favorite_custom_templates as $template)
										@if ($template->group == 'social')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatusCustom(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}/{{ $template->template_code }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif
									@endforeach
			
									@foreach ($other_templates as $template)
										@if ($template->group == 'social')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>	
										@endif									
									@endforeach	
									
									@foreach ($custom_templates as $template)
										@if ($template->group == 'social')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatusCustom(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}/{{ $template->template_code }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif
									@endforeach
								</div>
							</div>
						@endif						
						
						@if ($email)
							<div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
								<div class="row" id="templates-panel">
									@foreach ($favorite_templates as $template)
										@if ($template->group == 'email')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif									
									@endforeach

									@foreach ($favorite_custom_templates as $template)
										@if ($template->group == 'email')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatusCustom(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}/{{ $template->template_code }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif
									@endforeach
			
									@foreach ($other_templates as $template)
										@if ($template->group == 'email')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>	
										@endif									
									@endforeach		

									@foreach ($custom_templates as $template)
										@if ($template->group == 'email')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatusCustom(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}/{{ $template->template_code }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif
									@endforeach
								</div>
							</div>
						@endif						
						
						@if ($video)
							<div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
								<div class="row" id="templates-panel">
									@foreach ($favorite_templates as $template)
										@if ($template->group == 'video')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif									
									@endforeach

									@foreach ($favorite_custom_templates as $template)
										@if ($template->group == 'video')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatusCustom(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}/{{ $template->template_code }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif
									@endforeach
			
									@foreach ($other_templates as $template)
										@if ($template->group == 'video')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>	
										@endif									
									@endforeach	
									
									@foreach ($custom_templates as $template)
										@if ($template->group == 'video')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatusCustom(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}/{{ $template->template_code }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif
									@endforeach
								</div>
							</div>
						@endif
						
						@if ($other)
							<div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
								<div class="row" id="templates-panel">
									@foreach ($favorite_templates as $template)
										@if ($template->group == 'other')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif									
									@endforeach

									@foreach ($favorite_custom_templates as $template)
										@if ($template->group == 'other')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatusCustom(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}/{{ $template->template_code }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif
									@endforeach
			
									@foreach ($other_templates as $template)
										@if ($template->group == 'other')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>	
										@endif									
									@endforeach		

									@foreach ($custom_templates as $template)
										@if ($template->group == 'other')
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatusCustom(this.id)"><i id="{{ $template->template_code }}-icon" class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
													<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" id="{{ $template->template_code }}-card" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}/{{ $template->template_code }}'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																{!! $template->icon !!}												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font">{{ __($template->name) }}</h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2">{{ __($template->description) }}</p>
															</div>
															@if($template->professional) <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i>{{ __('Pro') }}</p> @endif
														</div>
													</div>
												</div>							
											</div>
										@endif
									@endforeach
								</div>
							</div>
						@endif						

					</div>
									
				</div>
			</div>
		</div>

	</div>
@endsection

@section('js')
	<script src="{{URL::asset('plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
	<script>
		function favoriteStatus(id) {

			let icon, card;
			let formData = new FormData();
			formData.append("id", id);

			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				method: 'post',
				url: 'dashboard/favorite',
				data: formData,
				processData: false,
				contentType: false,
				success: function (data) {

					if (data['status'] == 'success') {
						if (data['set']) {
							Swal.fire('{{ __('Template Removed from Favorites') }}', '{{ __('Selected template has been successfully removed from favorites') }}', 'success');
							icon = document.getElementById(id + '-icon');
							icon.classList.remove("fa-solid");
							icon.classList.remove("fa-stars");
							icon.classList.add("fa-regular");
							icon.classList.add("fa-star");

							card = document.getElementById(id + '-card');
							if(card.classList.contains("professional")) {
								// do nothing
							} else {
								card.classList.remove("favorite");
								card.classList.add('border-0');
							}							
						} else {
							Swal.fire('{{ __('Template Added to Favorites') }}', '{{ __('Selected template has been successfully added to favorites') }}', 'success');
							icon = document.getElementById(id + '-icon');
							icon.classList.remove("fa-regular");
							icon.classList.remove("fa-star");
							icon.classList.add("fa-solid");
							icon.classList.add("fa-stars");

							card = document.getElementById(id + '-card');
							if(card.classList.contains("professional")) {
								// do nothing
							} else {
								card.classList.add('favorite');
								card.classList.remove('border-0');
							}
						}
														
					} else {
						Swal.fire('{{ __('Favorite Setting Issue') }}', '{{ __('There as an issue with setting favorite status for this template') }}', 'warning');
					}      
				},
				error: function(data) {
					Swal.fire('Oops...','Something went wrong!', 'error')
				}
			})
		}

		function favoriteStatusCustom(id) {

			let icon, card;
			let formData = new FormData();
			formData.append("id", id);

			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				method: 'post',
				url: 'templates/favoritecustom',
				data: formData,
				processData: false,
				contentType: false,
				success: function (data) {

					if (data['status'] == 'success') {
						if (data['set']) {
							Swal.fire('{{ __('Template Removed from Favorites') }}', '{{ __('Selected template has been successfully removed from favorites') }}', 'success');
							icon = document.getElementById(id + '-icon');
							icon.classList.remove("fa-solid");
							icon.classList.remove("fa-stars");
							icon.classList.add("fa-regular");
							icon.classList.add("fa-star");

							card = document.getElementById(id + '-card');
							if(card.classList.contains("professional")) {
								// do nothing
							} else {
								card.classList.remove("favorite");
								card.classList.add('border-0');
							}							
						} else {
							Swal.fire('{{ __('Template Added to Favorites') }}', '{{ __('Selected template has been successfully added to favorites') }}', 'success');
							icon = document.getElementById(id + '-icon');
							icon.classList.remove("fa-regular");
							icon.classList.remove("fa-star");
							icon.classList.add("fa-solid");
							icon.classList.add("fa-stars");

							card = document.getElementById(id + '-card');
							if(card.classList.contains("professional")) {
								// do nothing
							} else {
								card.classList.add('favorite');
								card.classList.remove('border-0');
							}
						}
														
					} else {
						Swal.fire('{{ __('Favorite Setting Issue') }}', '{{ __('There as an issue with setting favorite status for this template') }}', 'warning');
					}      
				},
				error: function(data) {
					Swal.fire('Oops...','Something went wrong!', 'error')
				}
			})
		}
	</script>
@endsection
