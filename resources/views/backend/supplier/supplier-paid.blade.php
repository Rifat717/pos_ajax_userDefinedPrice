@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Manage Paid Supplier</h1>
			</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Supplier</li>
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
							Paid Supplier List
							<a href="{{ route('suppliers.paid.pdf') }}" target="_blank" class="btn btn-success float-right btn-sm"><i class="fa fa-download"></i>Download PDF</a>
						</h1>
					</div><!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-hover dt-responsive display nowrap">
							<thead>
								<tr>
									<th>SL.</th>
									<th>Supplier Name.</th>
									<th>Purchase No.</th>
									<th>Date.</th>
									<th>Paid Amount.</th>
									<th>Action.</th>
								</tr>
							</thead>
							<tbody>
								@php
									$total_paid = '0';
								@endphp
								@foreach($allData as $key => $purchase_payment)
								<tr>
									<td>{{ $key+1 }}</td>
									<td>
										{{ $purchase_payment['supplier']['name'] }}
										({{ $purchase_payment['supplier']['address'] }}-{{ $purchase_payment['supplier']['mobile_no'] }})
									</td>
									<td>Purchase No #{{ $purchase_payment['purchaseInfo']['purchase_no'] }}</td>
									<td>{{ date('d-m-Y',strtotime($purchase_payment['purchaseInfo']['date'])) }}</td>
									<td>{{ $purchase_payment->paid_amount }} TK</td>
									<td>
										<a href="{{ route('purchase.details.pdf',$purchase_payment->purchase_info_id) }}" target="_blank" class="btn btn-success btn-sm" title="Details"><i class="fa fa-eye"></i></a>
									</td>
									@php
										$total_paid += $purchase_payment->paid_amount;
									@endphp
								</tr>
								@endforeach
							</tbody>
						</table>
						<table class="table table-bordered table-hover">
							<tbody>
								<tr>
									<td colspan="5" style="text-align: right; font-weight: bold;">Grand Total : </td>
									<td><strong>{{$total_paid}} TK</strong></td>
								</tr>
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