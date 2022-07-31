@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Manage Invoice</h1>
			</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Invoice</li>
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
							Pending Invoice List
							{{-- <a href="" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"></i>Add Invoice</a> --}}
						</h1>
					</div><!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>SL.</th>
									<th>Customer Name</th>
									<th>Invoice No</th>
									<th>Date</th>
									<th>Description</th>
									<th>Amount.</th>
									<th>Status.</th>
									<th>Action.</th>
								</tr>
							</thead>
							<tbody>
								@foreach($allData as $key => $invoice)
								<tr>
									<td>{{ $key+1 }}</td>
									<td>
										{{ $invoice['payment']['customer']['name'] }}
										({{ $invoice['payment']['customer']['mobile_no'] }}-{{ $invoice['payment']['customer']['address'] }})
									</td>
									<td>Invoice No #{{ $invoice->invoice_no }}</td>
									<td>{{ date('d-m-Y',strtotime($invoice->date)) }}</td>
									<td>{{ $invoice->description }}</td>
									<td>{{ $invoice['payment']['total_amount'] }}</td>
									<td>
										@if($invoice->status=='0')
										<span class="btn-danger">Pending</span>
										@elseif($invoice->status=='1')
										<span class="btn-success">Approved</span>
										@endif
									</td>
									<td>
										@if($invoice->status=='0')
										<a href="{{ route('invoice.approve',$invoice->id) }}" class="btn btn-success btn-sm" title="Approve"><i class="fa fa-check-circle"></i></a>
										<a href="{{ route('invoice.delete',$invoice->id) }}" id="delete" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>
										@endif
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