<?php 
    include 'connectdb.php';

if(isset($_SESSION['ropBank']['ropAccNumber'])){
    $session_avail = FALSE;
}else{
    $session_avail = TRUE;
}
    if(!isset($_GET['existing'])){
        if($_POST['hanwhaSameMailing'] == "sesuai"){
            $_POST['hanwhaKTPaddr1'] = $_POST['hanwhaMailaddr1'];
            $_POST['hanwhaKTPaddr2'] = $_POST['hanwhaMailaddr2'];
            $_POST['hanwhaKTPcity1'] = $_POST['hanwhaMailcity1'];
            $_POST['hanwhaKTPcity2'] = $_POST['hanwhaMailcity2'];
            $_POST['hanwhaKTPPostal'] = $_POST['hanwhaMailPostal'];
            $_POST['hanwhaSameMailing'] = 1;
        }
        if(!isset($_POST['hanwhaSameMailing'])){
            $_POST['hanwhaSameMailing'] = 0;
        }

        if(!isset($_POST['hanwhaposition'])){
            $_POST['hanwhaposition'] = "";
        }
        if(!isset($_POST['hanwhasector'])){
            $_POST['hanwhasector'] = "";
        }
        if(!isset($_POST['hanwhacompanyname'])){
            $_POST['hanwhacompanyname'] = "";
        }

        $_SESSION['dataForm1'] = $_POST;
        
        define ('SITE_ROOT', realpath(dirname(__FILE__)));
        move_uploaded_file($_FILES['hanwhafotoktp']['tmp_name'], '/var/www/bucketlistplan.co.id/web/assets/images/ktpuploads/' . $_POST['hanwhaname'] ." - ". $_POST['hanwhanik'].".jpeg");
        copy('/var/www/bucketlistplan.co.id/web/assets/images/ktpuploads/' . $_POST['hanwhaname'] ." - ". $_POST['hanwhanik'].".jpeg", '/var/www/html/assets/images/ktpuploads/' . $_POST['hanwhaname'] ." - ". $_POST['hanwhanik'].".jpeg");
    }else if(isset($_GET['existing'])){
        if($_GET['existing'] == "1"){
            $_SESSION['beneficiaryExisting'] = $_POST;
            $_SESSION['userLogged']['fullname'] = $_SESSION['fullname'];
            $_SESSION['userLogged']['email'] = $_SESSION['email'];
            $_SESSION['payExisting'] = $_GET['existing'];
            $_SESSION['sendMemberID'] = $_SESSION['memberid'];
        }else if($_GET['existing'] == "2"){
            $_SESSION['beneficiaryExisting'] = $_POST;
            $_SESSION['userLogged']['fullname'] = $_SESSION['newPurchaseExist']['fullName'];
            $_SESSION['userLogged']['email'] = $_SESSION['newPurchaseExist']['emailAddress'];
            $_SESSION['payExisting'] = $_GET['existing'];
            $_SESSION['sendMemberID'] = $_POST['memberidHanwha'];
        }
    }

if(isset($_SESSION['ropBank']['hanwhareferral'])){
    $_SESSION['referralActive']['code'] = $_SESSION['ropBank']['hanwhareferral'];
}
?>

