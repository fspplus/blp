<?php 
session_start();
ob_start();
include '../jsonapp/json-hanwha-api.php';
$result_code = login_otp($_SESSION["loginCred"]['cont'], $_POST['hanwhaotp']);
$result_code = $result_code['response'];
if($result_code['result_code'] == 1000){
    echo "Logging you in...";
    $poster = json_decode($result_code['data'], true);
    $_SESSION['email'] = $_SESSION["loginCred"]['cont'];
    $_SESSION['fullname'] = $poster['fullName'];
    $_SESSION['memberid'] = $poster['memberId'];
    $_SESSION['role'] = "customer";
    echo "<div class='script'><script>window.location.replace('../../purchase/profile')</script></div>";
}else if($result_code['result_code'] == 3103){
    echo "Kode OTP yang Anda masukkan salah";
    //echo "<div class='script'><script>window.location.replace('../../otp?err=1')</script></div>";
}else if($result_code['result_code'] == 3105){
    echo "Kode OTP yang Anda masukkan sudah tidak berlaku.";
    //echo "<div class='script'><script>window.location.replace('../../otp?err=1')</script></div>";
}
?>