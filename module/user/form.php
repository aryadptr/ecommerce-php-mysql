<?php
      
    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";
      
	$button = "Update";
	$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");
	 
	$row=mysqli_fetch_array($queryUser);
	  
	$nama = $row["nama"];
	$email = $row["email"];
	$phone = $row["phone"];
	$alamat = $row["alamat"];
	$status = $row["status"];
	$level = $row["level"];
?>
<form action="<?php echo BASE_URL."module/user/action.php?user_id=$user_id"?>" method="POST">

    <div class="input-group mt-lg-3">
        <label>Nama Lengkap</label>
        <input class="form-control" type="text" name="nama" value="<?php echo $nama; ?>">
    </div>

    <div class="input-group mt-lg-3">
        <label>Email</label>
        <input class="form-control" class="form-control" type="text" name="email" value="<?php echo $email; ?>" />
    </div>

    <div class="input-group mt-lg-3">
        <label>Phone</label>
        <input class="form-control" type="text" name="phone" value="<?php echo $phone; ?>" />
    </div>

    <div class="input-group mt-lg-3">
        <label>Alamat</label>
        <input class="form-control" type="text" name="alamat" value="<?php echo $alamat; ?>" />
    </div>

    <div class="input-group mt-lg-3">
        <label>Level</label>
        <input class="form-control" type="radio" value="Admin" name="level"
            <?php if($level == "superadmin"){ echo "checked"; } ?> />
        Admin
        <input class="form-control" type="radio" value="Customer" name="level"
            <?php if($level == "customer"){ echo "checked"; } ?> />
        Customer
    </div>

    <div class="input-group mt-lg-3">
        <label>Status</label>
        <input class="form-control" type="radio" value="on" name="status"
            <?php if($status == "on"){ echo "checked"; } ?> /> on
        <input class="form-control" type="radio" value="off" name="status"
            <?php if($status == "off"){ echo "checked"; } ?> /> off
    </div>

    <div class="input-group mt-lg-3">
        <input type="submit" name="button" value="<?php echo $button; ?>" class="btn btn-primary" />
    </div>
</form>