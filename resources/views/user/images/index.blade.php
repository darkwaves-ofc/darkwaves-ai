@extends('layouts.app')
@section('css')
	<!-- Data Table CSS -->
	<link href="{{URL::asset('plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
	<!-- Sweet Alert CSS -->
	<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
	<link href="{{URL::asset('plugins/photoviewer/photoviewer.min.css')}}" rel="stylesheet" />
@endsection

@section('content')

<form id="openai-form" action="" method="post" enctype="multipart/form-data" class="mt-24">		
	@csrf
	<div class="row">	
		<div class="col-lg-4 col-md-12 col-sm-12">
			<div class="card border-0" id="template-input">
				<div class="card-body p-5 pb-0">

					<div class="row">
						<div class="template-view">
							<div class="template-icon mb-2 d-flex">
								<div>
									<i class="fa-solid fa-image green-icon"></i>
								</div>
								<div>
									<h6 class="mt-1 ml-3 fs-16 number-font">{{ __('AI Image Generator') }}</h6>
								</div>									
							</div>								
							<div class="template-info">
								<p class="fs-12 text-muted mb-4">{{ __('Turn any of your text into sophisticated image') }}</p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="text-left mb-4" id="balance-status">
								<span class="fs-11 text-muted pl-3"><i class="fa-sharp fa-solid fa-bolt-lightning mr-2 text-primary"></i>{{ __('Your Balance is') }} <span class="font-weight-semibold" id="balance-number">{{ number_format(auth()->user()->available_images + auth()->user()->available_images_prepaid) }}</span> {{ __('Images') }}</span>
							</div>							
						</div>
						<div class="col-sm-12">								
							<div class="input-box">	
								<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Image Name') }}  <span class="text-muted">({{ __('optional') }})</span></h6>									
								<div class="form-group">						    
									<input type="text" class="form-control @error('name') is-danger @enderror" id="name" name="name" value="New Image">
									@error('name')
										<p class="text-danger">{{ $errors->first('name') }}</p>
									@enderror
								</div> 
							</div> 
						</div>

						<div class="col-sm-12">								
							<div class="input-box">	
								<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Image Description') }}  <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>									
								<div class="form-group">						    
									<textarea rows="3" cols="50" type="text" class="form-control @error('title') is-danger @enderror" id="title" name="title" placeholder="e.g. Rocket getting to the moon" required></textarea>
									@error('title')
										<p class="text-danger">{{ $errors->first('title') }}</p>
									@enderror
								</div> 
							</div> 
						</div>
						
						<div class="col-lg-6 col-md-12 col-sm-12">
							<div id="form-group">
								<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Image Resolution') }} <i class="ml-1 text-dark fs-12 fa-solid fa-circle-info" data-tippy-content="{{ __('The image resolutoin of the generated images') }}"></i></h6>
								<select id="resolution" name="resolution" data-placeholder="{{ __('Set image resolution') }}">
									<option value='256x256' selected>[256x256] {{ __('Small Image') }}</option>
									<option value='512x512'>[512x512] {{ __('Medium Image') }}</option>																															
									<option value='1024x1024'>[1024x1024] {{ __('Large Image') }}</option>																																																													
								</select>
							</div>
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12">
							<div id="form-group">
								<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Number of Images') }} <i class="ml-1 text-dark fs-12 fa-solid fa-circle-info" data-tippy-content="{{ __('The number of images to generate') }}"></i></h6>
								<select id="max-results" name="max_results" data-placeholder="{{ __('Set max number of results') }}">
									<option value=1 selected>1</option>
									<option value=2>2</option>																															
									<option value=3>3</option>																															
									<option value=4>4</option>																															
									<option value=5>5</option>																															
								</select>
							</div>
						</div>
					</div>						

					<div class="card-footer border-0 text-center p-0">
						<div class="w-100 pt-2 pb-2">
							<div class="text-center">
								<span id="processing" class="processing-image"><img src="{{ URL::asset('/img/svgs/upgrade.svg') }}" alt=""></span>
								<button type="submit" name="submit" class="btn btn-primary  pl-7 pr-7 fs-11 pt-2 pb-2" id="generate">{{ __('Generate Image') }}</button>
							</div>
						</div>							
					</div>	
			
				</div>
			</div>			
		</div>

		<div class="col-lg-8 col-md-12 col-sm-12">
			<div class="card border-0">
				<div class="card-body">
					<div class="d-flex">
						<div class="w-100">
							<h3 class="card-title fs-16 mt-3 mb-4"><i class="fa-solid fa-image-landscape mr-4 text-success"></i>{{ __("Generated Images") }}</h3>							
						</div>	
									
					</div>
					<!-- SET DATATABLE -->
					<table id='resultsTable' class='table' width='100%'>
						<thead>
							<tr>
								<th width="20%">{{ __('Image') }}</th> 
								<th width="5%">{{ __('Resolution') }}</th>
								<th width="5%">{{ __('Created On') }}</th> 								           								    						           	
								<th width="5%">{{ __('Actions') }}</th>
							</tr>
						</thead>
				</table> <!-- END SET DATATABLE -->	
				</div>
			</div>
		</div>
	</div>
</form>
@endsection

