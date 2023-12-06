<?php 
    setlocale(LC_ALL, 'id_ID');
?>
<?php
    
    if(isset($_GET['err'])){
        echo '<div class="scriptloader">';
        if($_GET['err'] == 3101){
            ?>
                Unable to update your profile! Please contact Hanwha Life Insurance Indonesia Customer support!
                <style>
                    .scriptloader{
                        top: 70px !important;
                        z-index: 100000;
                    }
                </style>
            <?php
        }
        echo '</div>';
    }
?>
<style>
    #profile input{
        color: gray !important;
    }
</style>
<div id="profile" class="profile-active profilecards">                             
    <form class="form-horizontal form-material row rowpaddingless " action="/controller/ktp-upload.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group row rowpaddingless">
                                        <div class="col-md-9">
                                            Nama Lengkap
                                            <h1 style="color: #ff7101"><?php echo $dataUser['fullName']; ?></h1>
                                            <h3>Bergabung pada 
                                                <?php 
                                                
                                                $time = strftime("%d %b, %Y",strtotime($dataUser['joinDate']));
                                                //$time = strtotime($dataUser['joinDate']);
                                                //$newformat = date('d M Y',$time); 
                                                $newformat = $time;
                                                echo $newformat."<br>"; 
                                                //echo $dataUser['hanwhaReferenceCode'];

                                                @$dataRefCode = refCodeUsed($dataUser['hanwhaReferenceCode']);
                                                if($dataRefCode != NULL){
                                                    $countRefCode = count($dataRefCode);
                                                }else{
                                                    //echo "Referral Code anda belum digunakan oleh siapapun";
                                                    $countRefCode = 0;
                                                }
                                                ?>
                                                
                                            </h3>
                                        </div>

                                        <?php 
                                            if($dataUser['memberType'] == 3){
                                            ?>
                                            <div class="col-md-3">
                                                Status: Nasabah <br><br>
                                                <a href="../purchase/reffmate" class="btn btn-success">Daftar Referral Mate</a>
                                            </div>
                                            <?php
                                            }else if($dataUser['memberType'] == 8){
                                                ?>
                                                <div class="col-md-3">
                                                    Status: Referral Mate <br><br>
                                                    <a href="../purchase/reffmate" class="btn btn-success">Update Data Referral Mate</a>
                                                </div>
                                                <?php
                                            }
                                        ?>

                                        <hr style="width: 100%; height: 2px; background-color: #ff7101; color: #ff7101;">
                                    </div>
                                    <h3 class="col-md-12">Update KTP</h3>
                                    <div class="col-12 verTOPnew rowpaddingless">
                                    <div class="form-group col-md-12">
                                        <?php 
                                             $urlkpt = "/var/www/html/assets/images/ktpuploads/".$dataUser['fullName']." - ".$dataUser['identityNumber'].'.jpeg';
                                             $urlkptLink = "/assets/images/ktpuploads/".$dataUser['fullName']." - ".$dataUser['identityNumber'].'.jpeg';
                                        if(file_exists($urlkpt)){
                                        ?>   
                                        <p style="" class="profileInfo"><img src="https://koreaversikamu.co.id<?php echo $urlkptLink."?v=".rand(); ?>" width="150px"></p>
                                        <p style="" class="">Ganti KTP Anda: <label class="uploadKTP"><span>Upload KTP</span>
                                            <input type="file" id="ktpfile" name="ktpfile" style="display: none;" required>
                                            <input type="hidden" value="<?php echo $dataUser['fullName']; ?>" name="vldnm">
                                            <input type="hidden" value="<?php echo $dataUser['identityNumber']; ?>" name="vlddi">
                                            </label></p>
                                        <p style="" class="profileInfo"><img src="" id="imgktp" width="250px" style="display: none;"></p>
                                        <p style="" class="profileInfo"><button class="btn btn-success" id="formsubmit" style="display: none; margin: 0px;" name="ktpupdate">Perbarui KTP</button></p>
                                        <?php }
                                        else{
                                            ?>
                                        <p style="" class="">Upload KTP Anda: <label class="uploadKTP"><span>Upload KTP</span><input type="file" id="ktpfile" name="ktpfile" style="display: none;" required></label>
                                        
                                            <input type="hidden" value="<?php echo $dataUser['fullName']; ?>" name="vldnm">
                                            <input type="hidden" value="<?php echo $dataUser['identityNumber']; ?>" name="vlddi">
                                        </p>
                                        <p style="" class="profileInfo"><img src="" id="imgktp" width="250px" style="display: none;"></p>
                                        <p style="" class="profileInfo"><button class="btn btn-success" id="formsubmit" style="display: none; margin: 0px;" name="ktpupdate">Perbarui KTP</button></p>
                        
                                        <?php
                                        }
                                        ?>
                                        
                                    <h5 class="col-md-12" style="padding: 10px 0px 0px">Referral Code: <?php print_r($dataUser['hanwhaReferenceCode']); ?></h5>
                                    <?php 
                                        if($dataUser['memberType'] == 8){
                                        ?>
                                        Link Referral Anda: <copy>https://bucketlistplan.co.id/product-page?reff=<?php echo $dataUser['hanwhaReferenceCode']; ?></copy><br><copylink onclick="copylink()" class="btn btn-success">Copy</copylink>
                                        <a class="btn btn-success" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('https://bucketlistplan.co.id/product-page?reff='.$dataUser['hanwhaReferenceCode']) ?>&t=Gabungyuk" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"target="_blank" title="Share on Twitter"><i class="fa fa-facebook"></i></a>
                                        <a class="btn btn-success" href="https://twitter.com/share?url=<?php echo urlencode('https://bucketlistplan.co.id/product-page?reff='.$dataUser['hanwhaReferenceCode']) ?>&via=bucketlistplan.co.id&text=gabungyuk" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"target="_blank" title="Share on Facebook"><i class="fa fa-twitter"></i></a>
                                        <a class="btn btn-success" target="_blank" href="https://api.whatsapp.com/send?phone=&text=<?php echo urlencode("Mau dapat perlindungan dengan manfaat saving? yuk kepoin produknya, dijamin untung! dapatkan sald e-wallet hingga 300k. https://bucketlistplan.co.id/product-page?reff=".$dataUser['hanwhaReferenceCode']); ?>"><i class="fa fa-whatsapp"></i></a>

                                        <input class="d-none" type="text" name="url" id="urlLong" value="https://bucketlistplan.co.id/product-page?reff=<?php echo $dataUser['hanwhaReferenceCode']; ?>">
                                        <script>
                                            function copylink() {
                                                /* Get the text field */
                                                var copyText = document.getElementById("urlLong");

                                                /* Select the text field */
                                                copyText.select(); 
                                                copyText.setSelectionRange(0, 99999); /* For mobile devices */

                                                /* Copy the text inside the text field */
                                                navigator.clipboard.writeText(copyText.value);

                                                /* Alert the copied text */
                                                alert("Link anda berhasil di copy!");
                                            }
                                        </script>
                                        <?php
                                        }
                                    ?>
                                    <div class="col-12 mt-3 rowpaddingless">
                                    <table class="tablebkt" border="2px #ff7101 solid">
                                      <tbody><tr>
                                        <th><h5>Referral ID Used</h5></th>
                                        <td><h5><?php echo $countRefCode; ?></h5></td>
                                      </tr>
                                    </tbody></table>
                                  </div>
                                    </div>
                        
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
                                    </div>
                                    <div class="col-md-12 col-lg-12 verTOPnew rowpaddingless">
                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">No. Kartu Identitas</label>
                                            <div class="col-md-12">
                                                <input type="number" value="<?php echo $dataUser['identityNumber']; ?>" class="form-control form-control-line" name="txtidentityno" id="txtidentityno" readonly style="color: gray;">
                                                <label style="font-size:10px" type="text" class="messageblock" name="txtmessageblock1" id="txtmessageblock1" style="color:#ff7101;">Silahkan hubungi Support Hanwha untuk memperbarui data ini</label>
                                            </div>
                                        </div>
                                        <div class="form-group demail">
                                            <label for="example-email" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" value="<?php echo $dataUser['emailAddress']; ?>" class="form-control form-control-line" name="txtemail" id="txtemail" style="color: gray;">
                                                <label style="font-size:10px" type="text" name="txtmessage" id="txtmessage"></label>
                                                <input type="text" class="form-control d-none" name="txtotp" id="txtotp" style="color: gray; width:60px;text-size:12px">
                                                <label class="btn btn-success verifyotp d-none" style="width:90px" type="text" name="verifyemail" id="verifyemail" >verifikasi</label>
                                                <label class="btn btn-success getotp d-none" style="width:90px" type="text" name="otpemail" id="otpemail">get OTP</label>
                                                <input type="hidden" name="txtvalid" id="txtvalid" value="1">
                                                <input type="hidden" name="txtemailori" id="txtemailori" value="<?php echo $dataUser['emailAddress']; ?>">
                                                <input type="hidden" name="txtfullname" id="txtfullname" value="<?php echo $dataUser['fullName']; ?>">                       
                                            </div>
					    		
                                        </div>
                                    </div>
                                </form>
    
    <?php 
        if(isset($dataUser['additionProp'])){
            $jobPro = json_decode($dataUser['additionProp'], true);
            @$jobDetail = json_decode(json_encode($jobPro['jobDetail']));
            @$statusMerr = json_decode(json_encode($jobPro['maritalStatus']));
            
            @$dataup = $jobDetail -> uraianPekerjaan;
            @$datanp = $jobDetail -> namaLembaga;
            @$databu = $jobDetail -> bidangUsaha;
            
        }else{
            $jobPro = NULL;
        }
    ?>
    <!-- controller/ktp-upload.php -->
    <form class="form-horizontal form-material row rowpaddingless " action="#" method="post" enctype="multipart/form-data" id="formupdateprofile">
                                    <!--<div class="form-group row rowpaddingless">
                                        <div class="col-md-12">
                                            <hr style="width: 100%; height: 2px; background-color: #ff7101; color: #ff7101;">
                                        </div>
                                    </div>
                                    <h3 class="col-md-12">Update Data Profil</h3>-->
                                    <div class="col-md-12 col-lg-12 verTOPnew rowpaddingless">
                                            <div class="form-group dphone">
                                                <label class="col-md-12">No. Telp.</label>
                                                <div class="col-md-12">
                                                    <input type="text"  placeholder="<?php echo $dataUser['mobilePhone']; ?>" class="form-control form-control-line numbersOnly phone" value="<?php echo $dataUser['mobilePhone']; ?>" name="mobilePhone" id ="mobilePhone">
                                                    <label style="font-size:10px" type="text" name="txtmessagephone" id="txtmessagephone"></label>
                                                    <input type="text" class="form-control d-none" name="txtotpphone" id="txtotpphone" style="color: gray; width:60px;text-size:12px">
                                                    <label class="btn btn-success verifyotpphone d-none" style="width:90px" type="text" name="verifyphone" id="verifyphone" >verifikasi</label>
                                                    <label class="btn btn-success getotpphone d-none" style="width:90px" type="text" name="otpphone" id="otpphone">get OTP</label>
                                                    <input type="hidden" name="txtvalidphone" id="txtvalidphone" value="1">
                                                    <input type="hidden" name="txtphoneori" id="txtphoneori" value="<?php echo $dataUser['mobilePhone']; ?>">
                                                </div>
                                            </div>
					                        <div class="form-group dtl">
                                                <label class="col-md-12">Tempat Lahir</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="<?php echo $dataUser['birthPlace']; ?>" class="form-control form-control-line" value="<?php echo $dataUser['birthPlace']; ?>" name="birthPlace" id="birthPlace" readonly>
                                                    <label style="font-size:10px" class="messageblock" type="text" name="txtmessageblock2" id="txtmessageblock2" style="color:#ff7101;">Silahkan hubungi Support Hanwha untuk memperbarui data ini</label>
                                                </div>
                                            </div>

                                            <div class="form-group dad1">
                                                <label class="col-md-12">Alamat Domisili 1</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="<?php echo $dataUser['lineAddress1']; ?>" class="form-control form-control-line" value="<?php echo $dataUser['lineAddress1']; ?>" name="lineAddress1" id="lineAddress1">
                                                </div>
                                            </div>
                                            <div class="form-group dad2">
                                                <label class="col-md-12">Alamat Domisili 2</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="<?php if ($dataUser['lineAddress2'] != "NULL"){ echo $dataUser['lineAddress2'];}else{ echo "";} ?>" class="form-control form-control-line" value="<?php if ($dataUser['lineAddress2'] != "NULL"){ echo $dataUser['lineAddress2'];}else{ echo "";} ?>" name="lineAddress2" id="lineAddress2">
                                                </div>
                                            </div>
                                            <div class="form-group dct">
                                                <label class="col-md-12">Kota</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="<?php if ($dataUser['cityAddress'] != "NULL"){ echo $dataUser['cityAddress'];}else{ echo "";} ?>" class="form-control form-control-line" value="<?php if ($dataUser['cityAddress'] != "NULL"){ echo $dataUser['cityAddress'];}else{ echo "";} ?>" name="cityAddress" id="cityAddress">
                                                </div>
                                            </div>
                                            <div class="form-group dpcode" >
                                                <label class="col-md-12">Kode Pos Domisili</label>
                                                <div class="col-md-12">
                                                    <input type="text"  placeholder="<?php echo $dataUser['postalCode']; ?>" class="form-control form-control-line numbersOnly pcode" value="<?php echo $dataUser['postalCode']; ?>" name="postalCode" id="postalCode" required>
                                                </div>
                                            </div>
                                            <div class="form-group dtelp">
                                                <label class="col-md-12">No. Telp Rumah</label>
                                                <div class="col-md-12">
                                                    <input type="text"  placeholder="<?php echo $dataUser['homePhone']; ?>" class="form-control form-control-line numbersOnly phone" value="<?php echo $dataUser['homePhone']; ?>" name="homePhone" id="homePhone" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Status Pernikahan</label>
                                                <?php 
                                                    if(!$statusMerr){
                                                        $statMerit = "";
                                                    }else if($statusMerr == "Y"){
                                                        $statMerit = "Menikah";
                                                    }else if($statusMerr == "N"){
                                                        $statMerit = "Belum Menikah";
                                                    }
                                                ?>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="<?php echo @$statMerit; ?>" class="form-control form-control-line" value="<?php echo @$statMerit; ?>" name="statmerit" id="statmerit" readonly>
                                                    <label style="font-size:10px;color:#ff7101;" type="text" name="txtmessageblock" id="txtmessageblock" >Silahkan hubungi Support Hanwha untuk memperbarui data ini</label>
                                                </div>
                                            </div>
                                            <div class="form-group dincome">
                                                <label class="col-md-12">Sumber Penghasilan</label>
						

                                                <?php 
                                                    if(strtolower($dataUser['incomeSource']) == "slr"){
                                                        $income = "Gaji";
                                                    } 
                                                    else if(strtolower($dataUser['incomeSource']) == "inv"){
                                                        $income = "Hasil Investasi";
                                                    } 
                                                    else if(strtolower($dataUser['incomeSource']) == "shu"){
                                                        $income = "Hasil Usaha";
                                                    } 
                                                    else if(strtolower($dataUser['incomeSource']) == "wrs"){
                                                        $income = "Warisan";
                                                    } 
                                                    else if(strtolower($dataUser['incomeSource']) == "incoth"){
                                                        $income = "Others";
                                                    }else{
                                                        $income = "";
                                                    }
 
                                                ?>
                                                <div class="col-md-12">
                                                    <!--<input type="text" placeholder="<?php echo $income; ?>" class="form-control form-control-line" value="<?php echo $income; ?>" name="incomeSource" readonly>-->
                                                <select class="txedit form-control" name="incomeSource" id="incomeSource"  required>
                                                            <option value="">Pilih Sumber</option>
                                                <?php
                                                            $dataFull = sourceincome();
                                                            foreach($dataFull as $data){
                                                                $incomemstr = $data['codeValue'];
                                                                if (strtolower($dataUser['incomeSource']) == strtolower($data['codeId'])){
                                                                    echo "<option class=form-control value='".$data['codeId']."' selected>".$incomemstr."</option>";
                                                                }else{
                                                                    echo "<option class=form-control value='".$data['codeId']."'>".$incomemstr."</option>";
                                                                }
                                                            }
                                                        ?>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group djob">
                                                <label class="col-md-12">Pekerjaan</label>
                                                <div class="col-md-12">
                                                        <?php 
                                                            $dataFull = jobdesclist();
                                                            foreach($dataFull as $data){
                                                                $kerjaan = $data['codeValue'];
                                                                //echo $data['codeId']." - ".$dataUser['jobType']."<br>";
                                                                if($data['codeId'] == $dataUser['jobType']){
                                                                    $fixKerja = $kerjaan;
                                                                }
                                                            }
                                                    //print_r($dataUser);
                                                        ?>
                                                    <!--<input type="text" class="form-controller" name="hanwhaposition" value="<?php echo $dataUser['jobDesc']; ?>" id="hanwhaposition" disabled>-->
                                                    <select class="txedit form-control" name="pekerjaan" id="pekerjaan" required>
                                                        <option value="" selected>Pilih Pekerjaan</option>
                                                        <?php
                                                                $dataFull = jobdesclist();
                                                                foreach($dataFull as $data){
                                                                    $kerjaanmstr = $data['codeValue'];
                                                                    if (strtolower($data['codeId']) == strtolower($dataUser['jobType'])){
                                                                        $sel = "selected";
                                                                        echo "<option class=form-control value='".$data['codeId']."' $sel>".$kerjaanmstr."</option>";
                                                                    }else{
                                                                        echo "<option class=form-control value='".$data['codeId']."'>".$kerjaanmstr."</option>";
                                                                    }
                                                                    
                                                                }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group up">
                                                    <label class="col-md-12">Uraian Pekerjaan</label>
                                                    <div class="col-md-12">
                                                        <input type="text" placeholder="<?php echo @$dataup; ?>" class="form-control form-control-line" value="<?php echo @$dataup; ?>" name="uraianPekerjaan" id="uraianPekerjaan">
                                                    </div>
                                                </div>
                                                <div class="form-group np">
                                                    <label class="col-md-12">Nama Perusahaan/Instansi/Lembaga</label>
                                                    <div class="col-md-12">
                                                        <input type="text" placeholder="<?php echo @$datanp; ?>" class="form-control form-control-line" value="<?php echo @$datanp; ?>" name="namaLembaga" id="namaLembaga">
                                                    </div>
                                                </div>
                                                <div class="form-group bu">
                                                    <label class="col-md-12">Bidang Usaha</label>
                                                    <div class="col-md-12">
                                                        <input type="text" placeholder="<?php echo @$databu; ?>" class="form-control form-control-line" value="<?php echo @$databu; ?>" name="bidangUsaha" id="bidangUsaha">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="hidden" value="<?php echo $dataUser['memberId']; ?>" name="vldnm" id="vldnm">
                                            
                                            <label class="d-none" name="indivPayor" id="indivPayor"><?php echo json_encode($dataUser['additionProp']);?></label>
                                            <!-- <input type="hidden" name="boType" id="boType" value="<?php echo ""; ?>"> -->
                                            <!-- <button class="btn btn-success" type="submit" name="profileupdate" id="profileupdate">Perbarui Profil</button> -->
						                    <label class="btn btn-success btnsubmit" name="profileupdate" id="profileupdate">Perbarui Profil</label>
                                            <!--d-none-->
                                            

                                        </div>
                                    </div>
                                </form>
    </div>
    <link href="/css/sweetalert.min.css" id="themealert" rel="stylesheet">
    <script src="/js/sweetalert2.all.min.js"></script>   
    <script src="../js/updateprofile.js?d=1160808096"></script>
<style>
    .error{
        border: 1px solid red;
    }    
</style>  