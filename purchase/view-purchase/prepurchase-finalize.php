<?php 
    include 'connectdb.php';
if(!isset($_SESSION['ropBank']['ropAccNumber'])){
    $_SESSION['ropBank'] = $_POST;
}
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
?>

<div class="row" style="margin-bottom: 20px;">
            <?php include 'view-selected.php'; ?>
            <div class="col-12 col-md-8 formCol">
                <div class="row rowpaddingless">
                    <form class="col-12" action="prepurchase?view=beneficiary" method="POST" id="" class="formCol">
                        <div class="col-md-12 col-12 align-self-center formCol rowpaddingless">
                            <div class="" id="sdkb">
	      <!-- Column -->
	      <div id = "colL" class="col-lg-12 col-md-12 p-b-30 m-b-40" style="">
            <div class="step" style="margin-bottom: 2%">
		        <h2 style="color: #ff7101; font-weight: bold;">SYARAT &amp; KETENTUAN</h2>
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
            <p>Langkah yang diperlukan untuk pengajuan manfaat akhir pertanggungan adalah sebagai berikut:</p>
            <ul>
                <li>Konfirmasi data rekening (link untuk konfirmasi akan didapatkan setelah pembayaran premi terakhir diterima.</li>
                <li>Upload buku tabungan halaman pertama</li>
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
            <a href="prepurchase?view=finish" class="btn" id="btnilustrasi" class="p-t-30" style="width: auto !important;">Saya Setuju Akan Syarat dan Ketentuan yang Berlaku</a>
	    </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>