@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Manage Credit Supplier</h1>
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
							Edit Purchase (Purchase No # {{ $purchase_payment['purchaseInfo']['purchase_no'] }})
							<a href="{{ route('suppliers.credit') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i>Credit Supplier List</a>
						</h1>
					</div><!-- /.card-header -->
					<div class="card-body">
						<table width="100%">
							<tbody>
								<tr>
									<td colspan="3"><h4><strong>Supplier Info</strong></h4></td>
								</tr>
								<tr>
									<td width="30%"><strong>Name : </strong>{{ $purchase_payment['supplier']['name'] }}</td>
									<td width="30%"><strong>Mobile No : </strong>{{ $purchase_payment['supplier']['mobile_no'] }}</td>
									<td width="40%"><strong>Address : </strong>{{ $purchase_payment['supplier']['address'] }}</td>
								</tr>
							</tbody>
						</table>
						<form action="{{ route('suppliers.update.purchase',$purchase_payment->purchase_info_id) }}" method="POST" id="myform">
							@csrf
							<table border="1" width="100%" style="margin-bottom: 10px">
								<thead>
									<tr>
										<th class="text-center">SL.</th>
										<th class="text-center">Category.</th>
										<th class="text-center">Product Name.</th>
										<th class="text-center">Quantity.</th>
										<th class="text-center">Unit Price.</th>
										<th class="text-center">Total Price.</th>
									</tr>
								</thead>
								<tbody>
									@php
									$total_sum = '0';
									$purchase_details = App\Model\Purchase::where('purchase_info_id',$purchase_payment->purchase_info_id)->get();
									@endphp
									@foreach($purchase_details as $key => $details)
									<tr>
										<td class="text-center">{{ $key+1 }}</td>
										<td class="text-center">{{ $details['category']['name'] }}</td>
										<td class="text-center">{{ $details['product']['name'] }}</td>
										<td class="text-center">{{ $details->buying_qty }}</td>
										<td class="text-center">{{ $details->unit_price }}</td>
										<td class="text-center">{{ $details->buying_price }}</td>
									</tr>
									@php
									$total_sum += $details->buying_price;
									@endphp
									@endforeach
									<tr>
										<td class="text-right" colspan="5"><strong>Sub Total : </strong></td>
										<td class="text-center"><strong>{{ $total_sum }}</strong></td>
									</tr>
									{{-- <tr>
										<td class="text-right" colspan="5">Discount : </td>
										<td class="text-center">{{ $payment->discount_amount }}</td>
									</tr> --}}
									<tr>
										<td class="text-right" colspan="5">Paid Amount : </td>
										<td class="text-center">{{ $purchase_payment->paid_amount }}</td>
									</tr>
									<tr>
										<td class="text-right" colspan="5">Due Amount : </td>
										<input type="hidden" name="new_paid_amount" value="{{ $purchase_payment->due_amount }}">
										<td class="text-center">{{ $purchase_payment->due_amount }}</td>
									</tr>
									<tr>
										<td class="text-right" colspan="5"><strong>Grand Total : </strong></td>
										<td class="text-center"><strong>{{ $purchase_payment->total_amount }}</strong></td>
									</tr>
								</tbody>
							</table>
							<div class="row">
								<div class="form-group col-md-3">
									<label>Paid Status</label>
									<select name="paid_status" id="paid_status" class="form-control form-control-sm">
										<option value="">Select Status</option>
										<option value="full_paid">Full Paid</option>
										<option value="partial_paid">Partial Paid</option>
									</select>
									<input type="text" name="paid_amount" class="form-control form-control-sm paid_amount"  placeholder="Enter Paid Amount" style="display: none;">
								</div>

								<div class="form-group col-md-3">
									<label>Date</label>
									<input type="text" name="date" id="date" class="form-control form-control-sm datepicker" placeholder="YYYY-MM-DD" readonly>									
								</div>

								<div class="col-md-3" style="padding-top: 30px;">
									<button type="submit" class="btn btn-primary btn-sm">Update Invoice</button>
								</div>
							</div>
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

{{-- Show paid amount Div --}}

<script type="text/javascript">
	$(document).on('change','#paid_status', function(){
		var paid_status = $(this).val();
		if (paid_status == 'partial_paid') {
			$('.paid_amount').show();
		}else{
			$('.paid_amount').hide();
		}
	});
</script>

<script type="text/javascript">

$(document).ready(function () {
  
  $('#myform').validate({
    rules: {
      paid_status: {
        required: true,
      },
      date: {
        required: true,
      }
    },
    messages: {
      
    },
   
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

<script>
    $('.datepicker').datepicker({
        uiLibrary: 'bootstrap4',
    		format: 'yyyy-mm-dd'
    });
</script>
@endsection