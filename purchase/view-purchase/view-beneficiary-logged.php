<?php 
ob_start();
session_start();

include '../jsonapp/json-hanwha-api.php';

$contain_benef = 0;

if(isset($_GET['ahliwaris'])){
    $dataspec = getspecific($_SESSION['memberid'], $_GET['ahliwaris']);
    $contain_benef = 1;
    if(isset($_GET['show'])){
        $contain_benef = 0;
    }
    // print_r($dataspec);
}
?>
<div id="benef<?php echo $_GET['ctrbenef']; ?>" class="row rowpaddingless" style="width: 100%;">
    <?php if($_GET['ctrbenef'] == 1 || $_GET['cont'] == "yes"){}else{ ?>
    <div class="col-md-12 rowpaddingless"><div class="removeBenef" onclick="removeBenef()"><h5>Hapus Data Ahli Waris</h5></div></div>
    <h3 style="margin-top: 10px;">Ahli Waris <?php echo $_GET['ctrbenef']; ?></h3>
    
    <?php } ?>
    <?php if($contain_benef != 1){ 
    $dataspec = getbeneficiary($_SESSION['memberid']);?>
    <div class="col-md-12 rowpaddingless">
        Ahli Waris Terdaftar<br>
        <small>Silahkan pilih list dibawah jika anda ingin menambahkan dari ahli waris yang sudah anda daftarkan sebelumnya.</small>
        <select name="selectorAhliWaris<?php echo $_GET['ctrbenef'] ?>" id="selectorAhliWaris<?php echo $_GET['ctrbenef'] ?>" class="form-controller">
            <option disabled selected value="">Pilih satu ...</option>
            <?php foreach($dataspec as $data){
                echo "<option value='".$data['name']."'>".$data['name']."</option>";
            } ?>
        </select>
    </div>
    <?php } ?>
    <div id="loggedAhliWaris<?php echo $_GET['ctrbenef']; ?>" class="row rowpaddingless">
        <div class="floating-label border-b-orange col-md-12 rowpaddingless">
            <input type="text" class="form-controller" name="namaAhliWaris<?php echo $_GET['ctrbenef']; ?>" placeholder="Nama Lengkap" id="addr1KTP" required value="<?php echo $dataspec["name"]; ?>">
            <label for="namaAhliWaris<?php echo $_GET['ctrbenef']; ?>" style="color: ligthgray;">Nama Lengkap</label>
        </div>
        <!-- JENIS KELAMIN AHLI WARIS -->
        <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
            <h5>Jenis Kelamin</h5>
        </div>
        <div class="col-md-6 radioSelector">
            <label><input type="radio" name="genderAhliWaris<?php echo $_GET['ctrbenef']; ?>" value="M" <?php if($dataspec['gender'] == "M")echo "checked"; ?> ><span>Pria</span></label>
        </div>
        <div class="col-md-6 radioSelector">
            <label><input type="radio" name="genderAhliWaris<?php echo $_GET['ctrbenef']; ?>" value="F" <?php if($dataspec['gender'] == "F")echo "checked"; ?> ><span>Wanita</span></label>
        </div>

        <!-- END JENIS KELAMIN AHLI WARIS -->
        <!-- Hubungan Ahli Waris -->
        <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
            <h5>Hubungan dengan pemegang polis</h5>
        </div>
        <div class="col-md-6 radioSelector">
            <label><input type="radio" name="hubunganAhliWaris<?php echo $_GET['ctrbenef']; ?>" value="1" <?php if($dataspec['famrel'] == 1){echo "checked";} ?> ><span>Orang Tua</span></label>
        </div>
        <div class="col-md-6 radioSelector">
            <label><input type="radio" name="hubunganAhliWaris<?php echo $_GET['ctrbenef']; ?>" value="2" <?php if($dataspec['famrel'] == 2){echo "checked";} ?> ><span>Pasangan</span></label>
        </div>
        <div class="col-md-6 radioSelector">
            <label><input type="radio" name="hubunganAhliWaris<?php echo $_GET['ctrbenef']; ?>" value="3" <?php if($dataspec['famrel'] == 3){echo "checked";} ?> ><span>Anak Kandung</span></label>
        </div>
        <div class="col-md-6 radioSelector">
            <label><input type="radio" name="hubunganAhliWaris<?php echo $_GET['ctrbenef']; ?>" value="4" <?php if($dataspec['famrel'] == 4){echo "checked";} ?> ><span>Saudara Kandung</span></label>
        </div>

        <!-- END HUBUGAN AHLI WARIS -->

        <div class="floating-label border-b-orange col-md-6 rowpaddingless">
            <input type="text" class="form-controller" name="hanwhadob<?php echo $_GET['ctrbenef']; ?>" placeholder="Tanggal Lahir" id="dateahliwaris<?php echo $_GET['ctrbenef']; ?>" onkeypress="return false" required value="<?php echo $dataspec['birthDate']; ?>" readonly>
            <label for="hanwhadob<?php echo $_GET['ctrbenef']; ?>" style="color: ligthgray;">Tanggal Lahir</label>
        </div>

        <div class="floating-label border-b-orange col-md-6 rowpaddingless">
            <input type="email" class="form-controller" name="emailAhliWaris<?php echo $_GET['ctrbenef']; ?>" placeholder="Email Ahli Waris" id="addr2KTP" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $dataspec['email']; ?>">
            <label for="emailAhliWaris<?php echo $_GET['ctrbenef']; ?>" style="color: ligthgray;">Email Ahli Waris</label>
        </div>

        <div class="floating-label border-b-orange col-md-12 rowpaddingless">
            <input type="tel" class="form-controller" name="telpAhliWaris<?php echo $_GET['ctrbenef']; ?>" placeholder="No. Telephone" id="postalKTP" maxlength="12" required value="<?php echo $dataspec['mobileNo']; ?>">
            <label for="telpAhliWaris<?php echo $_GET['ctrbenef']; ?>" style="color: ligthgray;">No. Telephone</label>
        </div>

        <div class="floating-label border-b-orange col-md-12 rowpaddingless">
            <input type="tel" class="form-controller percentageNew persentaseAhliWaris1" name="persentaseAhliWaris<?php echo $_GET['ctrbenef']; ?>" placeholder="Persentase" id="persentase1" max="100" required>
            <label for="telpAhliWaris<?php echo $_GET['ctrbenef']; ?>" style="color: ligthgray;">Persentase</label>
        </div>
    </div>
