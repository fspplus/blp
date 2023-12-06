<?php 
    include 'connectdb.php';
?>

<div class="row" style="margin-bottom: 20px;">
            <div class="col-12">
                <h1 class="textorange"><strong>Paket Terpilih</strong></h1>
            </div>
            <?php include 'view-selected.php'; ?>
            <div class="col-12 col-md-8 formCol">
                <div class="row rowpaddingless existingUser">
                    <div class="col-12">
                        <h3>Data Pemegang Polis</h3>
                        <?php 
                        $user_data = searchEmail($_SESSION['email']); 
                        $_SESSION['memberid'] = $user_data['memberId'];
                        $_SESSION['newPurchaseExist'] = $user_data;
                        //echo $_SESSION['memberid'];
                        /*echo "<pre>";
                        print_r($_SESSION);
                        echo "</pre>";*/
                        ?>
                        <div class="row rowpaddingless">
                            <div class="col-md-4">
                                <h4>Nama: </h4>
                            </div>
                            <div class="col-md-8">
                                <h4 class="text-smaller"><?php echo $user_data['fullName']; ?></h4>
                            </div>
                        </div>
                        <div class="row rowpaddingless">
                            <div class="col-md-4">
                                <h4>Tempat/Tanggal Lahir: </h4>
                            </div>
                            <div class="col-md-8">
                                <?php 
                                $dater = strtotime($user_data['birthDate']); 
                                $dater = date("d M Y", $dater);
                                ?>
                                <h4 class="text-smaller">
                                    <?php echo $user_data['birthPlace'].", ".$dater; ?>
                                </h4>
                            </div>
                        </div>
                        <div class="row rowpaddingless">
                            <div class="col-md-4">
                                <h4>Jenis Kelamin: </h4>
                            </div>
                            <div class="col-md-8">
                                <?php if($user_data['gender'] == "F"){
                                            $gender = "Wanita";
                                        }else if($user_data['gender'] == "M"){
                                            $gender = "Pria";
                                        } ?>
                                <h4 class="text-smaller"><?php echo $gender; ?></h4>
                            </div>
                        </div>
                        <div class="row rowpaddingless">
                            <div class="col-md-4">
                                <h4>Email: </h4>
                            </div>
                            <div class="col-md-8">
                                <h4 class="text-smaller"><?php echo $user_data['emailAddress']; ?></h4>
                            </div>
                        </div>
                        <div class="row rowpaddingless">
                            <div class="col-md-4">
                                <h4>No. HP: </h4>
                            </div>
                            <div class="col-md-8">
                                <h4 class="text-smaller"><?php echo $user_data['mobilePhone']; ?></h4>
                            </div>
                        </div>
                        <div class="row rowpaddingless">
                            <div class="col-md-4">
                                <h4>Alamat Rumah: </h4>
                            </div>
                            <div class="col-md-8">
                                <h4 class="text-smaller"><?php echo $user_data['lineAddress1']."<br>".$user_data['lineAddress2']."<br>".$user_data['cityAddress']."<br>Ph. ".$user_data['homePhone']; ?></h4>
                            </div>
                        </div>
                        <div class="row rowpaddingless">
                            <div class="col-md-4">
                                <h4>Alamat KTP: </h4>
                            </div>
                            <div class="col-md-8">
                                <h4 class="text-smaller"><?php echo $user_data['mailingLineAddress1']."<br>".$user_data['mailingLineAddress2']."<br>".$user_data['mailingCityAddress']."<br>Ph. ".$user_data['homePhone']; ?></h4>
                            </div>
                        </div>
                    </div>
                    <form class="col-12" action="prepurchase?view=payment&existing=1" method="POST" id="" class="formCol">
                        <div class="col-12 row rowpaddingless m-t-20">
                        <?php 
                            $dataspec = getbeneficiary($_SESSION['memberid']);
                        ?>
                        <div id="benef1" class="row rowpaddingless" style="width: 100%;">
                            <h3 style="margin-top: 10px;">Ahli Waris 1</h3>
                            <div class="col-md-12 rowpaddingless">
                                Ahli Waris Terdaftar<br>
                                <small>Silahkan pilih list dibawah jika anda ingin menambahkan dari ahli waris yang sudah anda daftarkan sebelumnya.</small>
                                <select name="selectorAhliWaris1" id="selectorAhliWaris1" class="form-controller">
                                    <option disabled selected value="">Pilih satu ...</option>
                                    <?php foreach($dataspec as $data){
                                        echo "<option value='".$data['name']."'>".$data['name']."</option>";
                                    } ?>
                                </select>
                            </div>
                            <div id="loggedAhliWaris1" class="row rowpaddingless">
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="text" class="form-controller" name="namaAhliWaris1" placeholder="Nama Lengkap" id="addr1KTP" required>
                                    <label for="namaAhliWaris1" style="color: ligthgray;">Nama Lengkap</label>
                                </div>
                                <!-- JENIS KELAMIN AHLI WARIS -->
                                <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
                                    <h5>Jenis Kelamin</h5>
                                </div>
                                <div class="col-md-6 radioSelector">
                                    <label><input type="radio" name="genderAhliWaris1" value="M"><span>Pria</span></label>
                                </div>
                                <div class="col-md-6 radioSelector">
                                    <label><input type="radio" name="genderAhliWaris1" value="F"><span>Wanita</span></label>
                                </div>

                                <!-- END JENIS KELAMIN AHLI WARIS -->
                                <!-- Hubungan Ahli Waris -->
                                <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
                                    <h5>Hubungan dengan pemegang polis</h5>
                                </div>
                                <div class="col-md-6 radioSelector">
                                    <label><input type="radio" name="hubunganAhliWaris1" value="1"><span>Orang Tua</span></label>
                                </div>
                                <div class="col-md-6 radioSelector">
                                    <label><input type="radio" name="hubunganAhliWaris1" value="2"><span>Pasangan</span></label>
                                </div>
                                <div class="col-md-6 radioSelector">
                                    <label><input type="radio" name="hubunganAhliWaris1" value="3"><span>Anak Kandung</span></label>
                                </div>
                                <div class="col-md-6 radioSelector">
                                    <label><input type="radio" name="hubunganAhliWaris1" value="4"><span>Saudara Kandung</span></label>
                                </div>

                                <!-- END HUBUGAN AHLI WARIS -->

                                <div class="floating-label border-b-orange col-md-6 rowpaddingless">
                                    <input type="text" class="form-controller" name="hanwhadob1" placeholder="Tanggal Lahir" id="dateahliwaris1" onkeypress="return false" required>
                                    <label for="hanwhadob1" style="color: ligthgray;">Tanggal Lahir</label>
                                </div>

                                <div class="floating-label border-b-orange col-md-6 rowpaddingless">
                                    <input type="email" class="form-controller" name="emailAhliWaris1" placeholder="Email Ahli Waris" id="addr2KTP" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                    <label for="emailAhliWaris1" style="color: ligthgray;">Email Ahli Waris</label>
                                </div>

                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="tel" class="form-controller" name="telpAhliWaris1" placeholder="No. Telephone" id="postalKTP" maxlength="12" required>
                                    <label for="telpAhliWaris1" style="color: ligthgray;">No. Telephone</label>
                                </div>

                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="number" class="form-controller percentageNew persentaseAhliWaris1" name="persentaseAhliWaris1" placeholder="Persentase" id="persentase1" max="100" required>
                                    <label for="telpAhliWaris1" style="color: ligthgray;">Persentase</label>
                                </div>
                            </div>
                        </div>
                        <div id="addBenef2">
                            <input type="hidden" name="hanwhaTtlBenef" id="hanwhaTtlBenef" value="1">
                            <div class="col-12 p-t-20 p-b-20 m-b-20" id="addBenef" onclick="addBenefLogged(2)"><h5>Tambahkan Ahli Waris</h5></div>
                        </div>
                        <div class="col-md-12 p-b-30"><div class="limit"></div></div>
                        <input class="btn btn-lg btn-info btn-block" type="submit" value="Lanjutkan">
                    </div>
                    </form>
                </div>
            </div>
        </div>
<script>
    $('#selectorAhliWaris1').change(function(){
        $.ajax({
            url: 'view-purchase/view-beneficiary-logged.php',
            data: "ahliwaris=" + $("#selectorAhliWaris1").val() + "&ctrbenef=1",
            type: "get",
            success: function(data){
               $('#loggedAhliWaris1').html(data);
            }
        });
    });
</script>