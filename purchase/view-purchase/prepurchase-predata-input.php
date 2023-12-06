<?php 
    include 'connectdb.php';
    // print_r($_SESSION);
if(isset($_SESSION['dataForm1']['hanwhaname'])){
    $session_avail = FALSE;
}else{
    $session_avail = TRUE;
}

if(isset($_SESSION['dataForm1']['hanwhaemail'])){
    $sessionpart_avail = FALSE;
}else{
    $sessionpart_avail = TRUE;
}
?>

<div class="row" style="margin-bottom: 20px;">
            <?php include 'view-selected.php'; ?>
            <div class="col-12 col-md-8 formCol">
                <div class="row rowpaddingless">
                    <h3 class="col-12">Masukan data pemegang polis</h3>
                    <form class="col-12" action="prepurchase?view=payment" method="POST" id="" class="formCol" enctype="multipart/form-data" autocomplete="off">
                        <div class="col-md-12 col-12 align-self-center formCol rowpaddingless">
                            <div class="row rowpaddingless">
                                <div class="col-12 rowpaddingless">
                                    <small>Silahkan masukan data yang sesuai dengan kartu identitas untuk membeli asuransi dari Bucket List Plan - Hanwha Life.</small>
                                    <div class="notifyCheck"></div>
                                    <div class="notifyEmail row rowpaddingless" style="position: initial;"></div>
                                    <div class="notifyPhone row rowpaddingless" style="position: initial;"></div>
                                    <div class="notifyNIK row rowpaddingless" style="position: initial;"></div>
                                </div>
                                <div class="floating-label border-b-orange col-md-6 rowpaddingless divEmail d-none" style="display: none !important;">
                                    <input type="email" class="form-controller dataEmail-nocheck" name="hanwhaemail" placeholder="Alamat Email" value="<?php if($session_avail == FALSE || $sessionpart_avail == FALSE ){echo $_SESSION['dataForm1']['hanwhaemail'];} ?>"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                    <label for="hanwhaemail" style="color: ligthgray;">Alamat Email</label>
                                    <div class="icon"><i class="fa fa-times-circle">   </i></div>
                                </div>
                                <div class="floating-label border-b-orange col-md-6 rowpaddingless divPhone d-none" style="display: none !important;">
                                    <input type="tel" class="form-controller dataPhone-nocheck" name="hanwhaphone" placeholder="No. Handphone" maxlength="13" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaphone'];} ?>" required>
                                    <label for="hanwhaphone" style="color: ligthgray;">No. Handphone</label>
                                    <div class="icon"><i class="fa fa-times-circle">   </i></div>
                                </div>
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless divNIK">
                                    <input type="tel" class="form-controller dataNIK" name="hanwhanik" placeholder="No. KTP / Passport / KITAS" maxlength="16" value="<?php if($session_avail == FALSE || $sessionpart_avail == FALSE){echo $_SESSION['dataForm1']['hanwhanik'];} ?>" required>
                                    <label for="hanwhanik" style="color: ligthgray;">No. KTP / Passport / KITAS</label>
                                    <div class="icon"><i class="fa fa-times-circle">   </i></div>
                                </div>
                                <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
                                    <h5>Jenis Kelamin</h5>
                                </div>
                                <div class="col-md-6 radioSelector">
                                    <label><input type="radio" name="hanwhagender" value="M"><span>Pria</span></label>
                                </div>
                                <div class="col-md-6 radioSelector">
                                    <label><input type="radio" name="hanwhagender" value="F"><span>Wanita</span></label>
                                </div>
                                <div class="floating-label border-b-orange col-md-6 rowpaddingless">
                                    <input type="text" class="form-controller" name="hanwhaname" placeholder="Nama Lengkap" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaname'];} ?>" required>
                                    <label for="hanwhaname" style="color: ligthgray;">Nama Lengkap</label>
                                </div>
                                <div class="floating-label border-b-orange col-md-6 rowpaddingless">
                                    <input type="text" class="form-controller" name="hanwhadob" placeholder="Tanggal Lahir" id="Pikaday" onkeypress="return false" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhadob'];} ?>" required readonly>
                                    <label for="hanwhadob" style="color: ligthgray;">Tanggal Lahir</label>
                                </div>
                                <div class="col-md-12 rowpaddingless">
                                    <label for="hanwhafoto" class="btn btn-lg btn-info btn-block" style="width: 100%; border-radius: 0px; cursor: pointer;">Upload Foto KTP
                                        <input type="file" class="form-controller" name="hanwhafotoktp" placeholder="No. KTP / Passport / KITAS" id="uploadKTP" required style="position: absolute;top: 0;left: 0;width: 100%;opacity: 0;height: 100%; margin: 0px;">
                                    </label>
                                    <small class="m-t-20">File Terpilih: <span id="labelKTP"></span></small>
                                </div>
                                <div class="floating-label col-md-12  p-l-0 p-t-20 p-r-0">
                                    <!-- <label for="hanwhaemail" style="color: ligthgray;">Pilih Kota</label> -->
                                    <small>Silahkan ketik nama kota anda dan pilih dari opsi yang tersedia. Jika tidak tersedia, silahkan hubungi Customer Service Hanwha untuk bantuan lebih lanjut.</small>
                                    <br><small>Jika lokasi berada di luar negri, silahkan ketik "Luar Negri"</small>
                                    <div class="autocomplete">
                                        <input type="text" id="myInput" class="form-controller border-b-orange " name="hanwhapob1" placeholder="Pilih Kota Kelahiran" required style="border-bottom: 1px solid #ff7101 !important;">
                                        <input type="hidden" id="inputKotaLahir" class="form-controller border-b-orange " name="hanwhapob2" placeholder="Pilih Kota Kelahiran" required style="border-bottom: 1px solid #ff7101 !important;">
                                        <label for="hanwhapob1" style="color: ligthgray;">Pilih Kota Kelahiran</label>
                                    </div>
                                    <div id="data-city" style="display: none !important;"><?php getcityVal($conn); ?> </div>
                                </div>
                                <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
                                    <h5>Pilih Status Pernikahan Anda</h5>
                                </div>
                                <div class="col-md-6 radioSelector">
                                    <label><input type="radio" name="hanwhastatus" value="Y"><span>Sudah Menikah</span></label>
                                </div>
                                <div class="col-md-6 radioSelector">
                                    <label class="col-md-6 rowpaddingless"><input type="radio" name="hanwhastatus" value="N"><span>Belum Menikah</span></label>
                                </div>
                                <div class="floating-label col-md-6 rowpaddingless">
                                    <select name="hanwhasourceincome" required>
                                        <option value="" disabled selected>
                                            Pilih Sumber Pendapatan
                                        </option>
                                        <?php 
                                            $dataFull = sourceincome();
                                            foreach($dataFull as $data){
                                                $kerjaan = $data['codeValue'];
                                                echo mb_convert_case("<option value='".$data['codeId']."' data-group='".$data['groupCode']."'>".$kerjaan."</option>", MB_CASE_TITLE, "UTF-8");
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="floating-label col-md-6 rowpaddingless">
                                    <select name="hanwhawork" required id="workselector">
                                        <option value="" disabled selected>
                                            Pilih Pekerjaan
                                        </option>
                                        <?php 
                                            $dataFull = jobdesclist();
                                            foreach($dataFull as $data){
                                                $kerjaan = $data['codeValue'];
                                                echo mb_convert_case("<option value='".$data['codeId']."' data-group='".$data['groupCode']."'>".$kerjaan."</option>", MB_CASE_TITLE, "UTF-8");
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="text" class="form-controller" name="hanwhaposition" placeholder="Uraian Pekerjaan &#40; Jabatan/Pangkat/Posisi&#41;" id="hanwhaposition" disabled>
                                    <label for="hanwhaposition" style="color: ligthgray;">Uraian Pekerjaan &#40; Jabatan/Pangkat/Posisi&#41;</label>
                                </div>
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="text" class="form-controller" name="hanwhacompanyname" placeholder="Nama Perusahaan/Instansi/Lembaga" id="hanwhacompanyname" disabled>
                                    <label for="hanwhacompanyname" style="color: ligthgray;">Nama Perusahaan/Instansi/Lembaga</label>
                                </div>
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="text" class="form-controller" name="hanwhasector" placeholder="Bidang Usaha" id="hanwhasector" disabled>
                                    <label for="hanwhasector" style="color: ligthgray;">Bidang Usaha</label>
                                </div>
                                
                                <div class="col-12 rowpaddingless">
                                    <h3 style="margin-top: 10px;">Alamat Surat Menyurat</h3>
                                </div>
                                
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="tel" class="form-controller" name="hanwhaHomephone" placeholder="No. Telp Rumah" required maxlength="13" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaHomephone'];} ?>" >
                                    <label for="hanwhaHomephone" style="color: ligthgray;">No. Telp. Rumah</label>
                                </div>
                                
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="text" class="form-controller" name="hanwhaMailaddr1" placeholder="Baris Alamat 1" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaMailaddr1'];} ?>" required>
                                    <label for="hanwhaMailaddr1" style="color: ligthgray;">Baris Alamat 1</label>
                                </div>
                                
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="text" class="form-controller" name="hanwhaMailaddr2" placeholder="Baris Alamat 2" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaMailaddr2'];} ?>" required>
                                    <label for="hanwhaMailaddr2" style="color: ligthgray;">Baris Alamat 2</label>
                                </div>
                                
                                <div class="floating-label col-md-12 p-l-0 p-t-20 p-r-0">
                                    <!-- <label for="hanwhaemail" style="color: ligthgray;">Pilih Kota</label> -->
                                    <small>Silahkan ketik nama kota anda dan pilih dari opsi yang tersedia. Jika tidak tersedia, silahkan hubungi Customer Service Hanwha untuk bantuan lebih lanjut.</small>
                                    <br><small>Jika lokasi berada di luar negri, silahkan ketik "Luar Negri"</small>
                                    <div class="autocomplete">
                                        <input type="text" id="addressCity" class="form-controller border-b-orange " name="hanwhaMailcity1" placeholder="Kota Alamat" required style="border-bottom: 1px solid #ff7101 !important;">
                                        <input type="hidden" id="inputKotaAlamat" class="form-controller border-b-orange " name="hanwhaMailcity2" placeholder="Pilih Kota Kelahiran" required style="border-bottom: 1px solid #ff7101 !important;">
                                        <label for="hanwhaMailcity1" style="color: ligthgray;">Kota Alamat</label>
                                    </div>
                                </div>
                                
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="tel" class="form-controller" name="hanwhaMailPostal" placeholder="Kode Pos" required value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaMailPostal'];} ?>"  maxlength="5">
                                    <label for="hanwhaMailPostal" style="color: ligthgray;">Kode Pos</label>
                                </div>
                                <div class="col-md-12 p-t-20 p-b-20">
                                    <input type="checkbox" id="cek" class="addrcheck" name="hanwhaSameMailing" value="sesuai" onclick="sameKTP()">
                                    <label for="cek">Jika alamat sesuai dengan identitas KTP</label>
                                </div>
                                <div id="ktpaddr" style="width: 100%;">
                                    <div class="col-12 rowpaddingless">
                                        <h3 style="margin-top: 10px;">Alamat KTP</h3>
                                    </div>
                                    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                        <input type="text" class="form-controller" name="hanwhaKTPaddr1" placeholder="Baris Alamat 1" id="addr1KTP" required>
                                        <label for="hanwhaKTPaddr1" style="color: ligthgray;">Baris Alamat 1</label>
                                    </div>

                                    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                        <input type="text" class="form-controller" name="hanwhaKTPaddr2" placeholder="Baris Alamat 2" id="addr2KTP" required>
                                        <label for="hanwhaKTPaddr2" style="color: ligthgray;">Baris Alamat 2</label>
                                    </div>

                                    <div class="floating-label col-md-12  p-l-0 p-t-20 p-r-0">
                                        <!-- <label for="hanwhaemail" style="color: ligthgray;">Pilih Kota</label> -->
                                        <small>Silahkan ketik nama kota anda dan pilih dari opsi yang tersedia. Jika tidak tersedia, silahkan hubungi Customer Service Hanwha untuk bantuan lebih lanjut.</small>
                                    <br><small>Jika lokasi berada di luar negri, silahkan ketik "Luar Negri"</small>
                                        <div class="autocomplete">
                                            <input type="text" id="inputKotaKTP1" class="form-controller border-b-orange " name="hanwhaKTPcity1" placeholder="Kota Alamat" required style="border-bottom: 1px solid #ff7101 !important;" id="city1KTP">
                                            <input type="hidden" id="inputKotaKTP2" class="form-controller border-b-orange " name="hanwhaKTPcity2" placeholder="Pilih Kota Kelahiran" required id="city2KTP">
                                            <label for="hanwhaKTPcity1" style="color: ligthgray;">Kota Alamat</label>
                                        </div>
                                    </div>
                                    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                        <input type="tel" class="form-controller" name="hanwhaKTPPostal" placeholder="Kode Pos" id="postalKTP" required maxlength="5">
                                        <label for="hanwhaKTPPostal" style="color: ligthgray;">Kode Pos</label>
                                    </div>
                                </div>
                                

                                <div id="dataInputSelector" style="display: none;">
                                    <h3 class="col-12 rowpaddingless">Masukan data kelengkapan</h3>
                                    <p class="col-md-12 col-12 align-self-center formCol p-l-0 p-r-0">Dikarenakan pekerjaan yang anda pilih memerlukan data tambahan dalam sistem kami, silahkan lengkapi data Beneficiary Owner (Penunjang Dana) berikut:</p>
                                    <div class="col-md-12">
                                        <h4>Pembayar Polis</h4>
                                    </div>
                                    <div class="col-md-6 radioSelector">
                                        <label><input type="radio" name="inputTambahan" value="Y"><span>Dibayarkan Pribadi</span></label>
                                    </div>
                                    <?php if(false){ ?>
                                    <div class="col-md-6 radioSelector">
                                        <label><input type="radio" name="inputTambahan" value="N"><span>Dibayarkan Perusahaan/Organisasi</span></label>
                                    </div>
                                    <?php } ?>
                                </div>

                                <div id="dataBO"></div>  
                                
                                <div class="col-12 rowpaddingless">
                                    <h3 style="margin-top: 10px;">Data Ahli Waris</h3>
                                </div>
                                <div id="benef1" class="row rowpaddingless" style="width: 100%;">
                                    <h3 style="margin-top: 10px;">Ahli Waris 1</h3>
                                    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                        <input type="text" class="form-controller" name="namaAhliWaris1" placeholder="Nama Lengkap" id="addr1KTP" required>
                                        <label for="namaAhliWaris1" style="color: ligthgray;">Nama Lengkap</label>
                                    </div>
                                    <!-- JENIS KELAMIN AHLI WARIS -->
                                    <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
                                        <h5>Jenis Kelamin</h5>
                                    </div>
                                    <div class="col-md-6 radioSelector">
                                        <label><input type="radio" name="genderAhliWaris1" value="M" required><span>Pria</span></label>
                                    </div>
                                    <div class="col-md-6 radioSelector">
                                        <label><input type="radio" name="genderAhliWaris1" value="F" required><span>Wanita</span></label>
                                    </div>
                                    
                                    <!-- END JENIS KELAMIN AHLI WARIS -->
                                    <!-- Hubungan Ahli Waris -->
                                    <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
                                        <h5>Hubungan dengan pemegang polis</h5>
                                    </div>
                                    <div class="col-md-6 radioSelector">
                                        <label><input type="radio" name="hubunganAhliWaris1" value="1"><span>Orang Tua</span></label>
                                    </div>
                                    <div class="col-md-6 radioSelector">
                                        <label><input type="radio" name="hubunganAhliWaris1" value="2"><span>Pasangan</span></label>
                                    </div>
                                    <div class="col-md-6 radioSelector">
                                        <label><input type="radio" name="hubunganAhliWaris1" value="3"><span>Anak Kandung</span></label>
                                    </div>
                                    <div class="col-md-6 radioSelector">
                                        <label><input type="radio" name="hubunganAhliWaris1" value="4"><span>Saudara Kandung</span></label>
                                    </div>
                                    
                                    <!-- END HUBUGAN AHLI WARIS -->
                                    
                                    <div class="floating-label border-b-orange col-md-6 rowpaddingless">
                                        <input type="text" class="form-controller" name="hanwhadob1" placeholder="Tanggal Lahir" id="dateahliwaris1" onkeypress="return false" required readonly>
                                        <label for="hanwhadob1" style="color: ligthgray;">Tanggal Lahir</label>
                                    </div>

                                    <div class="floating-label border-b-orange col-md-6 rowpaddingless">
                                        <input type="email" class="form-controller" name="emailAhliWaris1" placeholder="Email Ahli Waris" id="addr2KTP" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                        <label for="emailAhliWaris1" style="color: ligthgray;">Email Ahli Waris</label>
                                    </div>
                                    
                                    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                        <input type="tel" class="form-controller" name="telpAhliWaris1" placeholder="No. Telephone" maxlength="13" id="postalKTP" required>
                                        <label for="telpAhliWaris1" style="color: ligthgray;">No. Telephone</label>
                                    </div>
                                    
                                    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                        <input type="tel" class="form-controller percentageNew" name="persentaseAhliWaris1" placeholder="Persentase" id="persentase1" required max="100">
                                        <label for="telpAhliWaris1" style="color: ligthgray;">Persentase</label>
                                    </div>
                                </div>
                                <div id="addBenef2">
                                    <input type="hidden" name="hanwhaTtlBenef" id="hanwhaTtlBenef" value="1">
                                    <div class="col-12 p-t-20 p-b-20 m-b-20" id="addBenef" onclick="addBenef(2)"><h5>Tambahkan Ahli Waris</h5></div>
                                </div>
                                <div class="col-md-12 p-b-30"><div class="limit"></div></div>
                                <input class="btn btn-lg btn-info btn-block btn-submitter" type="submit" value="Lanjutkan">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<script>
var changeTimer = false;
$(".dataEmail").on("blur",function(){
    if($(".dataEmail").val() != ""){
        if(changeTimer !== false) clearTimeout(changeTimer);
        changeTimer = setTimeout(function(){
            $.ajax({
                 type: "GET",
                 url: "view-purchase/check-user.php",
                 data: 'email='+$(".dataEmail").val()+'&phoneNum='+$(".dataPhone").val()+'&nik='+$(".dataNIK").val(), // appears as $_GET['id'] @ your backend side
                 success: function(dataSum) {
                       // data is ur summary
                    // $('.notifyEmail').html(dataSum);
                    //$('.notify').html("Konek ga sih?");
                      //window.history.pushState($stepname, 'Title', $step);
                      $(".notifyCheck").html(dataSum);
                 }

               });
            changeTimer = false;
        },300);
    }
});
$(".dataPhone").on("blur",function(){
    if($(".dataPhone").val() != ""){
        if(changeTimer !== false) clearTimeout(changeTimer);
        changeTimer = setTimeout(function(){
            $.ajax({
                 type: "GET",
                 url: "view-purchase/check-user.php",
                 data: 'email='+$(".dataEmail").val()+'&phoneNum='+$(".dataPhone").val()+'&nik='+$(".dataNIK").val(), // appears as $_GET['id'] @ your backend side
                 success: function(dataSum) {
                       // data is ur summary
                    // $('.notifyPhone').html(dataSum);
                      $(".notifyCheck").html(dataSum);
                    //$('.notify').html("Konek ga sih?");
                      //window.history.pushState($stepname, 'Title', $step);
                 }

               });
            changeTimer = false;
        },300);
    }
});
$(".dataNIK").on("blur",function(){
    if($(".dataNIK").val() != ""){
        if(changeTimer !== false) clearTimeout(changeTimer);
        changeTimer = setTimeout(function(){
            $.ajax({
                 type: "GET",
                 url: "view-purchase/check-user.php",
                 data: 'email='+$(".dataEmail").val()+'&phoneNum='+$(".dataPhone").val()+'&nik='+$(".dataNIK").val(), // appears as $_GET['id'] @ your backend side
                 success: function(dataSum) {
                       // data is ur summary
                    // $('.notifyNIK').html(dataSum);

                    $(".notifyCheck").html(dataSum);
                    //$('.notify').html("Konek ga sih?");
                      //window.history.pushState($stepname, 'Title', $step);
                 }

               });
            changeTimer = false;
        },300);
    }
});
    
    
$('#workselector').on('change', function() {
    if(this.value == "Job7" || this.value == "Job20"){
        $("#hanwhaposition").prop("required",true);
        $("#hanwhaposition").prop("disabled",false);
        $("#hanwhacompanyname").prop("required",true);
        $("#hanwhacompanyname").prop("disabled",false);
        $("#hanwhasector").prop("required",false);
        $("#hanwhasector").prop("disabled",true);
       $("#dataInputSelector").css("display", "none");
       $("#dataInputSelector input").attr("required", false);
        
    }
    else if(this.value == "Job8" || this.value == "Job19"){
        $("#hanwhaposition").prop("required",false);
        $("#hanwhaposition").prop("disabled",true);
        $("#hanwhacompanyname").prop("required",true);
        $("#hanwhacompanyname").prop("disabled",false);
        $("#hanwhasector").prop("required",true);
        $("#hanwhasector").prop("disabled",false);
       $("#dataInputSelector").css("display", "none");
       $("#dataInputSelector input").attr("required", false);
    }
    else if(this.value == "Job23"){
        $("#hanwhaposition").prop("required",true);
        $("#hanwhaposition").prop("disabled",false);
        $("#hanwhacompanyname").prop("required",true);
        $("#hanwhacompanyname").prop("disabled",false);
        $("#hanwhasector").prop("required",true);
        $("#hanwhasector").prop("disabled",false);
       $("#dataInputSelector").css("display", "none");
       $("#dataInputSelector input").attr("required", false);
    }
    else if(this.value == "Job10" || this.value == "Job14"){
       $("#dataInputSelector").css("display", "contents");
       $("#dataInputSelector input").attr("required", true);
    }else{
        $('#dataBO').html("");
        $("#hanwhaposition").prop("required",false);
        $("#hanwhaposition").prop("disabled",true);
        $("#hanwhacompanyname").prop("required",false);
        $("#hanwhacompanyname").prop("disabled",true);
        $("#hanwhasector").prop("required",false);
        $("#hanwhasector").prop("disabled",true);
       $("#dataInputSelector").css("display", "none");
       $("#dataInputSelector input").attr("required", false);
    }
});
$("input[name='inputTambahan']").on("click", function(){
    if(this.value == "Y"){
        $.ajax({
         type: "GET",
         url: "view-purchase/prepurchase-data-input-bo.php",
         success: function(dataSum) {
               // data is ur summary
            $('#dataBO').html(dataSum);
            //$('.notify').html("Konek ga sih?");
              //window.history.pushState($stepname, 'Title', $step);
         }

       });
    }else if(this.value == "N"){
        $.ajax({
         type: "GET",
         url: "view-purchase/prepurchase-data-input-organisasi.php",
         success: function(dataSum) {
               // data is ur summary
            $('#dataBO').html(dataSum);
            //$('.notify').html("Konek ga sih?");
              //window.history.pushState($stepname, 'Title', $step);
         }

       });
    }
})
</script>