<?php
if($_POST['hanwhaSameMailing'] == "sesuai"){
            $_POST['hanwhaKTPaddr1'] = $_POST['hanwhaMailaddr1'];
            $_POST['hanwhaKTPaddr2'] = $_POST['hanwhaMailaddr2'];
            $_POST['hanwhaKTPcity1'] = $_POST['hanwhaMailcity1'];
            $_POST['hanwhaKTPcity2'] = $_POST['hanwhaMailcity2'];
            $_POST['hanwhaKTPPostal'] = $_POST['hanwhaMailPostal'];
            $_POST['hanwhaSameMailing'] = 1;
        }
        if(!isset($_POST['hanwhaSameMailing'])){
            $_POST['hanwhaSameMailing'] = 0;
        }

        if(!isset($_POST['hanwhaposition'])){
            $_POST['hanwhaposition'] = "";
        }
        if(!isset($_POST['hanwhasector'])){
            $_POST['hanwhasector'] = "";
        }
        if(!isset($_POST['hanwhacompanyname'])){
            $_POST['hanwhacompanyname'] = "";
        }

        define ('SITE_ROOT', realpath(dirname(__FILE__)));
        move_uploaded_file($_FILES['hanwhafotoktp']['tmp_name'], '/var/www/bucketlistplan.co.id/web/assets/images/ktpuploads/' . $_SESSION['fullname'] ." - ". $_POST['hanwhanik'].".jpeg");

    $checkdb = updateprofileFirst($_POST, $_SESSION['memberid']);
    //print_r($checkdb);
    if($checkdb['result_code'] == 3101){
        //echo "<script>alert('Request anda sudah disubmit! Saat ini sedang dalam proses validasi.'); </script>";
        echo "<script>alert('Error: 3101 - Message: ".$checkdb['message']."');</script>";
    }else if($checkdb['result_code'] == 1210){
        echo "<script>alert('Data anda sudah diperbaharui!');window.location.href='../';</script>";
    }
    else{
        //echo "<script>alert('Gagal mengupdate profile!');</script>";
        echo "<script>alert('".$checkdb['message']."');</script>";
    }
?>