<?php 
    include 'connectdb.php';
    // print_r($_POST);

    if(!isset($_SESSION['role'])){
        $_SESSION['role'] = "customer";
    }
    
    if(isset($_SESSION['ropBank']['ropAccNumber'])){
        $session_avail = FALSE;
    }else{
        $session_avail = TRUE;
    }
    if(isset($_SESSION['dataBO'])){
        $session_bo = FALSE;
    }else{
        $session_bo = TRUE;
    }
        if(!isset($_GET['existing'])){
            if(!isset($_POST['hanwhaSameMailing'])){
                $_POST['hanwhaSameMailing'] = "tidaksesuai";
            }
            if($_POST['hanwhaSameMailing'] == "sesuai"){
                $_POST['hanwhaKTPaddr1'] = $_POST['hanwhaMailaddr1'];
                $_POST['hanwhaKTPaddr2'] = $_POST['hanwhaMailaddr2'];
                $_POST['hanwhaKTPcity1'] = $_POST['hanwhaMailcity1'];
                $_POST['hanwhaKTPcity2'] = $_POST['hanwhaMailcity2'];
                $_POST['hanwhaKTPPostal'] = $_POST['hanwhaMailPostal'];
                $_POST['hanwhaSameMailing'] = 1;
            }else{
                $_POST['hanwhaSameMailing'] = 0;
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
            //print_r($_FILES);
            if($_FILES['hanwhafotoktp']['error'] == 1){
                echo "File upload may have failed. Please contact Hanwha Support Team to make sure that your upload is sucessful or not.";
            }
            define ('SITE_ROOT', realpath(dirname(__FILE__)));
            move_uploaded_file($_FILES['hanwhafotoktp']['tmp_name'], '/var/www/html/assets/images/ktpuploads/' . trim($_POST['hanwhaname']) .' - '. $_POST['hanwhanik'].'.jpeg');
            $urlImage = '/var/www/html/assets/images/ktpuploads/'.$_POST['hanwhaname'].'-'.$_POST['hanwhanik'].'.jpeg';
            //$urlTemp = $_FILES['hanwhafotoktp']['tmp_name'];
            //echo "<img src=".$urlTemp." >";
            //echo "<img src=".$urlImage." >";
            //copy('/var/www/html/assets/images/ktpuploads/' . $_POST['hanwhaname'] ." - ". $_POST['hanwhanik'].".jpeg", '/var/www/html/assets/images/ktpuploads/' . $_POST['hanwhaname'] ." - ". $_POST['hanwhanik'].".jpeg");
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
    //     echo "<pre>";
    // print_r($_SESSION['dataForm1']);
    // echo "</pre>";
    if(isset($_SESSION['ropBank']['hanwhareferral'])){
        $_SESSION['referralActive']['code'] = $_SESSION['ropBank']['hanwhareferral'];
    }
    if(isset($_SESSION['dataForm1'])){
        $counter = 0;
        if(isset($_SESSION['dataForm1']['hanwhaTtlBenef'])){
            while($counter < $_SESSION['dataForm1']['hanwhaTtlBenef']){
                $counter += 1;
                $benefDOB = str_replace("-","", $_SESSION['dataForm1']['hanwhadob'.$counter]);
                $benefDOB = str_replace("/","", $benefDOB);
                $benefDOB = strtotime($benefDOB);
                $_SESSION['dataForm1']['hanwhadob'.$counter] = date('Ymd',$benefDOB);
                // echo "Ini tanggalnya";
                // echo $_SESSION['dataForm1']['hanwhadob'.$counter];
            }
        }else{
            while($counter < $_POST['hanwhaTtlBenef']){
                $counter += 1;
                $benefDOB = str_replace("-","", $_POST['hanwhadob'.$counter]);
                $benefDOB = str_replace("/","", $benefDOB);
                $benefDOB = strtotime($benefDOB);
                $_SESSION['dataForm1']['hanwhadob'.$counter] = date('Ymd',$benefDOB);
                // echo "Ini tanggalnya";
                // echo $_SESSION['dataForm1']['hanwhadob'.$counter];
            }
        }
        $_SESSION['dataForm1']['hanwhadob'] = str_replace("-","", $_SESSION['dataForm1']['hanwhadob']);
        $_SESSION['dataForm1']['hanwhadob'] = str_replace("/","", $_SESSION['dataForm1']['hanwhadob']);
        $_SESSION['dataForm1']['hanwhadob'] = strtotime($_SESSION['dataForm1']['hanwhadob']);
        $_SESSION['dataForm1']['hanwhadob'] = date('Ymd',$_SESSION['dataForm1']['hanwhadob']);
    }

?>

<div class="row" style="margin-bottom: 20px;">
            <?php include 'view-selected.php'; ?>
            <div class="col-12 col-md-8 formCol">
                <div class="row rowpaddingless">
                    
                    <form class="col-12" action="prepurchase?view=finalize" method="POST" id="" class="formCol">
                        <div class="col-md-12 col-12 align-self-center formCol rowpaddingless">
                            <div class="row rowpaddingless">
                                <h4 class="col-md-12 col-12 p-l-0 p-r-0 p-t-20">Referral Code, Data Rekening Pengembalian dan Customer Reward</h4>
                                <div class="floating-label border-b-orange col-md-6 rowpaddingless">
                                    <?php
                                    // echo "<pre>";
                                    // print_r($_SESSION);
                                    // echo "</pre>";
                                    /*
                                    <input type="text" class="form-controller" name="hanwhareferral" placeholder="Referral Code" value="<?php if($session_avail == FALSE || isset($_SESSION['ropBank']['hanwhareferral'])){echo $_SESSION['ropBank']['hanwhareferral'];}else if(isset($_SESSION['referralActive']['code'])){echo $_SESSION['referralActive']['code'];} ?>"<?php if(isset($_SESSION['referralActive']['code'])){ if($_SESSION['referralActive']['code'] != "AA"){ echo "readonly";}else if($_SESSION['referralActive']['code']== "AA"){echo "";} } ?> >
                                    <label for="hanwhaname" style="color: ligthgray;">Referral Code</label>*/
                                    ?>

                                    <input type="text" class="form-controller" name="hanwhareferral" placeholder="Referral Code" value="<?php 
                                        if($_SESSION['role'] == "agent") echo $_SESSION['agent-data']['agent_code']; if(isset($_SESSION['reffcode'])){echo $_SESSION['reffcode'];}
                                        // if($_SESSION['role'] == "agent") echo $_SESSION['memberid']; if(isset($_SESSION['reffcode'])){echo $_SESSION['reffcode'];}
                                    ?>" <?php 
                                    if($_SESSION['role'] == "agent") echo "readonly"
                                    ?> maxlength=10>
                                    <label for="hanwhaname" style="color: ligthgray;">Referral Code</label>
                                </div>
                                <div class="floating-label border-b-orange col-md-6 rowpaddingless">
                                    <input type="text" class="form-controller" name="promoCode" placeholder="Promo Code" value="<?php if($session_avail == FALSE || isset($_SESSION['ropBank']['promoCode'])){echo $_SESSION['ropBank']['promoCode'];} ?>">
                                    <label for="hanwhaname" style="color: ligthgray;">Promo Code</label>
                                </div>
                                    <small class="d-none">Gunakan kode referal Agent/Partner untuk mendapatkan benefit sesuai ketentuan yang berlaku</small>
                                    <small class="m-t-20 d-none" style="font-weight: 800;">* Jika anda berasal dari atau merupakan pelanggan dari Air Asia, pastikan referral code anda dimulai dengan AA diikuti dengan Big ID Air Asia anda untuk mendapatkan point kerjasama Hanwha Life Insurance dengan Air Asia.</small>
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

                                <?php if(true){ ?>
                                <div class="col-lg-12 col-md-12 col-12" style="border: 2px #ff7101 solid; padding: 5%; margin-bottom: 20px !important; ">

                                    <?php 
                                        if($_SESSION['product']['plan'] == "1"){
                                            $totalReward = "240.000";
                                        }else if($_SESSION['product']['plan'] == "2"){
                                            $totalReward = "120.000";
                                            
                                        }else if($_SESSION['product']['plan'] == "3"){
                                            $totalReward = "80.000";
                                            
                                        }else if($_SESSION['product']['plan'] == "4"){
                                            $totalReward = "360.000";
                                            
                                        }else if($_SESSION['product']['plan'] == "5"){
                                            $totalReward = "180.000";
                                            
                                        }else if($_SESSION['product']['plan'] == "6"){
                                            $totalReward = "120.000";
                                            
                                        }else if($_SESSION['product']['plan'] == "8"){
                                            $totalReward = "150.000";
                                            
                                        }else if($_SESSION['product']['plan'] == "9"){
                                            $totalReward = "75.000";
                                            
                                        }else if($_SESSION['product']['plan'] == "10"){
                                            $totalReward = "50.000";
                                            
                                        }
                                    ?>

                                    <p style="color: black !important; font-weight: 900;">Anda mendapatkan Customer Reward sebesar Rp. <?php echo $totalReward ?>., Silahkan isi data berikut:</p>
                                    
                                    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <h4>Pilih Jenis Ewallet</h4>
                                    <select name="ewalletType" required>
                                        <option value="" disabled selected>Pilih Opsi</option>
                                        <option value="GOPAY">GOPAY</option>
                                        <option value="OVO">OVO</option>
                                    </select>
                                        </div>
                                    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="tel" class="form-controller" name="ewalletNo" id="ewalletNo" placeholder="Nomor Ewallet"  value="" required>
                                    <label for="ewalletNo" style="color: ligthgray;">Nomor Ewallet</label>
                                        </div>
                                    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="text" class="form-controller" name="ewalletName" id="ewalletName" placeholder="Nama Pada Akun Ewallet" required>
                                    <label for="ewalletName" style="color: ligthgray;">Nama Pada Akun Ewallet</label>
                                        </div>
                                            <h5>*Akun Ewallet harus atas nama pribadi</h5>
                                            <h6>Customer Reward akan di proses setelah masa Freelook (14 hari setelah pembayaran premi pertama) dengan keterangan sebagai berikut:</h6>
                                    <ul>
                                        <li>Freelook tanggal 1-15 : akan di proses tanggal 25</li>
                                        <li>Freelook tanggal 16-31 : akan di proses tanggal 10</li>
                                        <li>Untuk biaya admin akan ditanggung oleh nasabah</li>
                                    </ul>
                                    <input type="checkbox" id="setuju1" name="setuju1" value="setuju1" required>
                                    <label for="setuju1" style="display: inline-table; color: black;">Saya setuju bahwa data e-wallet yang saya isi sudah benar.</label>
                                </div>
                                <?php } ?>
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
                                    <label for="cek" style="display: inline-table; color: black; ">Saya setuju dan juga telah membaca dan memahami semua Syarat dan Ketentuan yang ditetapkan PT Hanwha Life Insurance Indonesia di atas, termasuk penjelasan terkait Produk ini.<br>Saya setuju bahwa polis, semua dokumen yang merupakan satu kesatuan dengan polis dan korespondensi terkait Polis hanya akan dikirimkan secara digital ke alamat email yang saya berikan dalam Formulir ini.</label>
                                </div>
                                
                                <input class="btn btn-lg btn-info btn-block" id="submitButton" type="submit" value="Lanjutkan">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $("#submitButton").on("click", function(e){
                if($("#ewalletNo").val() == '' || $("#ewalletName") == '' ){
                    alert("Harap isi informasi eWallet kamu!");
                    // $('#submitButton').prop('disabled', false);
                    $('form').bind('submit',function(e){e.preventDefault();});
                }else{
                    // $('#submitButton').prop('disabled', true);
                    $('form').unbind('submit');
                }
            })
        </script>