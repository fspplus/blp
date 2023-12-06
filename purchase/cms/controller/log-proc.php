<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
print_r($_POST);

ob_start();
session_start();

var_dump(isset($_POST['logemail']));
if(!isset($_POST['logemail']) || $_POST['logemail'] == NULL){
    header('Location: ../login?stat=1');
    //echo "FAIL!";
}else{
    include '../fnc/fnc.php';
    
    $_POST['logpass'] = md5($_POST['logpass']);
    print_r($_POST);
    
    if(get_login($_POST) == TRUE){
        //echo "<script>alert('".$_SESSION['user_name']."')</script>";
        header('Location: ../../cms');
    }else{
        header('Location: ../login?stat=2');
    }
    
    //print_r($_SESSION);
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>