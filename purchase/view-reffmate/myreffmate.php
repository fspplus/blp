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
    <!-- Pikaday -->
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="../purchase/view-reffmate/reffmate.css" rel="stylesheet">

    <!-- Custom JS & CSS -->
    <script src="../purchase/view-reffmate/reffmate.js" defer></script>

    <script src="https://kit.fontawesome.com/192553f383.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js" crossorigin="anonymous"></script>
<style>
    #profile input{
        color: gray !important;
    }
</style>
<div id="profile" class="profile-active profilecards">    
    <?php 
        if(isset($_GET['stat'])){
            ?>
                <div class="bg-success p-3 text-center text-white mb-5">
                    <?php 
                        echo urldecode($_GET['stat']);
                    ?>
                </div>
            <?php
        }
    ?>                         
    <div class="form-horizontal form-material row rowpaddingless " method="post" enctype="multipart/form-data">
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

            <hr style="width: 100%; height: 2px; background-color: #ff7101; color: #ff7101;">
        </div>
    </div>
    <?php if(isset($_GET['err'])){
        ?>
            <div class="row">
                <div class="col-12 alert-danger">
                    <h5>Return Message: <?php echo $_GET['err']; ?></h5>
                </div>
            </div>
        <?php
    } ?>
    <!-- controller/ktp-upload.php -->
    <form class="form-horizontal form-material row rowpaddingless " action="./controller/register-reffmate.php" method="post" enctype="multipart/form-data" id="">
        <!--<div class="form-group row rowpaddingless">
            <div class="col-md-12">
                <hr style="width: 100%; height: 2px; background-color: #ff7101; color: #ff7101;">
            </div>
        </div>
        <h3 class="col-md-12">Update Data Profil</h3>-->
        <div class="col-md-12 col-lg-12 verTOPnew rowpaddingless">
                <div class="form-group dtl">
                    <label class="col-md-12">Nomor Bank/e-Wallet</label>
                    <div class="col-md-12">
                        <input type="tel" placeholder="" class="form-control form-control-line" value="" name="bankAccount" id="bankAccount" required>
                    </div>
                </div>
                <div class="form-group dtl">
                    <label class="col-md-12">Nama Bank/e-Wallet</label>
                    <div class="col-md-12">
                        <select name="bankCode" required>
                            <option value="" disabled selected>Pilih Bank</option>
                            <option value="701">OVO</option>
                            <option value="702">GoPay</option>
                            <option value="703">DANA</option>
                            <?php 
                                $databank = banklist();
                                foreach($databank as $data){
                                    $bankName = $data['codeValue'];
                                    $bankCode = $data['codeId'];
                                    echo "<option value='$bankCode'>".$bankName."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group dtl">
                    <label class="col-md-12">Cabang Bank</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="" class="form-control form-control-line" value="" name="bankBranch" id="bankBranch">
                    </div>
                </div>
                <div class="form-group dtl">
                    <label class="col-md-12">Upload foto buku rekening/Akun e-wallet</label>
                    <div class="col-md-12">
                        <input type="file" placeholder="" class="form-control form-control-line" value="" name="doc_account" id="bankAccount" required>
                    </div>
                </div>
                <div class="form-group dtl">
                    <label class="col-md-12">Upload KTP</label>
                    <div class="col-md-12">
                        <input type="file" placeholder="" class="form-control form-control-line" value="" name="doc_profile" id="bankAccount" required>
                    </div>
                </div>
                <div class="form-group dtl">
                    <label class="col-md-12">Upload NPWP *Jika ada</label>
                    <div class="col-md-12">
                        <input type="file" placeholder="" class="form-control form-control-line" value="" name="doc_npwp" id="bankAccount">
                    </div>
                </div>
                <input type="hidden" name="actionType" value="1">
                <button type="submit" class="btn btn-success" name="register-reffmate" id="">Daftar Referral Mate</label>

        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <input type="hidden" value="<?php echo $dataUser['memberId']; ?>" name="vldnm" id="vldnm">
                <input type="hidden" value="<?php echo $dataUser['emailAddress']; ?>" name="vldemail" id="vldemail">
                <input type="hidden" value="<?php echo $dataUser['mobilePhone']; ?>" name="vldphone" id="vldphone">
                
                <!-- <input type="hidden" name="boType" id="boType" value="<?php echo ""; ?>"> -->
                <!-- <button class="btn btn-success" type="submit" name="profileupdate" id="profileupdate">Perbarui Profil</button> -->
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