<div class="row" style="margin-bottom: 20px;">
            <?php include 'view-selected.php'; ?>
            <div class="col-12 col-md-8 formCol">
                <div class="row rowpaddingless" style="padding-bottom: 50px !important;">
                    <div class="col-12">
                        <h3>Belum punya akun?</h3>
                        <a href="?view=data-input" class="btnBuy">Lanjutkan dan buat akun baru.* &gt;&gt;</a>
                    </div>
                    <div class="col-12" style="margin-top: 20px;">
                    <small>* Akun akan otomatis dibuat setelah transaksi diselesaikan.</small>
                    </div>
                </div>
                <div class="row rowpaddingless">
                    <h3 class="col-12">Sudah punya akun?</h3>
                    <form class="col-12" action="proc/loginpro.php" method="POST" id="formloginpurch" class="formCol">

                       <div class="col-md-12 col-12 align-self-center formCol rowpaddingless row">
                            <div class="floating-label border-b-orange col-10">
                                <input type="text" class="form-controller" name="hanwhaemail" placeholder="No. Whatsapp / Email" required>
                                <label for="hanwhaemail" style="color: ligthgray;">No. Whatsapp / Email</label>
                            </div>
                            <div class="col-2 rowpaddingless">
                                <button class="btnBuy" id="requestOTP" style="width: 100%;">Request OTP</button>
                            </div>
                            <div class="col-12 rowpaddingless">
                                <div class="otpnotif"></div>
                            </div>
                            <div class="floating-label border-b-orange">
                                <!-- <input type="password" class="form-controller" name="hanwhapassword" placeholder="Password" required>
                                <label for="hanwhapassword" style="color: ligthgray;">Password</label> -->
                                <input type="text" class="form-controller" name="hanwhaotp" placeholder="Masukan OTP yang anda terima" required>
                            </div>
                            <input type="submit" value="LOGIN">
                        </div>
                    </form>
                </div>
                
            </div>
        </div>

        <script>
            $(function() {
                // Get the form.
                // var form = $('#formlogin');

                // // Get the messages div.
                // var formMessages = $('#form-messages');

                // TODO: The rest of the code will go here...
                $("#requestOTP").on("click", function(){
                    
                    var form = $('#formloginpurch');
                    // console.log(form.serialize());
                    event.preventDefault();
                    // TODO
                    // Serialize the form data.
                    $("#page-loader").css("display", "block");
                    // var formData = $(form).serialize();
                    $.ajax({
                        type: 'POST',
                        method: 'POST',
                        url: "./controller/otplogin-proc.php",
                        data: form.serialize(),
                        success: function(dataSum) {
                                // data is ur summary
                                console.log(dataSum);
                            $('.otpnotif').html(dataSum);
                                $("#page-loader").css("display", "none");
                        }
                    })
                })
                                            
            });
        </script>