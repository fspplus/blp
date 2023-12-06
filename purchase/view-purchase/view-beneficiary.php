<div id="benef<?php echo $_GET['ctrbenef']; ?>" class="row rowpaddingless" style="width: 100%;">
    <div class="col-md-12 rowpaddingless"><div class="removeBenef" onclick="removeBenef()"><h5>Hapus Data Ahli Waris</h5></div></div>
    <h3 style="margin-top: 10px;">Ahli Waris <?php echo $_GET['ctrbenef']; ?></h3>
    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
        <input type="text" class="form-controller" name="namaAhliWaris<?php echo $_GET['ctrbenef']; ?>" placeholder="Nama Lengkap" id="addr1KTP" required>
        <label for="namaAhliWaris<?php echo $_GET['ctrbenef']; ?>" style="color: ligthgray;">Nama Lengkap</label>
    </div>
    <!-- JENIS KELAMIN AHLI WARIS -->
    <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
        <h5>Jenis Kelamin</h5>
    </div>
    <div class="col-md-6 radioSelector">
        <label><input type="radio" name="genderAhliWaris<?php echo $_GET['ctrbenef']; ?>" value="M" required><span>Pria</span></label>
    </div>
    <div class="col-md-6 radioSelector">
        <label><input type="radio" name="genderAhliWaris<?php echo $_GET['ctrbenef']; ?>" value="F" required><span>Wanita</span></label>
    </div>

    <!-- END JENIS KELAMIN AHLI WARIS -->
    <!-- Hubungan Ahli Waris -->
    <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
        <h5>Hubungan dengan pemegang polis</h5>
    </div>
    <div class="col-md-6 radioSelector">
        <label><input type="radio" name="hubunganAhliWaris<?php echo $_GET['ctrbenef']; ?>" value="1"><span>Orang Tua</span></label>
    </div>
    <div class="col-md-6 radioSelector">
        <label><input type="radio" name="hubunganAhliWaris<?php echo $_GET['ctrbenef']; ?>" value="2"><span>Pasangan</span></label>
    </div>
    <div class="col-md-6 radioSelector">
        <label><input type="radio" name="hubunganAhliWaris<?php echo $_GET['ctrbenef']; ?>" value="3"><span>Anak Kandung</span></label>
    </div>
    <div class="col-md-6 radioSelector">
        <label><input type="radio" name="hubunganAhliWaris<?php echo $_GET['ctrbenef']; ?>" value="4"><span>Saudara Kandung</span></label>
    </div>

    <!-- END HUBUGAN AHLI WARIS -->

    <div class="floating-label border-b-orange col-md-6 rowpaddingless">
        <input type="text" class="form-controller" name="hanwhadob<?php echo $_GET['ctrbenef']; ?>" placeholder="Tanggal Lahir" id="dateahliwaris<?php echo $_GET['ctrbenef']; ?>" onkeypress="return false" required readonly>
        <label for="hanwhadob<?php echo $_GET['ctrbenef']; ?>" style="color: ligthgray;">Tanggal Lahir</label>
    </div>

    <div class="floating-label border-b-orange col-md-6 rowpaddingless">
        <input type="email" class="form-controller" name="emailAhliWaris<?php echo $_GET['ctrbenef']; ?>" placeholder="Email Ahli Waris" id="addr2KTP" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        <label for="emailAhliWaris<?php echo $_GET['ctrbenef']; ?>" style="color: ligthgray;">Email Ahli Waris</label>
    </div>

    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
        <input type="tel" class="form-controller" name="telpAhliWaris<?php echo $_GET['ctrbenef']; ?>" placeholder="No. Telephone" id="postalKTP" maxlength="13" required>
        <label for="telpAhliWaris<?php echo $_GET['ctrbenef']; ?>" style="color: ligthgray;">No. Telephone</label>
    </div>

    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
        <input type="tel" class="form-controller percentageNew persentaseAhliWaris1" name="persentaseAhliWaris<?php echo $_GET['ctrbenef']; ?>" placeholder="Persentase" id="persentase1" max="100" required>
        <label for="telpAhliWaris<?php echo $_GET['ctrbenef']; ?>" style="color: ligthgray;">Persentase</label>
    </div>
</div>
<div id="addBenef<?php echo $_GET['ctrbenef']+1; ?>">
    <input type="hidden" name="hanwhaTtlBenef" id="hanwhaTtlBenef" value="<?php echo $_GET['ctrbenef']; ?>">
    <?php if($_GET['ctrbenef'] < 5){ ?>
    <div class="col-12 p-t-20 p-b-20 m-b-20" id="addBenef" onclick="addBenef(<?php echo $_GET['ctrbenef']+1; ?>)"><h5>Tambahkan Ahli Waris</h5></div>
    <?php } ?>
</div>
<script>   
    $(document).ready(function() {
                //this calculates values automatically

                $(".percentage").on("keydown keyup", function() {
                    calculateSum();
                });
            });
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