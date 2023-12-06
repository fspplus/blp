<?php
    session_start();
    session_set_cookie_params(0);
    include '../jsonapp/json-hanwha-api.php';

    $checkdb = getpolicy($_POST['policyCode']);

    echo "<script>alert('E-Policy: ".$_POST['policyCode']." telah dikirim ke email anda!');</script>";
?>