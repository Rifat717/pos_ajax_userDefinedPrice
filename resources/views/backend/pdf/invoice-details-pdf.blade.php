<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Invoice PDF Details</title>
		<link rel="stylesheet" href="{{asset ('public/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
		<link rel="stylesheet" href="">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<table width="100%">
						<tbody>
							<tr>
								<td><strong>Invoice no: # {{ $payment['invoice']['invoice_no'] }}</strong></td>
								<td>
									<span style="font-size: 20px; background: #1781BF; padding: 3px 10px 3px 10px; color: #fff;">
										Quintet Alliance Pvt. Ltd. (QAPL)
									</span>
									<br>
									Dhanmondi, Dhaka-1207
								</td>
								<td>
									<span>Company No : 01309-009401 <br>
										Owner No : 01893470100
									</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<hr style="margin-bottom: 0px;">
					<table>
						<tbody>
							<tr>
								<td width="38%"></td>
								<td>
									<u><strong><span style="font-size:15px;">Customer Invoice Details</span></strong></u>
								</td>
								<td width="30%"></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<table width="100%">
						<tbody>
							<tr>
								<td colspan="3"><h4><strong>Cusotmer Info</strong></h4></td>
							</tr>
							<tr>
								<td width="30%"><strong>Name : </strong>{{ $payment['customer']['name'] }}</td>
								<td width="30%"><strong>Mobile No : </strong>{{ $payment['customer']['mobile_no'] }}</td>
								<td width="40%"><strong>Address : </strong>{{ $payment['customer']['address'] }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table cellspacing="0" border="1" width="100%" style="margin-bottom: 10px">
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
										$invoice_details = App\Model\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
									@endphp
									@foreach($invoice_details as $key => $details)
									<tr>
										<td class="text-center">{{ $key+1 }}</td>
										<td class="text-center">{{ $details['category']['name'] }}</td>
										<td class="text-center">{{ $details['product']['name'] }}</td>
										<td class="text-center">{{ $details->selling_qty }}</td>
										<td class="text-center">{{ $details->unit_price }}</td>
										<td class="text-center">{{ $details->selling_price }}</td>
									</tr>
									@php
										$total_sum += $details->selling_price;
									@endphp
									@endforeach
									<tr>
										<td style="text-align: right;" colspan="5"><strong>Sub Total : </strong></td>
										<td class="text-center"><strong>{{ $total_sum }}</strong></td>
									</tr>
									<tr>
										<td style="text-align: right;" colspan="5">Discount : </td>
										<td class="text-center">{{ $payment->discount_amount }}</td>
									</tr>
									<tr>
										<td style="text-align: right;" colspan="5">Paid Amount : </td>
										<td class="text-center">{{ $payment->paid_amount }}</td>
									</tr>
									<tr>
										<td style="text-align: right;" colspan="5">Due Amount : </td>
										<input type="hidden" name="new_paid_amount" value="{{ $payment->due_amount }}">
										<td class="text-center">{{ $payment->due_amount }}</td>
									</tr>
									<tr>
										<td style="text-align: right;" colspan="5"><strong>Grand Total : </strong></td>
										<td class="text-center"><strong>{{ $payment->total_amount }}</strong></td>
									</tr>
									<tr>
										<td colspan="6" style="text-align: center; font-weight: bold;">Paid Summary</td>
									</tr>
									<tr>
										<td colspan="3" style="text-align: right;"><strong>Date</strong></td>
										<td colspan="3"><strong>Amount</strong></td>
									</tr>
									@php
										$payment_details = App\Model\PaymentDetail::where('invoice_id',$payment->invoice_id)->get();
									@endphp
									@foreach($payment_details as $dtl)
									<tr>
										<td colspan="3" style="text-align: right;">{{date('d-m-Y', strtotime($dtl->date))}}</td>
										<td colspan="3">{{$dtl->current_paid_amount}} TK</td>
									</tr>
									@endforeach
								</tbody>
							</table>
					@php
						$date = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
					@endphp
					<i>Printing Time : {{ $date->format('F j, Y, g:i a') }}</i>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-12">
					<hr style="margin-bottom: 0px;">
					<table border="0" width="100%">
						<tbody>
							<tr>
								<td style="width: 40%;">
									<p style="text-align: center;margin-left: 20px;">Customer Signature</p>
								</td>
								<td style="width: 20%;"></td>
								<td style="width: 40%; text-align: center;">
									<p style="text-align: center;">Seller Signature</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</body>
</html>