<?php

?>

<form class="" action="proc/loginpro.php" method="POST" id="formlogin">
    <h2 style="color:white; text-align:left;padding: 80px 10px 80px;">Kode OTP</h2>
    
   <div class="col-md-12 col-12 align-self-center">
       <div>
        <p>
           Masukan password untuk akun anda
           </p>
       </div>
        <div class="floating-label">
            <input type="email" name="hanwhaemail" placeholder="Email" required>
            <label for="hanwhaemail">Email</label>
        </div>
        <div class="floating-label">
            <input type="password" name="hanwhapassword" placeholder="Password" required>
            <label for="hanwhapassword">Password</label>
            <div class="scriptloader"></div>
        </div>
       <div class="row" style="padding: 0px;">
        <input type="submit" value="Masuk" class="btn col-12" style="max-width: 100% ;margin-top: 25px; display: block !important; width: 100%;"></div>
        <div class="row" style="padding: 10px 0px;"><a href="#">Coba Kembali</a></div>
        <div class="row" style="padding: 10px 0px;"><a href="otp?login=options">Login dengan cara lain</a></div>
    </div>
</form>
<style>
    @media screen and (min-width: 768px){
        .max490{
            max-width: 48%;
        }
    }
</style>