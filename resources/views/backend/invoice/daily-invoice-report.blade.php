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
							Select Criteria
							{{-- <a href="" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i>Invoice List</a> --}}
						</h1>
					</div><!-- /.card-header -->
					<div class="card-body">
						<form method="GET" action="{{ route('invoice.daily.report.pdf') }}" target="_blank" id="myform">
							<div class="form-row">
								<div class="form-group col-md-4">
									<label>Start Date</label>
									<input type="text" name="start_date" id="start_date" class="form-control form-control-sm datepicker" placeholder="YYYY-MM-DD" readonly>									
								</div>
								<div class="form-group col-md-4">
									<label>End Date</label>
									<input type="text" name="end_date" id="end_date" class="form-control form-control-sm datepicker1" placeholder="YYYY-MM-DD" readonly>									
								</div>
								<div class="form-group col-md-1" style="padding-top: 30px;">
									<button type="submit" class="btn btn-primary btn-sm">Search</button>
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
      start_date: {
        required: true,
      },
      end_date: {
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

<script>
    $('.datepicker').datepicker({
        uiLibrary: 'bootstrap4',
    		format: 'yyyy-mm-dd'
    });
    $('.datepicker1').datepicker({
        uiLibrary: 'bootstrap4',
    		format: 'yyyy-mm-dd'
    });
</script>

@endsection