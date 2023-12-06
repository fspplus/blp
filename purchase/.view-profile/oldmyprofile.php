<?php 
    setlocale(LC_ALL, 'id_ID');
?>
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
                                                echo $newformat; 
                                                $dataRefCode = refCodeUsed($dataUser['hanwhaReferenceCode']);
                                                $countRefCode = count($dataRefCode);
                                                ?>
                                                
                                            </h3>
                                            <hr style="width: 100%; height: 2px; background-color: #ff7101; color: #ff7101;">
                                        </div>
                                    </div>
                                    <h3 class="col-md-12">Informasi Dasar</h3>
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
                                        <p style="" class="profileInfo"><input type="submit" id="formsubmit" value="UPDATE" style="display: none;"></p>
                                        <?php }
                                        else{
                                            ?>
                                        <p style="" class="">Upload KTP Anda: <label class="uploadKTP"><span>Upload KTP</span><input type="file" id="ktpfile" name="ktpfile" style="display: none;" required></label>
                                        
                                            <input type="hidden" value="<?php echo $dataUser['fullName']; ?>" name="vldnm">
                                            <input type="hidden" value="<?php echo $dataUser['identityNumber']; ?>" name="vlddi">
                                        </p>
                                        <p style="" class="profileInfo"><img src="" id="imgktp" width="250px" style="display: none;"></p>
                                        <p style="" class="profileInfo"><input type="submit" id="formsubmit" value="UPDATE" style="display: none;"></p>
                        
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
                                            <div class="form-group">
                                                <label class="col-md-12">No. Telp.</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="<?php echo $dataUser['mobilePhone']; ?>" class="form-control form-control-line" value="<?php echo $dataUser['mobilePhone']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Alamat Domisili 1</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="<?php echo $dataUser['lineAddress1']; ?>" class="form-control form-control-line" value="<?php echo $dataUser['lineAddress1']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Alamat Domisili 2</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="<?php echo $dataUser['lineAddress2']; ?>" class="form-control form-control-line" value="<?php echo $dataUser['lineAddress2']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Kode Pos Domisili</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="<?php echo $dataUser['postalCode']; ?>" class="form-control form-control-line" value="<?php echo $dataUser['postalCode']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">No. Telp Rumah</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="<?php echo $dataUser['homePhone']; ?>" class="form-control form-control-line" value="<?php echo $dataUser['homePhone']; ?>">
                                                </div>
                                            </div>
                                        <!-- TO BE CONFIRMED -->
                                            <div class="form-group">
                                                <label class="col-md-12">Status Pernikahan</label>
                                                <div class="col-md-12 rowpaddingless">
                                                    <div class="col-md-6 radioSelector" style="display: inline-block;">
                                                        <label><input type="radio" name="hanwhastatus" value="Menikah"><span>Sudah Menikah</span></label>
                                                    </div>
                                                    <div class="col-md-6 radioSelector" style="display: inline-block;">
                                                        <label class=""><input type="radio" name="hanwhastatus" value="Belum Menikah"><span>Belum Menikah</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Sumber Penghasilan</label>
                                                <select name="hanwhasourceincome" required>
                                                    <option value="<?php $dataUser['incomeSource']; ?>" disabled selected>
                                                        <?php 
                                                            if($datUser['incomeSource'] == "SLR"){
                                                                echo "Gaji";
                                                            }else if($datUser['incomeSource'] == "INV"){
                                                                echo "Hasil Investasi";
                                                            }else if($datUser['incomeSource'] == "SHU"){
                                                                echo "Hasil Usaha";
                                                            }else if($datUser['incomeSource'] == "WRS"){
                                                                echo "Warisan";
                                                            }else if($datUser['incomeSource'] == "INCOTH"){
                                                                echo "Lainnya";
                                                            }
                                                        ?>
                                                    </option>
                                                    <?php 
                                                        $dataFull = sourceincome();
                                                        foreach($dataFull as $data){
                                                            $kerjaan = $data['codeValue'];
                                                            echo mb_convert_case("<option value='".$data['codeId']."' data-group='".$data['groupCode']."'>".$kerjaan."</option>", MB_CASE_TITLE, "UTF-8");
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Pekerjaan</label>
                                                <div class="floating-label col-md-6 rowpaddingless">
                                                    <select name="hanwhawork" required id="workselector">
                                                        <option value="" disabled selected>
                                                            Pilih Pekerjaan
                                                        </option>
                                                        <?php 
                                                            $dataFull = jobdesclist();
                                                            foreach($dataFull as $data){
                                                                $kerjaan = $data['codeValue'];
                                                                echo mb_convert_case("<option value='".$data['codeId']."' data-group='".$data['groupCode']."'>".$kerjaan."</option>", MB_CASE_TITLE, "UTF-8");
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                                    <input type="text" class="form-controller" name="hanwhaposition" placeholder="Uraian Pekerjaan &#40; Jabatan/Pangkat/Posisi&#41;" id="hanwhaposition" disabled>
                                                    <label for="hanwhaposition" style="color: ligthgray;">Uraian Pekerjaan &#40; Jabatan/Pangkat/Posisi&#41;</label>
                                                </div>
                                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                                    <input type="text" class="form-controller" name="hanwhacompanyname" placeholder="Nama Perusahaan/Instansi/Lembaga" id="hanwhacompanyname" disabled>
                                                    <label for="hanwhacompanyname" style="color: ligthgray;">Nama Perusahaan/Instansi/Lembaga</label>
                                                </div>
                                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                                    <input type="text" class="form-controller" name="hanwhasector" placeholder="Bidang Usaha" id="hanwhasector" disabled>
                                                    <label for="hanwhasector" style="color: ligthgray;">Bidang Usaha</label>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Perbarui Profil</button>
                                        </div>
                                    </div>
                                </form>
    </div>   