<?php  
    $_SESSION['status'] = "";
?>
<html>
	<body>
		<!--Content Start-->
	  <form id="form3" class="container" style="padding: 2% 0 !important;" method="post">
	    <div class="row">
	      <div class="col-md-12 col-12 align-self-center">
              <h3 style="color: #ff7101; font-weight: bold;">APAKAH ANDA AKAN MEMBELI UNTUK PRIBADI <br>ATAU UNTUK ORANG LAIN?</h3>
		  </div>
	    </div>

	    <div class="row" style="margin-top: 30px">
            <label class="col-lg-6 col-md-6 col-12 align-self-center">
                <input type="checkbox" name="benef[]" value="<?php echo $benefs[$count]['name']; ?>">
                <div class="premi" style="height: 200px">
                    <h1>Ya,</h1>
                    <h2>Saya melakukan pembelian untuk diri sendiri.</h2>
                </div>
            </label>
            <label class="col-lg-6 col-md-6 col-12 align-self-center">
                <input type="checkbox" name="benef[]" value="<?php echo $benefs[$count]['name']; ?>">
                <div class="premi" style="height: 200px">
                    <h1>Tidak,</h1>
                    <h2>Saya melakukan pembelian untuk orang lain.</h2>
                </div>
            </label>
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
                    var form = $('#form3');

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
                                url: './formaplikasi/form3-entry.php',
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