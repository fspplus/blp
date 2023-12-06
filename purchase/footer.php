<?php
	//require_once 'jsonapp/json-hanwha-api.php';

	if(!isset($_SESSION['email'])){
		echo "<script>
			jQuery(window).load(function() {
				if (! localStorage.getItem('runOnce')) {
					$('#myModal').fadeIn();
			        localStorage.setItem('runOnce', '1');
			    }

				$('.close').click(function(){
			        $('#myModal').fadeOut();
			    });

			    // When the user clicks anywhere outside of the modal, close it
			    $(window).click(function(){
			        $('#myModal').fadeOut();
			    });
			});

			localStorage.setItem('popState','hidden');
		</script>";
	}else if(isset($_SESSION['email'])){
		echo "<script>
			if(localStorage.getItem('popState') != 'shown'){
		        $('#myModal').fadeIn();
		        localStorage.setItem('popState','shown');
		    }

		    $('.close').click(function(){
		        $('#myModal').fadeOut();
		    });

		    // When the user clicks anywhere outside of the modal, close it
		    $(window).click(function(){
		        $('#myModal').fadeOut();
		    });
		</script>";
	}
?>

<!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer" style="width: 100%;">
                <style type="text/css">
                    .footer{background-color: #292b33; color: white; position: relative; padding: auto;};
                </style>

                <div class="row marginSection" style="margin-top: 3%">
                	<div class="col-lg-12 col-md-12 col-12 align-self-center" style="margin-bottom: 2%">
                        <a href="https://hanwhalife.co.id">
                		  <img src="../assets/images/Hanwhalife-bucketlist-hanwha-logo.old.png" style="width: 240px">
                        </a>
                	</div>
                </div>

                <div class="row marginSection footer2" style="margin-top: -5%">
                    <div class="col-lg-8 col-md-12 col-12 align-self-center">
                        <div class="footer2">
                            <!--<h6 style="color:white">Customer Care:</h6>-->
                            <h5 style="color: white;">
                                Email: <a href="mailto:bucketlistplan@hanwhalife.co.id">bucketlistplan@hanwhalife.co.id</a>
                            </h5>
                            <h3 style="color: white;">
								<a href="tel:+62811-1390-6463">+62 811-1390-6463</a>(toll Free)
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12 align-self-center" style="text-align: right;">
                        <div class="textwidget custom-html-widget"><div class="footer1">
                            <div class="socmedIcons">
                                <a href="#!" class="fa fa-facebook btnSoc d-none" style="padding: 20px 24px;"></a>
                                <a href="https://www.instagram.com/hanwhalife.id/" class="fa fa-instagram btnSoc" target="_blank"></a>
                                <a href="#!" class="fa fa-twitter btnSoc d-none"></a>
                                <a href="https://www.youtube.com/channel/UCOU3YDSf7C6w0YsVB9H7ZWQ" class="fa fa-youtube btnSoc" target="_blank"></a>
                            </div>
                        </div></div>
                    </div>
                </div>

                <div class="row marginSection" style="margin-top: -5%">
                	<div class="col-lg-12 col-md-12 col-12 align-self-center">
                		<hr width="100%" style="background-color: #ff7101; height: 2px">
                	</div>
                	<div class="col-lg-10 col-md-9 col-12 align-self-center">
                		<p style="font-size: 14px;">
                			PT Hanwha Life Insurance Indonesia telah terdaftar dan diawasi oleh Otoritas Jasa Keuangan.<br>
                			Hanwha Life &copy; All Rights Reserved. Privacy Policy.
                		</p>
                	</div>
                	<div class="col-lg-2 col-md-3 col-12 align-self-center">
                		<p id="ojk"><img src="../assets/images/Hanwhalife-bucketlist-logoojk.png" style="width: 120px"></p>
                	</div>
                </div>

            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->


<?php //include 'float-dorado.php'; ?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!--<script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <!--<script src="js/custom.min.js"></script>-->
    <script src="../js/custom.js?t=<?php echo rand(); ?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
    <!--<script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/plugins/d3/d3.min.js"></script>
    <script src="../assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <!--<script src="js/dashboard1.js"></script>-->
    <script>

    $('#lgt').click(function(){
        $("#page-loader").css("display", "block");
            setTimeout(function () {
                $.ajax({

                 type: "GET",
                 url: "../controller/logout-proc.php",
                 data: '', // appears as $_GET['id'] @ your backend side
                 success: function(dataSum) {
                     location.href = "../";
                }

               });
            },1000);
    })
    $('.slgt').click(function(){
        $("#page-loader").css("display", "block");
            setTimeout(function () {
                $.ajax({

                 type: "GET",
                 url: "../controller/logout-proc.php",
                 data: '', // appears as $_GET['id'] @ your backend side
                 success: function(dataSum) {
                     location.href = "../";
                }

               });
            },1000);
    })
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(function(){
         // Find any date inputs and override their functionality
         $('#datepicker').datepicker({
             dateFormat : 'yy-mm-dd',
              changeMonth: true,
              changeYear: true
         });
    });
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-92320268-7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-92320268-7');
</script>

<script>
	var yearend = new Date().getFullYear() - 17;
    var picker = new Pikaday({
        field: document.getElementById('Pikaday'),
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
           minDate: new Date("31/10/1959"),
           maxDate: new Date("31/10/2005"),
           yearRange: [1959, yearend]
    });
    var picker_ahliwaris1 = new Pikaday({
        field: document.getElementById('dateahliwaris1'),
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
    var picker_ahliwaris2 = new Pikaday({
        field: document.getElementById('dateahliwaris2'),
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
    var picker_ahliwaris3 = new Pikaday({
        field: document.getElementById('dateahliwaris3'),
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
    var picker_ahliwaris4 = new Pikaday({
        field: document.getElementById('dateahliwaris4'),
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
    var picker_ahliwaris5 = new Pikaday({
        field: document.getElementById('dateahliwaris5'),
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
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-92320268-20"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-92320268-20');
</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XGZPHBLRES"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-XGZPHBLRES');
</script>


<!-- <?php mysqli_close($conn); ?> -->