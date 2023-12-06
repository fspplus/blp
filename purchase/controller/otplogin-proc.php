<?php

include ('/var/www/html/jsonapp/json-hanwha-api.php'); //writelog();
    if(isset($_POST['hanwhaemail'])){
        $email = $_POST["hanwhaemail"];
    }else{
        $email = $_SESSION["loginCred"]['cont'];
    }
    $statusPhoneMail = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $statusPhoneMail = "Nomor Whatsapp";
        $_SESSION['loginCred']['type'] = "phone";
    }else{
      $statusPhoneMail = "Email";
        $_SESSION['loginCred']['type'] = "email";
    }
    if(isset($_POST['hanwhaemail'])){
        $_SESSION["loginCred"]['cont'] = $_POST['hanwhaemail'];
    }
    $mailpasslengthLength = strlen($_SESSION['loginCred']['cont']);
    $mailpasslength = substr($_SESSION['loginCred']['cont'], 3 ,$mailpasslengthLength);
    $mailpasslength1 = substr($_SESSION['loginCred']['cont'], 0 ,3);
    $ctr = 0; 
    $varx = "";
    while($ctr < $mailpasslengthLength){
        $varx .= "x";
        $ctr += 1;
    }
    $addNotifstring = "";
    $otpstats = request_otp($_SESSION["loginCred"]['cont']);
    // print_r($otpstats);
    if(!isset($_SESSION["loginCred"]['cont'])){
        header("Location: ../?nocred");
    }
    if($otpstats['result_code'] == 1105){
        echo "<script>alert('Invalid Token!')</script>";
        header("Location: ../signup?err=1105");
    }else if($otpstats['result_code'] == 1104){
        $addNotifstring = "";
        $account_activation = activate_account($_SESSION['loginCred']['cont']);
        // print_r($account_activation);
        if($account_activation['result_code'] == 1220){
            $addNotifstring .= "<strong class='mb-3 d-inline-block' style='color: #ff7101; border-bottom: 1px solid white;'>Link verifikasi sudah dikirimkan melalui WhatsApp/Email anda.</strong><br>";
        }else{
            $addNotifstring .= "<strong class='mb-3 d-inline-block' style='color: #ff7101; border-bottom: 1px solid white; '>Link verifikasi gagal dikirimkan. Kontak Customer Service Hanwha Life Indonesia untuk bantuan lebih lanjut </strong><br>";
        }
        $addNotifstring .= "<strong style='color: #ff7101'>Akun anda belum teraktivasi.</strong><br>Silahkan cek email anda untuk mengaktivasikan akun.<br><a href='javascript:window.location.href=window.location.href' id='btnActivation' data-content='".$_SESSION["loginCred"]['cont']."' class='mt-3 btn btn-info'>Kirim Link Aktivasi</a>";
    }else if($otpstats['result_code'] == 1100){
        // $addNotifstring = "<strong style='color: #ff7101'>Akun anda belum teraktivasi.</strong><br>Silahkan cek email anda untuk mengaktivasikan akun.<br>Jika sudah diaktifkan, masukkan kode OTP yang diterima di Email. Jika belum, silahkan klik coba kembali";
        header("Location: ./?err=1100&data=".$_SESSION["loginCred"]['cont']);
    }else if($otpstats['result_code'] == 1000){
        $addNotifstring = "OTP sudah dikirim! Silahkan periksa Email/Whatsapp anda.";
    }

    echo $addNotifstring;
?>