<?php
	if($user_id){
		header("location:".BASE_URL);
	}
?>

<div class="row align-items-center">
    <div class="col-lg-6">
        <img class="img-fluid d-none d-lg-block align-middle" src="images/login.png">
    </div>
    <div class="col-lg-6">
        <h3 style="font-family: 'Poppins', sans-serif !important;
	color: black !important;
	font-weight: 400 !important;" class="text-center">Sign In</h3>
        <?php
			$notif = isset($_GET['notif']) ? $_GET['notif'] : false;

			if ($notif == true) {
				echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Data tidak sesuai!
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				    <span aria-hidden='true'>&times;</span>
				  </button>
				</div>";
			}
		?>
        <form action="<?php echo BASE_URL."proses_login.php"?>" method="POST">
            <div class="input-group mt-lg-3">
                <label class="label-custom input-group">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="input-group mt-lg-3">
                <label class="label-custom input-group">Password</label>
                <input type="Password" class="form-control" name="password">
            </div>
            <button class="btn btn-primary mt-lg-4 form-control" type="submit">Sign In</button>
            <a class="btn btn-secondary mt-lg-2 form-control" href="">Sign Up</a>
        </form>
    </div>
</div>