<?php
    // session_start();
    // session_set_cookie_params(0);
    // include '/var/www/html/jsonapp/json-hanwha-api.php';
    $_POST['hanwhadob'] = str_replace("-", "", $_POST['hanwhadob']);

    $checkdb = updateprofileFirst($_POST, $_SESSION['memberid']);
    // print_r($checkdb);
    // die();
    if($checkdb['result_code'] == 1211 || $checkdb['result_code'] == 1210){
        echo "<script>alert('Data kamu berhasil diupdate! Sesaat lagi kamu akan dapat menjalankan semua fitur Bucketlistplan.');</script>";
        echo "<script>window.location.href='./profile?update=finish';</script>";
    }else if($checkdb['result_code'] == 3101 || $checkdb['result_code'] == 1001){
        echo "<script>alert('Profile anda tidak bisa diupdate! Silahkan hubungi Customer Service untuk informasi lebih lanjut! Message: ".$checkdb['message']."');</script>";
    }else{
        echo "<script>window.location.href='./profile?response=".$checkdb['result_code']."&message=".$checkdb['message']."';</script>";
    }
?>