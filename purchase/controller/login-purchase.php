<?php
    session_start();
    ob_start();
    session_set_cookie_params(0);
    include '../jsonapp/json-hanwha-api.php';

    // $checkdb = signin($_POST['hanwhaemail'], $_POST['hanwhapassword']);
    // $checkdbs = json_decode($checkdb['data'], true);
    // if($checkdb['result_code'] == 1000){
    //     $_SESSION['email'] = $_POST['hanwhaemail'];
    //     $_SESSION['fullname'] = $checkdbs['fullName'];
    //     $_SESSION['memberid'] = $checkdbs['memberId'];
    //     echo "<div class='script'><script>location.reload();</script></div>";
    // }else if($checkdb['result_code'] == 1100){
    //     echo "Wrong combination of password or email!";
    //     echo "<style>.scriptloader{top: 0 !important;}</style>";
    // }
// print_r($_POST['hanwhaotp']);
    $result_code = login_otp($_POST['hanwhaemail'], $_POST['hanwhaotp']);
    $result_code = $result_code['response'];
    $result_code2 = json_decode($result_code['data'], true);
    // $result_code = json_decode($result_code['data'], true);
    // print_r($result_code2);
    if($result_code['result_code'] == 1000){
        $_SESSION['email'] = $_POST['hanwhaemail'];
        $_SESSION['fullname'] = $result_code2['fullName'];
        $_SESSION['memberid'] = $result_code2['memberId'];
        $_SESSION['role'] = "customer";
        echo "<div class='script'><script>location.reload()</script></div>";
        // echo "<div class='script'><script>window.location.replace('../../purchase/profile')</script></div>";
    }else if($result_code['result_code'] == 3103){
        echo "Kode OTP yang Anda masukkan salah";
        //echo "<div class='script'><script>window.location.replace('../../otp?err=1')</script></div>";
    }else if($result_code['result_code'] == 3105){
        echo "Kode OTP yang Anda masukkan sudah tidak berlaku.";
        //echo "<div class='script'><script>window.location.replace('../../otp?err=1')</script></div>";
    }else if($result_code['result_code'] == 1100){
        echo "Wrong combination of password or email!";
        echo "<style>.scriptloader{top: 0 !important;}</style>";
    }
?>