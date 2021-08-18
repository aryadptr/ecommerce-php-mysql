<div class="card" id="card-data">
    <div class="card-header">
        <h4 class="align-self-center">Data Barang
            <a style="float: right;" href="<?php echo BASE_URL.'index.php?page=my_profile&module=kota&action=form';?>"
                class="align-self-center btn btn-primary">Tambah Kota</a>
        </h4>
    </div>
    <div class="card-body">

        <?php

            $queryKota = mysqli_query($koneksi, "SELECT * FROM kota ORDER BY kota ASC");

            if(mysqli_num_rows($queryKota)== 0){
                echo "<h3 class='text-center'>Tidak ada data kota di dalam database</h3>";
            }else{
                echo "<table class='table table-responsive-lg table-responsive-sm'>";
                echo  "<thead>
                            <tr>
                                <th>No.</th>
                                <th>Kota</th>
                                <th>Tarif</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>";
                $no = 1;
                while($row = mysqli_fetch_assoc($queryKota)){
                    echo "<tbody>
                            <tr>
                                <td>$no</td>
                                <td>$row[kota]</td>
                                <td>".rupiah($row['tarif'])."</td>
                                <td>$row[status]</td>
                                <td>
                                    <a class='btn btn-success' href='".BASE_URL."index.php?page=my_profile&module=kota&action=form&kota_id=$row[kota_id]'>Edit</a>
                                    <a class='btn btn-danger' href='".BASE_URL."module/kota/action.php?button=Delete&kota_id=$row[kota_id]'>Delete</a>
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