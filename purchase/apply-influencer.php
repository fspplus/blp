<?php 
//header('Location: ../maintenance');
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
    include ('/var/www/html/jsonapp/json-hanwha-api.php'); writelog();
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
    <title>Nasabah Hanwha Insurance - Client Area</title>
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
    <link href="../css/custom.css?<?php echo date("h:i:sa"); ?>" rel="stylesheet">
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

            <img src="http://www.hanwhalife.co.id/design/images/preload-image.png" alt=""> 

        </div><!-- loader-img -->
    </div>
<body style="background-color: #f89b5c;">
    <div class="row" style="margin: 0px;">
        <div class="col-md-12 col-12 align-self-center formLogin" style="padding: 0px;">
            <div class="col-lg-6 col-md-12 col-12 align-self-center max490" style="padding: 0px; margin-bottom: 0px; float:left;">
                <img src="../assets/images/background/influencer-signup-img.jpg" width="100%" style="margin-bottom: 0px; border-radius: 20px 0px 0px 20px;">
            </div>
            <div class="formCol col-lg-6  col-md-12 col-12 align-self-center" style="margin-bottom: 0px;">
                <div class="switchEr"><a href="login" class="switchErBtn switchErActive">Sudah Punya Akun? Login Disini!</a></div>
                <div class="formProcss"><?php include 'register-influencer.php'; ?></div>
            </div>
        </div>
    </div>
</body>
<script>
    $(function() {
         // Get the form.
         var form = $('#formregisterinfluencer');

         // Get the messages div.
         var formMessages = $('#form-messages');

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
                 url: "./controller/register-influencerproc.php",
                 data: formData,
                 success: function(dataSum) {
                        // data is ur summary
                       $('.formCol').html(dataSum);
                        $("#page-loader").css("display", "none");
                  }
             })
         });
                    
     });
</script>