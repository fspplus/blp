<form id="formforgetverif" method="POST">
    <h2 style="color:white; text-align:left;padding: 40px 10px 10px;">Silahkan masukkan password baru Anda</h2>
    <p class="paraInfluencer" style="padding: 0px 10px 10px;"></p>
   <div class="col-md-12 col-12 align-self-center" style="margin-top: 50px;">
        <div class="floating-label">
            <input type="password" name="passwordOne" placeholder="Password Baru" required>
            <label for="passwordOne">Password Baru</label>
        </div>
        <div class="floating-label">
            <input type="password" name="passwordTwo" placeholder="Konfirmasi Password Baru" required>
            <label for="passwordTwo">Konfirmasi Password Baru</label>
        </div>
       <div>
        <input type="hidden" name="key" value="<?php echo $_GET['key']; ?>">
       </div>
        <div class="floating-label" style="display:none;">
            <input type="text" name="googlecheck" placeholder="Google Checker">
            <label for="googlecheck">Google Checker</label>
        </div>
        <input type="submit" value="KIRIM">
    </div>
</form>