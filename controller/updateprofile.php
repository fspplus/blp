<?php
    // session_start();
    // session_set_cookie_params(0);
    // include '/var/www/html/jsonapp/json-hanwha-api.php';
    $_POST['hanwhadob'] = str_replace("-", "", $_POST['hanwhadob']);

    $checkdb = updateprofileFirst($_POST, $_SESSION['memberid']);
    // print_r($checkdb['result_code']);
    if($checkdb['result_code'] == 1211 || $checkdb['result_code'] == 1210){
        echo "<script>window.location.href='./profile?update=finish';</script>";
    }else if($checkdb['result_code'] == 3101){
        echo "<script>alert('Profile anda tidak bisa diupdate! Silahkan hubungi Customer Service untuk informasi lebih lanjut!');</script>";
    }else{
        echo "<script>alert('Gagal mengupdate profile!');</script>";
    }
?>