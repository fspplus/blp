<?php   
    include 'connectdb.php';
    include '../jsonapp/json-hanwha-api.php';

    /*ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);*/

    $data_familyBO = familyrelationshiplist_BO();
    $data_INCSRC_BO = INCSRC_BO();
    $data_INCOTH_BO = INCOTH_BO();
    $data_INCTYPE_BO = INCTYPE_BO();
    $data_CITIZEN_BO = CITIZEN_BO();
    $data_OCCUPATION_BO = OCCUPATION_BO();
    $data_MARITAL_BO = MARITAL_BO();
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
    <div class="floating-label border-b-orange col-md-6 rowpaddingless">
        <input type="text" class="form-controller" name="hanwhaname_bo" placeholder="Nama Lengkap" value="<?php if($session_avail == FALSE || $session_bo == FALSE ){echo $_SESSION['dataBO']['hanwhaname_bo'];} ?>" required>
        <label for="hanwhaname" style="color: ligthgray;">Nama Lengkap</label>
    </div>
    <div class="floating-label border-b-orange col-md-6 rowpaddingless">
        <input type="text" class="form-controller" name="hanwhadob_bo" placeholder="Tanggal Lahir" id="Pikaday_bo" onkeypress="return false" value="<?php if($session_avail == FALSE || $session_bo == FALSE ){echo $_SESSION['dataBO']['hanwhadob'];} ?>" required>
        <label for="hanwhadob_bo" style="color: ligthgray;">Tanggal Lahir</label>
    </div>
    <div class="floating-label border-b-orange col-md-6 rowpaddingless divEmail">
        <input type="email" class="form-controller dataEmail" name="hanwhaemail_bo" placeholder="Alamat Email" value="<?php if($session_avail == FALSE || $session_avail == FALSE || $session_bo == FALSE ){echo $_SESSION['dataBO']['hanwhaemail'];} ?>"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        <label for="hanwhaemail_bo" style="color: ligthgray;">Alamat Email</label>
        <div class="icon"><i class="fa fa-times-circle">   </i></div>
    </div>
    <div class="floating-label border-b-orange col-md-6 rowpaddingless divPhone">
        <input type="tel" class="form-controller dataPhone" name="hanwhaphone_bo" placeholder="No. Handphone" maxlength="13" value="<?php if($session_avail == FALSE || $session_bo == FALSE ){echo $_SESSION['dataBO']['hanwhaphone_bo'];} ?>" required>
        <label for="hanwhaphone_bo" style="color: ligthgray;">No. Handphone</label>
        <div class="icon"><i class="fa fa-times-circle">   </i></div>
    </div>
    <div class="floating-label border-b-orange col-md-12 rowpaddingless divNIK">
        <input type="tel" class="form-controller dataNIK" name="hanwhanik_bo" placeholder="No. KTP / Passport / KITAS" maxlength="16" value="<?php if($session_avail == FALSE || $session_avail == FALSE || $session_bo == FALSE ){echo $_SESSION['dataBO']['hanwhanik_bo'];} ?>" required>
        <label for="hanwhanik_bo" style="color: ligthgray;">No. KTP / Passport / KITAS</label>
        <div class="icon"><i class="fa fa-times-circle">   </i></div>
    </div>
    <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
        <h5>Jenis Kelamin</h5>
    </div>
    <div class="col-md-6 radioSelector">
        <label><input type="radio" name="hanwhagender_bo" value="M"><span>Pria</span></label>
    </div>
    <div class="col-md-6 radioSelector">
        <label><input type="radio" name="hanwhagender_bo" value="F"><span>Wanita</span></label>
    </div>
    <div class="floating-label col-md-12  p-l-0 p-t-20 p-r-0">
        <label for="hanwhaemail" style="color: ligthgray;">Pilih Kota</label>
        <small>Silahkan ketik nama kota anda dan pilih dari opsi yang tersedia. Jika tidak tersedia, silahkan hubungi Customer Service Hanwha untuk bantuan lebih lanjut.</small>
        <br><small>Jika lokasi berada di luar negri, silahkan ketik "Luar Negri"</small>
        <div class="autocomplete">
            <input type="text" id="myInput_bo" class="form-controller border-b-orange " name="hanwhapob1_bo" placeholder="Pilih Kota Kelahiran" required style="border-bottom: 1px solid #ff7101 !important;">
            <input type="hidden" id="inputKotaLahir" class="form-controller border-b-orange " name="hanwhapob2_bo" placeholder="Pilih Kota Kelahiran" required style="border-bottom: 1px solid #ff7101 !important;">
            <label for="hanwhapob1" style="color: ligthgray;">Pilih Kota Kelahiran</label>
        </div>
        <div id="data-city" style="display: none !important;"><?php getcityVal($conn); ?> </div>
    </div>
    <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
        <h5>Pilih Status Pernikahan Anda</h5>
    </div>
    <?php 
        //STATUS PERNIKAHAN
        foreach($data_MARITAL_BO as $data){
            ?>
            <div class="col-md-6 radioSelector">
                <label><input type="radio" name="hanwhastatus_bo" value="<?php echo $data['codeId']; ?>"><span><?php echo $data['codeValue']; ?></span></label>
            </div>
            <?php
        }
    ?>
    
    <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
        <h5>Pilih Status Kewarganegaraan</h5>
    </div>
    <div class="col-md-6 radioSelector">
        <label><input type="radio" name="hanwhacitizen_bo" value="WNI"><span>WNI</span></label>
    </div>
    <div class="col-md-6 radioSelector">
        <label class="col-md-6 rowpaddingless"><input type="radio" name="hanwhacitizen_bo" value="WNA"><span>WNA</span></label>
    </div>
    <div class="floating-label border-b-orange col-md-12 rowpaddingless divWNA" style="display:none !important;">
        <select class="form-controller dataEmail" name="hanwhacitizenOthers_bo">
            <option value="" disabled selected>Kewarganegaraan Anda</option>
            <?php 
                foreach ($data_CITIZEN_BO as $data){
                    echo "<option value='".$data['codeId']."'>".$data['codeValue']."</option>";
                }
            ?>
        </select>
    </div>

    <div class="floating-label col-md-12 rowpaddingless">
        <select name="hanwhasourceincome_bo" required>
            <option value="" disabled selected>
                Pilih Sumber Pendapatan
            </option>
            <?php 
                foreach($data_INCSRC_BO as $data){
                    $kerjaan = $data['codeValue'];
                    echo mb_convert_case("<option value='".$data['codeId']."' data-group='".$data['groupCode']."'>".$kerjaan."</option>", MB_CASE_TITLE, "UTF-8");
                }
            ?>
        </select>
    </div>
    <div class="floating-label border-b-orange col-md-12 rowpaddingless divIncomeOthers" style="display:none !important;">
        <input type="text" class="form-controller dataEmail" name="hanwhasrcOthers_bo" placeholder="Sumber Pendapatan Lainnya">
        <label for="hanwhaemail_bo" style="color: ligthgray;">Sumber Pendapatan Lainnya</label>
    </div>

    <div class="floating-label col-md-12 rowpaddingless">
        <select name="hanwhawork_bo" required id="workselector_bo">
            <option value="" disabled selected>
                Pilih Pekerjaan
            </option>
            <?php 
                foreach($data_OCCUPATION_BO as $data){
                    if($data['codeId'] != 40 || $data['codeId'] != 48){
                        $kerjaan = $data['codeValue'];
                        if($data["codeId"] != "40" && $data["codeId"] != "48"){
                            echo mb_convert_case("<option value='".$data['codeId']."' data-group='".$data['groupCode']."'>".$kerjaan."</option>", MB_CASE_TITLE, "UTF-8");
                        }
                    }
                }
            ?>
        </select>
    </div>
    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
        <input type="text" class="form-controller" name="hanwhaposition_bo" placeholder="Uraian Pekerjaan &#40; Jabatan/Pangkat/Posisi&#41;" id="hanwhaposition_bo" disabled>
        <label for="hanwhaposition_bo" style="color: ligthgray;">Uraian Pekerjaan &#40; Jabatan/Pangkat/Posisi&#41;</label>
    </div>
    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
        <input type="text" class="form-controller" name="hanwhacompanyname_bo" placeholder="Nama Perusahaan/Instansi/Lembaga" id="hanwhacompanyname_bo" disabled>
        <label for="hanwhacompanyname_bo" style="color: ligthgray;">Nama Perusahaan/Instansi/Lembaga</label>
    </div>
    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
        <input type="text" class="form-controller" name="hanwhasector_bo" placeholder="Bidang Usaha" id="hanwhasector_bo" disabled>
        <label for="hanwhasector_bo" style="color: ligthgray;">Bidang Usaha</label>
    </div>
    
    <div class="floating-label col-md-6 rowpaddingless">
        <select name="hanwpendapatantetap_bo" required id="workselector">
            <option value="" disabled selected>
                Pilih Pendapatan Tetap per Tahun
            </option>
            <?php foreach($data_INCTYPE_BO as $data){
                ?>
                    <option value="<?php echo $data['codeId']; ?>"><?php echo $data['codeValue']; ?></option>
                <?php
            } ?>
        </select>
    </div>
    
    <div class="floating-label col-md-6 rowpaddingless">
        <select name="hanwpendapatanlainnya_bo" required id="otherincomeSelector">
            <option value="" disabled selected>
                Apakah ada Penghasilan Lainnya?
            </option>
            <?php 
                foreach($data_INCOTH_BO as $data){
                    ?>
                        <option value="<?php echo $data['codeId']; ?>"><?php echo $data['codeValue']; ?></option>
                    <?php
                }
            ?>
        </select>
    </div>
    <div id="otherIncome" style="display: none;" class="col-md-12 rowpaddingless">
        <div class="floating-label col-md-12 rowpaddingless">
            <select name="hanwpendapatanlainnyaValue_bo" required id="workselector">
                <option value="" disabled selected>
                    Pilih Pendapatan Penghasilan Lain per Tahun
                </option>
                    <?php foreach($data_INCTYPE_BO as $data){
                        ?>
                            <option value="<?php echo $data['codeId']; ?>"><?php echo $data['codeValue']; ?></option>
                        <?php
                    } ?>
            </select>
        </div>

        <div class="floating-label col-md-12 rowpaddingless">
            <select name="hanwpendapatanlainSumber_bo" required id="workselector">
                <option value="" disabled selected>
                    Sumber Penghasilan Lainnya?
                </option>
                <option value="1">Hasil Usaha</option>
                <option value="2">Hasil Investasi</option>
                <option value="3">Warisan</option>
                <option value="4">Orang Tua/Suami/Istri/Anak</option>
                <option value="5">Lainnya</option>
            </select>
        </div>

        <div class="floating-label border-b-orange col-md-12 rowpaddingless" id="pendapatanlain" style="display: none;">
            <input type="text" class="form-controller" name="hanwpendapatanlainSumberInput_bo" placeholder="Masukan sumber penghasilan lainnya" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaHomephone'];} ?>" >
            <label for="hanwhaNPWP_bo" style="color: ligthgray;">Masukan sumber penghasilan lainnya</label>
        </div>

    </div>
    
    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
        <input type="tel" class="form-controller" name="hanwhaNPWP_bo" placeholder="No. NPWP Pribadi" required maxlength="13" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaHomephone'];} ?>" >
        <label for="hanwhaNPWP_bo" style="color: ligthgray;">No. NPWP Pribadi</label>
    </div>

    <div class="col-12 rowpaddingless">
        <h3 style="margin-top: 10px;">Alamat Kantor</h3>
    </div>

    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
        <input type="tel" class="form-controller" name="hanwhaWorkphone_bo" placeholder="No. Telp Kantor" required maxlength="13" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaHomephone'];} ?>" >
        <label for="hanwhaWorkphone_bo" style="color: ligthgray;">No. Telp. Kantor</label>
    </div>

    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
        <input type="text" class="form-controller" name="hanwhaWorkMailaddr1_bo" placeholder="Baris Alamat 1" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaMailaddr1'];} ?>" required>
        <label for="hanwhaWorkMailaddr1_bo" style="color: ligthgray;">Baris Alamat 1</label>
    </div>

    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
        <input type="text" class="form-controller" name="hanwhaWorkMailaddr2_bo" placeholder="Baris Alamat 2" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaMailaddr2'];} ?>" required>
        <label for="hanwhaWorkMailaddr2_bo" style="color: ligthgray;">Baris Alamat 2</label>
    </div>

    <div class="floating-label col-md-12 p-l-0 p-t-20 p-r-0">
        <label for="hanwhaemail_bo" style="color: ligthgray;">Pilih Kota</label>
        <small>Silahkan ketik nama kota anda dan pilih dari opsi yang tersedia. Jika tidak tersedia, silahkan hubungi Customer Service Hanwha untuk bantuan lebih lanjut.</small>
        <br><small>Jika lokasi berada di luar negri, silahkan ketik "Luar Negri"</small>
        <div class="autocomplete">
            <input type="text" id="addressCity" class="form-controller border-b-orange " name="hanwhaMailcity1_bo" placeholder="Kota Alamat" required style="border-bottom: 1px solid #ff7101 !important;">
            <input type="hidden" id="inputKotaAlamat" class="form-controller border-b-orange " name="hanwhaMailcity2_bo" placeholder="Pilih Kota Kelahiran" required style="border-bottom: 1px solid #ff7101 !important;">
            <label for="hanwhaWorkMailcity1_bo" style="color: ligthgray;">Kota Alamat</label>
        </div>
    </div>

    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
        <input type="tel" class="form-controller" name="hanwhaWorkMailPostal_bo" placeholder="Kode Pos" required value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaMailPostal'];} ?>"  maxlength="5">
        <label for="hanwhaMailPostal_bo" style="color: ligthgray;">Kode Pos</label>
    </div>
    <div id="ktpaddr" style="width: 100%;">
        <div class="col-12 rowpaddingless">
            <h3 style="margin-top: 10px;">Alamat Rumah</h3>
        </div>
        <div class="floating-label border-b-orange col-md-12 rowpaddingless">
            <input type="text" class="form-controller" name="hanwhaKTPaddr1_bo" placeholder="Baris Alamat 1" id="addr1KTP" required>
            <label for="hanwhaKTPaddr1_bo" style="color: ligthgray;">Baris Alamat 1</label>
        </div>

        <div class="floating-label border-b-orange col-md-12 rowpaddingless">
            <input type="text" class="form-controller" name="hanwhaKTPaddr2_bo" placeholder="Baris Alamat 2" id="addr2KTP" required>
            <label for="hanwhaKTPaddr2_bo" style="color: ligthgray;">Baris Alamat 2</label>
        </div>

        <div class="floating-label col-md-12  p-l-0 p-t-20 p-r-0">
            <label for="hanwhaemail" style="color: ligthgray;">Pilih Kota</label>
            <small>Silahkan ketik nama kota anda dan pilih dari opsi yang tersedia. Jika tidak tersedia, silahkan hubungi Customer Service Hanwha untuk bantuan lebih lanjut.</small>
        <br><small>Jika lokasi berada di luar negri, silahkan ketik "Luar Negri"</small>
            <div class="autocomplete">
                <input type="text" id="inputKotaKTP1" class="form-controller border-b-orange " name="hanwhaKTPcity1_bo" placeholder="Kota Alamat" required style="border-bottom: 1px solid #ff7101 !important;" id="city1KTP">
                <input type="hidden" id="inputKotaKTP2" class="form-controller border-b-orange " name="hanwhaKTPcity2_bo" placeholder="Pilih Kota Kelahiran" required id="city2KTP">
                <label for="hanwhaKTPcity1_bo" style="color: ligthgray;">Kota Alamat</label>
            </div>
        </div>
        <div class="floating-label border-b-orange col-md-12 rowpaddingless">
            <input type="tel" class="form-controller" name="hanwhaKTPPostal_bo" placeholder="Kode Pos" id="postalKTP" required maxlength="5">
            <label for="hanwhaKTPPostal_bo" style="color: ligthgray;">Kode Pos</label>
        </div>
    </div>


        <!-- Hubungan Calon Tertanggung-->
        <!-- <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
            <h5>Hubungan dengan Calon Tertanggung</h5>
        </div> -->
        
        <select class="form-controller dataEmail" name="hubungan_BO">
            <option value="" disabled selected>Hubungan dengan Calon Tertanggung</option>
            <?php 
                foreach ($data_familyBO as $data){
                    echo "<option value='".$data['codeId']."'>".$data['codeValue']."</option>";
                }
            ?>
        </select>
        <!-- <?php 
            foreach($data_familyBO as $data){
                ?>
                    <div class="col-md-6 radioSelector">
                        <label><input type="radio" name="hubungan_BO" value="<?php echo $data['codeId']; ?>"><span><?php echo $data['codeValue']; ?></span></label>
                    </div>
                <?php
            }
        ?> -->

        <!-- END HUBUGAN Calon Tertanggung -->

        <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
            <h5>Kewajiban Pajak selain ke Indonesia</h5>
        </div>
        <div class="col-md-6 radioSelector">
            <label><input class="radio" type="radio" name="hanwhapajak_bo" value="Y" data-id="radio-pajak-yes"><span>Ya, Ada</span></label>
        </div>
        <div class="col-md-6 radioSelector">
            <label class="col-md-6 rowpaddingless"><input class="radio" type="radio" name="hanwhapajak_bo" value="N" data-id="radio-pajak-no"><span>Tidak Ada</span></label>
        </div>
        <div class="floating-label border-b-orange col-md-12 rowpaddingless" id="others-pajak" style="display: none;">
            <input type="text" class="form-controller" name="hanwhaPajakOthers_bo" placeholder="Negara Wajib Pajak Lainnya" id="addr2KTP">
            <label for="hanwhaPajakOthers_bo" style="color: ligthgray;">Negara Wajib Pajak Lainnya</label>
        </div>
    <div class="col-md-12 p-b-30"><div class="limit"></div></div>
