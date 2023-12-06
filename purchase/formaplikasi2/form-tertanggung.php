<html>
	<body>
		<!--Content Start-->
	  <div id="form-tertanggung" class="container">
          <?php 
            $dataUser = getmember($_SESSION['email']); 
            $_SESSION['nama_tertanggung'] = $dataUser['fullName']; 
            $dater = strtotime($dataUser['birthDate']);
            $newformat = date('Y-m-d',$dater);
          
            $today = date("Y");
            
            $tahunlahir = substr($newformat, 0, 4);
            $age = $today - $tahunlahir;

            $_SESSION['agetertanggung'] = $age;
            $_SESSION['emailtertanggung'] = $dataUser['emailAddress'];
          
          ?>
	    <div class="row">
	    	<div class="col-lg-12 col-md-12 col-12">
	    		<h3 style="color: #626262">Data Tersimpan</h3>
	    	</div>

	    	<div class="col-lg-4 col-md-6 col-12">
	    		<p class="ttgkiri">Nama Lengkap</p>
	    	</div>
	    	<div class="col-lg-8 col-md-6 col-12">
	    		<p class="ttgkanan"><?php echo $dataUser['fullName']; ?></p>
	    	</div>
	    	<div class="col-lg-4 col-md-6 col-12">
	    		<p class="ttgkiri">Tempat Lahir</p>
	    	</div>
	    	<div class="col-lg-8 col-md-6 col-12">
	    		<p class="ttgkanan"><?php echo $dataUser['birthPlace']; ?></p>
	    	</div>
	    	<div class="col-lg-4 col-md-6 col-12">
	    		<p class="ttgkiri">Tanggal Lahir</p>
	    	</div>
	    	<div class="col-lg-8 col-md-6 col-12">
	    		<p class="ttgkanan"><?php 
                $time = strtotime($dataUser['birthDate']);
                $newformat = date('M d, Y',$time);
                echo $newformat;
                    ?></p>
	    	</div>
	    	<div class="col-lg-4 col-md-6 col-12">
	    		<p class="ttgkiri">Jenis Kelamin</p>
	    	</div>
	    	<div class="col-lg-8 col-md-6 col-12">
	    		<p class="ttgkanan"><?php echo $dataUser['gender']; ?></p>
	    	</div>
	    	<div class="col-lg-4 col-md-6 col-12">
	    		<p class="ttgkiri">Email</p>
	    	</div>
	    	<div class="col-lg-8 col-md-6 col-12">
	    		<p class="ttgkanan"><?php echo $dataUser['emailAddress']; ?></p>
	    	</div>
	    	<div class="col-lg-4 col-md-6 col-12">
	    		<p class="ttgkiri">Mobile Phone</p>
	    	</div>
	    	<div class="col-lg-8 col-md-6 col-12">
	    		<p class="ttgkanan"><?php echo $dataUser['mobilePhone']; ?></p>
	    	</div>
	    	<div class="col-lg-4 col-md-6 col-12">
	    		<p class="ttgkiri">Alamat Rumah</p>
	    	</div>
	    	<div class="col-lg-8 col-md-6 col-12">
	    		<p class="ttgkanan"><?php echo $dataUser['lineAddress1']."<br>".$dataUser['lineAddress2']."<br>".$dataUser['cityAddress']."<br>".$dataUser['postalCode']; ?></p>
	    	</div>
	    	<div class="col-lg-4 col-md-6 col-12">
	    		<p class="ttgkiri">Alamat KTP</p>
	    	</div>
	    	<div class="col-lg-8 col-md-6 col-12">
	    		<p class="ttgkanan"><?php echo $dataUser['mailingLineAddress1']."<br>".$dataUser['mailingLineAddress2']."<br>".$dataUser['mailingCityAddress']."<br>".$dataUser['mailingpostalCode']; ?></p>
	    	</div>
	    	<div class="col-lg-4 col-md-6 col-12">
	    		<p class="ttgkiri">No. Telp Rumah</p>
	    	</div>
	    	<div class="col-lg-8 col-md-6 col-12">
	    		<p class="ttgkanan"><?php echo $dataUser['homePhone']; ?></p>
	    	</div>
	    </div>

	    <div class="col-lg-12 col-md-12 col-12" style="text-align: center; margin-top: 50px">
	    	<div class="btn" id="contf4">CONTINUE</div>	
	    </div>
	  </div>
	  <!--Content End-->
	</body>
    <script>
               $(function() {
                    // Get the form.
                    var form = $('#contf4');

                    // Get the messages div.
                    var formMessages = $('#form-messages');

                    // TODO: The rest of the code will go here...
                    $(form).click(function(event) {
                            // TODO
                            // Serialize the form data.
                            $("#page-loader").css("display", "block");
                            
                            $.ajax({
                                type: 'POST',
                                url: './formaplikasi/form4.php',
                                data: '',
                                processData:false,
                                contentType:false,
                                success: function(dataSum) {
                                       // data is ur summary
                                      $('.formloader').html(dataSum);
                                      $('html, body').animate({ scrollTop: 0 }, 'slow');
                                 }
                            })
                        })
                        // Stop the browser from submitting the form.
                        event.preventDefault();
                        
               });
        </script>
</html>
<?php
        
?>