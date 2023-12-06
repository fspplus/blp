<!DOCTYPE html>
<html>
    <body>
      <?php include 'header.php'; 
            ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        if(isset($_GET['key'])){
            $hashcheck = verifyhash($_GET['key']);
            $resultcode = $hashcheck['result_code'];
        }else{
            $resultcode = 3103;
        }
        ?>
        <div class="verify">
            <?php 
                if($resultcode == 3102){
            ?>
            <div id="verifyblock" class="container containerform animated fadeInRight" style="padding: 5% 0">
              <div class="row">
                <div class="col-lg-3 col-md-12 col-12"></div>
                <div class="col-lg-6 col-md-12 col-12 align-self-center">
                  <div class="step" style="margin-bottom: 2%; text-align:center;">
                      <img src="/assets/images/form/Hanwhalife-bucketlist-welcome-va.png" style="text-align:center; margin-bottom: 15px;">
                      <h3>Selamat akun anda telah aktif!”</h3>
                      <p style="display: none !important;" class="desktopNoshow mobileNoshow">Silahkan lakukan login untuk melakukan pembelian</p>
                      <br>
                      <br>
                      <a href="../" class="btn2">FINISH</a>
                  </div>
                </div>
              </div>
            </div>
            <?php
                }else if($resultcode == 3101){
            ?>
            <div id="verifyblock" class="container containerform animated fadeInRight" style="padding: 5% 0">
              <div class="row">
                <div class="col-lg-3 col-md-12 col-12"></div>
                <div class="col-lg-6 col-md-12 col-12 align-self-center">
                  <div class="step" style="margin-bottom: 2%; text-align:center;">
                      <img src="/assets/images/form/Hanwhalife-bucketlist-welcome-va.png" style="text-align:center; margin-bottom: 15px;">
                      <h3>Mohon Maaf</h3>
                      <p>Email yang anda gunakan sudah terdaftar dalam pembelian kami. Pastikan anda sudah menerima email untuk melakukan pembayaran atau sudah mengaktifkan akun anda.</p>
                      <br>
                      <br>
                      <a href="../" class="btn2">FINISH</a>
                  </div>
                </div>
              </div>
            </div>
            <?php
                }else if($resultcode == 3103){
            ?>
            <div id="verifyblock" class="container containerform animated fadeInRight" style="padding: 5% 0">
              <div class="row">
                <div class="col-lg-3 col-md-12 col-12"></div>
                <div class="col-lg-6 col-md-12 col-12 align-self-center">
                  <div class="step" style="margin-bottom: 2%; text-align:center;">
                      <img src="/assets/images/form/Hanwhalife-bucketlist-welcome-va.png" style="text-align:center; margin-bottom: 15px;">
                      <h3>Mohon Maaf</h3>
                      <p>Link yang anda klik salah. Kemungkinan adalah Email anda sudah terverifikasi atau ada kesalahan input. Pastikan link yang anda ikuti adalah link yang benar dan berasal dari <span style="color: #ff7101;">Hanwha Life Insurance</span>. Untuk kendala, silahkan hubungi kami di <span style="color: #ff7101;">support@hanwhalife.co.id</span></p>
                      <br>
                      <br>
                      <a href="../" class="btn2">FINISH</a>
                  </div>
                </div>
              </div>
            </div>
            <?php
                }
            ?>
        </div>
      <?php include 'footer.php'; ?>
    </body>
</html>