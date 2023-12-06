<!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                <style type="text/css">
                    .footer{background-color: black; color: white; position: relative; padding: auto;};
                </style>

                <div class="row marginSection" style="margin-top: 3%">
                	<div class="col-lg-12 col-md-12 col-12 align-self-center" style="margin-bottom: 2%">
                		<img src="../assets/images/hanwha-logo.old.png" style="width: 240px">
                	</div>
                </div>
            
                <div class="row marginSection footer2" style="margin-top: -5%">
                    <div class="col-lg-6 col-md-12 col-12 align-self-center">
                        <p style="font-size: 14px;">
                            Hanwha Life Insurance Indonesia secara resmi diluncurkan tanggal 24 Oktober 2013 untuk mencapai perkembangan yang berkelanjutan melalui kompetisi inovatif dalam bisnis asuransi di Indonesia. Persetujuan resmi dari Otoritas Jasa Keuangan untuk lisensi bisnis atas nama PT Hanwha Life Insurance Indonesia diperoleh tanggal 23 Juli 2013. 

                            <br><br><a href="http://www.hanwhalife.co.id" style="color: #ff7101">LEBIH LANJUT</a>
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <p style="font-size: 14px">
                            <table id="tabcontact">
                                <tr>
                                    <td class="tabicon"><i class="fas fa-map-marker-alt"></i></td>
                                    <td>
                                        World Trade Centre Building 1, 12th Floor.<br>
                                        Jl. Jendral Sudirman Kav. 29, <br>Jakarta 12920
                                    </td>
                                </tr>
                                <tr><td><br></td></tr>
                                <tr>
                                    <td class="tabicon"><i class="fas fa-globe-asia"></i></td>
                                    <td><a href="http://www.hanwhalife.co.id">www.hanwhalife.co.id</a></td>
                                </tr>
                            </table>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <p style="font-size: 16px">
                            <table id="tabcontact">
                            	<tr>
                                    <td class="tabicon"><i class="fas fa-phone"></i></td>
                                    <td>021-80862000</td>
                                </tr>
                                <tr>
                                    <td class="tabicon"></td>
                                    <td>0800-111-8877 (toll-free)</td>
                                </tr>
                                <tr><td><br></td></tr>
                                <tr>
                                    <td class="tabicon"><i class="fas fa-envelope"></i></td>
                                    <td><a href="mailto:care@hanwhalife.co.id">care@hanwhalife.co.id</a></td>
                                </tr>
                            </table>
                        </p>
                    </div>
                </div>

                <div class="row marginSection" style="margin-top: -5%">
                	<div class="col-lg-12 col-md-12 col-12 align-self-center">
                		<hr width="100%" style="background-color: #ff7101; height: 2px">
                	</div>
                	<div class="col-lg-10 col-md-9 col-12 align-self-center">
                		<p style="font-size: 14px;">
                			PT Hanwha Life Insurance Indonesia telah terdaftar dan diawasi oleh Otoritas Jasa Keuangan.<br>
                			Hanwha Life &copy; All Rights Reserved. <a href="/privacy-policy" style="color: #ff7101;">Privacy Policy</a>.
                		</p>
                	</div>
                	<div class="col-lg-2 col-md-3 col-12 align-self-center">
                		<p id="ojk"><img src="../assets/images/logoojk.png" style="width: 120px"></p>
                	</div>
                </div>

            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
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
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <!--<script src="js/custom.min.js"></script>-->
    <script src="js/custom.js?t=<?php echo rand(); ?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
    <!--<script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>-->
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
                 url: "./controller/logout-proc.php",
                 data: '', // appears as $_GET['id'] @ your backend side
                 success: function(dataSum) {
                     location.href = "./";
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

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XGZPHBLRES"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-XGZPHBLRES');
</script>

<?php mysqli_close($conn); ?>