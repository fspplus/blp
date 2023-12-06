<div class="row" style="margin-bottom: 20px;">
            <div class="col-12">
                <h1 class="textorange"><strong>Paket Terpilih</strong></h1>
            </div>
            <?php include 'view-selected.php'; ?>
            <div class="col-12 col-md-8 formCol">
                <div class="row rowpaddingless">
                    <h3 class="col-12">Sudah punya akun?</h3>
                    <form class="col-12" action="proc/loginpro.php" method="POST" id="formloginpurch" class="formCol">

                       <div class="col-md-12 col-12 align-self-center formCol rowpaddingless">
                            <div class="floating-label border-b-orange">
                                <input type="email" class="form-controller" name="hanwhaemail" placeholder="Email" required>
                                <label for="hanwhaemail" style="color: ligthgray;">Email</label>
                            </div>
                            <div class="floating-label border-b-orange">
                                <input type="password" class="form-controller" name="hanwhapassword" placeholder="Password" required>
                                <label for="hanwhapassword" style="color: ligthgray;">Password</label>
                                <div class="scriptloader"></div>
                            </div>
                            <input type="submit" value="LOGIN">
                        </div>
                    </form>
                    </div><br><br>
                <div class="row rowpaddingless">
                    <div class="col-12">
                        <h3>Belum punya akun?</h3>
                        <a href="?view=data-input">Lanjutkan dan buat akun baru.* &gt;&gt;</a><br>
                        <small>* Akun akan otomatis dibuat setelah transaksi diselesaikan.</small>
                    </div>
                </div>
            </div>
        </div>