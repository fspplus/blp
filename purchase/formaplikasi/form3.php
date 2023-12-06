<?php 
    session_start();
    include '../jsonapp/json-hanwha-api.php';  writelog();
    include '../connectdb.php';
    unset($_SESSION['productid']);
    unset($_SESSION['plancode']);
    if(!isset($_SESSION['productid']) && !isset($_SESSION['plancode']) || $_SESSION['productid'] == NULL && $_SESSION['plancode'] == NULL){
        $_SESSION['productid'] = $_GET['setplan'];
        $_SESSION['plancode'] = $_GET['pl'];
    }
    if(isset($_SESSION['registid'])){
        $getuser = "DELETE FROM `temp_datatertanggung` WHERE id_form=".$_SESSION['registid'];
        $result = mysqli_query($conn,$getuser);
        $getuser = "DELETE FROM `temp_beneficiary` WHERE id_formbenef=".$_SESSION['registid'];
        $result = mysqli_query($conn,$getuser);
    }
?>
	<html>
	<body>
		<!--Content Start-->
	  <div id="form3" class="container containerform animated fadeInRight" style="padding: 5%">
	    <div class="row">
	      <div class="col-md-12 col-12 align-self-center">
		    <div class="step" style="margin-bottom: 2%">
                <div class="row" style="padding: 0px !important; margin: 0px !important; display: -webkit-box;">
                    <div class="btn2 col-lg-2 col-md-12 col-12" onclick="back('frm1a','<?php echo $_SESSION['plancode']; ?>')">&lt;</div>
                    <div class="col-lg-10 col-md-12 col-12 displayDesktop" src="../assets/images/form/steps/step-02.png" width="100%"><img src="../assets/images/form/steps/Hanwhalife-bucketlist-step-03.png" width="100%"></div>
                </div>
                <img src="../assets/images/form/steps/Hanwhalife-bucketlist-step-03.png" width="100%" class="displayMobile">
		        <h1 style="color: #ff7101; font-weight: bold;">DATA TERTANGGUNG</h1>
		    </div>
		  </div>
	    </div>
        <!-- KALAU ADA EMAIL/login -->
        <?php if(isset($_SESSION['memberid'])){
            include '../formaplikasi/form-tertanggung.php';
            $_SESSION['status'] ="getwaris";
        }else if(!isset($_SESSION['memberid'])){
    ?>
          <!-- KALAU TIDAK ADA EMAIL/login -->
        <form id="data-tertanggung" method="post" action="./formaplikasi/form4.php?setplan=<?php echo $_SESSION['productid']; ?>">
	    <div class="row">
	      <!-- Column -->
            <div class="errMsg"></div>
	      <div id = "colL" class="col-lg-6 col-md-12">
	        Nama Lengkap
	        <input type="text" class="txedit" name="fullname" required value="<?php echo $_SESSION['postform1']['fullname']; ?>">
	        No. KTP / Passport / KITAS
	        <input type="tel" class="txedit" name="noktp" placeholder="i.e 3172200120012345" <?php if(0){?>pattern="[0-9]*" min="0000000000000001" <?php } ?>required value="<?php echo $_SESSION['postform1']['noktp']; ?>" maxlength="16">
            <label for="ktpfoto">UPLOAD FOTO KTP</label><br>
            <div class="upload-btn-wrapper">
                <label class="btn" onchange="getKTP()">
                    <input type="file" id="filektp" name="fotoktp" accept=".jpg,.jpeg,.png">
                    <p id="txtktp">Pilih file</p>
                </label>
            </div>
            <br>
	        Tempat Lahir
	        <select type="text" id="cityselection" class="txedit" name="tempatlahir" required value="<?php echo $_SESSION['postform1']['noktp']; ?>">
                <?php if(isset($_SESSION['postform1']['cityline1'])){
                    echo "<option value=".$_SESSION['postform1']['cityline1']." selected>".$_SESSION['postform1']['cityline1']."</option>";
                } ?>
                <option value="" disabled selected>Pilih Kota...</option>
                <?php if(false){ ?><option value="others">Kota Lainnya ...</option><?php } ?>
                <option value="luarnegri">Luar Negri</option>
                <?php getcity($conn); ?>
              </select><input type="text" class="txedit" name="tempatlahir" id="tempatlahirOthers" placeholder="Masukan nama kota anda">
              
              <?php
                $yearMin = date("Y")-16;
                $dateMin = sprintf("%02d",date("m")-05);
                $daysMin = cal_days_in_month(CAL_GREGORIAN, $dateMin, $yearMin);
                $yearMax = date("Y")-61;
              ?>
	        <p style="width: 100%">Tanggal Lahir</p>
	        <input type="date" class="txedit" name="tanggallahir" min="<?php echo $yearMax; ?>-01-01" max="<?php echo $yearMin; ?>-<?php echo $dateMin; ?>-<?php echo $daysMin; ?>" required placeholder="dd-mm-yyyy" id="datepicker" onkeydown="return false">
            No. HP
            <input type="tel" class="txedit" name="telphone" pattern="[0-9]*" required value="<?php echo $_SESSION['postform1']['telphone']; ?>" placeholder="i.e 08812345678" maxlength="12">
	      </div>
            <div id="colR" class="col-lg-6 col-md-12">
                Sumber Pendapatan
                <select class="txedit" name="pendapatan" required>
                    <option disabled value="" selected>Pilih Sumber</option>
                <?php
                    $dataFull = sourceincome();
                    foreach($dataFull as $data){
                        $income = $data['codeValue'];
                        echo "<option value='".$data['codeId']."'>".$income."</option>";
                    }
                ?>
                </select>
                Status Menikah
                  <select class="txedit" name="marriage" required>
                    <option disabled value="" selected>Pilih Status</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Belum Menikah">Belum Menikah</option>
                  </select>
                Jenis Kelamin
                <select class="txedit" name="gender" required>
                    <option disabled value="" selected>Pilih Opsi</option>
                  <option value="M">Pria</option>
                  <option value="F">Wanita</option>
                </select>
                Email
                <input type="text" class="txedit" name="email" placeholder="i.e nama@email.com" required value="<?php echo $_SESSION['postform1']['email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                Pekerjaan
                <select class="txedit" name="pekerjaan" required>
                    <option disabled value="" selected>Pilih Pekerjaan</option>
                <?php
                    $dataFull = jobdesclist();
                    foreach($dataFull as $data){
                        $kerjaan = $data['codeValue'];
                        echo mb_convert_case("<option value='".$data['codeId']."'>".$kerjaan."</option>", MB_CASE_TITLE, "UTF-8");
                    }
                ?>
                </select><br>
                No. Telp Rumah
                <input type="tel" class="txedit" name="telprumah" pattern="[0-9]*" required value="<?php echo $_SESSION['postform1']['telprumah']; ?>" placeholder="i.e 08812345678" maxlength="12">
            </div>
            <div style="border-top: 1px solid #ff7101;padding: 10px 0px 0px 0px;" class="row">
	      <div id = "colL" class="col-lg-6 col-md-12">
	        Alamat Rumah
	        <input type="text" class="txedit" name="addrline1" required value="<?php echo $_SESSION['postform1']['addrline1']; ?>">
            <input type="text" class="txedit addrline2" name="addrline2" value="<?php echo $_SESSION['postform1']['addrline2']; ?>">
            <?php if(false){ ?><select type="text" class="txedit" name="cityline1" placeholder="Kota Alamat" required value="<?php echo $_SESSION['postform1']['cityline1']; ?>">
                <?php if(isset($_SESSION['postform1']['cityline1'])){
                    echo "<option value=".$_SESSION['postform1']['cityline1']." selected>".$_SESSION['postform1']['cityline1']."</option>";
                } ?>
                <option value="" disabled selected>Pilih Kota...</option>
                <?php getcity($conn); ?>
              </select><?php } ?>
              
            <select type="text" class="txedit" name="cityline1" id="ktpselector" placeholder="Kota Alamat" required value="<?php echo $_SESSION['postform1']['cityline1']; ?>">
                <?php if(isset($_SESSION['postform1']['cityline1'])){
                    echo "<option value=".$_SESSION['postform1']['cityline1']." selected>".$_SESSION['postform1']['cityline1']."</option>";
                } ?>
                <option value="" disabled selected>Pilih Kota...</option>
                <?php if(false){ ?><option value="others">Kota Lainnya ...</option><?php } ?>
                <option value="Luar Negri">Luar Negri</option>
                <?php getcity($conn); ?>
              </select><input type="text" class="txedit" name="cityline1" id="ktpselectorOthers" placeholder="Masukan nama kota anda">
              
              
            <input type="tel" class="txedit" name="postaladdr" pattern="[0-9]*" min="00001" placeholder="Kode Pos" required maxlength="5" value="<?php echo $_SESSION['postform1']['postaladdr']; ?>">
              
            <input type="checkbox" id="cek" class="sameaddr" name="sesuai" value="sesuai" onclick="loadKTP()">
            <label for="cek">Jika alamat sesuai dengan identitas KTP</label>
            <input type="submit" class="btn" value="CONTINUE">
	      </div>
            <div id="colR" class="col-lg-6 col-md-12">
                <div class="ktpRequired">
                    <div class="addrktp animated">
                        Alamat KTP
                        <input type="text" class="txedit" name="ktpaddrline1" required value="<?php echo $_SESSION['postform1']['ktpaddrline1']; ?>">
                        <input type="text" class="txedit" name="ktpaddrline2" required value="<?php echo $_SESSION['postform1']['ktpaddrline2']; ?>">
                        
                        <?php if(false){ ?><select type="text" class="txedit" name="cityline2" placeholder="Kota Alamat" required value="<?php echo $_SESSION['postform1']['cityline2']; ?>">
                            <?php if(isset($_SESSION['postform1']['cityline1'])){
                                echo "<option value=".$_SESSION['postform1']['cityline1']." selected>".$_SESSION['postform1']['cityline1']."</option>";
                            } ?>
                            <option value="" disabled selected>Pilih Kota...</option>
                            <option value="Luar Negri">Luar Negri</option>
                            <?php getcity($conn); ?>
                          </select><?php } ?>
                        
                        <select type="text" class="txedit" name="cityline2" id="ktpselectorSec" placeholder="Kota Alamat" required value="<?php echo $_SESSION['postform1']['cityline1']; ?>">
                            <?php if(isset($_SESSION['postform1']['cityline1'])){
                                echo "<option value=".$_SESSION['postform1']['cityline1']." selected>".$_SESSION['postform1']['cityline1']."</option>";
                            } ?>
                            <option value="" disabled selected>Pilih Kota...</option>
                            <option value="Luar Negri">Luar Negri</option>
                            <?php getcity($conn); ?>
                          </select><input type="text" class="txedit" name="cityline2" id="ktpselectorOthersSec" placeholder="Masukan nama kota anda">
                        
                        <input type="tel" class="txedit" name="postalktp" pattern="[0-9]*" min="00001" placeholder="Kode Pos" required value="<?php echo $_SESSION['postform1']['postalktp']; ?>" maxlength="5">
                        <input type="hidden" class="samektp" name="ktpvalue" value="1">
                    </div>
                </div>
            </div>
            </div>
	    </div>
        </form>
          <?php
} ?>
        

	  </div>
	  <!--Content End-->
	</body>
        <script>
            $("#tempatlahirOthers").hide();
            $('#cityselection').on('change', function() {
                if(this.value == "others"){
                    //console.log("others");
                    $("#tempatlahirOthers").show(400);
                }else{
                    $("#tempatlahirOthers").hide(400);
                    $("#tempatlahirOthers").val(this.value);
                }
            });
            $("#ktpselectorOthersSec").hide();
            $('#ktpselectorSec').on('change', function() {
                if(this.value == "others"){
                    //console.log("others");
                    $("#ktpselectorOthersSec").show(400);
                }else{
                    $("#ktpselectorOthersSec").hide(400);
                    $("#ktpselectorOthersSec").val(this.value);
                }
            });
            $("#ktpselectorOthers").hide();
            $('#ktpselector').on('change', function() {
                if(this.value == "others"){
                    //console.log("others");
                    $("#ktpselectorOthers").show(400);
                }else{
                    $("#ktpselectorOthers").hide(400);
                    $("#ktpselectorOthers").val(this.value);
                }
            });
               $(function() {
                    // Get the form.
                    var form = $('#data-tertanggung');

                    // Get the messages div.
                    var formMessages = $('#form-messages');

                    // TODO: The rest of the code will go here...
                    $(form).submit(function(event) {
                        var isFormValid = true;

                        $("input:not(.addrline2)").each(function(){
                            if ($.trim($(this).val()).length == 0){
                                $(this).addClass("highlight");
                                isFormValid = false;
                            }
                            else{
                                $(this).removeClass("highlight");
                            }
                        });

                        if (!isFormValid) {
                            alert("Please fill in all the required input!");
                        }else{
                            // TODO
                            // Serialize the form data.
                            $("#page-loader").css("display", "block");
                            
                            var files = $("#filektp")[0].files;
                            
                            var formData = $(form).serializeArray();
                            var formArrayData = new FormData();
                            
                            for(var i = 0; i < files.length; i++){
                                formArrayData.append("ktpfoto", files[i]);
                            }
                            $(formData).each(function(index,element){
                                formArrayData.append(element.name, element.value);
                            })
                            
                            $.ajax({
                                type: 'POST',
                                url: $(form).attr('action'),
                                data: formArrayData,
                                processData:false,
                                contentType:false,
                                success: function(dataSum) {
                                       // data is ur summary
                                    $("#page-loader").css("display", "none");
                                      $('.formloader').html(dataSum);
                                      $('html, body').animate({ scrollTop: 0 }, 'slow');
                                 }
                            })
                        }
                        // Stop the browser from submitting the form.
                        event.preventDefault();
                        
                    });
                    
                });
    
    $(document).ready(function() {
    // Numbers only on NIK textbox.
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
});
    var datepicker = new Pikaday({
        field: document.getElementById('datepicker'),
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
           minDate: new Date("31/12/1954"),
           maxDate: new Date("01/01/2002"),
           yearRange: 47
    });
    /*$(function(){
         // Find any date inputs and override their functionality
         $('#datepicker').datepicker({
             dateFormat : 'yy-mm-dd',
              changeMonth: true,
              changeYear: true
         });
    });*/
        </script>
</html>
<?php exit(); ?>