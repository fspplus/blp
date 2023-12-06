<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include 'connectdb.php';
    $sql = "SELECT * FROM ".$_GET['type']."_table WHERE ".$_GET['type']."_id=".$_GET['id'];
    //echo $sql;
    $query = mysqli_query($conn,$sql);
    while($data = mysqli_fetch_array($query)){
        if($data[''.$_GET['type'].'_status'] == "active"){
            $stmt = $conn->prepare("UPDATE `".$_GET['type']."_table` SET `".$_GET['type']."_status` = 'inactive' WHERE `".$_GET['type']."_table`.`".$_GET['type']."_id` = ".$_GET['id'].";");

            $stmt->execute();
            ?>
<div class="cont" style="padding: 20px; background-color: #ff0110; color: white;">
   <?php echo "id: ".$data[''.$_GET['type'].'_id']." has been deactivated."?> 
</div>
            <?php
        }else if($data[''.$_GET['type'].'_status'] == "inactive"){
            $stmt = $conn->prepare("UPDATE `".$_GET['type']."_table` SET `".$_GET['type']."_status` = 'active' WHERE `".$_GET['type']."_table`.`".$_GET['type']."_id` = ".$_GET['id'].";");

            $stmt->execute();
            ?>
<div class="cont" style="padding: 20px; background-color: #007f38; color: white;">
   <?php echo "id: ".$data[''.$_GET['type'].'_id']." has been activated!."?> 
</div>
            <?php
        }
    }
?>