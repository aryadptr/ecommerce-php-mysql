<div class="card" id="card-data">
    <div class="card-header">
        <h4 class="align-self-center">Data Kategori
            <a style="float: right;"
                href="<?php echo BASE_URL.'index.php?page=my_profile&module=kategori&action=form';?>"
                class="align-self-center btn btn-primary">Tambah Kategori</a>
        </h4>
    </div>
    <div class="card-body">

        <?php

            $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY kategori ASC");

            if(mysqli_num_rows($queryKategori)== 0){
                echo "<h3 class='text-center'>Tidak ada data kategori di dalam database</h3>";
            }else{
                echo "<table class='table table-responsive'>";
                echo  "<thead>
                            <tr>
                                <th>No.</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>";
                $no = 1;
                while($row = mysqli_fetch_assoc($queryKategori)){
                    echo "<tbody>
                            <tr>
                                <td>$no</td>
                                <td>$row[kategori]</td>
                                <td>$row[status]</td>
                                <td>
                                    <a class='btn btn-success' href='".BASE_URL."index.php?page=my_profile&module=kategori&action=form&kategori_id=$row[kategori_id]'>Edit</a>
                                    <a class='btn btn-danger' href='".BASE_URL."module/kategori/action.php?button=Delete&kategori_id=$row[kategori_id]'>Delete</a>
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