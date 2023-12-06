<?php   
    include 'connectdb.php';
    include '../jsonapp/json-hanwha-api.php';
?>
<hr>
<div class="row rowpaddingless">

<div class="col-md-12 col-12 align-self-center formCol rowpaddingless">
<div class="row rowpaddingless">
    <div class="col-12 rowpaddingless">
        <div class="notifyEmail row rowpaddingless" style="position: initial;"></div>
        <div class="notifyPhone row rowpaddingless" style="position: initial;"></div>
        <div class="notifyNIK row rowpaddingless" style="position: initial;"></div>
    </div>
    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
        <input type="text" class="form-controller" name="hanwhaname_bo" placeholder="Nama Perusahaan atau Organisasi" value="<?php if($session_avail == FALSE || $session_bo == FALSE ){echo $_SESSION['dataBO']['hanwhaname_bo'];} ?>" required>
        <label for="hanwhaname_bo" style="color: ligthgray;">Nama Perusahaan atau Organisasi</label>
    </div>
    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
        <input type="text" class="form-controller" name="hanwhaname_bo" placeholder="Nama Direktur/ Penerima Kuasa/ Pengurus yang ditunjuk" value="<?php if($session_avail == FALSE || $session_bo == FALSE ){echo $_SESSION['dataBO']['hanwhaname_bo'];} ?>" required>
        <label for="hanwhaname" style="color: ligthgray;">Nama Direktur/ Penerima Kuasa/ Pengurus yang ditunjuk</label>
    </div>
    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
        <input type="text" class="form-controller" name="hanwhaname_bo" placeholder="Akte Pendirian Perusahaan/ Organisasi No." value="<?php if($session_avail == FALSE || $session_bo == FALSE ){echo $_SESSION['dataBO']['hanwhaname_bo'];} ?>" required>
        <label for="hanwhaname" style="color: ligthgray;">Akte Pendirian Perusahaan/ Organisasi No.</label>
    </div>
    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
        <input type="text" class="form-controller" name="hanwhaname_bo" placeholder="Pemgesahan Menteri Hukum & HAM No." value="<?php if($session_avail == FALSE || $session_bo == FALSE ){echo $_SESSION['dataBO']['hanwhaname_bo'];} ?>" required>
        <label for="hanwhaname" style="color: ligthgray;">Pemgesahan Menteri Hukum & HAM No.</label>
    </div>
    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
        <input type="tel" class="form-controller" name="hanwhaNPWP_bo" placeholder="No. NPWP" required maxlength="13" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaHomephone'];} ?>" >
        <label for="hanwhaNPWP_bo" style="color: ligthgray;">No. NPWP</label>
    </div>

    

    <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
            <select name="hanwhaBadanUsaha_bo" required id="workselector">
                <option value="" disabled selected>
                    Bentuk Badan Usaha
                </option>
                <option value="1">PT</option>
                <option value="1">CV</option>
                <option value="1">Firma</option>
                <option value="1">Yayasan</option>
                <option value="1">Koperasi</option>
                <option value="lainnya">Lainnya</option>
            </select>
    </div>
    <div class="floating-label border-b-orange col-md-12 rowpaddingless" style="display: none;" id="hanwhaBadanUsaha_bo_others">
        <input type="text" class="form-controller" name="hanwhaNPWP_bo" placeholder="Bentuk Badan Usaha Lainnya" required maxlength="13" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaHomephone'];} ?>" >
        <label for="hanwhaNPWP_bo" style="color: ligthgray;">Bentuk Badan Usaha Lainnya</label>
    </div>

    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
        <input type="text" class="form-controller" name="hanwhadob_bo" placeholder="Bidang Usaha" id="Pikaday_bo" onkeypress="return false" value="<?php if($session_avail == FALSE || $session_bo == FALSE ){echo $_SESSION['dataBO']['hanwhadob'];} ?>" required>
        <label for="hanwhadob_bo" style="color: ligthgray;">Bidang Usaha</label>
    </div>
    <div class="floating-label border-b-orange col-md-12 rowpaddingless divEmail">
        <input type="email" class="form-controller dataEmail" name="hanwhaemail_bo" placeholder="Alamat Perusahaan" value="<?php if($session_avail == FALSE || $session_avail == FALSE || $session_bo == FALSE ){echo $_SESSION['dataBO']['hanwhaemail'];} ?>"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        <label for="hanwhaemail_bo" style="color: ligthgray;">Alamat Perusahaan</label>
    </div>


    <!-- Hubungan Calon Tertanggung-->
    <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
        <h5>Hubungan Beneficial Owner dengan Pemegang Polis</h5>
    </div>
    <div class="col-md-6 radioSelector">
        <label><input type="radio" name="hubungan_BO" value="1"><span>Pemberi Kerja</span></label>
    </div>
    <div class="col-md-6 radioSelector">
        <label><input type="radio" name="hubungan_BO" value="2"><span>Perusahaan Induk</span></label>
    </div>
    <div class="col-md-6 radioSelector">
        <label><input type="radio" name="hubungan_BO" value="lainnya"><span>Lainnya</span></label>
    </div>
    <div class="floating-label border-b-orange col-md-12 rowpaddingless divEmail" style="display:none;" id="hubungan_BO_others">
        <input type="email" class="form-controller dataEmail" name="hanwhaemail_bo" placeholder="Hubungan Lainnya" value="<?php if($session_avail == FALSE || $session_avail == FALSE || $session_bo == FALSE ){echo $_SESSION['dataBO']['hanwhaemail'];} ?>"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        <label for="hanwhaemail_bo" style="color: ligthgray;">Hubungan Lainnya</label>
    </div>
    <div class="floating-label border-b-orange col-md-12 rowpaddingless divEmail">
        <input type="email" class="form-controller dataEmail" name="hanwhaemail_bo" placeholder="Alasan Mengasuransikan" value="<?php if($session_avail == FALSE || $session_avail == FALSE || $session_bo == FALSE ){echo $_SESSION['dataBO']['hanwhaemail'];} ?>"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        <label for="hanwhaemail_bo" style="color: ligthgray;">Alasan Mengasuransikan</label>
    </div>
    
    <div class="floating-label col-md-12 rowpaddingless">
        <select name="hanwhasourceincome_bo" required>
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
    <div class="floating-label border-b-orange col-md-12 rowpaddingless divEmail" id="hanwhasourceincome_bo_others" style="display: none;">
        <input type="email" class="form-controller dataEmail" name="hanwhaemail_bo" placeholder="Alasan Mengasuransikan" value="<?php if($session_avail == FALSE || $session_avail == FALSE || $session_bo == FALSE ){echo $_SESSION['dataBO']['hanwhaemail'];} ?>"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        <label for="hanwhaemail_bo" style="color: ligthgray;">Alasan Mengasuransikan</label>
    </div>
    
    <div class="floating-label col-md-6 rowpaddingless">
        <select name="hanwpendapatantetap_bo" required id="workselector">
            <option value="" disabled selected>
                Asset Saat Ini
            </option>
            <option value="1">&lt; 100 juta</option>
            <option value="1">100 juta - 1 milyar</option>
            <option value="1">&gt; 1 milyar - 10 milyar</option>
            <option value="1">&gt; 10 milyar - 100 milyar</option>
            <option value="1">&gt; 100 milyar - 500 milyar</option>
            <option value="1">&gt; 500 milyar</option>
        </select>
    </div>
    <div class="floating-label col-md-6 rowpaddingless">
        <select name="hanwpendapatantetap_bo" required id="workselector">
            <option value="" disabled selected>
                Nominal Penghasilan Kotor Per Tahun
            </option>
            <option value="1">&lt; 100 juta</option>
            <option value="1">&gt; 100 - 500 juta</option>
            <option value="1">&gt; 500juta-1milyar</option>
            <option value="1">&gt; 1-10 milyar</option>
            <option value="1">&gt; 10 milyar</option>
        </select>
    </div>
</div>
<hr>
    <?php 
        include "../footer-link.php";
    ?>
    <script>
        $('select[name="hanwhaBadanUsaha_bo"]').on('change', function() {
            if(this.value == "lainnya"){
                $("#hanwhaBadanUsaha_bo_others").css("display","block");
            }else{
                $("#hanwhaBadanUsaha_bo_others").css("display","none");
            }
        });
        $('input[name="hubungan_BO"]').on('click', function() {
            if(this.value == "lainnya"){
                $("#hubungan_BO_others").css("display","block");
            }else{
                $("#hubungan_BO_others").css("display","none");
            }
        });
        $('select[name="hanwhasourceincome_bo"]').on('change', function() {
            if(this.value == "Incoth"){
                $("#hanwhasourceincome_bo_others").css("display","block");
            }else{
                $("#hanwhasourceincome_bo_others").css("display","none");
            }
        });
    </script>