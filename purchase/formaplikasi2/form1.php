<!DOCTYPE html>
<?php 
 if(isset($_SESSION['memberid'])){
     $_SESSION['registid'] = $_SESSION['memberid'];
 }
?>
	<html>
		
	<body>
		<!--Content Start-->
	  <div id="form1" class="container containerform animated" style="padding: 5% 0">
	    <div class="col-md-12 col-12 align-self-center">
	      <div class="row">
	      	<div class="col-md-12 col-12 align-self-center judul">
		    	<div class="step" style="margin-bottom: 2%">
                    <img src="../assets/images/form/steps/step-01.png" width="100%">
		        	<h1 style="color: #ff7101; font-weight: bold;">PILIH PAKET YANG SESUAI DENGANMU</h1>
		    	</div>
		  	</div>
	      </div>

	      <div class="row" style="margin-top: 30px">
	        <!-- Column -->
	        <div id = "colL" class="col-lg-6 col-md-12 noPads animated fadeInLeft">
	          <a href="#!" onclick="planfnc('pla')"><img src="../assets/images/hanwhauserasset/plan-A.jpg" style="width: 100%; border-radius: 20px"></a>
	        </div>
	        <div id = "colR" class="col-lg-6 col-md-12 animated fadeInRight">
	          <a href="#!" onclick="planfnc('plb')"><img src="../assets/images/hanwhauserasset/plan-B.jpg" style="width: 100%; border-radius: 20px"></a>
	        </div>
	      </div>
	    </div>
	  </div>
	  <!--Content End-->
	</body>
</html>