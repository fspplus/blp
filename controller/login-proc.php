<?php
    session_start();
    ob_start();
    session_set_cookie_params(0);
    include '../jsonapp/json-hanwha-api.php';

    $checkdb = signin($_POST['hanwhaemail'], $_POST['hanwhapassword']);
    $checkdbs = json_decode($checkdb['data'], true);

    echo "<style>.scriptloader{top: 0 !important;}</style>";
    // print_r($checkdbs);
    if($checkdb['result_code'] == 1000){
        $_SESSION['email'] = $_POST['hanwhaemail'];
        $_SESSION['fullname'] = $checkdbs['fullName'];
        $_SESSION['memberid'] = $checkdbs['memberId'];
        $_SESSION['role'] = "customer";
        echo "<div class='script'><script>window.location.replace('../purchase/profile')</script></div>";
    }else if($checkdb['result_code'] == 1100 || $checkdb['result_code'] == 1301){
        echo "<style>.scriptloader{top: 0 !important;}</style>";
        echo "Wrong combination of password or email!";
    }else if($checkdb['result_code'] == 1104){
        echo "<style>.scriptloader{top: 0 !important;}</style>";
        echo "Account not verified";
    }else{
        echo "<style>.scriptloader{top: 0 !important;}</style>";
        echo $checkdb['message'];
    }
?>