<div class="row" style="margin-bottom: 20px;">
            <div class="col-12">
                <h1 class="textorange"><strong>Paket Terpilih</strong></h1>
            </div>
            <?php include 'view-selected.php'; ?>
            <div class="col-12 col-md-8 formCol">
                <div class="row rowpaddingless">
                    <h3 class="col-12">Masukan data kelengkapan lainnya</h3>
                    <form class="col-12" action="prepurchase?view=finalize" method="POST" id="" class="formCol">
                        <div class="col-md-12 col-12 align-self-center formCol rowpaddingless">
                            <div class="row rowpaddingless">
                                <div class="floating-label border-b-orange col-md-6 rowpaddingless">
                                    <?php
                                    /*
                                    <input type="text" class="form-controller" name="hanwhareferral" placeholder="Referral Code" value="<?php if($session_avail == FALSE || isset($_SESSION['ropBank']['hanwhareferral'])){echo $_SESSION['ropBank']['hanwhareferral'];}else if(isset($_SESSION['referralActive']['code'])){echo $_SESSION['referralActive']['code'];} ?>"<?php if(isset($_SESSION['referralActive']['code'])){ if($_SESSION['referralActive']['code'] != "AA"){ echo "readonly";}else if($_SESSION['referralActive']['code']== "AA"){echo "";} } ?> >
                                    <label for="hanwhaname" style="color: ligthgray;">Referral Code</label>*/
                                     ?>
                                    
                                    <input type="text" class="form-controller" name="hanwhareferral" placeholder="Referral Code" value="">
                                </div>
                                <div class="floating-label border-b-orange col-md-6 rowpaddingless">
                                    <input type="text" class="form-controller" name="promoCode" placeholder="Promo Code" value="<?php if($session_avail == FALSE || isset($_SESSION['ropBank']['promoCode'])){echo $_SESSION['ropBank']['promoCode'];} ?>">
                                    <label for="hanwhaname" style="color: ligthgray;">Promo Code</label>
                                </div>
                                    <small>Gunakan kode referal Agent/Partner untuk mendapatkan benefit sesuai ketentuan yang berlaku</small>
                                    <small class="m-t-20" style="font-weight: 800;">* Jika anda berasal dari atau merupakan pelanggan dari Air Asia, pastikan referral code anda dimulai dengan AA diikuti dengan Big ID Air Asia anda untuk mendapatkan point kerjasama Hanwha Life Insurance dengan Air Asia.</small>
                                    <!--<small>Gunakan kode referal Agent/Partner untuk mendapatkan benefit sesuai ketentuan yang berlaku</small>
                                    <small class="m-t-20" style="font-weight: 800;">* Jika anda berasal dari atau merupakan pelanggan dari Air Asia, pastikan referral code anda dimulai dengan AA diikuti dengan Big ID Air Asia anda untuk mendapatkan point kerjasama Hanwha Life Insurance dengan Air Asia.</small>-->
                                <div class="floating-label border-b-orange col-md-12 m-t-20 rowpaddingless">
                                    <h4>Pilih Bank Pengembalian Asuransi Akhir</h4>
                                    <select name="bankROP" required>
                                        <option value="" disabled selected>Pilih Bank</option>
                                        <?php 
                                            $databank = banklist();
                                            foreach($databank as $data){
                                                $bankName = $data['codeValue'];
                                                $bankCode = $data['codeId'];
                                                echo "<option value='$bankCode'>".$bankName."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="text" class="form-controller" name="ropAccName" placeholder="Nama Pemegang Rekening"  value="<?php  if($session_avail == FALSE){echo $_SESSION['ropBank']['ropAccName'];} ?>" required>
                                    <label for="ropAccName" style="color: ligthgray;">Nama Pemegang Rekening</label>
                                </div>
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="tel" class="form-controller" name="ropAccNumber" placeholder="Nomor Rekening" value="<?php if($session_avail == FALSE){ echo $_SESSION['ropBank']['ropAccNumber'];} ?>" required maxlength="20">
                                    <label for="ropAccNumber" style="color: ligthgray;">Nomor Rekening</label>
                                </div>
                                
                                 <div id="req7" class="col-lg-12 col-md-12 col-12" style="border: 2px #ff7101 solid; padding: 5%;">
                                    <p>Dengan mengisi dan melengkapi data diri yang dipersyaratkan untuk mengikuti program asuransi jiwa ini, saya sebagai calon pemegang polis mengajukan permohonan asuransi jiwa kepada PT Hanwha Life Insurance Indonesia ("Penanggung") dan menyatakan bahwa:</p>
                                    <ul>
                                        <li>Semua data, pernyataan, dan jawaban yang saya berikan dalam formulir online untuk keikutsertaan saya dalam program asuransi berlaku sebagai Formulir Permintaan Asuransi Jiwa dan diisi secara langsung oleh diri sendiri, benar dan akan menjadi dasar bagi berlakunya Kontrak Asuransi Jiwa yang akan disetujui dan dikeluarkan oleh pihak Penanggung. Apabila di kemudian hari terdapat keterangan/informasi yang bertentangan dengan keadaan sebenarnya tetapi tidak dinyatakan/dikemukakan dalam Formulir Permintaan Asuransi Jiwa ini, di mana dalam hal apabila keterangan/informasi yang sebenarnya diberikan sejak awal, maka pertanggungan asuransi tidak akan dijamin atau dipertanggungkan dengan syarat dan ketentuan yang sama, maka Penanggung berhak untuk membatalkan Polis dan/atau menolak klaim yang diajukan.</li>

                                        <li>Memberikan kuasa yang tidak dapat ditarik kembali atau dibatalkan kepada setiap Dokter/Tenaga Medis/Rumah Sakit/Klinik/Puskesmas/Laboratorium, perusahaan asuransi atau perusahaan reasuransi, badan, instansi/lembaga atau pihak lain yang mempunyai catatan riwayat kesehatan, penyakit, atau informasi lain mengenai diri Saya/Kami untuk diberikan kepada Penanggung. Kuasa ini tetap berlaku pada waktu Saya/Kami masih hidup maupun sesudah Saya/Kami meninggal. Salinan Surat Kuasa ini berlaku sesuai dengan aslinya. Pemberian kuasa ini tidak dapat ditarik lagi dan mengikat para pengganti/penerima manfaat dan orang yang ditunjuk dan tetap berlaku setelah Saya/Kami meninggal/dalam keadaan cacat.</li>

                                        <li>Mengijinkan Penanggung untuk membagikan atau mempertukarkan informasi yang terdapat dalam program asuransi ini dan/atau formulir tambahan lainnya mengenai diri Saya/Kami kepada otoritas pajak negara Indonesia dan/atau otoritas pajak negara lain dalam rangka pertukaran informasi antar pemerintah, serta melepaskan segala hak-hak yang mungkin dimiliki yang dapat mencegah Penanggung untuk memenuhi ketentuan hukum dan pertaturan perundangan yang berlaku.</li>

                                        <li>Menyatakan bahwa pembayaran Premi untuk Polis yang diajukan berdasarkan Formulir Permintaan Asuransi Jiwa ini tidak berasal dari/untuk tujuan pidana pencucian uang, berkaitan dengan pendanaan terorisme dan/atau tindak pidana lain yang dilarang berdasarkan peraturan dan perundang-undangan yang berlaku di Indonesia.</li>

                                        <li>Menyetujui dan/atau menyatakan telah menerima kuasa dari Pemegang Polis untuk menerima Polis hanya dalam format softcopy.</li>

                                        <li>Menyetujui Pertanggungan ini mulai berlaku sejak Masa Pertanggungan yang tercantum dalam Polis yang diterbitkan oleh Penanggung.</li>
                                    </ul>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12" style="margin-top: 30px">
                                    <input type="checkbox" id="cek" name="setuju" value="setuju" required>
                                    <label for="cek" style="display: inline-table;">Saya setuju dan juga telah membaca dan memahami semua Syarat dan Ketentuan yang ditetapkan PT Hanwha Life Insurance Indonesia di atas, termasuk penjelasan terkait Produk ini.</label>
                                </div>
                                
                                <input class="btn btn-lg btn-info btn-block" type="submit" value="Lanjutkan">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>