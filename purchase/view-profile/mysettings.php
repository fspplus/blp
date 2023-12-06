<div id="settings" class="profilecards">                             
    <form class="form-horizontal form-material">
                                    <h3 class="col-md-12">Pengaturan</h3>
                                    <div class="col-md-6 col-lg-6 verTOPnew rowpaddingless">
                                    <div class="form-group">
                                        <label class="col-md-12">Password Baru</label>
                                        <div class="col-md-12">
                                            <i class="fa fa-eye-slash" id="viewpass1" onclick="pwdFocus2()" style="color: black;position: absolute;top: 10px;right: 25px;"></i>
                                            <input type="password" class="form-control form-control-line" name="newpass" id="newpass1">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 verTOPnew rowpaddingless">     
                                    <div class="form-group">
                                        <label class="col-md-12">Konfirmasi Password</label>
                                        <div class="col-md-12">
                                            <i class="fa fa-eye-slash" id="viewpass2" onclick="pwdFocus3()" style="color: black;position: absolute;top: 10px;right: 25px;"></i>
                                            <input type="password" class="form-control form-control-line" name="confnewpass" id="newpass2">
                                        </div>
                                    </div> 
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Perbarui Password</button>
                                        </div>
                                    </div>
                                </form>
    </div>   
<script type="text/javascript">

        function pwdFocus2() {
            if($('#newpass1').prop("type") == "password"){
                $('#newpass1').attr("type", "text");
                $("#viewpass1").removeClass("fa-eye-slash");
                $("#viewpass1").addClass("fa-eye");
            }else{
                $('#newpass1').attr("type", "password");
                $("#viewpass1").removeClass("fa-eye");
                $("#viewpass1").addClass("fa-eye-slash");
            }
        }
        function pwdFocus3() {
            if($('#newpass2').prop("type") == "password"){
                $('#newpass2').attr("type", "text");
                $("#viewpass2").removeClass("fa-eye-slash");
                $("#viewpass2").addClass("fa-eye");
            }else{
                $('#newpass2').attr("type", "password");
                $("#viewpass2").removeClass("fa-eye");
                $("#viewpass2").addClass("fa-eye-slash");
            }
        }

    </script>