@section('js')
<script src="{{URL::asset('plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
<script src="{{URL::asset('plugins/character-count/jquery-simple-txt-counter.min.js')}}"></script>
<script src="{{URL::asset('plugins/datatable/datatables.min.js')}}"></script>
<script src="{{URL::asset('plugins/photoviewer/photoviewer.min.js')}}"></script>
<script type="text/javascript">
	$(function () {

		"use strict";

		let table = $('#resultsTable').DataTable({
				"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
				responsive: true,
				colReorder: true,	
				"order": [[ 3, "desc" ]],	
				language: {
					"emptyTable": "<div><img id='no-results-img' src='{{ URL::asset('img/files/no-result.png') }}'><br>{{ __('Looks like you do not have any images created yet') }}</div>",
					search: "<i class='fa fa-search search-icon'></i>",
					lengthMenu: '_MENU_ ',
					paginate : {
						first    : '<i class="fa fa-angle-double-left"></i>',
						last     : '<i class="fa fa-angle-double-right"></i>',
						previous : '<i class="fa fa-angle-left"></i>',
						next     : '<i class="fa fa-angle-right"></i>'
					}
				},
				pagingType : 'full_numbers',
				processing: true,
				serverSide: true,
				ajax: "{{ route('user.images') }}",
				columns: [
					{
						data: 'custom-image',
						name: 'custom-image',
						orderable: true,
						searchable: true
					},
					{
						data: 'resolution',
						name: 'resolution',
						orderable: true,
						searchable: true
					},
					{
						data: 'created-on',
						name: 'created-on',
						orderable: true,
						searchable: true
					},												
					{
						data: 'actions',
						name: 'actions',
						orderable: false,
						searchable: false
					},
				]
		});


		$(document).ready(function() {

			$('#title').simpleTxtCounter({
				maxLength: 200,
				countElem: '<div class="form-text"></div>',
				lineBreak: false,
			});

		});	


		$(document).on('click', '.file-name', function(e) {

			"use strict";

			e.preventDefault();

			var id = $(this).attr("id");

			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				method: 'post',
				url: 'images/view',
				data:{
					id: id,
				},
				success:function(data) {   

					var items = [{src: data['url']}];

					var viewer = new PhotoViewer(items, {
						
						footerToolbar: [
							'zoomIn','zoomOut','fullscreen','actualSize',
							'customButton'
						],
						customButtons: {
							customButton: {
							text: '<i class="fas fa-cloud-download-alt" ></i>',
							title: 'Download Image',
							click: function (context, e) {
								getFile(data['url']);
							}
							}
						}

					});
				
				}

			});

		});


		// SUBMIT FORM
		$('#openai-form').on('submit', function(e) {

			e.preventDefault();

			let form = $(this);

			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				method: 'POST',
				url: 'images/process',
				data: form.serialize(),
				beforeSend: function() {
					$('#generate').html('');
					$('#generate').prop('disabled', true);
					$('#processing').show().clone().appendTo('#generate'); 
					$('#processing').hide();          
				},
				complete: function() {
					$('#generate').prop('disabled', false);
					$('#processing', '#generate').empty().remove();
					$('#processing').hide();
					$('#generate').html('Generate Image');            
				},
				success: function (data) {		
						
					if (data['status'] == 'success') {			
						toastr.success('Images were generated successfully');		
						animateValue("balance-number", data['old'], data['current'], 4000);
						$("#resultsTable").DataTable().ajax.reload();	
					} else {						
						Swal.fire('{{ __('Image Generation Error') }}', data['message'], 'warning');
					}
				},
				error: function(data) {
					$('#generate').prop('disabled', false);
            		$('#generate').html('Generate Image'); 
					console.log(data)
				}
			});
		});


		// DELETE SYNTHESIZE RESULT
		$(document).on('click', '.deleteResultButton', function(e) {

			e.preventDefault();

			Swal.fire({
				title: '{{ __('Confirm Image Deletion') }}',
				text: '{{ __('It will permanently delete this image') }}',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: '{{ __('Delete') }}',
				reverseButtons: true,
			}).then((result) => {
				if (result.isConfirmed) {
					var formData = new FormData();
					formData.append("id", $(this).attr('id'));
					$.ajax({
						headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
						method: 'post',
						url: 'images/delete',
						data: formData,
						processData: false,
						contentType: false,
						success: function (data) {
							if (data['status'] == 'success') {
								Swal.fire('{{ __('Image Deleted') }}', '{{ __('Selected image has been successfully deleted') }}', 'success');	
								$("#resultsTable").DataTable().ajax.reload();								
							} else {
								Swal.fire('{{ __('Delete Failed') }}', '{{ __('There was an error while deleting this image') }}', 'error');
							}      
						},
						error: function(data) {
							Swal.fire('Oops...','{{ __('Something went wrong') }}!', 'error')
						}
					})
				} 
			})
		});
	});

	function getFile(uri) {
		//window.open(data,'_blank');
		// window.location.href = data;
		var link = document.createElement("a");
            link.href = uri;
            link.setAttribute("download", "download");
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            delete link;
		return false;
	}

	function animateValue(id, start, end, duration) {
		if (start === end) return;
		var range = end - start;
		var current = start;
		var increment = end > start? 1 : -1;
		var stepTime = Math.abs(Math.floor(duration / range));
		var obj = document.getElementById(id);
		var timer = setInterval(function() {
			current += increment;
			obj.innerHTML = current;
			if (current == end) {
				clearInterval(timer);
			}
		}, stepTime);
	}

	function changeTemplate(value) {
		let url = '{{ url('user/templates') }}/' + value;
		window.location.href=url;
	}

</script>
@endsection