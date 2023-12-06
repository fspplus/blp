<?php
ob_start();
session_start();
    include '../jsonapp/json-hanwha-api.php';

    if(isset($_SESSION['loginCred'])){
        $_POST['hanwhaemail'] = $_SESSION['loginCred']['cont'];
    }
    
    if($_POST['hanwhapassword'] == NULL){
        $_POST['hanwhapassword'] = "";
    }
    // print_r($_POST);
    // die();

    $checkdb = signin_agent($_POST['hanwhaemail'], $_POST['hanwhapassword']);
    $container = $checkdb['data'];
    echo "<style>.scriptloader{top: 0 !important;}</style>";
    // print_r($checkdb);
    // die();
    if($checkdb['result_code'] == 0){
        $_SESSION['email'] = $container['email'];
        $_SESSION['fullname'] = $container['agent_name'];
        $_SESSION['memberid'] = $container['agent_id'];
        $_SESSION['role'] = "agent";
        $_SESSION['agent-data'] = $container;
        // print_r($checkdb);
        echo "Logging you in...";
        echo "<div class='script'><script>window.location.replace('./profile')</script></div>";
    }else if($checkdb['result_code'] != 0){
        echo "Wrong combination of password or email!";
    }
?>