</div>
</div>
<hr>
    <?php 
        include "../footer-link.php";
    ?>
    <script>
        $('#otherincomeSelector').on('change', function() {
            if(this.value == "1" || this.value == "2"){
                $("#otherIncome").css("display","block");
                $("#otherIncome select").attr("required", "true");
            }else{
                $("#otherIncome").css("display","none");
                $("#otherIncome select").removeAttr("required");
            }
        });
        $("select[name='hanwpendapatanlainSumber_bo']").on("change", function(){
            if(this.value == "5"){
                $("#pendapatanlain").css("display", "block");
                $("#pendapatanlain select").attr("required", "true");
                $("#pendapatanlain input").attr("required", "true");
            }else{
                $("#pendapatanlain").css("display", "none");
                $("#pendapatanlain select").attr("required", "false");
                $("#pendapatanlain input").removeAttr("required");
            }
        })
        $(".radio[name='hanwhapajak_bo']").on("click", function(){
            if(this.value == "Y"){
                $("#others-pajak").css("display", "block");
                $("#others-pajak input").attr("required", "true");
            }else{
                $("#others-pajak").css("display", "none");
                $("#others-pajak input").removeAttr("required");
            }
        })
        $("input[name='hanwhacitizen_bo']").on("click", function(){
            if(this.value == "WNA"){
                $(".divWNA").css("display", "block");
                $(".divWNA select").attr("required", "true");
            }else{
                $(".divWNA").css("display", "none");
                $(".divWNA select").removeAttr("required");
            }
        })
        $("select[name='hanwhasourceincome_bo']").on("change", function(){
            if(this.value == "6"){
                $(".divIncomeOthers").css("display", "block");
                $(".divIncomeOthers input").attr("required", "required");
            }else{
                $(".divIncomeOthers").css("display", "none");
                $(".divIncomeOthers input").removeAttr("required");
            }
        })
        
        var picker = new Pikaday({
            field: document.getElementById('Pikaday_bo'),
            i8n: {
                    previousMonth : 'Bulan Lalu',
                    nextMonth     : 'Bulan Depan',
                    months        : ['Januari','Februari','Maret','April','Mei','Juni','Junli','Agustus','September','Oktober','November','December'],
                    weekdays      : ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'],
                    weekdaysShort : ['Min','Sen','Sel','Rab','Kam','Jum','Sab']
                },
            format: 'DD-MM-YYYY',
            toString(date, format) {
                // you should do formatting based on the passed format,
                // but we will just return 'D/M/YYYY' for simplicity
                const daycount = date.getDate();
                const day = daycount < 10 ? '0' + daycount : daycount;
                const monthcount = date.getMonth() + 1;
                const month = monthcount < 10 ? '0' + monthcount : monthcount;
                const year = date.getFullYear();
                return `${year}-${month}-${day}`;
            },
            parse(dateString, format) {
                // dateString is the result of `toString` method
                const parts = dateString.split('-');
                const day = parseInt(parts[0], 10);
                const month = parseInt(parts[1], 10) - 1;
                const year = parseInt(parts[2], 10);
                return new Date(day, month, year);
            },
            defaultDate: "",
            setDefaultDate: true,
            minDate: new Date("31/10/1959"),
            maxDate: new Date("30/04/2003"),
            yearRange: [1959, 2003]
        });
        if($("#myInput_bo").length){
            autocomplete(document.getElementById("myInput_bo"), document.getElementById("inputKotaLahir"), countries);
        }
        if($("#addressCity").length){
            autocomplete(document.getElementById("addressCity"), document.getElementById("inputKotaAlamat"), countries);
        }
        $('#workselector_bo').on('change', function() {
            if(this.value == "Job7" || this.value == "Job20"){
                $("#hanwhaposition_bo").prop("required",true);
                $("#hanwhaposition_bo").prop("disabled",false);
                $("#hanwhacompanyname_bo").prop("required",true);
                $("#hanwhacompanyname_bo").prop("disabled",false);
                $("#hanwhasector_bo").prop("required",false);
                $("#hanwhasector_bo").prop("disabled",true);
                
                
            }
            else if(this.value == "Job8" || this.value == "Job19"){
                $("#hanwhaposition_bo").prop("required",false);
                $("#hanwhaposition_bo").prop("disabled",true);
                $("#hanwhacompanyname_bo").prop("required",true);
                $("#hanwhacompanyname_bo").prop("disabled",false);
                $("#hanwhasector_bo").prop("required",true);
                $("#hanwhasector_bo").prop("disabled",false);
            }
            else if(this.value == "Job23"){
                $("#hanwhaposition_bo").prop("required",true);
                $("#hanwhaposition_bo").prop("disabled",false);
                $("#hanwhacompanyname_bo").prop("required",true);
                $("#hanwhacompanyname_bo").prop("disabled",false);
                $("#hanwhasector_bo").prop("required",true);
                $("#hanwhasector_bo").prop("disabled",false);
            }
            else if(this.value == "Job10" || this.value == "Job14"){
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
            }else{
                $("#hanwhaposition_bo").prop("required",false);
                $("#hanwhaposition_bo").prop("disabled",true);
                $("#hanwhacompanyname_bo").prop("required",false);
                $("#hanwhacompanyname_bo").prop("disabled",true);
                $("#hanwhasector_bo").prop("required",false);
                $("#hanwhasector_bo").prop("disabled",true);
            }
        });
    </script>