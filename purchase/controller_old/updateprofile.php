<?php
    session_start();
    session_set_cookie_params(0);
    include '../jsonapp/json-hanwha-api.php';

    $checkdb = updateprofileFirst($_POST, $_SESSION['memberid']);
    if($checkdb == 1211 || $checkdb = 1210){
        echo "<script>alert('Request anda sudah disubmit! Saat ini sedang dalam proses validasi.'); </script>";
    }else{
        echo "<script>alert('Gagal mengupdate profile!');</script>";
    }
?>