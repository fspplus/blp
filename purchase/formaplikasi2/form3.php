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
                    <div class="row" style="padding: 0px !important; margin: 0px !important; display: -webkit-box;">
                        <div class="btn2 col-lg-2 col-md-12 col-12" onclick="back('frm1a','<?php echo $_SESSION['productid']; ?>')">&lt;</div>
                        <div class="col-lg-10 col-md-12 col-12 displayDesktop" src="../assets/images/form/steps/step-03.png" width="100%"><img src="../assets/images/form/steps/step-03.png" width="100%"></div>
                    </div>
		        	<h1 style="color: #ff7101; font-weight: bold;">APAKAH ANDA AKAN MEMBELI UNTUK PRIBADI <br>ATAU UNTUK ORANG LAIN?</h1>
		    	</div>
		  	</div>
	      </div>

	      <div class="row" style="margin-top: 30px">
	        <!-- Column -->
	        <div id = "colL" class="col-lg-6 col-md-12 noPads animated fadeInLeft">
	          <a href="#!" onclick="purch_type('<?php echo $_GET['setplan'] ?>','<?php echo $_GET['pl']; ?>', 'old')"><img src="../assets/images/hanwhauserasset/hanwha-yes.jpg" style="width: 100%; border-radius: 20px"></a>
	        </div>
	        <div id = "colR" class="col-lg-6 col-md-12 animated fadeInRight">
	          <a href="#!" onclick="purch_type('<?php echo $_GET['setplan'] ?>','<?php echo $_GET['pl']; ?>', 'new')"><img src="../assets/images/hanwhauserasset/hanwha-no.jpg" style="width: 100%; border-radius: 20px"></a>
	        </div>
	      </div>
	    </div>
	  </div>
	  <!--Content End-->
	</body>
</html>