<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Supplier Wise Credit and Paid Report PDF</title>
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
								<td  width="40%"></td>
								<td>
									<u><strong><span style="font-size:15px;">Supplier Wise Credit and Paid Report</span></strong></u>
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
									<th>SL</th>
									<th>Supplier Name</th>
									<th>Purchase No</th>
									<th>Purchase Date</th>
									<th>Aging</th>
									<th>Total Price</th>
									<th>Paid Amount</th>
									<th>Due Amount</th>
								</tr>
							</thead>
							<tbody>
								@php
									$total_due = '0';
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
									<td>
										@php
											$fdate =date('d-m-Y',strtotime($purchase_payment['purchaseInfo']['date']));

									        $tdate =date("Y-m-d H:i:s");
									        $datetime1 = new DateTime($fdate);
									        $datetime2 = new DateTime($tdate);
									        $interval = $datetime1->diff($datetime2);
									        $days = $interval->format('%a');
									        /*echo ($days);*/
										@endphp
										{{ $days }} days
									</td>
									<td>{{ $purchase_payment->total_amount }}</td>
									<td>{{ $purchase_payment->paid_amount }}</td>
									<td>{{ $purchase_payment->due_amount }}</td>
									@php
										$total_due += $purchase_payment->due_amount;
										$total_paid += $purchase_payment->paid_amount;
									@endphp
								</tr>
								@endforeach
								<tr>
									<td colspan="6" style="text-align: right; font-weight: bold;">Total Value : </td>
									<td><strong>{{$total_paid}}</strong></td>
									<td><strong>{{$total_due}}</strong></td>
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