<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Laravel Project Dashboard</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Font Awesome -->

		<link rel="stylesheet" href="{{asset ('public/backend/plugins/fontawesome-free/css/all.min.css') }}">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Tempusdominus Bbootstrap 4 -->
		<link rel="stylesheet" href="{{asset ('public/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
		<!-- iCheck -->
		<link rel="stylesheet" href="{{asset ('public/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
		<!-- JQVMap -->
		<link rel="stylesheet" href="{{asset ('public/backend/plugins/jqvmap/jqvmap.min.css') }}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{asset ('public/backend/dist/css/adminlte.min.css') }}">
		<!-- overlayScrollbars -->
		<link rel="stylesheet" href="{{asset ('public/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
		<!-- Daterange picker -->
		<link rel="stylesheet" href="{{asset ('public/backend/plugins/daterangepicker/daterangepicker.css') }}">
		<!-- summernote -->
		<link rel="stylesheet" href="{{asset ('public/backend/plugins/summernote/summernote-bs4.css') }}">

		<!-- Select2 -->
  <link rel="stylesheet" href="{{asset ('public/backend') }}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset ('public/backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

		<!-- DataTables -->
  <link rel="stylesheet" href="{{asset ('public/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset ('public/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

  <!-- jQuery -->
		<script src="{{asset ('public/backend/plugins/jquery/jquery.min.js') }}"></script>

  {{-- Notify js --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<style type="text/css">
  	.notifyjs-corner{
  		z-index: 10000 !important;
  	}
  </style>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  {{-- Date Picker --}}
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  {{--End Date Picker --}}
  
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	</head>
	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Left navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>
					<li class="nav-item d-none d-sm-inline-block">
						<a href="index3.html" class="nav-link">Home</a>
					</li>
					<li class="nav-item d-none d-sm-inline-block">
						<a href="#" class="nav-link">Contact</a>
					</li>
				</ul>
				<!-- SEARCH FORM -->
				<form class="form-inline ml-3">
					<div class="input-group input-group-sm">
						<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-navbar" type="submit">
							<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</form>
				<!-- Right navbar links -->
				<ul class="navbar-nav ml-auto">
					<!-- Messages Dropdown Menu -->
					
					<!-- Notifications Dropdown Menu -->
					<li class="nav-item dropdown">
						<a class="nav-link" data-toggle="dropdown" href="#">
							{{ Auth::user()->name }}
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
							<div class="dropdown-divider"></div>
							<a href="{{ route('logout') }}"
								onclick="event.preventDefault();
							document.getElementById('logout-form').submit();" class="dropdown-item dropdown-footer">Logout</a>
							
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>
					
				</ul>
			</nav>
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="{{ route('home') }}" class="brand-link">
					<img src="{{asset ('public/backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
					style="opacity: .8">
					<span class="brand-text font-weight-light">Dashboard</span>
				</a>
				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user panel (optional) -->
					<div class="user-panel mt-3 pb-3 mb-3 d-flex">
						<div class="image">
							<img src="{{ (!empty(Auth::user()->image))?url('public/upload/user_images/'.Auth::user()->image):url('public/upload/no_image.jpg') }}" class="img-circle elevation-2" alt="User Image">
						</div>
						<div class="info">
							<a href="#" class="d-block">{{ Auth::user()->name }}</a>
						</div>
					</div>
					<!-- Sidebar Menu -->
					@include('backend.layouts.sidebar')
					<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
			</aside>
			<!-- Content Wrapper. Contains page content -->
			@yield('content')
			<!-- /.content-wrapper -->

{{-- Notify.js --}}

			@if(session()->has('success'))
				<script type="text/javascript">
					$(function(){
						$.notify("{{ session()->get('success') }}", {globalPosition:'top right',className:'success'});
					});
				</script>
			@endif
			@if(session()->has('error'))
				<script type="text/javascript">
					$(function(){
						$.notify("{{ session()->get('error') }}", {globalPosition:'top right',className:'error'});
					});
				</script>
			@endif

			<footer class="main-footer">
				<strong>Copyright &copy; 2022 <a href="#">POS</a>.</strong>
				Dashboard.
				<div class="float-right d-none d-sm-inline-block">
					<b>Developed by</b> Rifat
				</div>
			</footer>
			<!-- Control Sidebar -->
			<aside class="control-sidebar control-sidebar-dark">
				<!-- Control sidebar content goes here -->
			</aside>
			<!-- /.control-sidebar -->
		</div>
		<!-- ./wrapper -->
		
		<!-- jQuery UI 1.11.4 -->
		<script src="{{asset ('public/backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
		$.widget.bridge('uibutton', $.ui.button)
		</script>
		<!-- Bootstrap 4 -->
		<script src="{{asset ('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<!-- ChartJS -->
		<script src="{{asset ('public/backend/plugins/chart.js/Chart.min.js') }}"></script>
		<!-- Sparkline -->
		<script src="{{asset ('public/backend/plugins/sparklines/sparkline.js') }}"></script>
		<!-- JQVMap -->
		<script src="{{asset ('public/backend/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
		<script src="{{ asset('public/backend/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
		<!-- jQuery Knob Chart -->
		<script src="{{asset ('public/backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
		<!-- daterangepicker -->
		<script src="{{asset ('public/backend/plugins/moment/moment.min.js') }}"></script>
		<script src="{{asset ('public/backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
		<!-- Tempusdominus Bootstrap 4 -->
		<script src="{{asset ('public/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
		<!-- Summernote -->
		<script src="{{asset ('public/backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
		<!-- overlayScrollbars -->
		<script src="{{asset ('public/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
		<!-- AdminLTE App -->
		<script src="{{asset ('public/backend/dist/js/adminlte.js') }}"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<script src="{{asset ('public/backend/dist/js/pages/dashboard.js') }}"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="{{asset ('public/backend/dist/js/demo.js') }}"></script>

		<!-- Select2 -->
		<script src="{{ asset('public/backend') }}/plugins/select2/js/select2.full.min.js"></script>

		<!-- DataTables -->
<script src="{{asset ('public/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset ('public/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset ('public/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset ('public/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- jquery-validation -->
<script src="{{asset ('public/backend/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{asset ('public/backend/plugins/jquery-validation/additional-methods.min.js') }}"></script>

<script type="text/javascript" src="{{asset ('public/backend/dist/js/handlebars.min.js') }}"></script>
{{-- handlebars.js --}}
{{-- <script type="text/javascript" src="{{ asset('public/backend/dist/js') }}/handlebars.min.js"></script> --}}

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

{{-- Delete Sweet Alert --}}
<script type="text/javascript">
	$(function(){
		$(document).on('click','#delete',function(e){
			e.preventDefault();
			var link = $(this).attr("href");
			Swal.fire({
			  title: 'Are you sure?',
			  text: "Delete This Data!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.value) {
			  	window.location.href = link;
			    Swal.fire(
			      'Deleted!',
			      'Your file has been deleted.',
			      'success'
			    )
			  }
			})
		});
	});
</script>

{{-- Approve Sweet Alert --}}

<script type="text/javascript">
	$(function(){
		$(document).on('click','#approveBtn',function(e){
			e.preventDefault();
			var link = $(this).attr("href");
			Swal.fire({
			  title: 'Are you sure?',
			  text: "Approve This Data!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, Approve it!'
			}).then((result) => {
			  if (result.value) {
			  	window.location.href = link;
			    Swal.fire(
			      'Approved!',
			      'Your file has been Approved.',
			      'success'
			    )
			  }
			})
		});
	});
</script>

{{-- Picture Show Real time --}}

<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

{{-- ...Select2 ...--}}

<script type="text/javascript">
	$(function(){
		$('.select2').select2();
	})
</script>

	</body>
</html>