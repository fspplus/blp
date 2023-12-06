<?php
    session_start();
    session_set_cookie_params(0);
    include '../jsonapp/json-hanwha-api.php';

    $checkdb = changepassword($_SESSION['memberid'], $_POST);
    if($checkdb == 1000){
        echo "<div class='script'><script>window.location.replace('./profile?change=2')</script></div>";
    }else{
        echo "<script>alert('Gagal! Silahkan cek kembali kombinasi password baru dan lama anda!');</script>";
        echo "<style>.scriptloader{top: 0 !important;}</style>";
    }
?>