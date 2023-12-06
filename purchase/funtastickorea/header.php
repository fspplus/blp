<?php
//header('Location: ../maintenance');
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
    session_set_cookie_params(0);
ob_start();
include '/var/www/html/connectdb.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('session.gc_maxlifetime', 144000000000);
date_default_timezone_set('Asia/Jakarta');
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" sizes="16x16" href="../assets/images/favicon.png?v=2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <title>Hanwha Life Indonesia - Bucket List Plan</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style.css?<?php echo rand(); ?>" rel="stylesheet">
    <link href="../css/custom.css?<?php echo date("h:i:sa"); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/styleform.css">
    <link href="../css/colors/orange.css" id="theme" rel="stylesheet">
    <script type="text/javascript" src="../js/form.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/parallax/parallax.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="../resources/demos/style.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script>
      $( function() {
        $( "#datepicker" ).datepicker({
          changeMonth: true,
          changeYear: true
        });
      } );
      </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    
  <link rel="stylesheet" type="text/css" href="../css/styleform.css?id=<?php echo rand(); ?>">
  <script src="../js/form.js?d=<?php echo rand(); ?>"></script>
    <div id="page-loader" style="display:none;">
        <div class="loader-img">

            <img src="http://www.hanwhalife.co.id/design/images/preload-image.png" alt=""> 

        </div><!-- loader-img -->
    </div>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!--Header || ALSO FUNCTION-->
    <?php include ('/var/www/html/jsonapp/json-hanwha-api.php'); writelog();
        $browser = getbrowser();
        //$browser['name'] = 'Others';
        ?><!--<script>alert('Mohon maaf, tetapi browser anda tidak mendukung aplikasi kami. Silahkan gunakan salah satu dari browser modern seperti Google Chrome, Mozilla Firefox, atau Safari. Terimakasih atas pengertiannya. Browser anda: <?php echo $browser['name']; ?>')</script>--><?php
        if( false/*$browser['name'] == 'Others' || $browser['name'] == 'IE'*/){
            ?><script>alert('Mohon maaf, tetapi browser anda tidak mendukung aplikasi kami. Silahkan gunakan salah satu dari browser modern seperti Google Chrome, Mozilla Firefox, atau Safari. Terimakasih atas pengertiannya. Browser anda: <?php echo $browser['name']; ?>')</script>
            <div id="page-loader" style="display:block;">
                <div class="" style="position: absolute;top: 50%;left: 25%;right: 25%;margin: -40px 0 0 -40px;text-align: center;">

                    <div style="padding: 15px; background-color: white;">
                        Mohon maaf, tetapi browser anda tidak mendukung aplikasi kami. Silahkan gunakan salah satu dari browser modern seperti Google Chrome, Mozilla Firefox, atau Safari. Terimakasih atas pengertiannya.
                    </div> 

                </div><!-- loader-img -->
            </div>
            <?php
        }
    ?>
  <div class="header" style="padding-top: 0px !important;padding-bottom: 0px !important;">
    <div class="desktopMenu">
        <a href="../"><div id="logo" style="float: left; height: inherit;"><img src="../assets/images/hanwha-logo.png" class="logoImg" height="100px"></div></a>
        <div class="menu" id="idmenu">
          <ul class="menuListHeader" style="padding-top: 10px; padding-bottom: 10px;">
            <li id="menu3" class="listMenuLists main">
                <i class="fas fa-bars" style="color: white; font-size: 24px; cursor: pointer;" onclick="showmenu()"></i>
            </li>
            <li id="menu1" class="listMenuLists main"><a href="#!" id="btnBuy">#KoreaVersiKamu</a>
                <ul class="menuListSub">
                    <li class="listMenuLists sub"><a href="form">Yuk! Beli Disini!</a></li>
                        <?php if(!isset($_SESSION['email']) || $_SESSION['email'] == NULL){
                                ?><li class="listMenuLists sub"><a href="login">Sudah Bergabung? Klik Disini</a>
                    </li>
                    <li class="listMenuLists sub"><a href="../apply-influencer">Dapatkan lebih!</a>
                    </li><?php
                        }else if(isset($_SESSION['email']) && $_SESSION['email'] != NULL){
                    ?>
                        <li class="listMenuLists sub"><a href="profile">My Profile</a></li>
                        <li class="listMenuLists sub"><a href="#!" id="lgt">Logout</a></li>
                    <?php
                        } ?>
                </ul>  
            </li>
            <li id="menu2" class="listMenuLists main">
                <a href="#pilihpaket"><b>Produk Kami</b></a>
                <ul class="menuListSub">
                    <li class="listMenuLists sub">
                        <a href="../productpage?plan=1">Fitur Plan A</a>
                    </li>
                    <li class="listMenuLists sub">
                        <a href="../productpage?plan=4">Fitur Plan B</a>
                    </li>
                </ul>
            </li>
              <li class="listMenuLists main" id="menu4">
                <a href="http://hanwhalife.co.id">Hanwhalife Insurance</a>
              </li>
          </ul>
        </div>
    </div>
    <div id="mobile" class="mobileMenu fadeInRight fadeOutRight">
        <div class="menu" id="idmenu2" style="margin: auto;">
          <ul class="menuListHeader">
            <i id="close" class="fas fa-times" onclick="hidemenu()"></i>
              <li class="listMenuLists main" id="menu4" style="width: 200px; margin-right: 35px; padding: 15px">
                <a href="../">Hanwhalife Insurance</a>
              </li>
            <li class="listMenuLists main" style="width: 200px; margin-right: 35px; padding: 15px">
                <a href="#pilihpaket"><b>Produk Kami</b></a>
                <ul class="menuListSubMobile" style="">
                    <li class="listMenuListsSubMobile sub">
                        <a href="../productpage?plan=1">Fitur Plan A</a>
                    </li>
                    <li class="listMenuListsSubMobile sub">
                        <a href="../productpage?plan=4">Fitur Plan B</a>
                    </li>
                </ul>
            </li>
            <li class="listMenuLists main" style=" margin-right: 20px; padding: 10px; border-radius: 20px;">
                <a href="form" id="btnBuy">#KoreaVersiKamu</a>
                <ul class="menuListSubMobile" style="right: 30px;top: 325px;">
                    <li class="listMenuLists sub"><a href="form">Yuk! Beli Disini!</a></li>
                        <?php if(!isset($_SESSION['email']) || $_SESSION['email'] == NULL){
                                ?><li class="listMenuListsSubMobile sub"><a href="login">Sudah Bergabung? Klik Disini</a>
                    </li>
                    <li class="listMenuListsSubMobile sub"><a href="../apply-influencer">Dapatkan lebih!</a>
                    <?php
                        }else if(isset($_SESSION['email']) && $_SESSION['email'] != NULL){
                    ?>
                        <li class="listMenuListsSubMobile sub"><a href="profile">My Profile</a></li>
                        <li class="listMenuListsSubMobile sub"><a href="./controller/logout-proc-m.php" id="lgt">Logout</a></li>
                    <?php
                        } ?>
                </ul>    
            </li>
          </ul>
        </div>
    </div>
          
    </div>
</body>
