@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Manage User</h1>
			</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">User</li>
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
							Add User
							<a href="{{ route('users.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i>User List</a>
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
						<form action="{{ route('users.store') }}" method="POST" id="myform">
							@csrf
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="usertype">User Role</label>
									<select name="usertype" id="usertype" class="form-control">
										<option selected disabled>Select Role</option>
										<option value="Admin">Admin</option>
										<option value="User">User</option>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label for="name">Name</label>
									<input type="text" name="name" class="form-control">
									<font style="color:red">{{ ($errors->has('name'))?($errors->first('name')):'' }}</font>
								</div>
								<div class="form-group col-md-4">
									<label for="email">Email</label>
									<input type="text" name="email" class="form-control">
									<font style="color:red">{{ ($errors->has('email'))?($errors->first('email')):'' }}</font>
								</div>
								<div class="form-group col-md-4">
									<label for="password">Password</label>
									<input type="text" name="password" id="password" class="form-control">
								</div>
								<div class="form-group col-md-4">
									<label for="password">Confirm Password</label>
									<input type="text" name="password2" class="form-control">
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
      usertype: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 8
      },
      password2: {
        required: true,
        equalTo: '#password'
      },
    },
    messages: {
      name: {
        required: "Please Enter Name",
      },
      usertype: {
        required: "Please Select a User Type",
      },
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long"
      },
      password2: {
        required: "Please provide confirm password",
        equalTo: "Your confirm password does not match"
      }
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