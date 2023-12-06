<form id="formregisterinfluencer" action="proc/loginpro.php" method="POST">
    <h2 style="color:white; text-align:left;padding: 0px 10px 10px; opacity: 0;"><a href="./" class="backbtn">&lt;</a>Apply Influencer</h2>
   <div class="col-md-12 col-12 align-self-center">
        <div class="floating-label">
            <input type="text" name="hanwhafullname" placeholder="Full Name" required>
            <label for="hanwhafullname">Nama Lengkap</label>
        </div>
        <div class="floating-label">
            <input type="text" name="hanwhaig" placeholder="Instagram ID" required>
            <label for="hanwhaig">Instagram ID</label>
        </div>
        <div class="floating-label">
            <select name="hanwhagender" required>
                <option value="M">Laki-Laki</option>
                <option value="F">Perempuan</option>
            </select>
        </div>
        <div class="floating-label">
            <input type="date" name="hanwhabirthdate" placeholder="Birth Date" required placeholder="dd-mm-yyyy">
            <label for="hanwhabirthdate">Birth Date</label>
        </div>
        <div class="floating-label">
            <input type="email" name="hanwhaemail" placeholder="Email" required>
            <label for="hanwhaemail">Email</label>
        </div>
        <div class="floating-label">
            <input type="tel" name="hanwhamobile" placeholder="Mobile Phone" required>
            <label for="hanwhamobile">Mobile Phone</label>
        </div>
        <div class="floating-label" style="display:none;">
            <input type="text" name="googlecheck" placeholder="Google Checker">
            <label for="googlecheck">Google Checker</label>
        </div>
        <input type="submit" value="DAFTAR">
    </div>
</form>