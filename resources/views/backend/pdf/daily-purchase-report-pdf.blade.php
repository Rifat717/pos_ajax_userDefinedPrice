<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Daily Purchase Report</title>
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
								<td width="20%"></td>
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
								<td  width="25%"></td>
								<td>
									<u><strong><span style="font-size:15px;">Daily Purchase Report({{date('d-m-Y',strtotime($start_date))}} - {{date('d-m-Y',strtotime($end_date))}})</span></strong></u>
								</td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<table cellspacing="0" border="1" width="100%">
							<thead>
								<tr>
									<th>SL.</th>
									<th>Supplier Name</th>
									<th>Purcahse No</th>
									<th>Date</th>
									<th>Discription</th>
									<th>Total price</th>
									<th>Paid</th>
									<th>Due</th>
								</tr>
							</thead>
							<tbody>
								@php
									$total_sum = 0; 
									$total_paid = 0; 
									$total_due = 0; 
								@endphp
								@foreach($allData as $key => $purchase_info)
								<tr>
									<td>{{ $key+1 }}</td>
									<td>
										{{ $purchase_info['purchase_payment']['supplier']['name'] }}
										({{ $purchase_info['purchase_payment']['supplier']['mobile_no'] }}-{{ $purchase_info['purchase_payment']['supplier']['address'] }})
									</td>
									<td>{{ $purchase_info->purchase_no }}</td>
									<td>{{ date('d-m-Y',strtotime($purchase_info->date)) }}</td>
									<td>{{ $purchase_info->description }}</td>
									<td>{{ $purchase_info['purchase_payment']['total_amount'] }}</td>
									<td>{{ $purchase_info['purchase_payment']['paid_amount'] }}</td>
									<td>{{ $purchase_info['purchase_payment']['due_amount'] }}</td>
									@php
										$total_sum += $purchase_info['purchase_payment']['total_amount'];
										$total_paid += $purchase_info['purchase_payment']['paid_amount'];
										$total_due += $purchase_info['purchase_payment']['due_amount'];
									@endphp
								</tr>
								@endforeach
								<tr>
									<td colspan="5" style="text-align: right;"><strong>Grand Total : </strong></td>
									<td>{{$total_sum}}</td>
									<td>{{$total_paid}}</td>
									<td>{{$total_due}}</td>
								</tr>
							</tbody>
						</table>
					@php
						$date = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
					@endphp
					<i>Printing Time : {{ $date->format('F j, Y, g:i a') }}</i>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table border="0" width="100%">
						<tbody>
							<tr>
								<td style="width: 40%;">
								</td>
								<td style="width: 20%;"></td>
								<td style="width: 40%; text-align: center;">
									<p style="text-align: center; border-bottom: 1px solid #000;">Owner Signature</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</body>
</html>