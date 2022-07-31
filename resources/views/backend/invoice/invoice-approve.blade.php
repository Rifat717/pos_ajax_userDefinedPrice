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
							Invoice No #{{ $invoice->invoice_no }}({{ date('d-m-Y',strtotime($invoice->date)) }})
							<a href="{{ route('invoice.pending.list') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i>Pending Invoice List</a>
						</h1>
					</div><!-- /.card-header -->
					<div class="card-body">
						@php
							$payment = App\Model\Payment::where('invoice_id',$invoice->id)->first();
						@endphp
						<table width="100%">
							<tbody>
								<tr>
									<td width="15%"><p><strong>Customer Info</strong></p></td>
									<td width="25%"><p><strong>Name : </strong>{{ $payment['customer']['name'] }}</p></td>
									<td width="25%"><p><strong>Mobile No : </strong>{{ $payment['customer']['mobile_no'] }}</p></td>
									<td width="35%"><p><strong>Address : </strong>{{ $payment['customer']['address'] }}</p></td>
								</tr>
								<tr>
									<td width="15%"></td>
									<td width="85%" colspan="3"><p><strong>Description : </strong>{{ $invoice->description }}</p></td>
								</tr>
							</tbody>
						</table>

						<form action="{{ route('aproval.store',$invoice->id) }}" method="POST">
							@csrf
							<table border="1" width="100%" style="margin-bottom: 10px">
							<thead>
								<tr>
									<th class="text-center">SL.</th>
									<th class="text-center">Category.</th>
									<th class="text-center">Product Name.</th>
									<th class="text-center" style="background: #ddd; padding: 1px;">Current Stock.</th>
									<th class="text-center">Quantity.</th>
									<th class="text-center">Unit Price.</th>
									<th class="text-center">Total Price.</th>
								</tr>
							</thead>
							<tbody>
								@php
									$total_sum = '0';
								@endphp
								@foreach($invoice['invoice_details'] as $key => $details)
								<tr>
									<input type="hidden" name="category_id[]" value="{{ $details->category_id }}">
									<input type="hidden" name="product_id[]" value="{{ $details->product_id }}">
									<input type="hidden" name="selling_qty[{{ $details->id }}]" value="{{ $details->selling_qty }}">
									<td class="text-center">{{ $key+1 }}</td>
									<td class="text-center">{{ $details['category']['name'] }}</td>
									<td class="text-center">{{ $details['product']['name'] }}</td>
									<td class="text-center" style="background: #ddd; padding: 1px;">{{ $details['product']['quantity'] }}</td>
									<td class="text-center">{{ $details->selling_qty }}</td>
									<td class="text-center">{{ $details->unit_price }}</td>
									<td class="text-center">{{ $details->selling_price }}</td>
								</tr>
								@php
									$total_sum += $details->selling_price;
								@endphp
								@endforeach
								<tr>
									<td class="text-right" colspan="6"><strong>Sub Total : </strong></td>
									<td class="text-center"><strong>{{ $total_sum }}</strong></td>
								</tr>
								<tr>
									<td class="text-right" colspan="6">Discount : </td>
									<td class="text-center">{{ $payment->discount_amount }}</td>
								</tr>
								<tr>
									<td class="text-right" colspan="6">Paid Amount : </td>
									<td class="text-center">{{ $payment->paid_amount }}</td>
								</tr>
								<tr>
									<td class="text-right" colspan="6">Due Amount : </td>
									<td class="text-center">{{ $payment->due_amount }}</td>
								</tr>
								<tr>
									<td class="text-right" colspan="6"><strong>Grand Total : </strong></td>
									<td class="text-center"><strong>{{ $payment->total_amount }}</strong></td>
								</tr>
							</tbody>
						</table>

						<button type="submit" class="btn btn-success">Invoice Approve</button>
						</form>
							
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