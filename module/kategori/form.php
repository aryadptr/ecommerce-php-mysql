<?php

    $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

    $kategori = "";
    $status = "";
    $gambar = "";
    $keterangan_gambar = "";
    $button = "Simpan";

    if($kategori_id){
        $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id = '$kategori_id'");
        $row = mysqli_fetch_assoc($queryKategori);

        $kategori = $row['kategori'];
        $status = $row['status'];
        $gambar = $row['gambar'];
        $keterangan_gambar = "* Klik pilih gambar jika ingin mengganti gambar";
        $button = "Update";

        $gambar = "<img class='gambar-produk' src='".BASE_URL."images/kategori/$gambar' />";

    }

?>

<form action="<?php echo BASE_URL."module/kategori/action.php?kategori_id=$kategori_id"; ?>" id="form-data"
    method="POST" enctype="multipart/form-data">
    <h3 class="text-center h3">Tambah Data Kategori</h3>
    <div class="input-group mt-lg-3">
        <label class="label-custom input-group">Kategori</label>
        <input type="text" class="form-control" name="kategori" value="<?php echo $kategori; ?>">
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
        <a href="<?php echo BASE_URL.'index.php?page=my_profile&module=kategori&action=list'?>"
            class="btn btn-info ml-lg-2 ml-sm-2 ml-md-2">Batal</a>
    </div>
</form>