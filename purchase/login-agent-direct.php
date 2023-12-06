<?php
ob_start();
session_start();
    include '../jsonapp/json-hanwha-api.php';

    if(isset($_SESSION['loginCred'])){
        $_POST['hanwhaemail'] = $_SESSION['loginCred']['cont'];
    }

    if(isset($_POST['agentcode'])){
        $_GET['agentcode'] = $_POST['agentcode'];
        $_GET['password'] = $_POST['password'];
    }

    $checkdb = signin_agent($_GET['agentcode'], $_GET['password']);
    $container = $checkdb['data'];
    echo "<style>.scriptloader{top: 0 !important;}</style>";
    // print_r($checkdb);
    if($checkdb['result_code'] == 0){
        $_SESSION['email'] = $container['email'];
        $_SESSION['fullname'] = $container['agent_name'];
        $_SESSION['memberid'] = $container['agent_code'];
        $_SESSION['role'] = "agent";
        // print_r($_SESSION);
        echo "Logging you in...";
        echo "<div class='script'><script>window.location.replace('./profile')</script></div>";
    }else if($checkdb['result_code'] != 0){
        echo "Wrong combination of password or email!";
    }
?>