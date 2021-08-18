<?php

    $kota_id = isset($_GET['kota_id']) ? $_GET['kota_id'] : false;
	
	$kota = "";
	$tarif = "";
	$status = "";
	$button = "Simpan";

	if($kota_id){
		$queryKota = mysqli_query($koneksi, "SELECT * FROM kota WHERE kota_id='$kota_id'");
		$row=mysqli_fetch_assoc($queryKota);
		
		$kota = $row['kota'];
		$tarif = $row['tarif'];
		$status = $row['status'];
		
		$button = "Update";
	}

?>

<form action="<?php echo BASE_URL."module/kota/action.php?kota_id=$kota_id"; ?>" id="form-data" method="POST"
    enctype="multipart/form-data">
    <h3 class="text-center h3">Tambah Data Kota</h3>
    <div class="input-group mt-lg-3">
        <label class="label-custom input-group">Kota</label>
        <input type="text" class="form-control" name="kota" value="<?php echo $kota; ?>">
    </div>
    <div class="input-group mt-lg-3">
        <label class="label-custom input-group">Tarif</label>
        <input type="text" class="form-control" name="tarif" value="<?php echo $tarif; ?>">
    </div>
    <div class="input-group mt-lg-3">
        <label class="label-custom input-group">Status</label>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="status" value="on"
                    <?php if($status == "on") {echo "checked='true'";} ?>>On
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="status" value="off"
                    <?php if($status == "off") {echo "checked='true'";} ?>>Off
            </label>
        </div>
    </div>
    <div class="input-group mt-lg-3">
        <input class="btn btn-primary" name="button" type="submit" value="<?php echo $button; ?>"></input>
        <a href="<?php echo BASE_URL.'index.php?page=my_profile&module=kota&action=list'?>"
            class="btn btn-info ml-lg-2 ml-sm-2 ml-md-2">Batal</a>
    </div>
</form>