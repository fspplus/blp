<?php
    session_start();
    include '../jsonapp/json-hanwha-api.php';
    enabledebug();
    $checkdb = addbenef($_SESSION['memberid'], $_POST);
    echo $checkdb;
    if($checkdb == 1000){
        echo "<script>window.location.href = './profile';</script>";
    }else{
        echo "<script>alert('Gagal Menambahkan Beneficiary! Silahkan periksa input kembali.".$checkdb."')</script>";
    }
?>