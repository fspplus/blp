<?php 
header("HTTP/1.0 404 Not Found");
// header('Location: ../purchase/login');
session_start();
    if($_GET['error'] == 1){
        echo "<script>alert('Username or Password is incorrect or does not exists');</script>";
    }else if($_GET['error'] == 2){
        echo "<script>alert('NOT ALLOWED');</script>";
    }
    if($_GET['logout'] == 0){
        session_destroy();
    }
    if(isset($_SESSION['email']) || $_SESSION['email'] != NULL){
        echo "<script>alert('NOT ALLOWED'); window.location.href= './';</script>";
    }
    include ('/var/www/html/jsonapp/json-hanwha-api.php'); //writelog();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" sizes="16x16" href="../assets/images/favicon.png?v=2">
    <title>Bucketlist Plan by Hanwha Life | Wujudkan mimpi Bucketlist Plan kamu dengan Hanwha Life Insurance Indonesia</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="style.css?<?php echo date('is'); ?>" rel="stylesheet">
    <link href="css/style.css?<?php echo date('is'); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/orange.css" id="theme" rel="stylesheet">
    <script src="jquery.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<div id="page-loader" style="display:none;">
        <div class="loader-img">

        </div><!-- loader-img -->
    </div>
<body style="background-color: #f89b5c;">
    <div class="row" style="margin: 0px;">
        <div class="col-md-12 col-12 align-self-center formLogin" style="padding: 0px;">
            <div class="col-lg-6 col-md-12 col-12 align-self-center max490" style="padding: 0px; margin-bottom: 0px; float:left;">
                <a href="../">
                    <img src="../assets/images/background/orangemate.png" width="100%" class="imageForm" style="margin-bottom: 0px; border-radius: 20px 0px 0px 20px;">
                </a>
            </div>
            <div class="formCol col-lg-6  col-md-12 col-12 align-self-center">
                <form class="form-horizontal form-material row rowpaddingless pb-5 pt-3" action="controller/register-reffmate-full.php" method="post" enctype="multipart/form-data" id="">
                    <!--<div class="form-group row rowpaddingless">
                        <div class="col-md-12">
                            <hr style="width: 100%; height: 2px; background-color: #ff7101; color: #ff7101;">
                        </div>
                    </div>
                    <h3 class="col-md-12">Update Data Profil</h3>-->
                    <h2 style=" text-align:left;padding: 0px 10px 40px;">REGISTER ORANGE MATE</h2>
                    <?php 
                        if(isset($_GET['stat'])){
                            ?>
                                <div class="col-12 bg-success p-3 text-center text-white mb-5">
                                    <?php 
                                        echo urldecode($_GET['stat']);
                                    ?>
                                </div>
                            <?php
                        }
                        if(isset($_GET['err'])){
                            ?>
                                <div class="col-12 bg-danger p-3 text-center text-white mb-5">
                                    <?php 
                                        echo urldecode($_GET['err']);
                                    ?>
                                </div>
                            <?php
                        }
                    ?>  
                    <?php 
                        if(isset($_GET['data'])) 
                        echo "<h5 style='color:white; text-align:left;padding: 0px 10px;'>".$statusPhoneMail."</h5>";
                    ?>
                    <div class="reffmate">
                            <div class="form-group dtl">
                                <label class="col-md-12">Nama Lengkap</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="" class="form-control form-control-line" value="" name="vldnm" id="vldnm" required>
                                </div>
                            </div>
                            <div class="form-group dtl">
                                <label class="col-md-12">Alamat Email</label>
                                <div class="col-md-12">
                                    <input type="email" placeholder="" class="form-control form-control-line" value="" name="hanwhaemail" id="hanwhaemail" required>
                                </div>
                            </div>
                            <div class="form-group dtl">
                                <label class="col-md-12">No. Telp</label>
                                <div class="col-md-12">
                                    <input type="tel" placeholder="" class="form-control form-control-line" value="" name="hanwhaphone" id="hanwhaphone" required>
                                </div>
                            </div>
                            <div class="form-group dtl">
                                <label class="col-md-12">Nomor Bank/e-Wallet</label>
                                <div class="col-md-12">
                                    <input type="tel" placeholder="" class="form-control form-control-line" value="" name="bankAccount" id="bankAccount" required>
                                </div>
                            </div>
                            <div class="form-group dtl">
                                <label class="col-md-12">Nama Bank/e-Wallet</label>
                                <div class="col-md-12">
                                    <select name="bankCode" style="" required>
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
                            <div class="form-group dtl">
                                <button type="submit" class="btn btn-success" name="register-reffmate" id="">Daftar Hanwha Orange Mate</label>
                            </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    $(function() {
         // Get the form.
         var form = $('#formlogin');

         // Get the messages div.
         var formMessages = $('#form-messages');
        console.log(formMessages);

         // TODO: The rest of the code will go here...
        
         $(form).submit(function(event) {
             // Stop the browser from submitting the form.
             event.preventDefault();
             // TODO
             // Serialize the form data.
             $("#page-loader").css("display", "block");
             var formData = $(form).serialize();
             $.ajax({
                 type: 'POST',
                 method: 'POST',
                 url: "../controller/signup-proc.php",
                 data: form.serialize(),
                 success: function(dataSum) {
                        // data is ur summary
                       $('.scriptloader').html(dataSum);
                        $("#page-loader").css("display", "none");
                  }
             })
         });
                    
     });
</script>