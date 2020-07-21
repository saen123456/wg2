<!DOCTYPE html>
<html>

<head>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<title>Workgress</title>

		<!-- Theme style -->
		<link rel="stylesheet" href="<?php echo base_url('dist2/css/photo.css'); ?>" type="text/css" media="screen">
		<link href="<?php echo base_url('dist2/css/landing-page1.css" rel="stylesheet'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/dropdown.css'); ?>" type="text/css" media="screen">

		<!-- Font Icon -->
		<link rel="stylesheet" href="<?php echo base_url('assets/fonts/material-icon/css/material-design-iconic-font.min.css'); ?>" type="text/css" media="screen">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,500&display=swap" rel="stylesheet">
		<!-- Main css -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/step.css'); ?>" type="text/css" media="screen">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/select.css'); ?>" type="text/css" media="screen">
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

<body>
	<div class="main">
		<div class="signup-content">
			<div class="signup-desc">
				<div class="signup-desc-content">
					<h2><span><img src="<?php echo base_url('assets/img/logo1.png'); ?>"></span>Workgress</h2>
					<p class="title">สร้างคอร์ส ของคุณสำหรับให้คนมาศึกษาสิ่งใหม่ๆ ที่ Workgress</p>
					<p class="desc">
						MIT licensed illustrations for every project you can imagine and create
					</p>
					<img src="<?php echo base_url('assets/img/signup-img.jpg'); ?>" alt="" class="signup-img">
				</div>
			</div>
			<div class="signup-form-conent">
				<form method="POST" id="signup-form" class="signup-form">
					<h3></h3>
					<fieldset>
						<span class="step-current">Step 1 / 5</span>
						<div class="form-group">
							<input type="text" name="your_name" id="your_name" required />
							<label for="your_name">ชื่อ Title</label>
						</div>
					</fieldset>

					<h3></h3>
					<fieldset>
						<span class="step-current">Step 2 / 5</span>
						<div class="form-group">
							<label id="img_category_label" class="field" for="img_category" data-value="">
								<span><b>Category</b></span>
								<div id="img_category" class="psuedo_select" name="img_category">
									<span class="selected"></span>
									<ul id="img_category_options" class="options">
										<li class="option" data-value="opt_1">Option 1</li>
										<li class="option" data-value="opt_2">Option 2</li>
									</ul>
								</div>
							</label>
						</div>
					</fieldset>

					<h3></h3>
					<fieldset>
						<span class="step-current">Step 3 / 5</span>
						<div class="form-group">
							<input type="text" name="your_password" id="your_password" required />
							<label for="your_password">Your Password</label>
							<span toggle="#your_password" class="zmdi zmdi-eye field-icon toggle-password"></span>
						</div>
					</fieldset>

					<h3></h3>
					<fieldset>
						<span class="step-current">Step 4 / 5</span>
						<div class="form-group">
							<input type="text" name="confirm_password" id="confirm_password" required />
							<label for="confirm_password">Confirm your password</label>
							<span toggle="#confirm_password" class="zmdi zmdi-eye field-icon toggle-password"></span>
						</div>
					</fieldset>
					<h3></h3>
					<fieldset>
						<span class="step-current">Step 5 / 5</span>
						<div class="form-group">
							<input type="text" name="confirm_password" id="confirm_password" required />
							<label for="confirm_password">Confirm your password</label>
							<span toggle="#confirm_password" class="zmdi zmdi-eye field-icon toggle-password"></span>
						</div>
					</fieldset>

				</form>
			</div>
		</div>


	</div>

	<!-- JS -->
	<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/jquery-validation/dist/jquery.validate.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/jquery-validation/dist/additional-methods.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/jquery-steps/jquery.steps.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/step.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/script2.js'); ?>"></script>
</body>

</html>