<?php  
    $_SESSION['status'] = "";
?>
<html>
	<body>
		<!--Content Start-->
	  <form id="form4" class="container" style="padding: 5% 0" method="post">
	    <div class="row">
	      <div class="col-md-12 col-12 align-self-center">
            <div class="row" style="padding: 0px !important; margin: 0px !important; display: -webkit-box;">
                    <div class="btn2 col-lg-2 col-md-2 col-2" onclick="back('frm3k','<?php echo $_SESSION['productid']; ?>')">&lt;</div>
                    <img class="col-lg-10 col-md-10 col-10" src="../assets/images/form/steps/step-04.png" width="100%">
                </div>
              <h3 style="color: #ff7101; font-weight: bold;">PILIH AHLI WARIS YANG SUDAH DIMASUKAN SEBELUMNYA.<br>ATAU TEKAN CONTINUE UNTUK MENAMBAHKAN.</h3>
		  </div>
	    </div>

	    <div class="row" style="margin-top: 30px">
            <?php
                $benefs = getbeneficiary($_SESSION['memberid']);
                if($benefs == NULL){
                    echo "Tidak ada data Ahli Waris";
                }else{
                    $counter = count($benefs);
                    $count = 0;
                    while($count < $counter){
                        ?>
                            <?php  ?>
                            <label class="col-lg-4 col-md-4 col-12 align-self-center">
                                <input type="checkbox" name="benef[]" value="<?php echo $benefs[$count]['name']; ?>">
                                <div class="premi" style="height: 200px">
                                    <h1><?php echo $benefs[$count]['name']; ?></h1>
                                    <h2><?php getRelationshipName($benefs[$count]['famrel']); ?></h2>
                                </div>
                            </label>
                <?php
                    $count += 1;
                    }
                }
                
            ?>
        </div>
          <!--<div class="extrabenef1" id="extrabenefDefault">
		    	<div class="row">
                  <div class="col-md-12 col-12 align-self-center">
                    <div class="step" style="margin-bottom: 2%">
                        <p style="color: #ff7101; font-size: 18px" class="addextra" onclick="loadExtra(1)">+ Tambah Ahli Waris</p>
                        <input type="hidden" value="1" name="ctrs" id="ctrsval">
                    </div>
                  </div>
                </div>
          </div>-->
<script>
$("input:checkbox").on("change", function() {
	counterbenef();
})          
</script>
        <div class="row">
            <div class="warning col-lg-12 col-md-12 col-12" style="opacity: 0; transition: all 3s; margin-bottom: 50px;"></div>
	    	<input type="submit" value="CONTINUE" class="btn">
	    </div>
	    <!--<div class="col-lg-12 col-md-12 col-12" style="text-align: center; margin-top: 50px">
	    	<input type="submit" class="btn" id="gotoForm5" value="SUBMIT">
	    </div>-->
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
                    var form = $('#form4');

                    // Get the messages div.
                    var formMessages = $('#form-messages');

                    // TODO: The rest of the code will go here...
                    $(form).submit(function(event) {
                        var isFormValid = true;

                        $("input").each(function(){
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
                            
                            var formData = $(form).serializeArray();
                            var formArrayData = new FormData();
                            $(formData).each(function(index,element){
                                formArrayData.append(element.name, element.value);
                            })
                            
                            $.ajax({
                                type: 'POST',
                                url: './formaplikasi/form4-login.php',
                                data: formArrayData,
                                processData:false,
                                contentType:false,
                                success: function(dataSum) {
                                       // data is ur summary
                                      $('.formloader').html(dataSum);
                                      $('html, body').animate({ scrollTop: 0 }, 'slow');
                                 }
                            })
                        }
                        // Stop the browser from submitting the form.
                        event.preventDefault();
                        
                    });
                    
                });
        </script>
</html>