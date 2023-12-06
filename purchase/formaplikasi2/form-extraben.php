<?php $ctrBenef = $_GET['ctr']; 
    include '../jsonapp/json-hanwha-api.php'; writelog();
?>
<div class="row animated fadeIn">
	      <!-- Column -->
	      <div id = "colL" class="col-lg-6 col-md-12">
            <h3 style="color: #ff7101; font-weight: bold;">Ahli Waris <?php echo $ctrBenef; ?><div class="btn" style="width: 130px;margin-left: 10px;padding-right: 20px;"><i class="fas fa-times" onclick="deleteAddBenef()" style="margin-left: 10px;"><span style="font-family: 'Varela Round', sans-serif; margin-left: 5px;">remove</span></i></div></h3>
	        Nama Lengkap
	        <input type="text" class="txedit" name="fullnamebenef<?php echo $ctrBenef; ?>" required>
	        Email Ahli Waris
	        <input type="email" class="txedit" name="emailbenef<?php echo $ctrBenef; ?>" required>
	        Phone Number
	        <input type="tel" class="txedit" name="telbenef<?php echo $ctrBenef; ?>" pattern="[0-9]*" required>
	        Jenis Kelamin
	        <select class="txedit" name="genderbenef<?php echo $ctrBenef; ?>" required>
			  <option value="M">Pria</option>
			  <option value="F">Wanita</option>
			</select>
	      </div>
	      <div id = "colR" class="col-lg-6 col-md-12">
	      	Hubungan dengan Tertanggung
	        <select class="txedit" name="hubunganbenef<?php echo $ctrBenef; ?>" required>
			  <?php
                $dataFull = familyrelationshiplist();
                foreach($dataFull as $data){
                    $kerjaan = $data['codeValue'];
                    echo "<option value='".$data['codeId']."'>".$kerjaan."</option>";
                }
            ?>
			</select>
	        <p style="width: 100%">Tanggal Lahir</p>
	         <?php
                $yearMin = date("Y")-17;
                $yearMax = date("Y")-61;
              ?>
	        <input type="date" class="txedit" name="tanggalbenef<?php echo $ctrBenef; ?>" required placeholder="dd-mm-yyyy" onkeydown="return false">
			Presentase
	        <input type="text" class="txedit percentage" name="percentbenef<?php echo $ctrBenef; ?>" id="percentbenef<?php echo $ctrBenef;?>" pattern="[0-9]*" required>
            <input type="hidden" value="<?php echo $ctrBenef; ?>" name="ctrs" id="ctrsval">
	      </div>
	    </div>
<?php if($ctrBenef < 5){ ?>
        <div class="extrabenef<?php echo $ctrBenef; ?>">
          <div class="row">
                  <div class="col-md-12 col-12 align-self-center">
                    <div class="step" style="margin-bottom: 2%">
                        <p style="color: #ff7101; font-size: 18px; display: inline-block;" onclick="loadExtra(<?php echo $ctrBenef+1; ?>)">+ Tambah Ahli Waris</p>
                        <?php echo $_POST['fullname'] ?>
                        <input type="hidden" value="<?php echo $ctrBenef; ?>" name="ctrs">
                    </div>
                  </div>
                </div>
        </div>
<script>

            $(document).ready(function() {
                //this calculates values automatically

                $(".percentage").on("keydown keyup", function() {
                    calculateSum();
                });
            });
    
            

</script>
<?php } ?>