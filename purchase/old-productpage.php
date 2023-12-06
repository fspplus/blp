<html>
    <head></head>
<?php
    if($_GET['plan'] == 1){
        $plan = "Plan A";
    }else if($_GET['plan'] == 4){
        $plan = "Plan B";
    }
    $urlmeta = "Product ".$plan;
    if($plan == "Plan A"){
        $urldesc = "Berisi informasi tentang Produk asuransi Hanwha Bucket list Plan A dengan total 14jutaan rupiah";
    }
    else if($plan == "Plan B"){
        $urldesc = "Berisi informasi tentang Produk asuransi Hanwha Bucket list Plan B dengan total 20jutaan rupiah";
    }
    include 'header.php';
    
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    $dataFull = searchPlan($_GET['plan']);
    $result = $dataFull;
    if($result == -100 || $result == NULL){
        echo "<script>alert('Not Allowed!')</script>";
        echo "<script>window.location.replace('./');</script>";
    }else{
        
        if($result['productId'] == 1 || $result['productId'] == 2 || $result['productId'] == 3){
            $planname = "PLAN A Bucket List";
            $oneyear = "Rp 1.200.000";
            $twoyear = "Rp 600.000";
            $threeyear = "Rp 400.000";
            $up = "Rp 50.000.000";
            $textadd = "Menurut survey dari 10 besar travel agent di Indonesia, untuk pergi kekorea selama 5H3M membutuhkan biaya kurang lebih 14jtan.";
        }else{
            $planname = "PLAN B Bucket List";
            $oneyear = "Rp 1.800.000";
            $twoyear = "Rp 900.000";
            $threeyear = "Rp 600.000";
            $up = "Rp 100.000.000";
            $textadd = "Menurut survey dari 10 besar travel agent di Indonesia, untuk pergi kekorea selama 7H5M membutuhkan biaya kurang lebih 20jtan.";
        }
    ?>
    
    <div class="row page-titles homehtml" style="background: url('../assets/images/background/')">
      <div id="pptop" class="col-md-12 col-12 align-self-center headerpage">
        <div class="row" style="margin-top: 5%">
            <?php if(false){?>
              <h1 style="color: #fbb474; margin: auto; font-size: 48px; text-align: center;"><span style="color: white">Explore</span> Traditional Korea<br>With <strong><?php echo $planname; ?></strong></h1>
                <p style="text-align: center; color: white; margin: 3% 5%; font-size: 24px">Negara 4 musim ini mempunyai keunikan sendiri didalamnya. Selain dikenal dengan alam yang indah, budaya mereka tak kalah uniknya. Salah satunya adalah bangunan kuno nan bersejarah. Juga, jangan lupa mencicipi lezatnya makanan khas korea. <br>Menurut hasil survey terhadap 10 besar travel agen di Indonesia, untuk pergi ke Korea selama 5H3M membutuhkan biaya kurang lebih 14jtan, dan untuk 7H5M 20jtan. </p>
            <?php } ?>
              <h1 style="color: #fbb474; margin: auto auto 3%; font-size: 48px; text-align: center;">Explore Liburanmu dengan<br><strong>Hanwha Bucket List Plan</strong></h1>
                <p style="text-align: center; color: white; margin: 1% 5%; font-size: 24px">Zaman sekarang, liburan sudah menjadi suatu hal yang wajib dilakukan. Oleh karena itu penting sekali untuk merencanakan liburan dari jauh-jauh hari agar bebas dari kartu kredit saat liburan dan terhindar dari rasa ingin memiliki tapi tidak mampu.<p>
                <p style="text-align: center; color: white; margin: 1% 5%; font-size: 24px">Hanwha BucketList Plan membantu untuk merencanakan liburan dengan berbagai pilihan kemampuan budgeting kamu.</p>
                <p style="text-align: center; color: white; margin: 1% 5%; font-size: 24px">Selain itu, kamu juga mendapat berbagai macam tambahan keuntungan lainnya, khususnya jika kamu ingin jalan-jalan sekaligus belanja di Duty Free Korea yg konon katanya merupakan surganya tempat belanja. 
<?php echo $textadd; ?>
                </p>
          <a href="form" class="btn" style="color: white; border-color: white">Yuk Rencanakan!</a>
        </div>
      </div>

      <div class="row">
        <div id="price1" class="col-lg-12 col-md-12 col-12 align-self-center">
          <h1 style="font-size: 48px; font-weight: 800; color: black">Plan</h1><br>
        </div>

        <div id="price2" class="col-lg-12 col-md-12 col-12 align-self-center">
        <table width="100%" style="text-align: center; margin: 5% 0; font-size: 16px">
          <tr style="background-color: #ff7101; color: white;">
            <td style="padding: 10px; font-weight: 800;">MASA ASURANSI</td>
            <td style="padding: 10px; font-weight: 800;">PREMI BULANAN <?php echo $planname; ?></td>
            <td style="padding: 10px; font-weight: 800;">PENGEMBALIAN PREMI<br>(% dari akumulasi premi)</td>
          </tr>
          <tr style="color: black;">
            <td style="padding: 10px;">1 Tahun</td>
            <td style="padding: 10px;"><?php echo $oneyear; ?></td>
            <td style="padding: 10px;">101%</td>
          </tr>
          <tr style="color: black;">
            <td style="padding: 10px;">2 Tahun</td>
            <td style="padding: 10px;"><?php echo $twoyear; ?></td>
            <td style="padding: 10px;">102%</td>
          </tr>
          <tr style="color: black;">
            <td style="padding: 10px;">3 Tahun</td>
            <td style="padding: 10px;"><?php echo $threeyear; ?></td>
            <td style="padding: 10px;">103%</td>
          </tr>
        </table>
        </div>
      </div>

      <div class="row santunan">
        <div class="col-lg-12 col-md-12 col-12" style="text-align: center;">
          <p style="font-size: 16px; font-weight: bold;">Selain itu, kamu juga mendapatkan perlindungan berupa:</p>
        </div>
        <div class="col-lg-6 col-md-6 col-12" style="text-align: center; padding-right: 50px">
          <img src="../assets/images/iconhanwha/Hanwhalife-bucketlist-icon-01.png" style="width: 150px;">
          <p style="font-size: 16px; text-align: center;">Santunan meninggal karena kecelakaan sebesar <?php echo $up; ?></p>
        </div>
        <div class="col-lg-6 col-md-6 col-12" style="text-align: center; padding-left: 50px">
          <img src="../assets/images/iconhanwha/Hanwhalife-bucketlist-icon-02.png" style="width: 150px;">
          <p style="font-size: 16px; text-align: center;">Santunan meninggal selain karena kecelakaan berupa pengembalian seluruh premi yang telah dibayarkan</p>
        </div>
      </div>
        
        
        <style>
            .tablepengembalian{
                width: 70%;
                margin: auto;
            }
            .tablepengembalian h3{
                text-align:center; max-width: 750px; width: 100%; margin: auto; font-size: 16px; color: #67757c;
                font-weight: 600;
                margin-top: 2%;
            }
            .trowPgn:nth-child(even){
                background-color: #f9f9f9;
            }
            .trowPgn:first-child, .trowPgn:nth-child(odd){
                background-color: #fce7c7;
            }
        </style>
        <div class="row tablepengembalian">
            <h3 style="">Jika melakukan pemberhentian sebelum masa asuransi berakhir, maka kamu akan mendapatkan nilai tunai berdasarkan persentase dari akumulasi premi.<br>Berikut tabel nya: </h3>
            <table width="100%" style="text-align: center; margin: 3% 0; font-size: 16px">
              <tr style="background-color: #ff7101; color: white;">
                <td style="padding: 10px 0px; font-weight: 800; border-right: 1px solid white;" rowspan="2">Bulan/Month</td>
                <td style="padding: 10px 0px; font-weight: 800;border-bottom: 1px solid white;" colspan="3">Masa Asuransi</td>
              </tr>
              <tr style="background-color: #ff7101; color: white; text-align: center;">
                <td style="padding: 10px 0px;">1</td>
                <td style="padding: 10px 0px; border-left: 1px solid white;">2</td>
                <td style="padding: 10px 0px; border-left: 1px solid white;">3</td>
              </tr>
                <?php
                    for($c=0; $c < 12; $c++){
                        if($c<3){
                            $skip = 0;
                        }else{
                            $skip = $c-2;
                        }
                        ?>
                <tr style="color: black;" class="trowPgn">
                    <td style="padding: 10px 0px;"><?php echo $c+1;
                        if($c+1 == 12){
                            echo "-36";
                        } ?></td>
                    <td style="padding: 10px 0px;"><?php echo $skip*10; ?>%</td>
                    <td style="padding: 10px 0px;"><?php echo $skip*10; ?>%</td>
                    <td style="padding: 10px 0px;"><?php echo $skip*10;
                        ?>%</td>
                  </tr>
                <?php
                    }
                ?> 
            </table>
      </div>

      <?php if(false){ ?><div id="explore" class="row" style="margin: 3% auto; padding-top: 50px;">
        <div class="col-lg-4 col-md-12 col-12 align-self-center">
          <img src="../assets/images/saveweb/Hanwhalife-bucketlist-Box-Nami.jpg" style="width: 100%;">
        </div>
        <div class="col-lg-4 col-md-12 col-12 align-self-center">
          <img src="../assets/images/saveweb/Hanwhalife-bucketlist-Box-KFood.jpg" style="width: 100%;">
        </div>
        <div class="col-lg-4 col-md-12 col-12 align-self-center">
          <img src="../assets/images/saveweb/Hanwhalife-bucketlist-Box-Baekyangsa.jpg" style="width: 100%;">
        </div>
      </div><?php } ?>
      <?php if(false){ ?>
      <div class="row" style="margin-bottom: 3%">
        <div class="col-lg-12 col-md-12 col-12 align-self-center" style="padding: 3% 0">
          <h1 style="text-align: center;"><strong>Dapatkan Manfaat Khusus hanya untuk</strong></h1>
          <h1 style="text-align: center; color: #ff7101"><strong>Liburan Korea Anda dengan Hanwha Bucket List Plan</strong></h1>
        </div>

        <div class="col-lg-4 col-md-6 col-12" style="text-align: center;">
          <img src="../assets/images/iconhanwha/Hanwhalife-bucketlist-taxfree.png" style="height: 100px;">
          <h2 class="experience">The Galleria Duty Free</h2>
          <p class="experience2">Dengan platinum membership ini, kamu akan mendapatkan diskon up to 20%, selain itu kamu akan mendapatkan akses ke diamond lounge dan free gift.</p>
        </div>
        <div class="col-lg-4 col-md-6 col-12" style="text-align: center;">
          <img src="../assets/images/iconhanwha/Hanwhalife-bucketlist-deptstore.png" style="height: 100px;">
          <h2 class="experience">The Galleria Department Store</h2>
          <p class="experience2">Kamu akan mendapatkan Global dan VIP Membership dengan diskon belanja sampai dengan 8%, refund pajak 8%, akses Global VIP Lounge, dengan pelayan belanja pribadi.</p>
        </div>
        <div class="col-lg-4 col-md-6 col-12" style="text-align: center;">
          <img src="../assets/images/iconhanwha/Hanwhalife-bucketlist-landmark63.png" style="height: 100px;">
          <h2 class="experience">Landmark of Seoul '63 Building Tour Package' Ticket</h2>
          <p class="experience2">Kamu dapat menikmati indahnya kota Seoul dari atas dilengkapi dengan Art Observatory, pusat perbelanjaan, restoran, hingga akuarium secara gratis. Khusus untuk 100 nasabah pertama.</p>
        </div>
          <?php if(isset($seasonal)){?>
        <div class="col-lg-3 col-md-6 col-12" style="text-align: center;">
          <img src="../assets/images/iconhanwha/Hanwhalife-bucketlist-lifeplus.png" style="height: 100px;">
          <h2 class="experience">Lifeplus Seasonal Event </h2>
          <p class="experience2">Event ini yang hadir berdasarkan musim ini mempunyai keunikan tersendiri, seperti saat Spring, ada festival piknik cherry blossom ada juga festival kembang api, dan lainnya. Tiket setiap event ini sangat terbatas karena peminatnya sangat banyak.  Benefit ini akan diberikan untuk 100 orang pertama.</p>
        </div>
          <?php } ?>
      </div>
        <?php } ?>
      <div class="row">
  	     <a id="btnexplore" class="btn" href="form">Yuk Rencanakan!</a>
        </div>
  	</div>
    
    <?php
    }
?>
<body>
  <?php  ?>

  
<?php include 'float-dorado.php'; ?>

  <?php include 'footer.php'; ?>
</body>
</html>
