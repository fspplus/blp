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
                    <a href="<?php echo get_wpcontbrosur(); ?>" class="whitebtn col-12 col-md-3" style="font-size: 24px;" target="_self">Lihat Brosur</a>
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
                  <img src="../assets/images/logo-blp/Hanwhalife-bucketlist-investasi.png" style="width: 150px;">
                  <p style="font-size: 16px;">Extra dana hingga 3%</p>
                </div>
                <div class="col-md-4 col-6 mobileAlignCenter" style="center; padding-left: 50px">
                  <img src="../assets/images/logo-blp/Hanwhalife-bucketlist-asuransi-kesehatan.png" style="width: 150px;">
                  <p style="font-size: 16px;">Perlindungan asuransi jiwa selama periode</p>
                </div>
                <div class="col-md-4 col-6 mobileAlignCenter" style="center; padding-left: 50px">
                  <img src="../assets/images/logo-blp/Hanwhalife-bucketlist-investasi-new.png" style="width: 150px;">
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
        
        
        <style>
            .tablepengembalian{
                width: 80%;
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
                <div data-val="table-manfaat" class="table-selector table-button col-2 active-selector">Manfaat Asuransi</div>
                <div data-val="table-informasi" class="table-selector table-button col-2">Informasi Aplikasi</div>
                <div data-val="table-persyaratan" class="table-selector table-button col-2">Persyaratan dan Tata Cara</div>
                <div data-val="table-pencairan" class="table-selector table-button col-2">Pencairan Dana</div>
                <div data-val="table-klaim" class="table-selector table-button col-2">Klaim</div>
                <div data-val="table-pengecualian" class="table-selector table-button col-2">Pengecualian</div>
            </div>
            <div id="table-manfaat" class="col-12 table-content">
                <h2 class="textorange" style="margin: 20px 0px;">Manfaat Asuransi</h2>
                <ol>
                    <li>
                        <strong>Meninggal Dunia Karena Kecelakaan</strong><br>
                        <span>Apabila Tertanggung meninggal dunia karena kecelakaan, maka akan diberikan 100% Uang Pertanggungan sesuai Plan yang dipilih dan selanjutnya pertanggungan berakhir.</span>
                        <br>
                        <div>
                            <table class="tableLogger">
                                <tr>
                                    <td>Plan</td>
                                    <td>Uang Pertanggungan</td>
                                </tr>
                                <tr>
                                    <td>A</td>
                                    <td>Rp. 50.000.000,-</td>
                                </tr>
                                <tr>
                                    <td>B</td>
                                    <td>Rp. 100.000.000,-</td>
                                </tr>
                                <tr>
                                    <td>M</td>
                                    <td>Rp. 25.000.000,-</td>
                                </tr>
                            </table>
                        </div>
                    </li>
                    <li>
                        <strong>Meninggal Dunia Bukan Karena Kecelakaan</strong><br>
                        Apabila Tertanggung meninggal dunia bukan karena kecelakaan, maka Penanggung akan mengembalikan 100% premi yang telah dibayarkan dan selanjutnya pertanggungan berakhir.
                    </li>
                    <li>
                        <strong>Manfaat Hidup</strong><br>
                        Apabila Tertanggung hidup sampai dengan tanggal berakhirnya Polis dan Premi telah dibayarkan sampai dengan akhir masa asuransi, maka Penanggung akan mengembalikan Premi yang telah dibayarkan sebesar :
                        <br>
                        <table class="tableLogger">
                            <tr>
                                <td>Masa Asuransi (Tahun)</td>
                                <td>Pengembalian Premi (dari total Premi Terbayar)</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>101%</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>102%</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>103%</td>
                            </tr>
                        </table>
                    </li>
                </ol>
            </div>
            <div id="table-informasi" class="col-12 table-content table-noshow">
                <h2 class="textorange" style="margin: 20px 0px;">Informasi Aplikasi</h2>
                <ul class="table-list">
                    <li><strong>Tipe Asuransi: </strong>Asuransi Dasar</li>
                    <li><strong>Penanggung: </strong>PT Hanwha Life Insurance Indonesia</li>
                    <li><strong>Pemegang Polis: </strong>Perorangan atau Badan Hukum yang mengadakan perjanjian asuransi dengan Penanggung </li>
                    <li><strong>Tertanggung: </strong>Perorangan yang memiliki keterikatan asuransi dengan Pemegang Polis dan atas jiwanya diadakan pertanggungan pada Asuransi Dasar dan/atau Asuransi Tambahan</li>
                    <li><strong>Usia Masuk: </strong>Tertanggung/Pemegang Polis  : 17 – 60 tahun</li>
                    <li><strong>Masa Pembayaran Premi: </strong>1 atau 2 atau 3 tahun</li>
                    <li><strong>Mata Uang: </strong>Rupiah</li>
                    <li><strong>Metode Pembayaran: </strong>Bulanan</li>
                    <li><strong>Penerima Manfaat: </strong>Pihak yang berhak menerima Manfaat Asuransi sesuai dengan Ketentuan Polis dan yang memiliki keterikatan Asuransi dengan Pemegang Polis dan Tertanggung</li>
                    <li><strong>Uang Pertanggungan: </strong>Plan A : Rp   50,000,000 | Plan B : Rp 100,000,000 | Plan M : Rp 25,000,000</li>
                    <li><strong>Jalur Distribusi: </strong>Aplikasi Digital</li>
                </ul>
            </div>
            <div id="table-persyaratan" class="col-12 table-content table-noshow">
                <h2 class="textorange" style="margin: 20px 0px;">Table Persyaratan</h2>
                
                <ul>
                    <li>
                        <strong>Dokumen Pengajuan Asuransi Jiwa</strong><br>
                        <span>Pendaftaran diri melalui pengisian data pada website Hanwha Life Indonesia</span>
                    </li>
                    <li>
                        <strong>Pembayaran Premi</strong><br>
                        <ol>
                        <li>Setiap pembayaran premi harus diatasnamakan Penanggung dan Premi yang dibayarkan hanya akan dinyatakan lunas pada tanggal Premi diterima dan tercatat pada rekening Penanggung sesuai dengan jumlah yang telah ditentukan dalam Polis</li>
                        <li>Semua biaya yang berhubungan dengan pembayaran Premi, ditanggung oleh Pemegang Polis</li>
                        <li>Premi yang telah dibayar tidak dapat ditarik kembali</li>
                        </ol>
                    </li>
                    <li>
                        <strong>Masa Leluasa</strong><br>
                        30 hari kalender sejak tanggal jatuh tempo pembayaran premi
                    </li>
                    <li>
                        <strong>Masa Mempelajari Polis</strong><br>
                        14 hari kalender sejak tanggal diterimanya polis
                    </li>
                </ul>
            </div>
            <div id="table-pencairan" class="col-12 table-content table-noshow">
                <h2 class="textorange" style="margin: 20px 0px;">Pencairan Dana</h2>
                Pengajuan manfaat dalam hal tertanggung hidup hingga berakhirnya masa pertanggungan dapat dilakukan dengan menyampaikan dokumen-dokumen yang diperlukan, terdiri dari:
                <ol>
                    <li>Dokumen Ringkasan Polis asli; dan</li>
                    <li><a href="https://www.hanwhalife.co.id/wp-content/uploads/2019/04/tradisional-formulir-pengambilan-manfaat-asuransi.pdf" target="_blank">Formulir Pengambilan Manfaat Asuransi</a> yang telah dilengkapi oleh Pemegang Polis; dan</li>
                    <li>Tanda Bukti diri dari Pemegang Polis; dan</li>
                    <li>Fotokopi Buku Tabungan halaman 1</li>
                </ol>
                Jika melakukan pemberhentian sebelum periode berakhir, maka akan mendapatkan nilai tunai berdasarkan presentase dari total dana sesuai dengan tabel berikut:
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
                Untuk pencairan dana, bisa download formulir <a href="https://www.hanwhalife.co.id/wp-content/uploads/2019/04/tradisional-formulir-pengambilan-manfaat-asuransi.pdf" target="_blank">disini</a>
            </div>
            <div id="table-klaim" class="col-12 table-content table-noshow">
                <h2 class="textorange" style="margin: 20px 0px;">Pengajuan Klaim</h2>
                Pengajuan manfaat meninggal dunia dapat diajukan dalam 90 hari kalender sejak tanggal meninggalnya Tertanggung. Dokumen yang diperlukan untuk pengajuan klaim meninggal dunia terdiri dari:
                <ol>
                    <li>Formulir Klaim Meninggal Dunia (diisi oleh Pemegang Polis/Penerima Manfaat).</li> 
                    <li>Surat keterangan Dokter</li>
                    <li>Polis asli </li>
                    <li>Bukti pembayaran Premi terakhir.  </li>
                    <li>Surat Keterangan Kematian dari instansi yang berwenang minimal dari Kelurahan (asli/fotokopi yang dilegalisir) atau Akta Kematian dari catatan sipil (fotokopi yang dilegalisir ).</li>
                    <li>Surat Keterangan Kematian, catatan medis/resume medis Tertanggung, fotokopi seluruh hasil pemeriksaan laboratorium dan radiologi (jika ada) dari Dokter.</li>
                    <li>Surat berita acara dari Kepolisian dalam hal meninggal dunia tidak wajar atau karena kecelakaan lalu lintas.</li>
                    <li>Surat dari Kedutaan Besar Republik Indonesia ( KBRI ) setempat dalam hal meninggal dunia di luar negeri.</li>
                    <li>Tanda bukti diri dan fotokopi Kartu Keluarga dari Pemegang Polis, Tertanggung dan Penerima Manfaat yang masih berlaku</li>
                    <li>Dokumen-dokumen lain yang dianggap perlu oleh Penanggung untuk mendukung dokumen tersebut di atas.</li>
                </ol>
            </div>
            <div id="table-pengecualian" class="col-12 table-content table-noshow">
                <h2 class="textorange" style="margin: 20px 0px;">Pengecualian</h2>
                Penanggung tidak diwajibkan membayar apapun dalam hal Tertanggung meninggal dunia akibat :
                <ol>
                    <li>Tindakan Bunuh diri /percobaan bunuh diri dalam keadaan sadar maupun tidak sadar yang dilakukan oleh diri sendiri dan/atau oleh orang lain atas perintah yang berkepentingan dalam pertanggungan dalam kurun waktu 2 (dua) tahun sejak Tanggal Berlaku/ Tanggal Pemulihan Polis, mana yang terjadi belakangan</li>
                    <li>Peperangan, keadaan bahaya perang atau darurat perang, baik dinyatakan atau tidak, sedang bertugas sebagai anggota angkatan bersenjata atau kepolisian, sedang melaksanakan tugas operasi militer, pemulihan keamanan dan ketertiban umum </li>
                    <li>Melakukan dan/atau berpartisipasi aktif dalam demonstrasi, atau pemogokan, atau kerusuhan, atau huru–hara, atau pemberontakan, atau pengambil-alihan kekuasaan, atau perbuatan melanggar hukum</li>
                    <li>Sebagai penumpang atau awak pesawat udara selain pada penerbangan komersial yang terjadwal dan berlisensi</li>
                    <li>Penyalahgunaan dan/atau segala tindakan yang berhubungan dengan pemakaian alkohol, narkotik, obat bius, zat terlarang, racun, gas, radiasi nuklir, dan sejenisnya yang dilakukan secara sengaja, kecuali apabila zat tersebut dianjurkan berdasarkan resep yang dikeluarkan oleh</li>
                    <li>Hukuman mati berdasarkan putusan badan peradilan</li>
                    <li>Melakukan aktifitas berbahaya seperti terjun payung, menyelam, terbang layang, balap mobil, balap perahu motor, balap motor, dan sejenisnya, bungee jumping, arung jeram, olah raga kontak fisik (boxing, karate, judo, jujitsu, kungfu, gulat profesional dan sejenisnya), panjat tebing, penelusuran gua, dan jenis olah raga berisiko lainnya</li>
                    <li>Akibat penyakit, sebab-sebab alami, pengobatan, maupun akibat tindakan operasi baik secara langsung atau tidak langsung</li>
                    <li>Kecelakaan atau meninggal dunia yang terjadi sebagai akibat dari tindakan/kegiatan dari orang yang berusaha menggambil keuntungan pribadi dari manfaatnya secara disengaja dan dilakukan secara terencana</li>
                    <li>Khusus untuk Tertanggung Wanita, meninggal dunia yang disebabkan karena kehamilan, abortus atau melahirkan</li>
                    <li>Meninggal dunia yang disebabkan karena keracunan akibat makanan/minuman atau terhirup/tertelan unsur-unsur zat-zat kimia</li>
                </ol>
            </div>
      </div>
        
        <?php include 'views/product-list.php'; ?>
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
