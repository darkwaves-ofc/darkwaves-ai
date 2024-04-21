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
			<h4 class="page-title mb-0">{{ __('User Support Requests') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa-solid fa-message-question mr-2 fs-12"></i>{{ __('Admin') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}"> {{ __('User Support Requests') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')				
	<div class="row">
		<div class="col-md col-sm-12">
			<div class="card overflow-hidden border-0">
				<div class="card-body">
					<i class="fa-solid fa-comment-question text-primary fs-35 mt-3 float-right"></i>	
					<p class=" mb-3 fs-12 font-weight-bold mt-1">{{ __('Open Tickets') }}</p>
					<h2 class="mb-0"><span class="number-font-chars">{{ $open }}</span></h2>									
				</div>
			</div>
		</div>
		<div class="col-md col-sm-12">
			<div class="card border-0">
				<div class="card-body">
					<i class="fa-solid fa-comments-question-check fs-35 mt-3 float-right yellow"></i>	
					<p class=" mb-3 fs-12 font-weight-bold mt-1">{{ __('Replied Tickets') }}</p>
					<h2 class="mb-0"><span class="number-font-chars">{{ $replied }}</span></h2>
				</div>
			</div>
		</div>
		<div class="col-md col-sm-12">
			<div class="card border-0">
				<div class="card-body">
					<i class="fa-solid fa-comments-question fs-35 mt-3 float-right"></i>	
					<p class=" mb-3 fs-12 font-weight-bold mt-1">{{ __('Pending Tickets') }}</p>
					<h2 class="mb-0"><span class="number-font-chars">{{ $pending }}</span></h2>
				</div>
			</div>
		</div>
		<div class="col-md col-sm-12">
			<div class="card border-0">
				<div class="card-body">
					<i class="fa-solid fa-clipboard-list-check text-success fs-35 mt-3 float-right"></i>	
					<p class=" mb-3 fs-12 font-weight-bold mt-1">{{ __('Resolved Tickets') }}</p>
					<h2 class="mb-0"><span class="number-font-chars">{{ $resolved }}</span></h2>
				</div>
			</div>
		</div>
		<div class="col-md col-sm-12">
			<div class="card border-0">
				<div class="card-body">
					<i class="fa-solid fa-clipboard-list fs-35 text-danger mt-3 float-right"></i>	
					<p class=" mb-3 fs-12 font-weight-bold mt-1">{{ __('Closed Tickets') }}</p>
					<h2 class="mb-0"><span class="number-font-chars">{{ $closed }}</span></h2>
				</div>
			</div>
		</div>
	</div>		
	<!-- SUPPORT REQUEST DATA TABLE -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xm-12">
			<div class="card overflow-hidden border-0">
				<div class="card-header">
					<h3 class="card-title">{{ __('Support Request List') }}</h3>
				</div>
				<div class="card-body pt-2">
					<!-- SET DATATABLE -->
					<table id='allSupportRequestsTable' class='table' width='100%'>
							<thead>
								<tr>
									<th width="10%">{{ __('Ticket ID') }}</th>
									<th width="10%">{{ __('Created By') }}</th>
									<th width="7%">{{ __('Status') }}</th>															
									<th width="10%">{{ __('Category') }}</th>
									<th width="15%">{{ __('Subject') }}</th>
									<th width="7%">{{ __('Priority') }}</th>
									<th width="10%">{{ __('Created On') }}</th>										
									<th width="10%">{{ __('Last Updated On') }}</th>											
									<th width="5%">{{ __('Actions') }}</th>
								</tr>
							</thead>
					</table> <!-- END SET DATATABLE -->
				</div>
			</div>
		</div>
	</div>
	<!-- END SUPPORT REQUEST DATA TABLE -->
@endsection

@section('js')
	<!-- Data Tables JS -->
	<script src="{{URL::asset('plugins/datatable/datatables.min.js')}}"></script>
	<script src="{{URL::asset('plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
	<script type="text/javascript">
		$(function () {

			"use strict";
			
			// INITILIZE DATATABLE
			var table = $('#allSupportRequestsTable').DataTable({
				"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
				responsive: true,
				colReorder: true,
				"order": [[ 1, "desc" ]],
				language: {
					"emptyTable": "<div><img id='no-results-img' src='{{ URL::asset('img/files/no-support.png') }}'><br>No created support tickets yet</div>",
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
				ajax: "{{ route('admin.support') }}",
				columns: [{
						data: 'custom-ticket',
						name: 'custom-ticket',
						orderable: true,
						searchable: true
					},
					{
						data: 'username',
						name: 'username',
						orderable: true,
						searchable: true
					},		
					{
						data: 'custom-status',
						name: 'custom-status',
						orderable: true,
						searchable: true
					},												
					{
						data: 'custom-category',
						name: 'custom-category',
						orderable: true,
						searchable: true
					},
					{
						data: 'custom-subject',
						name: 'custom-subject',
						orderable: false,
						searchable: true
					},
					
					{
						data: 'custom-priority',
						name: 'custom-priority',
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
						data: 'resolved-on',
						name: 'resolved-on',
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

			
			// DELETE CONFIRMATION 
			$(document).on('click', '.deleteNotificationButton', function(e) {

				e.preventDefault();

				Swal.fire({
					title: '{{ __('Confirm Ticket Deletion') }}',
					text: '{{ __('It will permanently delete selected support ticket') }}',
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
							url: 'support/delete',
							data: formData,
							processData: false,
							contentType: false,
							success: function (data) {
								if (data == 'success') {
									Swal.fire('{{ __('Support Ticket Deleted') }}', '{{ __('Support ticket has been successfully deleted') }}', 'success');	
									$("#allSupportRequestsTable").DataTable().ajax.reload();								
								} else {
									Swal.fire('{{ __('Delete Failed') }}', '{{ __('There was an error while deleting this support ticket') }}', 'error');
								}      
							},
							error: function(data) {
								Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
							}
						})
					} 
				})
			});

		});
	</script>
@endsection