</div>
<?php 
// print_r($_GET);
if(!isset($_GET['reload'])){
?>
<div id="addBenef<?php echo $_GET['ctrbenef']+1; ?>">
    <input type="hidden" name="hanwhaTtlBenef" id="hanwhaTtlBenef" value="<?php echo $_GET['ctrbenef']; ?>">
    <?php if($_GET['ctrbenef'] < 5){ ?>
    <div class="col-12 p-t-20 p-b-20 m-b-20" id="addBenef" onclick="addBenefLogged(<?php echo $_GET['ctrbenef']+1; ?>)"><h5>Tambahkan Ahli Waris</h5></div>
    <?php } ?>
</div>
<?php
}
?>
<script>   
    var picker_ahliwaris<?php echo $_GET['ctrbenef']; ?> = new Pikaday({
        field: document.getElementById('dateahliwaris<?php echo $_GET['ctrbenef']; ?>'),
        i8n: {
                previousMonth : 'Bulan Lalu',
                nextMonth     : 'Bulan Depan',
                months        : ['Januari','Februari','Maret','April','Mei','Juni','Junli','Agustus','September','Oktober','November','December'],
                weekdays      : ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'],
                weekdaysShort : ['Min','Sen','Sel','Rab','Kam','Jum','Sab']
            },
           maxDate: new Date(<?php echo date("Y"); ?>, <?php echo date("m")-1   ; ?>, <?php echo date("d"); ?>),
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
           yearRange: 65
    });
    
    $('#selectorAhliWaris<?php echo $_GET['ctrbenef']; ?>').change(function(){
        $.ajax({
            url: 'view-purchase/view-beneficiary-logged.php',
            data: "cont=yes&ahliwaris=" + $("#selectorAhliWaris<?php echo $_GET['ctrbenef']; ?>").val() + "&ctrbenef=<?php echo $_GET['ctrbenef']; ?>&reload=true",
            type: "get",
            success: function(data){
               $('#loggedAhliWaris<?php echo $_GET['ctrbenef']; ?>').html(data);
            //    $(".removeables").remove();
            //    $(".removeables").css("display", "none");
                // console.log("ahliwaris=" + $("#selectorAhliWaris<?php echo $_GET['ctrbenef']; ?>").val() + "&ctrbenef=<?php echo $_GET['ctrbenef']; ?>");
            }
        });
    });
    $("input[type='tel']").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
         // Allow: Ctrl/cmd+A
        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
         // Allow: Ctrl/cmd+C
        (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
         // Allow: Ctrl/cmd+X
        (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
         // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
             // let it happen, don't do anything
             return;
    }
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});
</script>