@extends('layouts.app')

@section('css')
	<!-- Data Table CSS -->
	<link href="{{URL::asset('plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
	<!-- Sweet Alert CSS -->
	<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
@endsection

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0">{{ __('Davinci Templates') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-microchip-ai mr-2 fs-12"></i>{{ __('Admin') }}</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.davinci.dashboard') }}"> {{ __('Davinci Management') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="#"> {{ __('Davinci Templates') }}</a></li>
			</ol>
		</div>
		<div class="page-rightheader">			
			<a id="activateAllTemplates" href="#" class="btn btn-primary mt-1">{{ __('Activate All') }}</a>
			<a id="deactivateAllTemplates" href="#" class="btn btn-primary mt-1">{{ __('Deactivate All') }}</a>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xm-12">
			<div class="card border-0">
				<div class="card-header">
					<h3 class="card-title">{{ __('All Templates') }}</h3>
				</div>
				<div class="card-body pt-2">
					<!-- BOX CONTENT -->
					<div class="box-content">
						<!-- SET DATATABLE -->
						<table id='allTemplates' class='table' width='100%'>
								<thead>
									<tr>									
										<th width="3%">{{ __('Status') }}</th> 
										<th width="7%">{{ __('Template Name') }}</th>
										<th width="15%">{{ __('Template Description') }}</th>
										<th width="3%">{{ __('Package') }}</th>						
										<th width="3%">{{ __('Updated On') }}</th>	    										 						           	
										<th width="5%">{{ __('Actions') }}</th>
									</tr>
								</thead>
						</table> <!-- END SET DATATABLE -->
					</div> <!-- END BOX CONTENT -->
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<!-- Data Tables JS -->
	<script src="{{URL::asset('plugins/datatable/datatables.min.js')}}"></script>
	<script src="{{URL::asset('plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
	<script type="text/javascript">
		$(function () {

			"use strict";

			// INITILIZE DATATABLE
			var table = $('#allTemplates').DataTable({
				"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
				responsive: {
					details: {type: 'column'}
				},
				"order": [[3, "asc"]],
				colReorder: true,
				language: {
					"emptyTable": "<div><img id='no-results-img' src='{{ URL::asset('img/files/no-result.png') }}'><br>All Templates</div>",
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
				ajax: "{{ route('admin.davinci.templates') }}",
				columns: [
					{
						data: 'custom-status',
						name: 'custom-status',
						orderable: true,
						searchable: true
					},
					{
						data: 'custom-name',
						name: 'custom-name',
						orderable: true,
						searchable: true
					},				
					{
						data: 'description',
						name: 'description',
						orderable: true,
						searchable: true
					},
					{
						data: 'package',
						name: 'package',
						orderable: true,
						searchable: true
					},						
					{
						data: 'updated-on',
						name: 'updated-on',
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

			
			// UPDATE DESCRIPTION
			$(document).on('click', '.editButton', function(e) {

				e.preventDefault();

				Swal.fire({
					title: '{{ __('Update Description') }}',
					showCancelButton: true,
					confirmButtonText: '{{ __('Update') }}',
					reverseButtons: true,
					input: 'text',
				}).then((result) => {
					if (result.value) {
						var formData = new FormData();
						formData.append("name", result.value);
						formData.append("id", $(this).attr('id'));
						$.ajax({
							headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
							method: 'post',
							url: 'templates/template/update',
							data: formData,
							processData: false,
							contentType: false,
							success: function (data) {
								if (data == 'success') {
									Swal.fire('{{ __('Description Update') }}', '{{ __('Description has been successfully updated') }}', 'success');
									$("#allTemplates").DataTable().ajax.reload();
								} else {
									Swal.fire('{{ __('Update Error') }}', '{{ __('Description was not updated correctly') }}', 'error');
								}      
							},
							error: function(data) {
								Swal.fire('Update Error', data.responseJSON['error'], 'error');
							}
						})
					} else if (result.dismiss !== Swal.DismissReason.cancel) {
						Swal.fire('{{ __('No Description Entered') }}', '{{ __('Make sure to provide a new description before updating') }}', 'error')
					}
				})
			});


			// ACTIVATE TEMPLATE
			$(document).on('click', '.activateButton', function(e) {

				e.preventDefault();

				var formData = new FormData();
				formData.append("id", $(this).attr('id'));

				$.ajax({
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					method: 'post',
					url: 'templates/template/activate',
					data: formData,
					processData: false,
					contentType: false,
					success: function (data) {
						if (data == 'success') {
							Swal.fire('{{ __('Template Activated') }}', '{{ __('Template has been activated successfully') }}', 'success');
							$("#allTemplates").DataTable().ajax.reload();
						} else {
							Swal.fire('{{ __('Template Already Active') }}', '{{ __('Selected template is already activated') }}', 'warning');
						}      
					},
					error: function(data) {
						Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
					}
				})

			});


			// DEACTIVATE TEMPLATE
			$(document).on('click', '.deactivateButton', function(e) {

				e.preventDefault();

				var formData = new FormData();
				formData.append("id", $(this).attr('id'));

				$.ajax({
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					method: 'post',
					url: 'templates/template/deactivate',
					data: formData,
					processData: false,
					contentType: false,
					success: function (data) {
						if (data == 'success') {
							Swal.fire('{{ __('Template Deactivated') }}', '{{ __('Template has been deactivated successfully') }}', 'success');
							$("#allTemplates").DataTable().ajax.reload();
						} else {
							Swal.fire('{{ __('Template Already Deactive') }}', '{{ __('Template is already deactivated') }}', 'warning');
						}      
					},
					error: function(data) {
						Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
					}
				})

			});


			// ACTIVATE ALL TEMPLATES
			$(document).on('click', '#activateAllTemplates', function(e) {

				e.preventDefault();

				$.ajax({
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					method: 'get',
					url: 'templates/activate/all',
					processData: false,
					contentType: false,
					success: function (data) {
						if (data == 'success') {
							Swal.fire('{{ __('All Templates Activated') }}', '{{ __('All templates were successfully activated') }}', 'success');
							$("#allTemplates").DataTable().ajax.reload();
						}   
					},
					error: function(data) {
						Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
					}
				})

			});


			// ACTIVATE ALL TEMPLATES
			$(document).on('click', '#deactivateAllTemplates', function(e) {

				e.preventDefault();

				$.ajax({
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					method: 'get',
					url: 'templates/deactivate/all',
					processData: false,
					contentType: false,
					success: function (data) {
						if (data == 'success') {
							Swal.fire('{{ __('All Templates Deactivated') }}', '{{ __('All templates were successfully deactivated') }}', 'success');
							$("#allTemplates").DataTable().ajax.reload();
						}   
					},
					error: function(data) {
						Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
					}
				})

			});


			// MAKE PROFESSIONAL TEMPLATE
			$(document).on('click', '.makeProButton', function(e) {

				e.preventDefault();

				var formData = new FormData();
				formData.append("id", $(this).attr('id'));

				$.ajax({
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					method: 'post',
					url: 'templates/template/makepro',
					data: formData,
					processData: false,
					contentType: false,
					success: function (data) {
						if (data == 'success') {
							Swal.fire('{{ __('Professional Package Enabled') }}', '{{ __('Template has been moved to professional package successfully') }}', 'success');
							$("#allTemplates").DataTable().ajax.reload();
						} else {
							Swal.fire('{{ __('Template Already Professional') }}', '{{ __('Selected template is already listed as professional') }}', 'warning');
						}      
					},
					error: function(data) {
						Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
					}
				})

			});


			// REMOVE PROFESSIONAL TEMPLATE
			$(document).on('click', '.removeProButton', function(e) {

				e.preventDefault();

				var formData = new FormData();
				formData.append("id", $(this).attr('id'));

				$.ajax({
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					method: 'post',
					url: 'templates/template/removepro',
					data: formData,
					processData: false,
					contentType: false,
					success: function (data) {
						if (data == 'success') {
							Swal.fire('{{ __('Regular Package Enabled') }}', '{{ __('Template has been moved to regular package successfully') }}', 'success');
							$("#allTemplates").DataTable().ajax.reload();
						} else {
							Swal.fire('{{ __('Template Already Regular') }}', '{{ __('Selected template is already listed as regular') }}', 'warning');
						}      
					},
					error: function(data) {
						Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
					}
				})

			});

		});
	</script>
@endsection