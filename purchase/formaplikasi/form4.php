<?php 
    session_start();
    $ctrBenef = 1; 
    
    date_default_timezone_set('Asia/Jakarta');
    error_reporting(E_ALL);
ini_set('display_errors', 'On');

    include '../jsonapp/json-hanwha-api.php';  writelog();
    //include '../jsonapp/sesschkr.php';
    include '../connectdb.php';
    
    enabledebug();
if(isset($_SESSION['email']) && $_SESSION['status'] == "getwaris"){
    include '../formaplikasi/form-ahliwaris.php';
}else{
    
    $_SESSION['postform1'] = $_POST;
    if($_POST['ktpvalue'] == 0){
        $_POST['ktpaddrline1'] = $_POST['addrline1'];
        $_POST['ktpaddrline2'] = $_POST['addrline2'];
        $_POST['cityline2'] = $_POST['cityline1'];
        $_POST['postalktp'] = $_POST['postaladdr'];
    }
    $_SESSION['mailing'] = $_POST['ktpvalue'];
    $tahunlahir = substr($_POST['tanggallahir'], 0, 4);
    
    $today = date("Y");

    $age = $today - $tahunlahir;
    
    if($age < 18){
        echo "<script>alert('Maaf, umur anda masih dibawah minimal usia yang diperbolehkan. Pastikan anda memasukan tanggal lahir yang benar!');window.location.replace('../');</script>";
    }

    $_POST['tanggallahir'] = str_replace("-","",$_POST['tanggallahir']);
    $stmt = $conn->prepare("INSERT INTO `temp_datatertanggung` (id_form, temp_nama, temp_tgllahir, temp_statusnikah, temp_hp, temp_addrs1, temp_addrs2, temp_city, postaladdr1, temp_email, temp_pekerjaan, temp_gender, temp_tempatlahir, temp_noktp, temp_telprumah, temp_address1, postaladdr2, temp_address2, temp_cityaddrs, temp_ktpfoto, temp_pendapatan) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $_POST['telphone'] = $_POST['telphone'];
    $_POST['telprumah'] = $_POST['telprumah'];
    
    $stmt->bind_param("sssisssissssiissssss", $_POST['fullname'], $_POST['tanggallahir'], $_POST['marriage'], $_POST['telphone'], $_POST['addrline1'], $_POST['addrline2'], $_POST['cityline1'], $_POST['postaladdr'], $_POST['email'], $_POST['pekerjaan'], $_POST['gender'], $_POST['tempatlahir'], $_POST['noktp'], $_POST['telprumah'], $_POST['ktpaddrline1'], $_POST['postalktp'], $_POST['ktpaddrline2'], $_POST['cityline2'],$_FILES['ktpfoto']['name'], $_POST['pendapatan']);
    
    $stmt->execute();

    $stmt->store_result();

    $dbID = $stmt->insert_id;

    if($dbID == NULL){
        ?>
<script>
                        $.ajax({
                            type: 'POST',
                            url: "./formaplikasi/form3.php",
                            data: formData,
                            success: function(dataSum) {
                                   // data is ur summary
                                  $('.formloader').html(dataSum);
                                    $('html, body').animate({ scrollTop: 0 }, 'slow');
                             }
                        })
</script>
        <?php
    }else{ 
        $_SESSION['registid'] = $dbID;
    }
    
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    move_uploaded_file($_FILES['ktpfoto']['tmp_name'], '/var/www/html/assets/images/ktpuploads/' . $_POST['fullname'] ." - ". $_POST['noktp'].".jpeg");
    //print_r($_FILES);

    //print_r($_POST);

    //echo $dbID." ini latest ID "." ini alamat foto ".$_FILES['ktpfoto']['name'];

    /*echo "<br><br>"; print_r($_POST);
    echo "<br><br>"; print_r($_FILES);*/

    /*var_dump($stmt);
    error_reporting(-1);*/

    $stmt->close();

    //echo "'".$_POST['fullname']."', '".$_POST['tanggallahir']."', '".$_POST['marriage']."', '".$_POST['telphone']."', '".$_POST['addrline1']."', '".$_POST['addrline2']."', '".$_POST['cityline1']."', '".$_POST['postaladdr']."', '".$_POST['email']."', '".$_POST['pekerjaan']."', '".$_POST['gender']."', '".$_POST['tempatlahir']".', '".$_POST['noktp']".', '".$_POST['telprumah']".', '".$_POST['ktpaddrline1']."', '".$_POST['ktpaddrline2']."', '".$_POST['cityline2']."', '".$_POST['postalktp']."', '".$_POST['ktpfoto']."', '".$_POST['pendapatan']."'";

    //echo "INSERT INTO `temp_datatertanggung` (id_form, temp_nama, temp_tgllahir, temp_statusnikah, temp_hp, temp_addrs1, temp_addrs2, temp_city, postaladdr1, temp_email, temp_pekerjaan, temp_gender, temp_tempatlahir, temp_noktp, temp_telprumah, temp_address1, postaladdr2, temp_address2, temp_cityaddrs, temp_ktpfoto, temp_pendapatan) VALUES (NULL, '".$_POST['fullname']."', '".$_POST['tanggallahir']."', '".$_POST['marriage']."', '".$_POST['telphone']."', '".$_POST['addrline1']."', '".$_POST['addrline2']."', '".$_POST['cityline1']."', '".$_POST['postaladdr']."', '".$_POST['email']."', '".$_POST['pekerjaan']."', '".$_POST['gender']."', '".$_POST['tempatlahir']".', '".$_POST['noktp']".', '".$_POST['telprumah']".', '".$_POST['ktpaddrline1']."', '".$_POST['ktpaddrline2']."', '".$_POST['cityline2']."', '".$_POST['postalktp']."', '".$_POST['ktpfoto']."', '".$_POST['pendapatan']."')";
    
    $_SESSION['emailtertanggung'] = $_POST['email'];

    if(!isset($_SESSION['nama_tertanggung']) || $_SESSION['nama_tertanggung'] == NULL || $_SESSION['nama_tertanggung'] != $_POST['fullname']){
        $_SESSION['nama_tertanggung'] = $_POST['fullname'];
        
        $today = date("Y");

        $age = $today - $tahunlahir;
        
        $_SESSION['agetertanggung'] = $age;
    }
    
    if(isset($_SESSION['registid'])){
        $getuser = "DELETE FROM `temp_beneficiary` WHERE id_formbenef=".$_SESSION['registid'];
        $result = mysqli_query($conn,$getuser);
    }
?>
	<html>
	<body>
		<!--Content Start-->
    <form id="data-beneficiary" action="./formaplikasi/form5.php" method="post">
	  <div id="form4" class="container containerform animated fadeInRight" style="padding: 5% 0">
	    <div class="row">
	      <div class="col-md-12 col-12 align-self-center judul">
		    <div class="step" style="margin-bottom: 2%">
                <div class="row" style="padding: 0px !important; margin: 0px !important; display: -webkit-box;">
                    <div class="btn2 col-lg-2 col-md-12 col-12" onclick="back('frm3k','<?php echo $_SESSION['productid']; ?>')">&lt;</div>
                    <div class="col-lg-10 col-md-12 col-12 displayDesktop" src="../assets/images/form/steps/step-02.png" width="100%"><img src="../assets/images/form/steps/Hanwhalife-bucketlist-step-04.png" width="100%"></div>
                </div>
                <img src="../assets/images/form/steps/Hanwhalife-bucketlist-step-04.png" width="100%" class="displayMobile">
		        <h1 style="color: #ff7101; font-weight: bold;">DATA AHLI WARIS</h1>
		    </div>
		  </div>
	    </div>
          
        <?php /*if(isset($_SESSION['postform2']) && $_SESSION['postform2'] != NULL){*/ ?>
	    <div class="row">
	      <!-- Column -->
	      <div id = "colL" class="col-lg-6 col-md-12">
            <h3 style="color: #ff7101; font-weight: bold;">Ahli Waris <?php echo $ctrBenef; ?></h3>
	        Nama Lengkap
	        <input type="text" class="txedit" name="fullnamebenef1" required>
	        Email Ahli Waris
	        <input type="email" class="txedit" name="emailbenef1" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
	        Phone Number
	        <input type="tel" class="txedit" name="telbenef1" pattern="[0-9]*" required placeholder="i.e 08812345678" maxlength="12">
	        Jenis Kelamin
	        <select class="txedit" name="genderbenef1" required>
                <option disabled value="" value="" selected>Pilih Opsi</option>
			  <option value="M">Pria</option>
			  <option value="F">Wanita</option>
			</select>
	      </div>
	      <div id = "colR" class="col-lg-6 col-md-12">
	      	Hubungan dengan Tertanggung
	        <select class="txedit" name="hubunganbenef1" required>
                <option disabled value="" selected>Pilih Status</option>
			  <?php
                $dataFull = familyrelationshiplist();
                foreach($dataFull as $data){
                    $hubungan = $data['codeValue'];
                    echo mb_convert_case("<option value='".$data['codeId']."'>".$hubungan."</option>", MB_CASE_TITLE, "UTF-8");
                }
            ?>
			</select>
	        <p style="width: 100%">Tanggal Lahir</p>
	         <?php
                $yearMin = date("Y")-17;
                $yearMax = date("Y")-61;
              ?>
	        <input type="date" class="txedit" name="tanggalbenef1" required placeholder="dd-mm-yyyy" id="datepicker" onkeydown="return false">
			Persentase
	        <input type="`temp_datatertanggung`" class="txedit percentage" name="percentbenef1" id="percentbenef1" pattern="[0-9]*" required>
	      </div>
	    </div>
          <div class="extrabenef1">
		    	<div class="row">
                  <div class="col-md-12 col-12 align-self-center">
                    <div class="step" style="margin-bottom: 2%">
                        <p style="color: #ff7101; font-size: 18px; display: inline-block;" class="addextra" onclick="loadExtra(<?php echo $ctrBenef+1; ?>)">+ Tambah Ahli Waris</p>
                        <input type="hidden" value="1" name="ctrs" id="ctrsval">
                    </div>
                  </div>
                </div>
          </div>
          
        <?php /*}else{include '../formaplikasi/benefexists.php';}*/ ?>


	    <div class="row">
            <div class="warning col-lg-12 col-md-12 col-12" style="opacity: 0; transition: all 3s; margin-bottom: 50px;"></div>
	    	<input type="submit" value="CONTINUE" class="btn" disabled>
	    </div>
	  </div>
              </form>
	  <!--Content End-->
	</body>
        <script>
            $(document).ready(function() {
                //this calculates values automatically

                $(".percentage").on("keydown keyup", function() {
                    calculateSum();
                });
            });

               $(function() {
                    // Get the form.
                    var form = $('#data-beneficiary');

                    // Get the messages div.
                    var formMessages = $('#form-messages');

                    // TODO: The rest of the code will go here...
                    $(form).submit(function(event) {
                        // Stop the browser from submitting the form.
                        event.preventDefault();

                        // TODO
                        // Serialize the form data.
                        var formData = $(form).serialize();
                        $.ajax({
                            type: 'POST',
                            url: $(form).attr('action'),
                            data: formData,
                            success: function(dataSum) {
                                   // data is ur summary
                                  $('.formloader').html(dataSum);
                                    $('html, body').animate({ scrollTop: 0 }, 'slow');
                             }
                        })
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
           yearRange: 47
    });
        </script>
</html>
<?php } ?>