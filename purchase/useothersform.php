<form class="" action="proc/loginpro.php" method="POST" id="formlogin">
    <h2 style="color:white; text-align:left;padding: 40px 10px 40px;">Gunakan Data Lainnya</h2>
    
   <div class="col-md-12 col-12 align-self-center">
       <?php 
       if($_SESSION['loginCred']['type'] == "email"){
           $main = "Email";
           $others = "Nomor Telephone";
       }
       else if($_SESSION['loginCred']['type'] == "phone"){
           $main = "Nomor Telephone";
           $others = "Email";
       }
       ?>
        <div class="floating-label">
            <input type="email" name="hanwhaemail" placeholder="<?php echo $main; ?>" <?php if(isset($_SESSION["loginCred"]['cont'])){echo "value='".$_SESSION["loginCred"]['cont']."' readonly";} ?> required>
            <label for="hanwhaemail"><?php echo $main; ?></label>
        </div>
        <div class="floating-label">
            <input type="text" name="hanwhapassword" placeholder="<?php echo $others; ?>" required>
            <label for="hanwhapassword"><?php echo $others; ?></label>
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