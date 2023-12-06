<h2 class="col-lg-12 col-md-12 col-12">Ahli Waris Terdaftar</h2>
<?php
    $benefs = getbeneficiary($_SESSION['memberid']);
    $counter = count($benefs);
    $count = 0;
?><?php
    while($count < $counter){
        ?>
            <?php  ?>
        	<label class="col-lg-4 col-md-4 col-12 align-self-center">
                <input type="checkbox" name="benef[]">
        		<div class="premi" style="height: 200px">
        			<h4><?php getRelationshipName($benefs[$count]['famrel']); ?></h4>
        			<h1><?php echo $benefs[$count]['name'] ?></h1>
        		</div>
        	</label>
<?php
    $count += 1;
    }
?>
<div class="formloader"></div>
<h2 class="col-lg-12 col-md-12 col-12">Tambahkan Ahli Waris</h2>
<div class="row animated fadeIn" style="padding: 0px;">
	      <!-- Column -->
    <form method="post" id="addbeneficiary" class="rowpaddingless row">
	      <div id = "colL" class="col-lg-6 col-md-12">
	        Nama Lengkap
	        <input type="text" class="txedit" name="fullnamebenef" required>
	        Email Ahli Waris
	        <input type="email" class="txedit" name="emailbenef" required>
	        Phone Number
	        <input type="tel" class="txedit" name="telbenef" required>
	      </div>
	      <div id = "colR" class="col-lg-6 col-md-12">
	        Jenis Kelamin
	        <select class="txedit" name="genderbenef" required>
			  <option value="M">Pria</option>
			  <option value="F">Wanita</option>
			</select>
	      	Hubungan dengan Tertanggung
	        <select class="txedit" name="hubunganbenef" required>
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
            <?php 
                if(strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile') || strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'android')) {
                   ?>
	               <input type="date" class="txedit" name="tanggalbenef"  required onkeydown="return false" placeholder="dd/mm/yyyy">
                    <?php
                }else{
                    ?><input id="datepicker" type="text" class="txedit" name="tanggalbenef" required onkeydown="return false" placeholder="dd/mm/yyyy"><?php
                }  
            ?>
            <input type="submit" class="btn" value="+ Tambahkan">
	      </div>
        </form>
</div>
<script>
               $(function() {
                    // Get the form.
                    var form = $('#addbeneficiary');

                    // Get the messages div.
                    var formMessages = $('#form-messages');

                    // TODO: The rest of the code will go here...
                    $(form).submit(function(event) {
                            // TODO
                            // Serialize the form data.
                            $("#page-loader").css("display", "block");
                            
                            var formData = $(form).serializeArray();
                            var formArrayData = new FormData();
                            
                            $(formData).each(function(index,element){
                                formArrayData.append(element.name, element.value);
                            })
                            
                            $.ajax({
                                type: 'POST',
                                url: "./controller/addnewbenef.php",
                                data: formArrayData,
                                processData:false,
                                contentType:false,
                                success: function(dataSum) {
                                       // data is ur summary
                                      $('.formloader').html(dataSum);
                                 }
                            })
                        // Stop the browser from submitting the form.
                        event.preventDefault();
                        
                    });
                    
                });
        </script>