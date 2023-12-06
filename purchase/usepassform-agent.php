<form class="" action="proc/agentlogin.php" method="POST" id="formlogin">
    <h2 style="color:white; text-align:left;padding: 40px 10px 40px;">Gunakan Password Anda</h2>
    
   <div class="col-md-12 col-12 align-self-center">
        <div class="floating-label">
            <input type="number" name="hanwhaemail" placeholder="Kode Agent" required>
            <label for="hanwhaemail">Kode Agent</label>
        </div>
        <div class="floating-label">
            <input type="password" class="password-inputter" name="hanwhapassword" placeholder="Password" required>
            <label for="hanwhapassword">Password</label>
            <div class="view-password" data-currtype="password"><i class="mdi mdi-eye"></i></div>
            <div class="scriptloader"></div>
        </div>
        <div class="row text-right" style="padding: 10px 0px;"><a class="col-12" href="forgot-password">Lupa Password?</a></div>
        <input type="submit" class="col-12" style="max-width: 100%;" value="LOGIN">
        <br>
        <hr>
        <div class="text-center text-white">--- OR ---</div>
        <div class="row text-center" style="padding: 10px 0px;"><a class="col-12" href="otp-login">Login sebagai Customer</a></div>
    </div>
</form>
<style>
    @media screen and (min-width: 768px){
        .max490{
            max-width: 48%;
        }
    }
</style>