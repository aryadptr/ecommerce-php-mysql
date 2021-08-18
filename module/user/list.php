<?php
    $no=1;
      
    $queryAdmin = mysqli_query($koneksi, "SELECT * FROM user ORDER BY nama ASC");
      
    if(mysqli_num_rows($queryAdmin) == 0)
    {
        echo "<h3>Saat ini belum ada data user yang dimasukan</h3>";
    }
    else
    {
        echo "<table class='table table-responsive-sm table-list-lg'>";
          
            echo "<tr class='baris-title'>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Action</th>
                 </tr>";
  
            while($rowUser=mysqli_fetch_array($queryAdmin))
            {
                echo "<tr>
                        <td>$no</td>
                        <td>$rowUser[nama]</td>
                        <td>$rowUser[email]</td>
                        <td>$rowUser[phone]</td>
                        <td>$rowUser[level]</td>
                        <td>$rowUser[status]</td>
                        <td><a class='btn btn-primary' href='".BASE_URL."index.php?page=my_profile&module=user&action=form&user_id=$rowUser[user_id]"."'>Edit</a></td>
                     </tr>";
              
                $no++;
            }
          
        //AKHIR DARI TABLE
        echo "</table>";
    }
?>