<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>Workgress</title>
	<link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('dist2/css/adminlte.min.css'); ?>">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('dist2/css/photo.css'); ?>" type="text/css" media="screen">
	<link href="<?php echo base_url('dist2/css/landing-page1.css'); ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/dropdown.css'); ?>" type="text/css" media="screen">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/course/css/animate.css'); ?>">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo base_url('assets/course/css/style.css'); ?>">

	<!-- Modernizr JS -->
	<script src="<?php echo base_url('assets/course/js/modernizr-2.6.2.min.js'); ?>"></script>

	<link rel="preload" href="<?php echo base_url('assets/css/footer.css'); ?>" as="style" onload="this.rel='stylesheet'">

	<!-- Css player video -->
	<!-- <script src="https://cdn.plyr.io/3.6.2/plyr.js"></script> -->
	<!-- <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css"> -->
	<script src="<?php echo base_url('assets/VideoPlayer/plyr.js'); ?>"></script>
	<link rel="preload" href="<?php echo base_url('assets/VideoPlayer/plyr.css'); ?>" as="style" onload="this.rel='stylesheet'">

	<!-- progress bar  -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://oss.maxcdn.com/jquery.form/3.50/jquery.form.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</head>

<?php
$this->session = \Config\Services::session();
if ($this->session->get("Role_name") == 'student') {
	$role = 'นักเรียน';
} else if ($this->session->get("Role_name") == 'teacher') {
	$role = 'คุณครู';
} else if ($this->session->get("Role_name") == 'admin') {
	$role = 'ผู้ดูแล';
}

if (session('correct')) : ?>
	<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Workgress!</strong> <?php echo session('correct') ?>
	</div>
<?php
elseif (session('incorrect')) : ?>
	<div class="alert alert-warning" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Workgress!</strong> <?php echo session('incorrect') ?>
	</div>
<?php
elseif (session('warning')) : ?>
	<div class="alert alert-warning" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Workgress!</strong> <?php echo session('warning') ?>
	</div>
<?php
endif
?>

