<div class="card" id="card-data">
    <div class="card-header">
        <h4 class="align-self-center">Data Barang
            <a style="float: right;" href="<?php echo BASE_URL.'index.php?page=my_profile&module=barang&action=form';?>"
                class="align-self-center btn btn-primary">Tambah Barang</a>
        </h4>
    </div>
    <div class="card-body">

        <?php

            $queryBarang = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id=kategori.kategori_id
            ORDER BY nama_barang ASC");

            if(mysqli_num_rows($queryBarang)== 0){
                echo "<h3 class='text-center'>Tidak ada data barang di dalam database</h3>";
            }else{
                echo "<table class='table table-responsive'>";
                echo  "<thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Spesifikasi</th>
                                <th>Gambar</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Action</th>
                            </tr>
                        </thead>";
                $no = 1;
                while($row = mysqli_fetch_assoc($queryBarang)){
                    echo "<tbody>
                            <tr>
                                <td>$no</td>
                                <td>$row[nama_barang]</td>
                                <td>$row[kategori]</td>
                                <td>$row[spesifikasi]</td>
                                <td><img src='".BASE_URL."/images/barang/$row[gambar]' width=100 height=100 /></td>
                                <td>".rupiah($row['harga'])."</td>
                                <td>$row[stok]</td>
                                <td>
                                    <a class='btn btn-success' href='".BASE_URL."index.php?page=my_profile&module=barang&action=form&barang_id=$row[barang_id]'>Edit</a>
                                    <a class='btn btn-danger' href='".BASE_URL."module/barang/action.php?button=Delete&barang_id=$row[barang_id]'>Delete</a>
                                </td>
                            </tr>
                        </tbody>";
                    $no++;
                }
                echo "</table>";
            }

        ?>
    </div>
</div>