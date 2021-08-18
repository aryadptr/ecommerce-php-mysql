<?php

    $pesanan_id = $_GET['pesanan_id'];

    $query = mysqli_query($koneksi, "SELECT status FROM pesanan WHERE pesanan_id='$pesanan_id'");
	$row=mysqli_fetch_assoc($query);
	$status = $row['status'];

?>

<form action="<?php echo BASE_URL."module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" id="form-data" method="POST"
    enctype="multipart/form-data">
    <h3 class="text-center h3">Edit Status Pesanan</h3>
    <div class="input-group mt-lg-3">
        <label class="label-custom input-group">Pesanan ID</label>
        <input readonly type="text" class="form-control" name="pesanan_id" value="<?php echo $pesanan_id; ?>">
    </div>
    <div class="input-group mt-lg-3">
        <label class="label-custom input-group">Status Pesanan</label>
        <select name="status" class="custom-select" id="inputGroupSelect01">
            <?php
            
                foreach($arrayStatusPesanan AS $key => $value){
                    if($status == $key){
						echo "<option value='$key' selected>$value</option>";
					}
					else{
						echo "<option value='$key'>$value</option>";
					}
                }
            
            ?>
        </select>
    </div>
    <div class="input-group mt-lg-3">
        <input class="btn btn-primary" name="button" type="submit" value="Update Status"></input>
        <a href="<?php echo BASE_URL.'index.php?page=my_profile&module=pesanan&action=list'?>"
            class="btn btn-info ml-lg-2 ml-sm-2 ml-md-2">Batal</a>
    </div>
</form>