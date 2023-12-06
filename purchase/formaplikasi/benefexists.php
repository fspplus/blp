<?php 
$counter = 0;
while($counter < $_SESSION['postform2']['ctrs']){ ?>
	    <div class="row">
	      <!-- Column -->
	      <div id = "colL" class="col-lg-6 col-md-12">
            <h3 style="color: #ff7101; font-weight: bold;">Ahli Waris <?php echo $ctrBenef; ?></h3>
	        Nama Lengkap
	        <input type="text" class="txedit" name="fullnamebenef<?php echo $counter ?>" required value="<?php echo $_SESSION['postform2']['fullnamebenef'.$counter]; ?>">
	        Email Ahli Waris
	        <input type="email" class="txedit" name="emailbenef<?php echo $counter ?>" required value="<?php echo $_SESSION['postform2']['emailbenef'.$counter]; ?>">
	        Phone Number
	        <input type="tel" class="txedit" name="telbenef<?php echo $counter ?>" pattern="[0-9]*" required value="<?php echo $_SESSION['postform2']['telbenef'.$counter]; ?>">
	        Jenis Kelamin
	        <select class="txedit" name="genderbenef<?php echo $counter ?>" required>
                <option disabled value="" value="" selected>Pilih Opsi</option>
			  <option value="M">Pria</option>
			  <option value="F">Wanita</option>
			</select>
	      </div>
	      <div id = "colR" class="col-lg-6 col-md-12">
	      	Hubungan dengan Tertanggung
	        <select class="txedit" name="hubunganbenef<?php echo $counter ?>" required>
                <option disabled value="" selected>Pilih Status</option>
			  <?php
                $dataFull = familyrelationshiplist();
                foreach($dataFull as $data){
                    $hubungan = $data['codeValue'];
                    echo "<option value='".$data['codeId']."'>".$hubungan."</option>";
                }
            ?>
			</select>
	        <p style="width: 100%">Tanggal Lahir</p>
	         <?php
                $yearMin = date("Y")-17;
                $yearMax = date("Y")-61;
              ?>
	        <input type="date" class="txedit" name="tanggalbenef<?php echo $counter; ?>" required placeholder="dd-mm-yyyy">
			Persentase
	        <input type="`temp_datatertanggung`" class="txedit percentage" name="percentbenef<?php echo $counter ?>" id="percentbenef<?php echo $counter; ?>" pattern="[0-9]*" required  value="<?php echo $_SESSION['postform2']['percentbenef'.$counter]; ?>">
	      </div>
	    </div>
          <div class="extrabenef<?php echo $counter; ?>">
		    	<div class="row">
                  <div class="col-md-12 col-12 align-self-center">
                    <div class="step" style="margin-bottom: 2%">
                        <?php if($counter < 5){
                            ?><p style="color: #ff7101; font-size: 18px; display: inline-block;" class="addextra" onclick="loadExtra(<?php echo $counter+1; ?>)">+ Tambah Ahli Waris</p><?php
                        } ?>
                        
                        <input type="hidden" value="<?php echo $counter; ?>" name="ctrs" id="ctrsval">
                    </div>
                  </div>
                </div>
          </div>
          
        <?php $counter += 1;} ?>