@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Manage Purchase</h1>
			</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Purchase</li>
					</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
				<!-- /.content-header -->
				<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		
		<!-- Main row -->
		<div class="row">
			<!-- Left col -->
			<section class="col-lg-12">
				<!-- Custom tabs (Charts with tabs)-->
				<div class="card">
					<div class="card-header">
						<h1>
							Purchase List
							{{-- <a href="{{ route('purchase.add') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"></i>Add Purchase</a> --}}
						</h1>
					</div><!-- /.card-header -->
					<div class="card-body table-responsive" style="overflow-x:auto;">
						<table id="example1" class="table table-bordered table-hover{{--  dt-responsive display nowrap --}}">
							<thead>
								<tr>
									<th>SL.</th>
									<th>Purcahse No</th>
									<th>Date</th>
									<th>Supplier Name</th>
									<th>Description</th>
									<th>Amount</th>
									<th>Status</th>
									<th style="width: 12%;">Action.</th>
								</tr>
							</thead>
							<tbody>
								@foreach($allData as $key => $purchase_list)
								<tr>
									<td>{{ $key+1 }}</td>
									<td>{{ $purchase_list->purchase_no }}</td>
									<td>{{ date('d-m-y',strtotime($purchase_list->date)) }}</td>
									<td>{{ $purchase_list['purchase_payment']['supplier']['name'] }}
										({{ $purchase_list['purchase_payment']['supplier']['mobile_no'] }}-{{ $purchase_list['purchase_payment']['supplier']['address'] }})
									</td>
									<td>{{ $purchase_list->description }}</td>
									<td>{{ $purchase_list['purchase_payment']['total_amount'] }}</td>
									<td>
										@if($purchase_list->status=='0')
										<span class="btn-danger">Pending</span>
										@elseif($purchase_list->status=='1')
										<span class="btn-success">Approved</span>
										@endif
									</td>
									<td>
										<a href="{{ route('purchase.print',$purchase_list->id) }}" target="_blank" class="btn btn-success btn-sm" title="Print"><i class="fa fa-print"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>	
					</div><!-- /.card-body -->
				</div>	
			</section>
					<!-- /.Left col -->	
		</div>
				<!-- /.row (main row) -->
	</div><!-- /.container-fluid -->
</section>
							<!-- /.content -->
</div>
@endsection