<?php
    if($user_id){
        $module = isset($_GET['module']) ? $_GET['module'] : false;
        $action = isset($_GET['action']) ? $_GET['action'] : false;
        $mode = isset($_GET['mode']) ? $_GET['mode'] : false;
    }else{
        header("location:".BASE_URL."index.php?page=login");
    }

    admin_only($module, $level);
?>

<div class="row">
    <div class="col-lg-3">

        <div class="list-group">
            <?php
        if($level != "Customer"){
    
        ?>
            <a href="<?php echo BASE_URL.'index.php?page=my_profile&module=banner&action=list'?>" <?php if($module == "banner"){
                echo "class='list-group-item list-group-item-action active-sidebar'";
            }else{
                echo "class='list-group-item list-group-item-action'";
            }
            ?>>
                Banner
            </a>
            <a href="<?php echo BASE_URL.'index.php?page=my_profile&module=kategori&action=list'?>" <?php if($module == "kategori"){
                echo "class='list-group-item list-group-item-action active-sidebar'";
            }else{
                echo "class='list-group-item list-group-item-action'";
            }
            ?>>
                Kategori
            </a>
            <a href="<?php echo BASE_URL.'index.php?page=my_profile&module=barang&action=list'?>" <?php if($module == "barang"){
                echo "class='list-group-item list-group-item-action active-sidebar'";
            }else{
                echo "class='list-group-item list-group-item-action'";
            }
            ?>>
                Barang
            </a>
            <a href="<?php echo BASE_URL.'index.php?page=my_profile&module=kota&action=list'?>" <?php if($module == "kota"){
                echo "class='list-group-item list-group-item-action active-sidebar'";
            }else{
                echo "class='list-group-item list-group-item-action'";
            }
            ?>>
                Kota
            </a>
            <a href="<?php echo BASE_URL.'index.php?page=my_profile&module=user&action=list'?>" <?php if($module == "users"){
                echo "class='list-group-item list-group-item-action active-sidebar'";
            }else{
                echo "class='list-group-item list-group-item-action'";
            }
            ?>>
                User
            </a>
            <?php
            }
            ?>
            <a href="<?php echo BASE_URL.'index.php?page=my_profile&module=pesanan&action=list'?>" <?php if($module == "pesanan"){
                echo "class='list-group-item list-group-item-action active-sidebar'";
                
            }else{
                echo "class='list-group-item list-group-item-action'";
            }
            ?>>
                Pesanan
            </a>
        </div>
    </div>
    <div class="col-lg-9">
        <?php 
  			$file = "module/$module/$action.php";

  			if(file_exists($file)){
  				include_once($file);
  			}else{
  				echo "Maaf, halaman tersebut tidak ditemukan";
  			}
  		?>
    </div>
</div>