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
                                        <label class="col-md-12">Nama Lengkap</label>
                                        <div class="col-md-12">
                                            <h1 style="color: #ff7101"><?php echo $dataUser['fullName']; ?></h1>
                                            <h3>Bergabung pada 
                                                <?php 
                                                
                        $time = strftime("%d %b, %Y",strtotime($dataUser['joinDate']));
                                                //$time = strtotime($dataUser['joinDate']);
                                                //$newformat = date('d M Y',$time); 
                                                $newformat = $time;
                                                echo $newformat."<br>"; 
                                                //echo $dataUser['hanwhaReferenceCode'];
                                                $dataRefCode = refCodeUsed($dataUser['hanwhaReferenceCode']);
                                                if($dataRefCode != NULL){
                                                    $countRefCode = count($dataRefCode);
                                                }else{
                                                    //echo "Referral Code anda belum digunakan oleh siapapun";
                                                    $countRefCode = 0;
                                                }
                                                ?>
                                                
                                            </h3>
                                            <hr style="width: 100%; height: 2px; background-color: #ff7101; color: #ff7101;">
                                        </div>
                                    </div>
                                    <h3 class="col-md-12">Update KTP</h3>
                                    <div class="col-md-6 col-lg-6 verTOPnew rowpaddingless">
                                    <div class="form-group col-md-12">
                                        <?php 
                                            $urlkpt = "./assets/images/ktpuploads/".$dataUser['fullName']." - ".$dataUser['identityNumber'].'.jpeg';
                                        if(file_exists($urlkpt)){
                                        ?>   
                                        <p style="" class="profileInfo"><img src="<?php echo $urlkpt."?v=".rand(); ?>" width="150px"></p>
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
                                    <div class="col-12 rowpaddingless">
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
                                                <input type="number" value="<?php echo $dataUser['identityNumber']; ?>" class="form-control form-control-line" name="example-email" id="example-email" readonly style="color: gray;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" value="<?php echo $dataUser['emailAddress']; ?>" class="form-control form-control-line" name="example-email" id="example-email" readonly style="color: gray;">
                                            </div>
                                        </div>
                                    </div>
                                </form>
    
    <?php 
        if(isset($dataUser['additionProp'])){
            $jobPro = json_decode($dataUser['additionProp'], true);
        }else{
            $jobPro = NULL;
        }
    ?>
    <form class="form-horizontal form-material row rowpaddingless " action="/controller/ktp-upload.php" method="post" enctype="multipart/form-data">
                                    <!--<div class="form-group row rowpaddingless">
                                        <div class="col-md-12">
                                            <hr style="width: 100%; height: 2px; background-color: #ff7101; color: #ff7101;">
                                        </div>
                                    </div>
                                    <h3 class="col-md-12">Update Data Profil</h3>-->
                                    <div class="col-md-12 col-lg-12 verTOPnew rowpaddingless">
                                            <div class="form-group">
                                                <label class="col-md-12">No. Telp.</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="<?php echo $dataUser['mobilePhone']; ?>" class="form-control form-control-line" value="<?php echo $dataUser['mobilePhone']; ?>" name="mobilePhone" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Alamat Domisili 1</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="<?php echo $dataUser['lineAddress1']; ?>" class="form-control form-control-line" value="<?php echo $dataUser['lineAddress1']; ?>" name="lineAddress1" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Alamat Domisili 2</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="<?php echo $dataUser['lineAddress2']; ?>" class="form-control form-control-line" value="<?php echo $dataUser['lineAddress2']; ?>" name="lineAddress2" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Kode Pos Domisili</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="<?php echo $dataUser['postalCode']; ?>" class="form-control form-control-line" value="<?php echo $dataUser['postalCode']; ?>" name="postalCode" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">No. Telp Rumah</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="<?php echo $dataUser['homePhone']; ?>" class="form-control form-control-line" value="<?php echo $dataUser['homePhone']; ?>" name="homePhone" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Status Pernikahan</label>
                                                <?php 
                                                    if(!isset($jobPro['maritalStatus'])){
                                                        $statMerit = "";
                                                    }else if($jobPro['maritalStatus'] == "Y"){
                                                        $statMerit = "Menikah";
                                                    }else if($jobPro['maritalStatus'] == "N"){
                                                        $statMerit = "Belum Menikah";
                                                    }
                                                ?>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="<?php echo $statMerit; ?>" class="form-control form-control-line" value="<?php echo $statMerit; ?>" name="homePhone" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Sumber Penghasilan</label>
                                                <?php 
                                                    if($dataUser['incomeSource'] == "SLR" | $dataUser['incomeSource'] == "slr" | $dataUser['incomeSource'] == "Slr"){
                                                        $income = "Gaji";
                                                    } 
                                                    else if($dataUser['incomeSource'] == "INV" | $dataUser['incomeSource'] == "inv" | $dataUser['incomeSource'] == "Inv"){
                                                        $income = "Hasil Investasi";
                                                    } 
                                                    else if($dataUser['incomeSource'] == "SHU" | $dataUser['incomeSource'] == "shu" | $dataUser['incomeSource'] == "Shu"){
                                                        $income = "Hasil Usaha";
                                                    } 
                                                    else if($dataUser['incomeSource'] == "WRS" | $dataUser['incomeSource'] == "wrs" | $dataUser['incomeSource'] == "Wrs"){
                                                        $income = "Warisan";
                                                    } 
                                                    else if($dataUser['incomeSource'] == "INCOTH" | $dataUser['incomeSource'] == "incoth" | $dataUser['incomeSource'] == "Incoth"){
                                                        $income = "Others";
                                                    } 
                                                ?>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="<?php echo $income; ?>" class="form-control form-control-line" value="<?php echo $income; ?>" name="homePhone" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Pekerjaan</label>
                                                <div class="floating-label col-md-12     rowpaddingless">
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
                                                    <input type="text" class="form-controller" name="hanwhaposition" value="<?php echo $dataUser['jobDesc']; ?>" id="hanwhaposition" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Uraian Pekerjaan</label>
                                                    <div class="col-md-12">
                                                        <input type="text" placeholder="<?php echo $jobPro['jobDetail']['uraianPekerjaan']; ?>" class="form-control form-control-line" value="<?php echo $jobPro['jobDetail']['uraianPekerjaan']; ?>" name="lineAddress2" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Nama Perusahaan/Instansi/Lembaga</label>
                                                    <div class="col-md-12">
                                                        <input type="text" placeholder="<?php echo $jobPro['jobDetail']['namaLembaga']; ?>" class="form-control form-control-line" value="<?php echo $jobPro['jobDetail']['namaLembaga']; ?>" name="lineAddress2" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Bidang Usaha</label>
                                                    <div class="col-md-12">
                                                        <input type="text" placeholder="<?php echo $jobPro['jobDetail']['bidangUsaha']; ?>" class="form-control form-control-line" value="<?php echo $jobPro['jobDetail']['bidangUsaha']; ?>" name="lineAddress2" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="hidden" value="<?php echo $dataUser['memberId']; ?>" name="vldnm">
                                            <button class="btn btn-success d-none" type="submit" name="profileupdate">Perbarui Profil</button>
                                        </div>
                                    </div>
                                </form>
    </div>   