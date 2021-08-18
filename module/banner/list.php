<div class="card" id="card-data">
    <div class="card-header">
        <h4 class="align-self-center">Data Banner
            <a style="float: right;" href="<?php echo BASE_URL.'index.php?page=my_profile&module=banner&action=form';?>"
                class="align-self-center btn btn-primary">Tambah Banner</a>
        </h4>
    </div>
    <div class="card-body">

        <?php

            $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner ORDER BY banner ASC");

            if(mysqli_num_rows($queryBanner)== 0){
                echo "<h3 class='text-center'>Tidak ada data banner di dalam database</h3>";
            }else{
                echo "<table class='table table-responsive'>";
                echo  "<thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Banner</th>
                                <th>Gambar</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>";
                $no = 1;
                while($row = mysqli_fetch_assoc($queryBanner)){
                    echo "<tbody>
                            <tr>
                                <td>$no</td>
                                <td>$row[banner]</td>
                                <td><img src='".BASE_URL."images/slide/$row[gambar]' width=100 height=100 /></td>
                                <td>$row[link]</td>
                                <td>$row[status]</td>
                                <td>
                                    <a class='btn btn-success' href='".BASE_URL."index.php?page=my_profile&module=banner&action=form&banner_id=$row[banner_id]'>Edit</a>
                                    <a class='btn btn-danger' href='".BASE_URL."module/banner/action.php?button=Delete&banner=$row[banner_id]'>Delete</a>
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