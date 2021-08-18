<?php

    $banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : false;

    $banner = "";
    $link = "";
    $gambar ="";
    $status = "";
    $keterangan_gambar = "";
    $button = "Simpan";

    if($banner_id){
        $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE banner_id = '$banner_id'");
        $row = mysqli_fetch_assoc($queryBanner);

        $banner = $row['banner'];
        $link = $row['link'];
        $gambar = $row['gambar'];
        $status = $row['status'];
        $keterangan_gambar = "* Klik pilih gambar jika ingin mengganti gambar";
        $button = "Update";

        $gambar = "<img class='gambar-produk' src='".BASE_URL."images/slide/$gambar' />";
    }

?>

<form action="<?php echo BASE_URL."module/banner/action.php?banner_id=$banner_id"; ?>" id="form-data" method="POST"
    enctype="multipart/form-data">
    <h3 class="text-center h3">Tambah Data Banner</h3>
    <div class="input-group mt-lg-3">
        <label class="label-custom input-group">Nama Banner</label>
        <input type="text" class="form-control" name="banner" value="<?php echo $banner; ?>">
    </div>
    <div class="input-group mt-lg-3">
        <label class="label-custom input-group">Link</label>
        <input type="text" class="form-control" name="link" value="<?php echo $link; ?>">
    </div>
    <div class="input-group mt-lg-3">
        <label class="label-custom input-group">Gambar</label>
        <?php
            echo $gambar;
        ?>
    </div>
    <div class="input-group mt-lg-3">
        <input type="file" class="form-control" name="gambar">
        <label class="label-custom input-group"> <?php echo $keterangan_gambar; ?></label>
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
        <a href="<?php echo BASE_URL.'index.php?page=my_profile&module=banner&action=list'?>"
            class="btn btn-info ml-lg-2 ml-sm-2 ml-md-2">Batal</a>
    </div>
</form>