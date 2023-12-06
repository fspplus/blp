<?php
    session_start();
    ob_start();
    session_set_cookie_params(0);
    include '../jsonapp/json-hanwha-api.php';

    $checkdb = signin($_POST['hanwhaemail'], $_POST['hanwhapassword']);
    $checkdbs = json_decode($checkdb['data'], true);
    // print_r($checkdb);
    if($checkdb['result_code'] == 1000){
        $_SESSION['email'] = $_POST['hanwhaemail'];
        $_SESSION['fullname'] = $checkdbs['fullName'];
        $_SESSION['memberid'] = $checkdbs['memberId'];
        $_SESSION['role'] = "customer";
        echo "<div class='script'><script>location.reload()</script></div>";
    }else if($checkdb['result_code'] == 1301 || $checkdb['result_code'] == 1300){
        echo "<script>alert('".$checkdb['message']."')</script>";
        echo "<style>.scriptloader{top: 0 !important;}</style>";
    }
?>