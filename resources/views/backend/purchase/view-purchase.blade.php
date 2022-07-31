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
							<a href="{{ route('purchase.add') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"></i>Add Purchase</a>
						</h1>
					</div><!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-hover{{--  table-responsive dt-responsive display nowrap --}}">
							<thead>
								<tr>
									<th>SL.</th>
									<th>Supplier Name</th>
									<th>Purcahse No</th>
									<th>Date</th>
									<th>Description</th>
									<th>Amount</th>
								</tr>
							</thead>
							<tbody>
								@foreach($allData as $key => $purchase_info)
								<tr>
									<td>{{ $key+1 }}</td>
									<td>{{ $purchase_info['purchase_payment']['supplier']['name'] }}
										({{ $purchase_info['purchase_payment']['supplier']['mobile_no'] }}-{{ $purchase_info['purchase_payment']['supplier']['address'] }})
									</td>
									<td>{{ $purchase_info->purchase_no }}</td>
									<td>{{ date('d-m-Y',strtotime($purchase_info->date)) }}</td>
									<td>{{ $purchase_info->description }}</td>
									<td>{{ $purchase_info['purchase_payment']['total_amount'] }}</td>
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