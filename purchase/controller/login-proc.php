<?php
    session_start();
    ob_start();
    session_set_cookie_params(0);
    include '../jsonapp/json-hanwha-api.php';

    $checkdb = signin($_POST['hanwhaemail'], $_POST['hanwhapassword']);
    $checkdbs = json_decode($checkdb['data'], true);
    // echo $checkdbs;
    if($checkdb['result_code'] == 1000){
        $_SESSION['email'] = $_POST['hanwhaemail'];
        $_SESSION['fullname'] = $checkdbs['fullName'];
        $_SESSION['memberid'] = $checkdbs['memberId'];
        // echo "<div class='script'><script>window.location.replace('./purchase/profile')</script></div>";
    }else if($checkdb['result_code'] == 1100){
        echo "Wrong combination of password or email!";
        echo "<style>.scriptloader{top: 0 !important;}</style>";
    }
?>