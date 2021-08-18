<?php

    if($level == "superadmin"){
        $queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id ORDER BY pesanan.tanggal_pemesanan DESC");
    }else{
        $queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id WHERE pesanan.user_id='$user_id' ORDER BY pesanan.tanggal_pemesanan DESC");
    }

    if(mysqli_num_rows($queryPesanan) == 0){
		echo "<h3>Saat ini belum ada data pesanan</h3>";
	}else{
        echo "
        <table class='table table-responsive-sm table-list-lg'>
            <thead>
                <tr>
                    <th>Nomor Pesanan</th>
                    <th>Status</th>
                    <th>Nama</th>
                    <th>Action</th>
                </tr>
            </thead>
            ";
            $adminButton = "";
        while($row=mysqli_fetch_assoc($queryPesanan)){

            if($level == "Admin"){
				$adminButton = "<a class='btn btn-primary' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=status&pesanan_id=$row[pesanan_id]'>Update</a>";
			}

            $status = $row['status'];
            echo "
            <tbody>
                <tr>
                    <td>$row[pesanan_id]</td>
                    <td>$arrayStatusPesanan[$status]</td>
                    <td>$row[nama]</td>
                    <td><a class='btn btn-primary' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$row[pesanan_id]'>Detail</a> $adminButton</td>
                </tr>
            </tbody>
            ";
        }
        
        echo "</table>";
    }

?>