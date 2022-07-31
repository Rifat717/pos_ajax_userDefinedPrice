@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Manage Profile</h1>
			</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Profile</li>
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
							Edit Profile
							<a href="{{ route('profiles.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i>Your Profile</a>
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
						<form action="{{ route('profiles.update') }}" method="POST" id="myform" enctype="multipart/form-data">
							@csrf
							<div class="form-row">

								<div class="form-group col-md-4">
									<label for="name">Name</label>
									<input type="text" name="name" value="{{ $editData->name }}" class="form-control">
									<font style="color:red">{{ ($errors->has('name'))?($errors->first('name')):'' }}</font>
								</div>

								<div class="form-group col-md-4">
									<label for="email">Email</label>
									<input type="text" name="email" value="{{ $editData->email }}" class="form-control">
									<font style="color:red">{{ ($errors->has('email'))?($errors->first('email')):'' }}</font>
								</div>

								<div class="form-group col-md-4">
									<label for="mobile">Mobile</label>
									<input type="text" name="mobile" value="{{ $editData->mobile }}" class="form-control">
									<font style="color:red">{{ ($errors->has('mobile'))?($errors->first('mobile')):'' }}</font>
								</div>

								<div class="form-group col-md-4">
									<label for="address">Address</label>
									<input type="text" name="address" value="{{ $editData->address }}" class="form-control">
									<font style="color:red">{{ ($errors->has('address'))?($errors->first('address')):'' }}</font>
								</div>

								<div class="form-group col-md-4">
									<label for="gender">Gender</label>
									<select name="gender" id="gender" class="form-control">
										<option selected disabled>Select Gender</option>
										<option value="Male" {{ ($editData->gender=="Male")?"selected":"" }}>Male</option>
										<option value="Female" {{ ($editData->gender=="Female")?"selected":"" }}>Female</option>
									</select>
								</div>

								<div class="form-group col-md-4">
									<label for="image">Image</label>
									<input type="file" name="image" id="image" class="form-control">
								</div>

								<div class="form-group col-md-2">
									<img id="showImage" src="{{ (!empty($editData->image))?url('public/upload/user_images/'.$editData->image):url('public/upload/no_image.jpg') }}" style="width: 150px; height: 160px; border:1px solid #000; ">
								</div>

								<div class="form-group col-md-6" style="padding-top: 40px;">
									<input type="submit" value="Update" class="btn btn-primary">
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