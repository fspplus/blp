<?php
$urlmeta = "Profile";
include 'header.php';
require_once 'jsonapp/json-hanwha-api.php';
if(!isset($_SESSION['email'])){
        echo "<script>alert('NOT ALLOWED'); window.location.href= '/';</script>";
}else if(isset($_SESSION['email'])){
    $dataUser = getmember($_SESSION['email']);
    $products = getproducts($_SESSION['memberid']);
    $countproducts = count($products);
}
?>
<html>
<head></head>

<body>
  <div class="col-md-12 col-12 align-self-center headerpage" style="/*background: url('../assets/images/background/profile-page.jpg');*/background: none;height: 100px;background-size:cover; padding: 0 -10%">
  </div>

  <div class="page-titles homehtml" style="padding: 0 10%">
    <div class="col-lg-12 col-md-12 col-12 align-self-center" style="padding: 3% 0">
      <h1 style="text-align: center; color: #ff7101"><strong>PROFILE</strong></h1>
    </div>

    <div class="row" style="background-color: #e4e4e4; padding: 20px;">
      <div class="col-lg-3 col-md-4 col-12 align-self-center">
        <img src="../assets/images/users/tesfoto.jpg" width="200px" style="margin-bottom: 20px !important; display: none;">
          <?php 
            if(isset($_SESSION['email'])){
              		$firstname = explode(' ',trim($_SESSION['fullname']));
              		$background_colors = array('#C62828', '#EF6C00', '#2E7D32', '#0277BD', '#6A1B9A');
					$rand_background = $background_colors[array_rand($background_colors)];
            }
          ?>
		  <!-- <img src="../assets/images/users/tesfoto.jpg" style="margin-left: 15px"> -->
		  <div style="background-color: <?php echo $rand_background; ?>" class="profShow"><?php echo substr($firstname[0], 0, 1) ?></div>
      </div>
      <div class="col-lg-9 col-md-8 col-12 align-self-center">
        <p style="" class="profileInfo">NAMA : <br class="displayMobile"><?php echo $dataUser['fullName']; ?></p>
        <p style="" class="profileInfo">KTP (ID Card) : <br class="displayMobile"><?php echo $dataUser['identityNumber']; ?></p>
        <?php
            $urlkpt = "./assets/images/ktpuploads/".$dataUser['emailAddress']." - ".$dataUser['identityNumber'].'.jpeg';
            //echo $urlkpt;
            if (file_exists($urlkpt)) {
                ?>
                    <p style="" class="profileInfo"><img src="../assets/images/ktpuploads/<?php echo $dataUser['emailAddress']." - ".$dataUser['identityNumber'].".jpeg?v=".rand(); ?>" width="150px"></p>
                    <form action="/controller/ktp-upload.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="vldnm" value="<?php echo $dataUser['emailAddress']; ?>">
                        <input type="hidden" name="vlddi" value="<?php echo $dataUser['identityNumber']; ?>">
                        <p style="" class="">Ganti KTP Anda: <label class="uploadKTP"><span>Upload KTP</span><input type="file" id="ktpfile" name="ktpfile" style="display: none;" required></label></p>
                        <p style="" class="profileInfo"><img src="" id="imgktp" width="250px" style="display: none;"></p>
                        <p style="" class="profileInfo"><input type="submit" id="formsubmit" value="UPDATE" style="display: none;"></p>
                        
                        <script>
                            document.getElementById("ktpfile").onchange = function () {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    // get loaded data and render thumbnail.
                                    document.getElementById("imgktp").src = e.target.result;
                                    document.getElementById("imgktp").style.display ="block";
                                    document.getElementById("formsubmit").style.display ="block";
                                };

                                // read the image file as a data URL.
                                reader.readAsDataURL(this.files[0]);
                            };
                        </script>
                        
                    </form>
                <?php
            } else {
                ?>
                    <form action="/controller/ktp-upload.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="vldnm" value="<?php echo $dataUser['emailAddress']; ?>">
                        <input type="hidden" name="vlddi" value="<?php echo $dataUser['identityNumber']; ?>">
                        <p style="" class="">Data KTP anda tidak valid. Silahkan upload kembali KTP anda untuk mengaktifkan kembali akun anda melalui link berikut: <label class="uploadKTP"><span>Upload KTP</span><input type="file" id="ktpfile" name="ktpfile" style="display: none;" required></label></p>
                        <p style="" class="profileInfo"><img src="" id="imgktp" width="250px" style="display: none;"></p>
                        <p style="" class="profileInfo"><input type="submit" id="formsubmit" value="UPDATE" style="display: none;"></p>
                        
                        <script>
                            document.getElementById("ktpfile").onchange = function () {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    // get loaded data and render thumbnail.
                                    document.getElementById("imgktp").src = e.target.result;
                                    document.getElementById("imgktp").style.display ="block";
                                    document.getElementById("formsubmit").style.display ="block";
                                };

                                // read the image file as a data URL.
                                reader.readAsDataURL(this.files[0]);
                            };
                        </script>
                        
                    </form>
                <?php
            }  
        ?>
        <p style="" class="profileInfo">TGL. LAHIR : <br class="displayMobile">
            <?php 
                $time = strtotime($dataUser['birthDate']);
                $newformat = date('M d, Y',$time);
                echo $newformat;
            ?></p>
        <p style="" class="profileInfo">NO TELEPON : <br class="displayMobile">+62-<?php echo $dataUser['mobilePhone']; ?></p>
        <p style="" class="profileInfo">EMAIL : <br class="displayMobile"><?php echo $dataUser['emailAddress'] ?></p>
        <?php if(false){ ?><a href="#profilesets" class="btn2" style="padding: 5px; font-size: 16px">EDIT</a><?php } ?>
      </div>
    </div>

    <div class="row" style="margin: 5% 0" id="profilesets">
        <?php 
        if(isset($_GET['change'])){
        if($_GET['change'] == 1){ ?>
        <div class="col-lg-12 col-md-12 col-12 align-self-center">
            <h3>EMAIL BERHASIL DIRUBAH!</h3>
        </div>
        <?php }else if($_GET['change'] == 2){?>
        <div class="col-lg-12 col-md-12 col-12 align-self-center">
            <h3>PASSWORD BERHASIL DIRUBAH!</h3>
        </div>
        <?php } 
        }?>
      <div class="col-lg-6 col-md-6 col-6 align-self-center">
        <div class="btn3" onclick="showA()">BUCKET LIST</div>
        <div id="btn3a" class="btnline"></div>
      </div>
      <div class="col-lg-6 col-md-6 col-6 align-self-center">
        <div class="btn3" onclick="showB()">PROFILE</div>
        <div id="btn3b" class="btnline white"></div>
      </div>
    </div>

    <div id="profile1" class="row bucket">
      <div class="col-lg-6 col-md-6 col-12" style="padding: 0 30px">
        <h2 class="col-lg-12 col-md-12 col-12" style="margin-bottom: 10px;">Produk Saya
          <a href="form" class="btn" style="width: auto; margin-left: 15px;">BELI PRODUK BARU</a></h2>
          <div style="display: none;">
        <ul class="row productlists">
            <?php 
                $counter = 0;
                while($counter < $countproducts){
                    echo "<li><div style='margin: 0px 0px 10px 10px;'><h3>".$products[$counter]['productName']." - ".$products[$counter]['premium']."/bulan<br>";
                    echo "Dengan Tenor: ".$products[$counter]['tenor']." bulan</h3></div></li>";
                    $counter += 1;
                }
            ?>  
        </ul>
        <p class="col-lg-12 col-md-12 col-12">Jadwal Pembayaran</p>
        <h1 class="col-lg-12 col-md-12 col-12">13/08/2018</h1>
        <p class="col-lg-12 col-md-12 col-12">Tanggal Jatuh Tempo</p>
        <h1 class="col-lg-12 col-md-12 col-12">14/08/2019</h1>
            </div>
      </div>
        <div id="profile1" class="col-lg-12 col-md-12 col-12">
            <div class="row noPads colaligncenter colprofileHeader">
                <div class="col-lg-2 col-md-2 col-12">Produk Dibeli</div>
                <div class="col-lg-2 col-md-2 col-12">No. Polis</div>
                <div class="col-lg-2 col-md-2 col-12">Tanggal Pembelian</div>
                <div class="col-lg-2 col-md-2 col-12">Tanggal Issued</div>
                <div class="col-lg-2 col-md-2 col-12">Tanggal Maturity</div>
                <div class="col-lg-2 col-md-2 col-12">Detail</div>
            </div>
            <?php 
                $counter = 0;
                while($counter < $countproducts){
                    if($products[$counter]['policyCode'] == "XXX"){
                        ?>
                        <div class="row noPads colaligncenter colprofileContent">
                            <div class="col-lg-2 col-md-2 col-12"><?php echo $products[$counter]['productName']."<br>".$products[$counter]['premium']."/bulan"; ?></div>
                            <div class="col-lg-10 col-md-10 col-12"><?php echo "Polis anda belum terbit! Segera bayarkan transaksi anda untuk mendapatkan nomor polis."; ?></div>
                        </div>
                        <?php
                    }else{
                        $time = strtotime($products[$counter]['purchaseDate']);
                        $newpurchase = date('M d, Y', $time);
                        $time = strtotime($products[$counter]['maturityDate']);
                        $maturitydate = date('M d, Y', $time);
                        $time = strtotime($products[$counter]['issuedDate']);
                        $issued = date('M d, Y', $time);
                ?>
            <div class="row noPads colaligncenter colprofileContent">
                <div class="col-lg-2 col-md-2 col-12"><?php echo $products[$counter]['productName']."<br>".$products[$counter]['premium']."/bulan"; ?></div>
                <div class="col-lg-2 col-md-2 col-12"><?php echo $products[$counter]['policyCode']; ?></div>
                <div class="col-lg-2 col-md-2 col-12"><?php echo $newpurchase; ?></div>
                <div class="col-lg-2 col-md-2 col-12"><?php echo $issued; ?></div>
                <div class="col-lg-2 col-md-2 col-12"><?php echo $maturitydate; ?></div>
                <div class="col-lg-2 col-md-2 col-12"><span class="btn2" id="epolis" data-set="<?php echo $products[$counter]['policyCode']; ?>">Kirim E-Policy</span></div>
            </div>
                <?php
                    }
                    $counter += 1;
                }
            ?> 
            
        </div>
    <?php if(isset($dataUser['hanwhaReferenceCode'])){ ?>
    <div class="col-lg-12 col-md-6 col-12" style="padding: 0 30px">
        <h2 style="display: inline-block; margin-top: 25px;">Referral ID:</h2>
        <h3 style="display: inline-block;"><?php echo $dataUser['hanwhaReferenceCode']; ?></h3>
          
          <?php 
            $dataRefs = getrefs($dataUser['hanwhaReferenceCode']); //print_r($dataRefs);
            if(isset($dataRefs['memberId'])){
                $dataRefs = count($dataRefs["memberId"]);
            }else{
                $dataRefs = 0;
            }
          ?>
    </div>
      <div class="col-lg-6 col-md-6 col-12" style="padding: 0 30px">
        <h2 style="margin-bottom: 10px">Achievement</h2>
        <table class="tablebkt" border="2px #ff7101 solid">
          <tr>
            <th>Referral ID Used</th>
            <td><?php echo $dataRefs; ?></td>
          </tr>
        </table>
      </div>
    <?php } ?>
    </div>
    <div id="profile2" class="row bucket hide">
        
