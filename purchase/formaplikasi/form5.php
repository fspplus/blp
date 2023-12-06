<!DOCTYPE html>
<?php 
    session_start();
    include '../jsonapp/json-hanwha-api.php';  writelog();
    include '../jsonapp/sesschkr.php';
    error_reporting(E_ALL);
ini_set('display_errors', 1);

    date_default_timezone_set('Asia/Jakarta');

    include '../connectdb.php';

    $ctr = $_POST['ctrs'];
    $count = 1;
    
    if(isset($_SESSION['memberid'])){
        $_SESSION['registid'] = $_SESSION['memberid'];
    }

    while($count <= $ctr){
        $_SESSION['benefname'][$count] = $_POST['fullnamebenef'.$count];
        $_SESSION['benefpercentage'][$count] = $_POST['percentbenef'.$count];
        $count += 1;
    }

    /*$stmt->bind_param("issssis", $_POST['fullname'], $_POST['tanggallahir'], $_POST['marriage'], $_POST['telphone'], $_POST['addrline1'], $_POST['addrline2'], $_POST['cityline1'], $_POST['postaladdr'], $_POST['email'], $_POST['pekerjaan'], $_POST['gender'], $_POST['tempatlahir'], $_POST['noktp'], $_POST['telprumah'], $_POST['ktpaddrline1'], $_POST['ktpaddrline2'], $_POST['cityline2'], $_POST['postalktp'], $_POST['ktpfoto'], $_POST['pendapatan']);

    $stmt->execute();*/

    $count = null;

    //print_r($_POST);

    $percentall = 0;
    for($count = 1; $count <= $ctr; $count += 1){
        $percentall += $_POST['percentbenef'.$count];
    }
    if($percentall != 100){
        ?>
            <script>alert('<?php echo $percentall; ?>Persentasi Ahli Waris tidak sampai 100%!');back('frm3k','<?php echo $_SESSION['productid']; ?>');</script>
        <?php
    }else{

    for($count = 1; $count <= $ctr; $count += 1){
        
        $stmt = $conn->prepare("INSERT INTO `temp_beneficiary` (id_benef, id_formbenef, temp_namalengkap, temp_relasi, temp_gender, temp_tanggallahir, temp_persentasi, temp_email, temp_benefnumber) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("issssisi", $_SESSION['registid'], $_POST['fullnamebenef'.$count], $_POST['hubunganbenef'.$count], $_POST['genderbenef'.$count],$_POST['tanggalbenef'.$count], $_POST['percentbenef'.$count], $_POST['emailbenef'.$count], $_POST['telbenef1']);
        
        /*$_POST['tanggalbenef'.$count] = str_replace("-","",$_POST['tanggalbenef'.$count]);
        $_POST['tanggalbenef'.$count] = str_replace("/","",$_POST['tanggalbenef'.$count]);*/
        
        $_POST['tanggalbenef'.$count] = date('Ymd', strtotime($_POST['tanggalbenef'.$count]));
        
        $stmt->bind_param("issssisi", $_SESSION['registid'], $_POST['fullnamebenef'.$count], $_POST['hubunganbenef'.$count], $_POST['genderbenef'.$count],$_POST['tanggalbenef'.$count], $_POST['percentbenef'.$count], $_POST['emailbenef'.$count], $_POST['telbenef'.$count]);
        
        
    //echo $_SESSION['registid']. $_POST['fullnamebenef'.$count]. $_POST['hubunganbenef'.$count]. $_POST['genderbenef'.$count].$_POST['tanggalbenef'.$count]. $_POST['percentbenef'.$count]. $_POST['emailbenef'.$count]. $_POST['telbenef1'];
        
        $stmt->execute();
        $stmt->close();
    }

    /*var_dump($stmt);
    error_reporting(-1);*/
    
    $dataProduct = searchPlan($_SESSION['productid']);
    $_SESSION['postform2'] = $_POST;
?>
	<html>
	<body>
		<!--Content Start-->
	  <div id="form5" class="container containerform animated fadeInRight" style="padding: 5% 0">
        <!-- ILUSTRASI PREMI DAN LAINNYA -->
	    <div class="row" id="ilustrasi">
	      <div class="col-md-12 col-12 align-self-center judul">
		    <div class="step" style="margin-bottom: 2%">
                <div class="row" style="padding: 0px !important; margin: 0px !important; display: -webkit-box;">
                    <div class="btn2 col-lg-2 col-md-12 col-12" onclick="back('frm3k','<?php echo $_SESSION['productid']; ?>')">&lt;</div>
                    <div class="col-lg-10 col-md-12 col-12 displayDesktop" src="../assets/images/form/steps/step-05.png" width="100%"><img src="../assets/images/form/steps/Hanwhalife-bucketlist-step-05.png" width="100%"></div>
                </div>
                <img src="../assets/images/form/steps/Hanwhalife-bucketlist-step-05.png" width="100%" class="displayMobile">
		        <h1 style="color: #ff7101; font-weight: bold;">ILUSTRASI BUCKET LIST</h1>
		    </div>
		  </div>
	    </div>
	    <div class="row" id="ilustrasi">
	      <!-- Column -->
	      <div id = "colL" class="col-lg-12 col-md-12">
	          <div>
                <h3 class="row rowpaddingless">
                    <strong class="col-lg-3 col-md-3 col-6 rowpaddingless">Nama Tertanggung</strong>
                    <strong class="col-lg-1 col-md-1 col-1 rowpaddingless">:</strong>
                    <p class="col-lg-8 col-md-8 col-12 rowpaddingless" style="font-size: 21px"><?php echo $_SESSION['nama_tertanggung']; ?></p>
                </h3>
                <h3 class="row rowpaddingless">
                    <strong class="col-lg-3 col-md-3 col-6 rowpaddingless">Usia</strong>
                    <strong class="col-lg-1 col-md-1 col-1 rowpaddingless">:</strong>
                    <p class="col-lg-8 col-md-8 col-12 rowpaddingless" style="font-size: 21px"><?php echo $_SESSION['agetertanggung']; ?></p>
                </h3>
                <h3 class="row rowpaddingless">
                    <strong class="col-lg-3 col-md-3 col-6 rowpaddingless">Email</strong>
                    <strong class="col-lg-1 col-md-1 col-1 rowpaddingless">:</strong>
                    <p class="col-lg-8 col-md-8 col-12 rowpaddingless" style="font-size: 18px"><?php echo $_SESSION['emailtertanggung']; ?></p>
                </h3>
              </div>
              <br>
              <div>
                <h3><strong>Manfaat Asuransi:</strong></h3>
                <ul>
                    <li>Jika tertanggung meninggal dunia karena kecelakaan, Penanggung akan membayarkan uang pertanggungan dan pertanggungan berakhir. Maksimum akumulasi Uang Pertanggungan per Tertanggung adalah Rp.1.000.000.000.</li> 
                    <li>Jika tertanggung meninggal dunia selain karena kecelakaan, Penanggung akan mengembalikan 100% akumulasi premi yang sudah dibayarkan Tertanggung selanjutnya pertanggungan berakhir.</li> 
                    <li>Jika tertanggung hidup hingga akhir masa kontrak, Penanggung akan membayar manfaat akhir kontrak berupa <?php echo $dataProduct['multipleMaturity']; ?>% dari total premi yang telah dibayar.</li>  
                </ul>
              </div>
              <div>
                  
                <h3><strong>Masa Asuransi <?php echo $dataProduct['tenor']/12; ?> Tahun dengan Pembayaran Premi Sebesar Rp.<?php echo number_format($dataProduct['fixedPremiumAmount'] , 0, ',', '.'); ?> per bulan. </strong></h3>
                <h3 class="row rowpaddingless">
                    <strong class="col-lg-4 col-md-5 col-11 rowpaddingless">Uang Pertanggungan</strong>
                    <strong class="col-lg-1 col-md-1 col-1 rowpaddingless">:</strong>
                    <p class="col-lg-7 col-md-6 col-12 rowpaddingless" style="font-size: 21px">
                        <?php echo number_format($dataProduct['up'] , 0, ',', '.'); ?>
                    </p>
                </h3>
                <h3 class="row rowpaddingless">
                    <strong class="col-lg-4 col-md-5 col-11 rowpaddingless">Total Pengembalian Premi</strong>
                    <strong class="col-lg-1 col-md-1 col-1 rowpaddingless">:</strong>
                    <p class="col-lg-7 col-md-6 col-12 rowpaddingless" style="font-size: 21px">
                        <?php echo number_format($dataProduct['fixedPremiumAmount']*$dataProduct['tenor']*$dataProduct['multipleMaturity']/100 , 0, ',', '.'); ?>
                    </p>
                </h3>
                <h3><strong class="col-lg-3 col-md-12 col-12 rowpaddingless">Penerima Manfaat</strong> :</h3>
                <ul class="col-lg-8 col-md-12 col-12">
                    <?php 
                        $newCount = 1;
                        while($newCount < $count){
                            echo "<li>".$_SESSION['benefname'][$newCount]." (".$_SESSION['benefpercentage'][$newCount]."%)</li>";
                            $newCount += 1;
                        }
                    ?>  
                </ul>
                  
                <div style="background-color: #ff7101;color: white;border-radius: 10px;padding: 10px;text-align: center; margin-bottom: 20px;">
                    <span>Proposal yang tercantum disini hanya ilustrasi dan bukan merupakan kontrak asuransi</span>
                </div>
              </div>
	      </div>
            
	    </div>
          
        <!-- SYARAT DAN KETENTUAN ASURANSI DAN CLAIM -->
        <div class="row" id="sdkb">
	      <!-- Column -->
	      <div id = "colL" class="col-lg-12 col-md-12">
            <div class="step" style="margin-bottom: 2%">
		        <h1 style="color: #ff7101; font-weight: bold;">SYARAT &amp; KETENTUAN</h1>
		    </div>
            <h3>PENGECUALIAN MENINGGAL DUNIA</h3>
            <ul>
                <li>Tindakan bunuh diri/percobaan bunuh diri dalam keadaan sadar maupun tidak sadar yang dilakukan oleh diri sendiri dan/atau oleh orang lain atas perintah yang berkepentingan dalam pertanggungan dalam kurun waktu 2 (dua) tahun sejak Tanggal Berlaku/ Tanggal Pemulihan Polis, mana yang terjadi belakangan.</li>
                <li>Peperangan, keadaan bahaya perang atau darurat perang, baik dinyatakan atau tidak, sedang bertugas sebagai anggota angkatan bersenjata atau kepolisian, sedang melaksanakan tugas operasi militer, pemulihan keamanan dan ketertiban umum.</li>
                <li>Melakukan dan/atau berpartisipasi aktif dalam demonstrasi, atau pemogokan, atau kerusuhan, atau huru–hara, atau pemberontakan, atau pengambil-alihan kekuasaan, atau perbuatan melanggar hukum.</li>
                <li>Sebagai  penumpang atau awak pesawat udara selain pada penerbangan komersial yang terjadwal dan berlisensi.</li>
                <li>Penyalahgunaan dan/atau segala tindakan yang berhubungan dengan pemakaian alkohol, narkotik, obat bius, zat terlarang, racun, gas, radiasi nuklir, dan sejenisnya yang dilakukan secara sengaja, kecuali apabila zat tersebut dianjurkan berdasarkan resep yang dikeluarkan oleh dokter.</li>
                <li>Hukuman mati berdasarkan putusan badan peradilan.</li>
                <li>Melakukan aktifitas berbahaya seperti terjun payung, menyelam, terbang layang, balap mobil, balap perahu motor, balap motor, dan sejenisnya, bungee jumping, arung jeram, olah raga kontak fisik (boxing, karate, judo, jujitsu, kungfu, gulat profesional dan sejenisnya), panjat tebing, penelusuran gua, dan jenis olah raga berisiko lainnya.</li>
                <li>Akibat penyakit, sebab-sebab alami, pengobatan, maupun akibat tindakan operasi baik secara langsung atau tidak langsung.</li>
                <li>Kecelakaan atau meninggal dunia yang terjadi sebagai akibat dari tindakan/kegiatan dari orang yang berusaha menggambil keuntungan pribadi dari manfaatnya secara disengaja dan dilakukan secara terencana.</li>
                <li>Khusus untuk Tertanggung Wanita, meninggal dunia yang disebabkan karena kehamilan, abortus atau melahirkan.</li>
                <li>Meninggal dunia yang disebabkan karena keracunan akibat makanan/minuman atau terhirup/tertelan unsur-unsur zat-zat kimia.</li>  
            </ul>
	        <h3>PROSEDUR KLAIM</h3>
            <p>Dokumen yang diperlukan untuk pengajuan Manfaat Asuransi meninggal dunia terdiri dari:</p>
            <ul>
                <li>Formulir Klaim Meninggal Dunia (diisi oleh Penerima Manfaat/Pemegang Polis).</li>
                <li>Surat keterangan Dokter.</li>
                <li>Surat Keterangan Kematian dari instansi yang berwenang minimal dari Kelurahan (asli/fotokopi yang dilegalisir) atau Akta Kematian dari catatan sipil (fotokopi yang dilegalisir).</li>
                <li>Polis asli. </li>
                <li>Tanda Bukti diri dan fotokopi Kartu Keluarga dari Pemegang Polis, Tertanggung dan Penerima Manfaat yang masih berlaku.</li>
                <li>Surat berita acara dari Kepolisian dalam hal meninggal dunia tidak wajar atau karena kecelakaan lalu lintas.</li>
                <li>Surat dari Kedutaan Besar Republik Indonesia (KBRI) setempat dalam hal meninggal dunia di luar negeri.</li>
                <li>Surat Penetapan Pengadilan dalam hal Tertanggung dinyatakan hilang sesuai dengan ketentuan perundang – undangan.</li>
                <li>Nomor rekening Penerima Manfaat.</li>
                <li>Dokumen - dokumen lain yang dianggap perlu oleh Penanggung untuk mendukung dokumen tersebut di atas.</li>
            </ul>
            <p>Dokumen yang diperlukan untuk pengajuan manfaat akhir pertanggungan terdiri dari:</p>
            <ul>
                <li>Formulir Pengambilan Manfaat Asuransi (diisi oleh Pemegang Polis).</li>
                <li>Fotokopi Tanda Bukti diri dari Pemegang Polis yang masih berlaku.</li>
                <li>Dokumen Ringkasan Polis asli.</li>
                <li>Fotokopi Buku Tabungan halaman 1.</li>
            </ul>
            <p>Penyampaian dokumen-dokumen di atas dapat disampaikan ke Penanggung selambat-lambatnya 90 hari sejak tanggal Tertanggung meninggal dunia atau sejak Tanggal Berakhir Polis (jika Tertanggung hidup sampai dengan akhir masa pertanggungan).</p>
	      </div>
            <div class="btn" onclick="selectPayment()" id="btnilustrasi" style="width: auto !important;">PILIH PEMBAYARAN</div>
	    </div>

	  </div>
	  <!--Content End-->
	</body>
</html>
<?php } ?>