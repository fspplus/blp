<?php
    session_start();
    session_set_cookie_params(0);
    include '../jsonapp/json-hanwha-api.php';

    $checkdb = signin($_POST['hanwhaemail'], $_POST['hanwhapassword']);
    if($checkdb == TRUE){
        $_SESSION['email'] = $_POST['hanwhaemail'];
        $_SESSION['fullname'] = $checkdb['fullName'];
        $_SESSION['memberid'] = $checkdb['memberId'];
        //echo "Signing in ... ";
        echo "<div class='script'><script>window.location.reload('true')</script></div>";
    }else if($checkdb == FALSE){
        //echo "Wrong combination of password or email!";
        echo "<style>.scriptloader{top: 0 !important;}</style>";
        echo "<script>alert('Email/Password yang anda masukan salah. Silahkan periksa kembali data input anda.');</script>";
    }
?>