<body class="hold-transition layout-top-nav">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
			<ul class="navbar-nav ml-5">
				<a href="<?php echo base_url('/home'); ?>" class="navbar-brand">
					<img src="<?php echo base_url('assets/img/logo1.png'); ?>" width="108px" height="44px">
				</a>
			</ul>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown">
						<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">หมวดหมู่ <i class="fas fa-th-large"></i></a>
						<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
							<!-- <li><a href="#" class="dropdown-item">Some action </a></li>
                <li><a href="#" class="dropdown-item">Some other action</a></li> -->

							<li class="dropdown-divider"></li>

							<!-- Level two dropdown-->
							<li class="dropdown-submenu dropdown-hover">
								<a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">IT</a>
								<ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
									<li>
										<a tabindex="-1" href="#" class="dropdown-item">PostgreSql</a>
									</li>

									<!-- Level three dropdown-->
									<li class="dropdown-submenu">
										<a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">PHP</a>
										<ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
											<li><a href="#" class="dropdown-item">Codeigniter 4</a></li>
											<li><a href="#" class="dropdown-item">Laravel</a></li>
										</ul>
									</li>
									<!-- End Level three -->

									<li><a href="#" class="dropdown-item">Selenium</a></li>
									<li><a href="#" class="dropdown-item">AdoDB</a></li>
								</ul>
							</li>
							<!-- End Level two -->
						</ul>
					</li>

				</ul>

				<!-- SEARCH FORM -->
				<div class="container">
					<ul class="nav navbar-nav mx-auto">

						<form class="form-inline ml-1 ml-md-1">
							<div class="input-group">
								<div class="inputlong">
									<input type="text" class="form-control" placeholder="ค้นหาคอร์สเรียนได้ที่นี่">
								</div>
								<div class="input-group-append">
									<button class="btn btn-secondary" type="button">
										<i class="fa fa-search"></i>
									</button>
								</div>
							</div>
						</form>
					</ul>
				</div>
				<!-- SEARCH FORM -->
				<!-- Right navbar links -->

				<div class="navbar-collapse collapse w-200 order-3 dual-collapse" id="navbarSupportedContent">
					<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
						<!-- Messages Dropdown Menu -->
						<div class="input-group input-group-sm">
							<!-- Notifications Dropdown Menu -->
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php
								if ($this->session->get("Picture")) { ?>
									<img src="<?php echo $this->session->get("Picture"); ?>" width="35" height="35" class="rounded-circle"><?php
																																		} else { ?>
									<img src="<?php echo base_url('assets/img/profile.jpg'); ?>" width="40" height="40" class="rounded-circle"><?php
																																			}
																																				?>
							</a>
							<div class="dropdown-menu mx-auto" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="<?php echo base_url('/profile'); ?>">Profile</a>
								<?php
								if ($this->session->get("Role_name") == 'student') {
								?>
									<a class="dropdown-item" href="<?php echo base_url('/teacher'); ?>">สอนบน Workgress</a>
								<?php
								} else if ($this->session->get("Role_name") == 'admin') { ?>
									<a class="dropdown-item" href="<?php echo base_url('/dashboard'); ?>">Dashboard</a>
									<a class="dropdown-item" href="<?php echo base_url('/createcourse'); ?>">เพิ่ม Course</a>
								<?php
								} else if ($this->session->get("Role_name") == 'teacher') { ?>
									<a class="dropdown-item" href="<?php echo base_url('/createcourse'); ?>">เพิ่ม Course</a>
								<?php
								}
								?>
								<a class="dropdown-item" href="<?php echo base_url('/profile'); ?>">My Course</a>
								<a class="dropdown-item" href="<?= site_url('/UserController/User_Logout') ?>">Log Out</a>
							</div>
						</div>
					</ul>
				</div>

			</div>
		</nav>
		<!-- /.navbar -->

		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<header class="masthead">
				<div class="overlay"></div>
				<div class="container">

				</div>
			</header>


			<!-- /.content-header -->

			<!-- Main content -->
			<div class="overlay"></div>
			<div class="container"><br><br><br><br>
				<div style="text-align:center;">


					<!-- <form method="post" action="<?= site_url('/CourseController/Upload_Video') ?>" enctype="multipart/form-data">
						<label>File : </label>
						<input type="file" name="file">
						<button>Upload</button>
					</form><br> -->

					<br />
					<h3 align="center">Ajax File Upload Progress Bar using PHP JQuery</h3>
					<br />
					<div class="panel panel-default">
						<div class="panel-heading"><b>Ajax File Upload Progress Bar using PHP JQuery</b></div>
						<div class="panel-body">
							<form id="uploadImage" action="<?= site_url('/CourseController/Upload_Video') ?>" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label>File Upload</label>
									<input type="file" name="uploadFile" id="uploadFile">
								</div>
								<div class="form-group">
									<input type="submit" id="uploadSubmit" value="Upload" class="btn btn-info" />
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div id="targetLayer" style="display:none;"></div>
							</form>
						</div>
					</div>
					<script>
						$(document).ready(function() {
							$('#uploadImage').submit(function(event) {
								if ($('#uploadFile').val()) {
									event.preventDefault();
									$('#loader-icon').show();
									$('#targetLayer').hide();
									$(this).ajaxSubmit({
										target: '#targetLayer',
										beforeSubmit: function() {
											$('.progress-bar').width('50%');
										},
										uploadProgress: function(event, position, total, percentageComplete) {
											$('.progress-bar').animate({
												width: percentageComplete + '%'
											}, {
												duration: 1000
											});
										},
										success: function() {
											$('#loader-icon').hide();
											$('#targetLayer').show();
											//location.reload();
										},
										resetForm: true


									});
								}
								return false;
							});
						});
					</script>
					<?php
					$count = 0;
					foreach ($data as $row) :
						$count++;
						echo $row['video_id'] . " " . $row['video_name'] . " " . $row['video_link'];
						echo "<br>";
						echo "<video id='player$count' playsinline controls data-poster=''>
						<source src='" . $row['video_link'] . "' type='video/webm'>
						</video>"
					?>
						<script>
							const player<?php echo $count ?> = new Plyr('#player<?php echo $count ?>');
						</script>
					<?php
					endforeach;
					?>
				</div>
				<?php

				?>

			</div>





			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
			<div class="p-3">
				<h5>Profile</h5>
				<p>Sidebar content</p>
			</div>
		</aside>
		<!-- /.control-sidebar -->

		<!-- Main Footer -->
		<footer class="main-footer">
			<div class="footernew">
			</div>
		</footer>
		<div class="footernew2">
			<a href="<?php echo base_url('/home'); ?>">
				<div class="footerimg">
					<img src="<?php echo base_url('assets/img/logo2.png'); ?>">
				</div>
			</a>

			<div class="footericonphone">
				<i class="fa fa-phone">
				</i>
			</div>
			<div class="fa-phonetext">
				<h6 style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px;">(000) 123 4567</h6>
			</div>

			<div class="footericonemail">
				<i class="fa fa-envelope">
				</i>
			</div>
			<div class="fa-envelopetext">
				<h6 style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px;">hello@workgress.com</h6>
			</div>

			<div class="footericonsocial">
				<i class="fab fa-facebook-square"></i>
				<i class="fab fa-twitter-square"></i>
				<i class="fab fa-google-plus-square"></i>
				<i class="fab fa-instagram"></i>
			</div>

			<!-- company row -->
			<div class="row">
				<div class="column">
					<h2 style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 22px;">Company</h2><br>
					<p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">เกี่ยวกับเรา</p>
					<p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">บล็อค</p>
					<p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">ติดค่อเรา</p>
					<p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Become a Teacger</p>
				</div>
			</div>

			<!-- links row -->
			<div class="row">
				<div class="column2">
					<h2 style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 22px;">LINKS</h2><br>
					<p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Courses</p>
					<p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Events</p>
					<p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Gallery</p>
					<p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">FAQs</p>
				</div>
			</div>

			<!-- SUPPORT row -->
			<div class="row">
				<div class="column3">
					<h2 style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 22px;">SUPPORT</h2><br>
					<p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Documentation</p>
					<p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Forums</p>
					<p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Lauguage Packs</p>
					<p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Release Status</p>
				</div>
			</div>

			<!-- Recomment row -->
			<div class="row">
				<div class="column4">
					<h2 style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 22px;">RECOMMEND</h2><br>
					<p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">WordPress</p>
					<p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">LearnPress</p>
					<p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">WooCommerce</p>
					<p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">bbPress</p>
				</div>
			</div>

			<!-- line -->
			<hr class="line">

			<div class="footerinc">
				<p style="font-family: Roboto;font-style: normal;font-weight: normal;">ลิขสิทธิ์ © 2020 WorkGress, Inc. ข้อกำหนด นโยบายความเป็นส่วนตัวและคุกกี้</p>
			</div>
		</div>
	</div>

	<!-- Content Wrapper. Contains page content -->
	<!-- ./wrapper -->

</body>

</html>