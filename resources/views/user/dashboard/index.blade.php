@extends('layouts.app')

@section('css')
	<!-- Sweet Alert CSS -->
	<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
@endsection

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0">{{ __('Dashboard') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class="fa-solid fa-chart-tree-map mr-2 fs-12"></i>{{ __('AI Panel') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}"> {{ __('Dashboard') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')
	<!-- USER PROFILE PAGE -->
	<div class="row">

		<div class="col-xl-4 col-lg-4 col-md-12">
			<div class="card border-0" id="dashboard-background">
				<div class="card-body text-center">
					<div class="row no-gutters">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="widget-user-image overflow-hidden mx-auto mt-3 mb-4"><img alt="User Avatar" class="rounded-circle" src="@if(auth()->user()->profile_photo_path){{ asset(auth()->user()->profile_photo_path) }} @else {{ URL::asset('img/users/avatar.jpg') }} @endif"></div>
						<h4 class="mb-2 mt-2 font-weight-800 fs-16 text-primary text-shadow">{{ auth()->user()->name }}</h4>
						<h6 class="text-white fs-12 text-shadow mb-3">{{ auth()->user()->job_role }}</h6>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						@if(is_null(auth()->user()->plan_id))
							<div class="d-flex w-100">
								<div class="flex w-100">
									<h4 class="mb-3 mt-4 font-weight-800 text-primary text-shadow fs-16">{{ number_format(auth()->user()->available_words + auth()->user()->available_words_prepaid) }} / {{ number_format(auth()->user()->total_words) }}</h4>
									<h6 class="text-white fs-12 mb-4 text-shadow">{{ __('Words Left') }}</h6>
								</div>
								<div class="flex w-100">
									<h4 class="mb-3 mt-4 font-weight-800 text-primary text-shadow fs-16">{{ number_format(auth()->user()->available_images + auth()->user()->available_images_prepaid) }} / {{ number_format(auth()->user()->total_images) }}</h4>
									<h6 class="text-white fs-12 mb-4 text-shadow">{{ __('Images Left') }}</h6>
								</div>
							</div>
							<span class=" fs-10 btn btn-cancel-black"><i class="fa-sharp fa-solid fa-gifts text-yellow mr-2"></i>{{ __('Free Trial') }}</span><br>
							<a href="{{ route('user.plans') }}" class="btn btn-primary mt-3"><i class="fa-solid fa-hand-holding-box mr-2"></i>{{ __('Upgrade Now') }}</a>
						@else
							<div class="d-flex w-100">
								<div class="flex w-100">
									<h4 class="mb-3 mt-7 font-weight-800 text-primary text-shadow fs-16">{{ number_format(auth()->user()->available_words + auth()->user()->available_words_prepaid) }} / {{ number_format(auth()->user()->total_words) }}</h4>
									<h6 class="text-white fs-12 mb-4 text-shadow">{{ __('Words Left') }}</h6>
								</div>
								<div class="flex w-100">
									<h4 class="mb-3 mt-7 font-weight-800 text-primary text-shadow fs-16">{{ number_format(auth()->user()->available_images + auth()->user()->available_images_prepaid) }} / {{ number_format(auth()->user()->total_images) }}</h4>
									<h6 class="text-white fs-12 mb-4 text-shadow">{{ __('Images Left') }}</h6>
								</div>
							</div>
							<span class=" fs-10 btn btn-primary"><i class="fa-sharp fa-solid fa-crown text-yellow mr-2"></i>{{ $subscription }} {{ __('Plan') }}</span><br>
						@endif
					</div>
				</div>
				</div>
			</div>
		</div>

		<div class="col-xl-8 col-lg-8 col-md-12">
			<div class="row">

				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="row">
						<div class="col-lg-6 col-md-12 col-sm-12">
							<div class="card overflow-hidden border-0">
								<div class="card-body d-flex">
									<div class="usage-info w-100">
										<p class=" mb-3 fs-12 font-weight-bold">{{ __('Documents Created') }} <span class="text-muted">({{ __('Current Month') }})</span></p>
										<h2 class="mb-2 number-font fs-20">{{ number_format($data['contents']) }} <span class="text-muted fs-18">{{ __('contents') }}</span></h2>
									</div>
									<div class="usage-icon w-100 text-right">
										<i class="fa-solid fa-folder-grid"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12">
							<div class="card overflow-hidden border-0">
								<div class="card-body d-flex">
									<div class="usage-info w-100">
										<p class=" mb-3 fs-12 font-weight-bold">{{ __('Words Generated') }} <span class="text-muted">({{ __('Current Month') }})</span></p>
										<h2 class="mb-2 number-font fs-20">{{ number_format($data['words']) }} <span class="text-muted fs-18">{{ __('words') }}</span></h2>
									</div>
									<div class="usage-icon w-100 text-right">
										<i class="fa-solid fa-scroll-old"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12">
							<div class="card overflow-hidden border-0">
								<div class="card-body d-flex">
									<div class="usage-info w-100">
										<p class=" mb-3 fs-12 font-weight-bold">{{ __('Images Created') }} <span class="text-muted">({{ __('Current Month') }})</span></p>
										<h2 class="mb-2 number-font fs-20">{{ number_format($data['images']) }} <span class="text-muted fs-18">{{ __('images') }}</span></h2>
									</div>
									<div class="usage-icon w-100 text-right">
										<i class="fa-solid fa-image-landscape"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12">
							<div class="card overflow-hidden border-0">
								<div class="card-body d-flex">
									<div class="usage-info w-100">
										<p class=" mb-3 fs-12 font-weight-bold">{{ __('Templates Used') }} <span class="text-muted">({{ __('Current Month') }})</span></p>
										<h2 class="mb-2 number-font fs-20">{{ $data['templates_used'] }} / {{ $templates_total }}</h2>
									</div>
									<div class="usage-icon w-100 text-right">
										<i class="fa-solid fa-cloud-word"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-12 col-md-12 col-xm-12 mt-5">
			<div class="card border-0">
				<div class="card-header border-0">
					<div class="mt-3">
						<h3 class="card-title mb-2"><i class="fa-solid fa-stars mr-2 text-yellow"></i>{{ __('Favorite Templates') }}</h3>
						<h6 class="text-muted">{{ __('Always have your top favorite templates handy whenever you need them') }}</h6>
					</div>
				</div>
				<div class="card-body pt-2 favorite-templates-panel">

					@if ($template_quantity)
						<div class="row" id="templates-panel">

							@foreach ($templates as $template)
								<div class="col-lg-3 col-md-6 col-sm-12" id="{{ $template->template_code }}">
									<div class="template">
										<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatus(this.id)"><i class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
										<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}'">
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
								<div class="col-lg-3 col-md-6 col-sm-12" id="{{ $template->template_code }}">
									<div class="template">
										<a id="{{ $template->template_code }}" @if($template->favorite) data-tippy-content="{{ __('Remove from favorite') }}" @else data-tippy-content="{{ __('Select as favorite') }}" @endif onclick="favoriteStatusCustom(this.id)"><i class="@if($template->favorite) fa-solid fa-stars @else fa-regular fa-star @endif star"></i></a>
										<div class="card @if($template->professional) professional @elseif($template->favorite) favorite @else border-0 @endif" onclick="window.location.href='{{ url('user/templates') }}/{{ $template->slug }}/{{ $template->template_code }}'">
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
					@else
						<div class="row text-center mt-8">
							<div class="col-sm-12">
								<h6 class="text-muted">{{ __('To add templates as your favorite ones, simply click on the start icon on desired') }} <a href="{{ route('user.templates') }}" class="text-primary internal-special-links font-weight-bold">{{ __('templates') }}</a></h6>
							</div>
						</div>
					@endif
					
				</div>
			</div>
		</div>

		<div class="col-lg-12 col-md-12 col-xm-12 mt-5">
			<div class="card border-0">
				<div class="card-header border-0">
					<div class="mt-3">
						<h3 class="card-title mb-2"><i class="fa-solid fa-scroll-old mr-2 text-info"></i>{{ __('Word Generation') }} <span class="text-muted">({{ __('Current Month') }})</span></h3>
						<h6 class="text-muted">{{ __('Monitor your daily word generation closely') }}</h6>
					</div>
				</div>
				<div class="card-body pt-2">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="">
								<canvas id="chart-monthly-usage" class="h-330"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- END USER PROFILE PAGE -->
@endsection

@section('js')
	<!-- Chart JS -->
	<script src="{{URL::asset('plugins/chart/chart.min.js')}}"></script>
	<script src="{{URL::asset('plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
	<script>
		$(function() {
	
			'use strict';

			// Total New User Analysis Chart
			var userMonthlyData = JSON.parse(`<?php echo $chart_data['user_monthly_usage']; ?>`);
			var userMonthlyDataset = Object.values(userMonthlyData);
			var ctx = document.getElementById('chart-monthly-usage');
			let delayed1;

			new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
					datasets: [{
						label: '{{ __('Words Generated') }} ',
						data: userMonthlyDataset,
						backgroundColor: '#007bff',
						borderWidth: 1,
						borderRadius: 20,
						barPercentage: 0.7,
						fill: true
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false,
						labels: {
							display: false
						}
					},
					responsive: true,
					animation: {
						onComplete: () => {
							delayed1 = true;
						},
						delay: (context) => {
							let delay = 0;
							if (context.type === 'data' && context.mode === 'default' && !delayed1) {
								delay = context.dataIndex * 50 + context.datasetIndex * 5;
							}
							return delay;
						},
					},
					scales: {
						y: {
							stacked: true,
							ticks: {
								beginAtZero: true,
								font: {
									size: 10
								},
								stepSize: 50000,
							},
							grid: {
								color: '#ebecf1',
								borderDash: [3, 2]                            
							}
						},
						x: {
							stacked: true,
							ticks: {
								font: {
									size: 10
								}
							},
							grid: {
								color: '#ebecf1',
								borderDash: [3, 2]                            
							}
						}
					},
					plugins: {
						tooltip: {
							cornerRadius: 10,
							xPadding: 10,
							yPadding: 10,
							backgroundColor: '#000000',
							titleColor: '#FF9D00',
							yAlign: 'bottom',
							xAlign: 'center',
						},
						legend: {
							position: 'bottom',
							labels: {
								boxWidth: 10,
								font: {
									size: 10
								}
							}
						}
					}
				}
			});

		});

		function favoriteStatus(id) {

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
							document.getElementById(id).style.display = 'none';	
						} else {
							Swal.fire('{{ __('Template Added to Favorites') }}', '{{ __('Selected template has been successfully added to favorites') }}', 'success');
						}
														
					} else {
						Swal.fire('{{ __('Favorite Setting Issue') }}', '{{ __('There as an issue with setting favorite status for this template') }}', 'warning');
					}      
				},
				error: function(data) {
					Swal.fire('Oops...','Something went wrong!', 'error')
				}
			})

			return false;
		}

		function favoriteStatusCustom(id) {

			let formData = new FormData();
			formData.append("id", id);

			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				method: 'post',
				url: 'dashboard/favoritecustom',
				data: formData,
				processData: false,
				contentType: false,
				success: function (data) {

					if (data['status'] == 'success') {
						if (data['set']) {
							Swal.fire('{{ __('Template Removed from Favorites') }}', '{{ __('Selected template has been successfully removed from favorites') }}', 'success');
							document.getElementById(id).style.display = 'none';	
						} else {
							Swal.fire('{{ __('Template Added to Favorites') }}', '{{ __('Selected template has been successfully added to favorites') }}', 'success');
						}
														
					} else {
						Swal.fire('{{ __('Favorite Setting Issue') }}', '{{ __('There as an issue with setting favorite status for this template') }}', 'warning');
					}      
				},
				error: function(data) {
					Swal.fire('Oops...','Something went wrong!', 'error')
				}
			})

			return false;
		}

	</script>
@endsection
