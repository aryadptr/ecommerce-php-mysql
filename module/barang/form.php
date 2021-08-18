<?php

    $barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

    $nama_barang = "";
    $kategori_id = "";
    $spesifikasi = "";
    $harga = "";
    $stok = "";
    $gambar ="";
    $status = "";
    $keterangan_gambar = "";
    $button = "Simpan";

    if($barang_id){
        $queryBarang = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id=kategori.kategori_id WHERE barang_id = '$barang_id'");
        $row = mysqli_fetch_assoc($queryBarang);

        $nama_barang = $row['nama_barang'];
        $kategori_id = $row['kategori_id'];
        $spesifikasi = $row['spesifikasi'];
        $harga = $row['harga'];
        $stok = $row['stok'];
        $gambar = $row['gambar'];
        $status = $row['status'];
        $keterangan_gambar = "* Klik pilih gambar jika ingin mengganti gambar";
        $button = "Update";

        $gambar = "<img class='gambar-produk' src='".BASE_URL."images/barang/$gambar' />";
    }

?>

<form action="<?php echo BASE_URL."module/barang/action.php?barang_id=$barang_id"; ?>" id="form-data" method="POST"
    enctype="multipart/form-data">
    <h3 class="text-center h3">Tambah Data Barang</h3>
    <div class="input-group mt-lg-3">
        <label class="label-custom input-group">Kategori</label>
        <select name="kategori_id" class="form-control">
            <?php
            
                $query = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC");
                while($row = mysqli_fetch_assoc($query)){
                    if($kategori_id == $row['kategori_id']){
                        echo "<option value='$row[kategori_id]' selected>$row[kategori]</option>";
                    }else{
                        echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
                    }
                }
            
            ?>
        </select>
    </div>
    <div class="input-group mt-lg-3">
        <label class="label-custom input-group">Nama Barang</label>
        <input type="text" class="form-control" name="nama_barang" value="<?php echo $nama_barang; ?>">
    </div>
    <div class="input-group mt-lg-3">
        <label class="label-custom input-group">Spesifikasi</label>
        <textarea name="spesifikasi" id="editor" class="form-control"><?php echo $spesifikasi?></textarea>
    </div>
    <div class="input-group mt-lg-3">
        <label class="label-custom input-group">Harga</label>
        <input type="text" class="form-control" name="harga" value="<?php echo $harga; ?>">
    </div>
    <div class="input-group mt-lg-3">
        <label class="label-custom input-group">Stok</label>
        <input type="text" class="form-control" name="stok" value="<?php echo $stok; ?>">
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
        <a href="<?php echo BASE_URL.'index.php?page=my_profile&module=barang&action=list'?>"
            class="btn btn-info ml-lg-2 ml-sm-2 ml-md-2">Batal</a>
    </div>
</form>