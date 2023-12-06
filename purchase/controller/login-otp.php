<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();
ob_start();
include '../jsonapp/json-hanwha-api.php';
$result_code = login_otp($_SESSION["loginCred"]['cont'], $_POST['hanwhaotp']);
$result_code = $result_code['response'];
print_r($result_code);
if($result_code['result_code'] == 1000){
    echo "Logging you in...";
    $poster = json_decode($result_code['data'], true);
    $_SESSION['email'] = $_SESSION["loginCred"]['cont'];
    $_SESSION['fullname'] = $poster['fullName'];
    $_SESSION['memberid'] = $poster['memberId'];
    // echo "<div class='script'><script>window.location.replace('../../purchase/profile')</script></div>";
}else if($result_code['result_code'] == 3103){
    echo "Kode OTP yang Anda masukkan salah";
    //echo "<div class='script'><script>window.location.replace('../../otp?err=1')</script></div>";
}else if($result_code['result_code'] == 3105){
    echo "Kode OTP yang Anda masukkan sudah tidak berlaku.";
    //echo "<div class='script'><script>window.location.replace('../../otp?err=1')</script></div>";
}
?>