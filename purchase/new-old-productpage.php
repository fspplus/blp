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
    /*$dataFull = searchPlan($_GET['plan']);
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
        }*/
    ?>
    <?php 
        if(isset($_GET['scroll'])){
            ?>
        <script>
            $( window ).load(function() {
                var ctrers = $("#purchase").offset().top - 80;
                $([document.documentElement, document.body]).animate({
                    scrollTop: ctrers
                }, 500);
            });
        </script>
    <?php
        }
    ?>
    <div class="row page-titles homehtml" style="">
      <div id="pptop2" class="col-md-12 col-12 align-self-center headerpage">
        <div class="row" style="margin-top: 10%">
            <div class="col-12 col-md-3"></div>
            <div class="col-12 col-md-6">
                <?php if(false){ ?><h4 class="col-12" style="color: white;">#KoreaVersiKamu</h4>
                <h1 class="col-12" style="color: white; margin-bottom: 20px;">Bucket List Plan A</h1><?php } ?>
                <h2 class="col-12" style="color: white; margin: 1% 0px;">Apa prioritas Bucket List kamu yang belum terwujud? Hanwha Bucket List Plan ingin memperkenalkan produk yang bisa membantu kamu untuk konsisten dalam mewujudkan impian itu!</h2>
                <div class="col-12" style="padding-top: 10px; padding-bottom: 10px;">
                    <a href="form" class="whitebtn col-12 col-md-3" style="font-size: 24px;">Lihat Brosur</a>
                </div>
            </div>
        </div>
      </div>

      <div class="row .santunan" style="padding-top: 40px;padding-bottom: 40px;">
            <div class="row col-md-4">
                <div class="row col-12">
                      <div class="col-12 rowpaddingless"><hr style="width: 200px; background-color: #ff7101; height: 10px; margin: 20px 0px;"></div>
                        <h4 style="" class="width100mobile">Keuntungan</h4>
                        <h1 class="textorange"><strong>Bucket List Plan</strong></h1>
                </div>
            </div>
            <div id="table-basic" class="row col-12 col-md-8 table-content2">
                <div class="col-md-4 col-6 mobileAlignCenter" style=" padding-right: 50px">
                  <img src="../assets/images/logo-blp/Hanwhalife-bucketlist-investasi-new.png" style="width: 150px;">
                  <p style="font-size: 16px;">Extra dana hingga 3%</p>
                </div>
                <div class="col-md-4 col-6 mobileAlignCenter" style="center; padding-left: 50px">
                  <img src="../assets/images/logo-blp/Hanwhalife-bucketlist-asuransi-kesehatan.png" style="width: 150px;">
                  <p style="font-size: 16px;">Perlindungan asuransi jiwa selama periode</p>
                </div>
                <div class="col-md-4 col-6 mobileAlignCenter" style="center; padding-left: 50px">
                  <img src="../assets/images/logo-blp/Hanwhalife-bucketlist-bantuan-cs.png" style="width: 150px;">
                  <p style="font-size: 16px;">Dapatkan Hadiah menarik lainnya (S&amp;K berlaku)</p>
                </div>
            </div>
      </div>
        <div class="row .santunan d-none" style="padding-top: 40px;padding-bottom: 40px;">
            <div class="row col-md-4">
                <div class="row col-12">
                      <div class="col-12 rowpaddingless"><hr style="width: 200px; background-color: #ff7101; height: 10px; margin: 20px 0px;"></div>
                        <h4 style="" class="width100mobile">Promosi</h4>
                        <h1 class="textorange"><strong>Bucket List Plan</strong></h1>
                </div>
            </div>
            <div id="table-advance" class="row col-md-8 col-12 /table-content2" style="margin-bottom: 40px;">
                <div class="col-md-4 col-12 mobileColPads mobileAlignCenter alignCenter" style=" padding-right: 50px">
                  <img class="alignCenter" src="../assets/images/saveweb/Hanwha-bucketlist-map-icon.jpg" style="width: 150px;">
                  <p style="font-size: 16px;" class="alignCenter">MAP VOUCHER</p>
                </div>
                <div class="col-md-4 col-12 mobileColPads mobileAlignCenter alignCenter" style="center; padding-left: 50px">
                  <img class="alignCenter" src="../assets/images/saveweb/Hanwha-bucketlist-gopay-icon.jpg" style="width: 150px;">
                  <p style="font-size: 16px;" class="alignCenter">GOPAY VOUCHER</p>
                </div>
                <div class="col-md-4 col-12 mobileColPads mobileAlignCenter alignCenter" style="padding-left: 50px">
                  <img class="alignCenter" src="../assets/images/saveweb/Hanwha-bucketlist-grab-icon.jpg" style="width: 150px;">
                  <p style="font-size: 16px;" class="alignCenter">GRAB GIFT VOUCHER</p>
                </div>
            </div>
      </div>

        <style>
            .big{font-size: 35px ;line-height: 50px !important;}
        </style>
      <div id="purchase" class="row" style="margin-bottom: 2%; margin-top: 20">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-12">
                <h1 class="textorange"><strong>PLAN A</strong></h1>
            </div>
            <div class="col-12 col-md-4 tabletahunanPlan tabletahunan">
                <h2 class="textorange">Plan A - 1 Tahun</h2>
                <h5>Bulanan:</h5>
                <h3 class="textorange">1.200rb/bln</h3>
                <h3>1% Extra Dana</h3>
                <h5>Total Akumulasi:</h5>
                <h3 class="textorange big">Rp. 14.544.000,-</h3>
                <a href="prepurchase?plan=1" class="btnBuy">Beli disini</a>
            </div>
            <div class="col-12 col-md-4 tabletahunanPlan tabletahunan">
                <h2 class="textorange">Plan A - 2 Tahun</h2>
                <h5>Bulanan:</h5>
                <h3 class="textorange">600rb/bln</h3>
                <h3>2% Extra Dana</h3>
                <h5>Total Akumulasi:</h5>
                <h3 class="textorange big">Rp. 14.688.000,-</h3>
                <a href="prepurchase?plan=2" class="btnBuy">Beli disini</a>
            </div>
            <div class="col-12 col-md-4 tabletahunanPlan tabletahunan">
                <h2 class="textorange">Plan A - 3 Tahun</h2>
                <h5>Bulanan:</h5>
                <h3 class="textorange">400rb/bln</h3>
                <h3>3% Extra Dana</h3>
                <h5>Total Akumulasi:</h5>
                <h3 class="textorange big">Rp. 14.832.000,-</h3>
                <a href="prepurchase?plan=3" class="btnBuy">Beli disini</a>
            </div>
        </div>
          <div class="row">
            <div class="col-12" style="margin-top: 20px;">
                <h1 class="textorange"><strong>PLAN B</strong></h1>
            </div>
            <div class="col-12 col-md-4 tabletahunanPlan tabletahunan">
                <h2 class="textorange">Plan B - 1 Tahun</h2>
                <h5>Bulanan:</h5>
                <h3 class="textorange">1.800rb/bln</h3>
                <h3>1% Extra Dana</h3>
                <h5>Total Akumulasi:</h5>
                <h3 class="textorange big">Rp. 21.816.000,-</h3>
                <a href="prepurchase?plan=4" class="btnBuy">Beli disini</a>
            </div>
            <div class="col-12 col-md-4 tabletahunanPlan tabletahunan">
                <h2 class="textorange">Plan B - 2 Tahun</h2>
                <h5>Bulanan:</h5>
                <h3 class="textorange">900rb/bln</h3>
                <h3>2% Extra Dana</h3>
                <h5>Total Akumulasi:</h5>
                <h3 class="textorange big">Rp. 22.032.000,-</h3>
                <a href="prepurchase?plan=5" class="btnBuy">Beli disini</a>
            </div>
            <div class="col-12 col-md-4 tabletahunanPlan tabletahunan">
                <h2 class="textorange">Plan B - 3 Tahun</h2>
                <h5>Bulanan:</h5>
                <h3 class="textorange">600rb/bln</h3>
                <h3>3% Extra Dana</h3>
                <h5>Total Akumulasi:</h5>
                <h3 class="textorange big">Rp. 22.248.000,-</h3>
                <a href="prepurchase?plan=6" class="btnBuy">Beli disini</a>
            </div>
        </div>
      </div>
        <?php if(false){ ?>
        <div class="row bggreen m-tm-220">
            <div class="row">
                <div class="col-12" style="margin-bottom: 30px;">
                    <h4 class="textwhite">Langkah Bergabung dengan</h4>
                    <h1 class="textorange"><strong>HANWHA BUCKET LIST PLAN</strong></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-6 mobileAlignCenter">
                    <h4 class="textwhite">Step</h4>
                    <h1 class="textorange big"><strong>01</strong></h1>
                    <p>Pilih nilai premi sesuai dengan target periode &amp; target dana</p>
                </div>
                <div class="col-md-3 col-6 mobileAlignCenter">
                    <h4 class="textwhite">Step</h4>
                    <h1 class="textorange big"><strong>02</strong></h1>
                    <p>Isi lengkap data pribadi dan nama penerima manfaat</p>
                </div>
                <div class="col-md-3 col-6 mobileAlignCenter">
                    <h4 class="textwhite">Step</h4>
                    <h1 class="textorange big"><strong>03</strong></h1>
                    <p>Lakukan pembayaran premi setiap bulannya melalui Virtual Account</p>
                </div>
                <div class="col-md-3 col-6 mobileAlignCenter">
                    <h4 class="textwhite">Step</h4>
                    <h1 class="textorange big"><strong>04</strong></h1>
                    <p>Pada akhir periode, dana akan ditransfer otomatis ke rekening pendaftar</p>
                </div>
            </div>
        </div>
        
        <div class="row" style="background-color: #5faca4;padding-top: 20px;">
            <div class="col-12 col-md-6" style="margin-bottom: 30px;">
                <h1 class="textwhite"><strong>Mulai rencanakan<br>masa depanmu sekarang!</strong></h1>
            </div>
            <div class="col-12 col-md-6" style="margin-bottom: 30px; display: block;">
                <a href="form" class="whitebtn col-12 col-md-3" style="display: block; margin: 3% 0px; float: right; max-width: 400px;">Lihat Brosur</a>
            </div>
        </div>
        <?php } ?>
        
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
        <div class="row page-titles tablepengembalian p-t-30" style="text-align: center;">
            <div class="col-12 row rowpaddingless">
                <div data-val="table-nilaitunai" class="table-selector table-button col-4 active-selector">Tabel Nilai Tunai</div>
                <div data-val="table-ketentuan" class="table-selector table-button col-4">Ketentuan Umum</div>
                <div data-val="table-maturity" class="table-selector table-button col-4">Pencairan Dana</div>
            </div>
            <div id="table-nilaitunai" class="col-12 table-content">
                <h2 class="textorange" style="margin: 20px 0px;">Tabel Nilai Tunai</h2>
                <h3 style="margin: 0px; text-align: left; max-width: 100%; width: 100%;">Jika melakukan pemberhentian sebelum periode berakhir, maka akan mendapatkan nilai tunai berdasarkan presentase dari total dana<br>Berikut tabel nya: </h3>
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
            <div id="table-ketentuan" class="col-12 table-content table-noshow">
                <h2 class="textorange" style="margin: 20px 0px;">Ketentuan Umum</h2>
                <ul class="table-list">
                    <li>Terbuka untuk semua orang dengan minimal usia 17-60 tahun pada saat pendaftaran Hanwha Bucket List Plan.</li>
                </ul>
            </div>
            <div id="table-maturity" class="col-12 table-content table-noshow">
                <h2 class="textorange" style="margin: 20px 0px;">Pencairan Dana</h2>
                <h2 style="margin: 0px; text-align: left;">Ketentuan Pencairan Dana</h2>
                <ol class="table-list">
                    <li>Download dan isi formulir terlampir</li>
                    <li>Kirim ke PT Hanwha Life Indonesia beserta fotokopi KTP, fotokopi buku tabungan halaman pertama dan polis asli </li>
                </ol>
            </div>
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
  	</div>
    
    <?php
    //}
?>
<body>
  <?php  ?>

  <?php include 'footer.php'; ?>
</body>
</html>
