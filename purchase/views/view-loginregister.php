<li class="listMenuLists sub" style="width: 350px; margin-left: -200px; padding: 8px 35px;">
    <div class="row noPads displayDesktop" style="margin: 10px 0px; padding: 0px !important;">
        <div></div>
        <form class="loginheader" action="../otp" method="POST" id="formlogins">
            <h4 style="color:#ff7101; text-align:left;">LOGIN METHODS</h4>

            <div class="col-md-12 col-12 align-self-center">
                <?php if(false){ ?>
                <div class="floating-label">
                    <input type="email" name="hanwhaemail" placeholder="Email" required="">
                    <label for="hanwhaemail">Email</label>
                </div>
                <div class="floating-label">
                    <i class="fa fa-eye-slash" id="viewpass" onclick="pwdFocus()" style="color: white;position: absolute;top: 20px;right: 15px;"></i>
                    <input type="password" id="kvkpwd" name="hanwhapassword" placeholder="Password" required="">
                    <label for="hanwhapassword">Password</label>
                    <div class="scriptloader"></div>
                    <script type="text/javascript">
                        function pwdFocus() {
                            if ($('#kvkpwd').prop("type") == "password") {
                                $('#kvkpwd').attr("type", "text");
                                $("#viewpass").removeClass("fa-eye-slash");
                                $("#viewpass").addClass("fa-eye");
                            } else {
                                $('#kvkpwd').attr("type", "password");
                                $("#viewpass").removeClass("fa-eye");
                                $("#viewpass").addClass("fa-eye-slash");
                            }
                        }
                    </script>
                </div>
                <div class="row">
                    <a href="#" class="loginBtnOptions">Masuk Menggunakan No.Telp</a>
                    <a href="#" class="loginBtnOptions">Masuk Menggunakan Email</a>
                </div>
                <?php } ?>
                <div class="floating-label">
                    <input type="text" name="hanwhamailpass" placeholder="Email / Nomor Whatsapp" required="">
                    <label for="hanwhamailpass">Email / Nomor Whatsapp</label>
                </div>
                <div class="row" style="padding: 10px 0px;"><a href="forgot-password">Lupa Akun Anda?</a></div>
                <input type="submit" value="LOGIN" class="col-md-5 col-5 floatLeft">
                <div class="col-md-7 col-7 floatLeft alignLeft" style="padding-left: 10px !important;"><span style="color: white;">Belum punya akun?</span>
                    <br><a href="/signup" style="color: #ff7101;">Register disini</a></div>
            </div>
            <?php if(false){ ?>
                <div class="col-md-12 col-12 align-self-center" style="background-color: ">
                    <h5 style="color: white;">Login menggunakan</h5>
                    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="light"></div>
                    <script>
                        function onSignIn(googleUser) {
                            // Useful data for your client-side scripts:
                            var profile = googleUser.getBasicProfile();
                            console.log("ID: " + profile.getId()); // Don't send this directly to your server!
                            console.log('Full Name: ' + profile.getName());
                            console.log('Given Name: ' + profile.getGivenName());
                            console.log('Family Name: ' + profile.getFamilyName());
                            console.log("Image URL: " + profile.getImageUrl());
                            console.log("Email: " + profile.getEmail());

                            // The ID token you need to pass to your backend:
                            var id_token = googleUser.getAuthResponse().id_token;
                            console.log("ID Token: " + id_token);
                        }
                    </script>
                </div>
                <?php } ?>
        </form>
    </div>
</li>
<?php if(false){ ?>
    <li class="listMenuLists sub">
        <a href="signup">Register</a>
        <a href="login">Login</a>
    </li>
    <?php } ?>