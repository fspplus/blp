<?php
    $statusPhoneMail = "";
    if(isset($_GET['data'])){
        $email = $_GET['data'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $statusPhoneMail = "No. Ponsel anda belum terdaftar. Silahkan lengkapi halaman berikut untuk membuat akun baru.";
            $_SESSION['loginCred']['type'] = "phone";
        }else{
            $statusPhoneMail = "Email anda belum terdaftar. Silahkan lengkapi halaman berikut untuk membuat akun baru.";
            $_SESSION['loginCred']['type'] = "email";
        }
        $_SESSION['loginCred']['cont'] = $email;
    }
?>

<form class="" action="controller/signup-proc.php" method="POST" id="formlogin">
    <h2 style="color:white; text-align:left;padding: 0px 10px 80px;">REGISTER</h2>
    <?php 
        if(isset($_GET['data'])) 
        echo "<h5 style='color:white; text-align:left;padding: 0px 10px;'>".$statusPhoneMail."</h5>";
    ?>
    <div class="col-12" style="display: inline-blcok; float: left;">
        <div class="floating-label">
            <input type="text" name="hanwhafullname" placeholder="Nama Lengkap" required>
            <label for="hanwhafullname">Nama Lengkap</label>
        </div>
    </div>
    <div class="col-12">
        <div class="floating-label">
            <input type="email" name="hanwhaemail" placeholder="Email" required value="<?php if($_SESSION['loginCred']['type'] == "email") echo $_SESSION['loginCred']['cont']; ?>">
            <label for="hanwhaemail">Email</label>
        </div>
    </div>
   <div class="col-md-12 col-12 align-self-center">
        <div class="floating-label">
            <input type="tel" name="hanwhaphone" placeholder="No. Telephone" required maxlength="13" value="<?php if($_SESSION['loginCred']['type'] == "phone") echo $_SESSION['loginCred']['cont']; ?>">
            <label for="hanwhaphone">No. Telephone</label>
            <div class="scriptloader"></div>
        </div>
        <input type="submit" value="REGISTER">
    </div>
</form>