<?php if(0){ ?>
      <div class="col-lg-12 col-md-12 col-12 align-self-center" style="padding: 0 30px">
        <h2>Profile</h2>
      </div>
      <div class="col-lg-12 col-md-12 col-12 align-self-center" style="padding: 0 30px">
        <form id="profileupdate">
            <div class="row noPads" style="padding: 0px;">Nama Lengkap: <?php echo $dataUser['fullName']; ?></div>
            <div class="row noPads" style="padding: 0px;">
                <div class="col-12 col-md-3 col-lg-3">
                    Gender
                </div>
                <div class="col-12 col-md-9 col-lg-9">
                    <select name="genderupdate" class="txedit" required>
                        <?php if($dataUser['gender'] == "M"){
                            ?>
                        <option value="M" selected>Laki-Laki</option>
                        <option value="F">Perempuan</option>
                            <?php
                        }else{
                            ?>
                        <option value="M">Laki-Laki</option>
                        <option value="F" selected>Perempuan</option>
                            <?php
                        } ?>
                    </select>
                </div>
                <div class="col-12 col-md-3 col-lg-3">
                    Alamat Rumah
                </div>
                <div class="col-12 col-md-9 col-lg-9">
                    <input type="text" class="txedit" name="addrline1" required value="<?php echo $dataUser['lineAddress1']; ?>">
                    <input type="text" class="txedit" name="addrline2" required value="<?php echo $dataUser['lineAddress2']; ?>">
                    <input type="text" class="txedit" name="cityline1" placeholder="Kota Alamat" required value="<?php echo $dataUser['cityAddress']; ?>">
                    <input type="tel" class="txedit" name="postaladdr" pattern="[0-9]*" min="00001" placeholder="Kode Pos" required value="<?php echo $dataUser['postalCode']; ?>">
                </div>
            </div>
            <input type="submit" value="submit" class="btn2">
        </form>
      </div>
        <?php } ?>
      <div class="col-lg-6 col-md-12 col-12 align-self-center" style="padding: 0 30px">
        <p>Ganti Password?</p>
        <form action="#!" method="POST" id="formPassword" class>
        <div class="col-lg-12 col-md-12 col-12 align-self-center">
            <input type="password" class="txedit" name="oldPassword" placeholder="Password Lama" required>
            <label for="oldPassword"></label>
        </div>
        <div class="col-lg-12 col-md-12 col-12 align-self-center">
            <input type="password" class="txedit" name="newPassword" placeholder="Password Baru" required>
            <label for="newPassword"></label>
        </div>
            <input type="submit" value="submit" class="btn2">
        </form>
      </div>
        <div class="col-lg-6 col-md-12 col-12 align-self-center" style="padding: 0 30px">
        <p>Ganti Email?</p>
        <form action="#!" method="POST" id="formEmail" class>
        <div class="col-lg-12 col-md-12 col-12 align-self-center">
            <input type="email" class="txedit" name="newEmail" placeholder="Email Baru Anda" required>
            <label for="newEmail"></label>
        </div>
        <div class="col-lg-12 col-md-12 col-12 align-self-center">
            <input type="password" class="txedit" name="newPassword" placeholder="Password Sekarang" required>
            <label for="newPassword"></label>
        </div>
            <input type="submit" value="submit" class="btn2">
        </form>
      </div>
        
        <div class="beneficiarylist row rowpaddingless">
            <?php include 'controller/getbenef.php'; ?>
        </div>
    </div>
  </div>
