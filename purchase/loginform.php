<form class="" action="proc/loginpro.php" method="POST" id="formlogin">
    <h2 style="color:white; text-align:left;padding: 0px 10px 80px;">LOGIN</h2>
    
   <div class="col-md-12 col-12 align-self-center">
        <div class="floating-label">
            <input type="email" name="hanwhaemail" placeholder="Email" required>
            <label for="hanwhaemail">Email</label>
        </div>
        <div class="floating-label">
            <input type="password" name="hanwhapassword" placeholder="Password" required>
            <label for="hanwhapassword">Password</label>
            <div class="scriptloader"></div>
        </div>
        <div class="row" style="padding: 10px 0px;"><a href="forgot-password">Lupa Password?</a></div>
        <input type="submit" value="LOGIN">
    </div>
</form>
<style>
    @media screen and (min-width: 768px){
        .max490{
            max-width: 48%;
        }
    }
</style>