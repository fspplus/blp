<?php

 date_default_timezone_set("Asia/Jakarta") ;
    include 'connectdb.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if(isset($_POST) && $_POST['popup_title'] != NULL){
        
        $_POST['popup_status'] = "active";
        $_POST['last_edit'] = date("Y-m-d");
        
        $_POST['end_date'] = str_replace("/","-",$_POST['end_date']);
        $_POST['start_date'] = str_replace("/","-",$_POST['start_date']);
        
        $_POST['popup_img'] = "./uploads/popup/".$_POST['popup_title'] ." - ". $_POST['last_edit'].".jpeg";
        
        define ('SITE_ROOT', realpath(dirname(__FILE__)));
        move_uploaded_file($_FILES['popup_img']['tmp_name'], '../uploads/popup/' . $_POST['popup_title'] ." - ". $_POST['last_edit'].".jpeg");
        
        $stmt = $conn->prepare("INSERT INTO `popup_table` (`popup_id`, `popup_img`, `popup_title`, `start_date`, `end_date`, `last_edit`, `popup_status`) VALUES (NULL, ?, ?, ?, ?, ?, ?);");

        $stmt->bind_param("ssssss", $_POST['popup_img'], $_POST['popup_title'], $_POST['start_date'], $_POST['end_date'],$_POST['last_edit'], $_POST['popup_status']);

        //echo "INSERT INTO `popup_table` (`popup_id`, `popup_category`, `popup_question`, `popup_answers`, `popup_status`, `popup_date`, `popup_sort`) VALUES (NULL, '".$_POST['popup_img']."', '".$_POST['popup_title']."', '".$_POST['start_date']."', '".$_POST['end_date']."', '".$_POST['last_edit']."', '".$_POST['popup_status']."');";
        
        $stmt->execute();
        $stmt->close();
        echo "<span>Please Wait ... </span><script> window.location.href='../popup';</script>";
    }else{
        $empty = "fail";
        echo $empty;
    }
?>