<div class="profilesetalert"></div>

  <?php include 'footer.php'; ?>
</body>
    <script>
$(function() {
                    // Get the form.
                    var form = $('#formPassword');

                    // TODO: The rest of the code will go here...
                    $(form).submit(function(event) {
                        // Stop the browser from submitting the form.
                        event.preventDefault();

                        // TODO
                        // Serialize the form data.
                        var formData = $(form).serialize();
                        $.ajax({
                            type: 'POST',
                            url: "./controller/change-pwd.php",
                            data: formData,
                            success: function(dataSum) {
                                   // data is ur summary
                                  $('.profilesetalert').html(dataSum);
                             }
                        })
                    });
                    
                });
                $(function() {
                    // Get the form.
                    var form = $('#formEmail');

                    // TODO: The rest of the code will go here...
                    $(form).submit(function(event) {
                        // Stop the browser from submitting the form.
                        event.preventDefault();

                        // TODO
                        // Serialize the form data.
                        var formData = $(form).serialize();
                        $.ajax({
                            type: 'POST',
                            url: "./controller/change-email.php",
                            data: formData,
                            success: function(dataSum) {
                                   // data is ur summary
                                  $('.profilesetalert').html(dataSum);
                             }
                        })
                    });
                    
                });
        
                $(function() {
                    // Get the form.
                    var form = $('#profileupdate');

                    // TODO: The rest of the code will go here...
                    $(form).submit(function(event) {
                        // Stop the browser from submitting the form.
                        event.preventDefault();

                        // TODO
                        // Serialize the form data.
                        var formData = $(form).serialize();
                        $.ajax({
                            type: 'POST',
                            url: "./controller/updateprofile.php",
                            data: formData,
                            success: function(dataSum) {
                                   // data is ur summary
                                  $('.profilesetalert').html(dataSum);
                             }
                        })
                    });
                    
                });
        
                $('#epolis').click(function(){

                    var policy_Code = $(this).data('set');

                    $.ajax({
                            type: 'POST',
                            url: "./controller/sendpolicy.php",
                            data: {"policyCode": policy_Code},
                            success: function(dataSum) {
                                   // data is ur summary
                                  $('.profilesetalert').html(dataSum);
                             }
                        })
                });
        </script>
</html>