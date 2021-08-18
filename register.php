<?php
	if($user_id){
		header("location:".BASE_URL);
	}
?>

<div class="row align-items-center">
	<div class="col-lg-6">
		<img class="img-fluid d-none d-lg-block align-middle" src="images/register.png">
	</div>
	<div class="col-lg-6">
		<h3 style="font-family: 'Poppins', sans-serif !important;
	color: black !important;
	font-weight: 400 !important;" class="text-center">Sign Up</h3>
		<?php

			// Mengecek Notifikasi dan Input dari Form
			$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
			$fullname = isset($_GET['fullname']) ? $_GET['fullname'] : false;
			$email = isset($_GET['email']) ? $_GET['email'] : false;
			$phone = isset($_GET['phone']) ? $_GET['phone'] : false;
			$address = isset($_GET['address']) ? $_GET['address'] : false;

			if ($notif == "require") {
				echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Harap lengkapi data dengan benar!
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				    <span aria-hidden='true'>&times;</span>
				  </button>
				</div>";
			}else if ($notif == "password") {
				echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Password tidak sesuai!
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				    <span aria-hidden='true'>&times;</span>
				  </button>
				</div>";
			}else if ($notif == "email") {
				echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Email sudah terdaftar!
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				    <span aria-hidden='true'>&times;</span>
				  </button>
				</div>";
			}
		?>
		<form action="<?php echo BASE_URL.'proses_register.php'; ?>" method="POST">
			<div class="input-group mt-lg-3">
				<label class="label-custom input-group">Email</label>
				<input type="email" class="form-control" name="email" value="<?php echo $email?>">
			</div>
			<div class="input-group mt-lg-3">
				<label class="label-custom input-group">Full Name</label>
				<input type="text" class="form-control" name="fullname" value="<?php echo $fullname?>">
			</div>
			<div class="input-group mt-lg-3">
				<label class="label-custom input-group">Phone</label>
				<input type="text" class="form-control" name="phone" value="<?php echo $phone?>">
			</div>
			<div class="input-group mt-lg-3">
				<label class="label-custom input-group">Address</label>
				<input type="text" class="form-control" name="address" value="<?php echo $address?>">
			</div>
			<div class="input-group mt-lg-3">
				<label class="label-custom input-group">Password</label>
				<input type="Password" class="form-control" name="password">
			</div>
			<div class="input-group mt-lg-3">
				<label class="label-custom input-group">Re-Password</label>
				<input type="Password" class="form-control" name="re-password">
			</div>
			<input class="btn btn-primary mt-lg-4 form-control" type="submit" value="Sign Up">
		</form>
	</div>
</div>
