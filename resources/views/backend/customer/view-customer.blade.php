@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Manage Customer</h1>
			</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Customer</li>
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
							Customer List
							<a href="{{ route('customers.add') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"></i>Add Customer</a>
						</h1>
					</div><!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-hover dt-responsive display nowrap">
							<thead>
								<tr>
									<th>SL.</th>
									<th>Name.</th>
									<th>Mobile No.</th>
									<th>Email.</th>
									<th>Address.</th>
									<th>Action.</th>
								</tr>
							</thead>
							<tbody>
								@foreach($allData as $key => $customer)
								<tr>
									<td>{{ $key+1 }}</td>
									<td>{{ $customer->name }}</td>
									<td>{{ $customer->mobile_no }}</td>
									<td>{{ $customer->email }}</td>
									<td>{{ $customer->address }}</td>
									<td>
										<a href="{{ route('customers.edit',$customer->id) }}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
										<a href="{{ route('customers.delete',$customer->id) }}" id="delete" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>
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