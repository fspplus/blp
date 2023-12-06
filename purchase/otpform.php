<form class="" action="otp" method="POST" id="formlogin-otp">
    <h2 style="color:white; text-align:left;padding: 40px 10px 40px;">Login</h2>
    
   <div class="col-md-12 col-12 align-self-center">
       <?php 
        session_start();
       ob_start();
       ?>
        <div class="floating-label mb-4">
            <input type="text" name="hanwhamailpass" placeholder="No. Whatsapp / Email" <?php if(isset($_SESSION["loginCred"]['cont'])){echo "value='".$_SESSION["loginCred"]['cont']."' disabled";} ?> required>
            <label for="hanwhaemail">No. Whatsapp / Email</label>
        </div>
        <input type="submit" class="btn col-12" style="max-width: 100%;" value="Kirim OTP">
        <br>
        <hr>
        <div class="text-center text-white">--- OR ---</div>
        <div class="row text-center" style="padding: 10px 0px;"><a class="col-12" href="usepass">Login dengan Email dan Password</a></div>
        <!-- <hr style="background: white"> -->
        <div class="row text-center mt-5"><a href="login-agent" class="btn btn-success col-12">Login sebagai Agent?</a></div>
        <div class="row d-none" style="padding: 10px 0px;"><a href="forgot-password">Butuh Bantuan?</a></div>
    </div>
</form>
<style>
    @media screen and (min-width: 768px){
        .max490{
            max-width: 48%;
        }
    }
</style>