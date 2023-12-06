<?php 
    session_start();
    ob_start();
    if(isset($_POST['hanwhamailpass'])){
        $email = $_POST["hanwhamailpass"];
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
    if(isset($_POST['hanwhamailpass'])){
        $_SESSION["loginCred"]['cont'] = $_POST['hanwhamailpass'];
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
        header("Location: ./signup?err=1100&data=".$_SESSION["loginCred"]['cont']);
    }
    // print_r($otpstats['result_code']);
?>

    <form class="" action="controller/login-otp.php" method="POST" id="otplogin">
        <h2 style="color:white; text-align:left;padding: 40px 10px 40px;">Kode OTP</h2>
        
    <div class="col-md-12 col-12 align-self-center">
        <div style="color: white">
            <h4 class="colorWhite">
                <?php
                    if($_SESSION['loginCred']['type'] == "email"){
                        echo "Alamat Email Anda:";
                    }
                    else if($_SESSION['loginCred']['type'] == "phone"){
                        echo "Nomor Whatsapp Anda:";
                    }
                ?>
            </h4>
            <div class="scriptloader"></div>
            <h2 class="colorWhite" styke="margin-bottom: 20px;"><?php echo $mailpasslength1; echo $varx; ?></h2>
            <p>
            <?php 
                if($addNotifstring == ""){
                    ?>
                    Masukkan kode OTP yang diterima di <?php echo $statusPhoneMail; ?> anda. Jika tidak ada di kotak masuk, silahkan cek Spam. Jika tidak ada, silahkan klik kirim ulang.
                    <?php 
                }else{
                    echo $addNotifstring;
                }
            ?>
            </p>
        </div>
        <?php if($otpstats['result_code'] != 1104){ ?>
            <div class="floating-label">
                <input type="text" name="hanwhaotp" placeholder="Kode OTP" required>
                <label for="hanwhaemail">Kode OTP</label>
            </div>
            <div class="row" style="padding: 0px;">
                <input type="submit" value="Login" style="max-width: 100%; margin-top: 25px; display: block !important; width: 100%;"></div>
                <div class="row" style="padding: 10px 0px;"><a href="javascript:void(0)" onclick="window.location.reload()">Kirim Ulang</a></div>
                <div class="row" style="padding: 10px 0px;"><a href="usepass">Login dengan cara lain</a></div>
            </div>
        <?php } ?>
    </form>
<style>
    @media screen and (min-width: 768px){
        .max490{
            max-width: 48%;
        }
    }
</style>
<script>
    $(function() {
     // Get the form.
     var form = $('#otplogin');

     // Get the messages div.
     var formMessages = $('#form-messages');

     // TODO: The rest of the code will go here...

     $(form).submit(function(event) {
         // Stop the browser from submitting the form.
         event.preventDefault();
         // TODO
         // Serialize the form data.
         $("#page-loader").css("display", "block");
         var formData = $(form).serialize();
         $.ajax({
             type: 'POST',
             method: 'POST',
             url: "../controller/login-otp.php",
             data: form.serialize(),
             success: function(dataSum) {
                    // data is ur summary
                   $('.scriptloader').html(dataSum);
                   $('.scriptloader').css("top","0");
                    $("#page-loader").css("display", "none");
              }
         })
     });

 });
</script>