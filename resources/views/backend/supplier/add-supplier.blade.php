@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Manage Supplier</h1>
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
							Add Supplier
							<a href="{{ route('suppliers.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i>Supplier List</a>
						</h1>
					</div><!-- /.card-header -->
					@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
					<div class="card-body">
						<form action="{{ route('suppliers.store') }}" method="POST" id="myform">
							@csrf
							<div class="form-row">
								
								<div class="form-group col-md-6">
									<label for="name">Supplier Name</label>
									<input type="text" name="name" class="form-control">
									
								</div>
								<div class="form-group col-md-6">
									<label for="email">Email</label>
									<input type="text" name="email" class="form-control">
									
								</div>
								<div class="form-group col-md-6">
									<label for="mobile_no">Mobile No.</label>
									<input type="text" name="mobile_no" class="form-control">
									
								</div>
								<div class="form-group col-md-6">
									<label for="address">Address</label>
									<input type="text" name="address" id="password" class="form-control">
								</div>

								<div class="form-group col-md-6">
									<input type="submit" value="submit" class="btn btn-primary">
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

<script type="text/javascript">

$(document).ready(function () {
  
  $('#myform').validate({
    rules: {
      name: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      mobile_no: {
        required: true,
      },
      address: {
        required: true,
      },
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
@endsection