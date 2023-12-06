<?php
//header('Location: ../maintenance');
session_start();
ob_start();
header("HTTP/1.0 404 Not Found");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
    session_set_cookie_params(0);
include '/var/www/html/connectdb.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
//ini_set('session.gc_maxlifetime', 144000000000);
date_default_timezone_set('Asia/Jakarta');

if(!isset($urlmeta)){
    $urlmeta = "Wujudkan mimpi ke Korea kamu dengan Hanwha Life Insurance Indonesia";
}

if(isset($_GET['ref'])){
    $_SESSION['referralActive']['code'] = $_GET['ref'];
}

if(isset($_GET['get'])){
    if($_GET['get'] == "hanwhasmart"){
        $_SESSION['appsrc'] = "hanwhasmart";
    }
}
?>

<head>
    <title>Bucketlistplan by Hanwha Life | <?php echo $urlmeta; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- PIKADAY -->
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    	    <!-- chartist CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <!--<link href="/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <!-- Favicon icon -->
    <link rel="icon" sizes="16x16" href="/assets/images/favicon.png?v=2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <!-- Bootstrap Core CSS -->
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--This page css - C3 CSS -->
    <link href="/assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/css/style.css?<?php echo rand(); ?>" rel="stylesheet">
    <link href="/css/styler-new.css?<?php echo date("h:i:sa"); ?>" rel="stylesheet">
    <link href="/css/custom.css?<?php echo date("h:i:sa"); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/styleform.css">
    <link href="/css/colors/orange.css" id="theme" rel="stylesheet">
	<link href="/css/new-dev.css" rel="stylesheet">
    <script type="text/javascript" src="/js/form.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/parallax/parallax.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/parallax/parallax.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<script src="../js/form.js?d=<?php echo rand(); ?>"></script>
	<div id="page-loader" style="display:none;">
        <div class="loader-img">
	</div><!-- loader-img -->
    </div>
    <!-- GSIGNIN -->
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="717604991361-gdncv3f6blgba400grpmtf0ndk1jvjcb.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="/js/new-dev.js" async defer></script>
    <style>
        <?php
        if(isset($_SESSION['appsrc'])){
            if($_SESSION['appsrc'] == "hanwhasmart"){
                echo ".header{display: none !important;}";
            }
        }
        ?>
    </style>
</head>

<body id="header2" class="fix-header fix-sidebar card-no-border">
    <?php

    include 'controller/session-info.php';

        $query_p = "
            SELECT * FROM popup_table
            WHERE popup_status LIKE 'active'
            ORDER BY RAND()
        ";
        $result_p = mysqli_query($conn, $query_p);
        $row_p = mysqli_fetch_array($result_p);

        $today = date('Y-m-d');
        $startdate = date('Y-m-d', strtotime($row_p['start_date']));
        $enddate = date('Y-m-d', strtotime($row_p['end_date']));

        if ($today > $startdate && $today < $enddate) {
            ?>
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close"><i class="fa fa-close"></i></span>
                    <a href="<?php echo $row_p['popup_title']; ?>" target="_blank"><img class="modal-img" src="<?php echo $row_p['popup_img']; ?>"></a>
                </div>
            </div>
            <?php
        }
    ?>

    <!--Header || ALSO FUNCTION-->
    <?php include ('/var/www/html/jsonapp/json-hanwha-api.php'); writelog();
        $browser = getbrowser();
        //$browser['name'] = 'Others';
	?><!--<script>alert('Mohon maaf, tetapi browser anda tidak mendukung aplikasi kami. Silahkan gunakan salah satu dari browser modern seperti Google Chrome, Mozilla Firefox, atau Safari. Terimakasih atas pengertiannya. Browser anda: <?php echo $browser['name']; ?>')</script>-->
	<?php
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
		<a id="button-to-top"></a>
		<a class="wa-chat" href="https://wa.me/6281113906463?text=Hai,%20saya%20mau%20tau%20lebih%20banyak%20tentang%20bucketlist%20plan%20" target="_blank" rel="nofollow noopener noreferrer">
			<div class="wa-image-container">
				<img class="wa-image" src="https://www.tiket.com/home-ms/assets/4a376104.svg" alt="whatsapp-tiket">
			</div><span class="wa-text">Whatsapp</span>
		</a>
		<div class="desktopMenu">
        	<a href="../"><div id="logo" style="float: left; height: inherit;"><img src="../assets/images/Hanwhalife-bucketlist-hanwha-logo.png" class="logoImg" height="100px"></div></a>
        	<div class="menu" id="idmenu">
        		<ul class="menuListHeader" style="padding-top: 10px; padding-bottom: 10px;">
            		<li id="menu3" class="listMenuLists main">
                		<i class="fas fa-bars" style="color: white; font-size: 24px; cursor: pointer;" onclick="showmenu()"></i>
            		</li>
              	<?php if(isset($_SESSION['email'])){
              		$firstname = explode(' ',trim($_SESSION['fullname']));
              		$background_colors = array('#C62828', '#EF6C00', '#2E7D32', '#0277BD', '#6A1B9A');
					$rand_background = $background_colors[array_rand($background_colors)];
              	?>
		            <li id="menupro" class="listMenuLists main"><a href="profile">
		            	<p class="listMenuLists" style="float: left; padding: 10px 0"><?php echo $firstname[0]; ?></p>
		                <div style="background-color: <?php echo $rand_background; ?>"><?php echo substr($firstname[0], 0, 1) ?></div>
		                <ul class="menuListSub" style="right: -10%; margin-top: 5%">
                            <li class="listMenuLists sub"><a href="profile">My Profile</a></li>
		                	<li class="listMenuLists sub"><a href="faq">FAQ</a></li>
		                    <li class="listMenuLists sub"><a href="#!" id="lgt">Log Out</a></li>
		                </ul></a>
		            </li>
				<?php }else{
                        ?>
                        <li id="menuproLog" class="listMenuLists main" style="padding-left: 0px; padding-right: 0px;"><a href="#login" class="btnBuyInvert"><i class="fa fa-user"></i>Login/Register</a>
                            <ul class="menuListSub" style="width: 500px;">
                    		<?php include "views/view-loginregister.php"; ?>
                		</ul>
                    </li>
                <?php
                } ?>
            		<li id="menu1" class="listMenuLists main"><a href="../../productpage?scroll=purchase" id="btnBuy">Yuk! Beli Disini!</a>
            		</li>
                    <li id="menu2" class="listMenuLists main"><a href="promo">Promo &amp; Partner</a></li>
                    <li id="menu2" class="listMenuLists main"><a href="faq-koreaversikamu">FAQ</a></li>
            		<li id="menu2" class="listMenuLists main">
                		<a href="productpage"><b>Produk Kami</b></a>
            		</li>
        		</ul>
        	</div>
    	</div>

    	<div id="mobile" class="mobileMenu fadeInRight fadeOutRight hide">
        	<div class="menu" id="idmenu2" style="margin: auto;">
        		<ul class="menuListHeader">
            		<i id="close" class="fas fa-times" onclick="hidemenu()"></i>
            		<?php if(isset($_SESSION['email'])){;?>
            			<li id="menupro" class="listMenuLists main"><a href="profile">
	                		<!-- <img src="../assets/images/users/tesfoto.jpg" style="margin-left: 15px"> -->
	                		<div style="background-color: <?php echo $rand_background; ?>"><?php echo substr($firstname[0], 0, 1) ?></div>
	                		<ul class="menuListSubMobile" style="right: -10%; margin-top: 5%">
	                			<li class="listMenuListsSubMobile sub"><?php echo $firstname[0]; ?></li>
                                <li class="listMenuListsSubMobile sub" onclick="location.href='./controller/logout-proc-m.php';" style="padding: 8px 0px !important;"><a href="./controller/logout-proc-m.php" id="lgt" class="btnBuyInvert btnBuyInvertMobile" style="padding: 10px !important;"><i class="fa fa-sign-out"></i>Logout</a></li>
	                		</ul></a>
            			</li>
              		<?php }else{
                    ?>

                    <li class="listMenuLists main" id="menu6" style="width: 200px; margin-right: 35px; padding: 15px;">
                        <div style="color: #ff7101; line-height: 48px;">Sudah punya akun?<a href="../otp-login" class="btnBuyInvert btnBuyInvertMobile" style="width: 100%; font-weight: 800 !important;"><i class="fa fa-user"></i>LOGIN DISINI</a></div>
                    </li>
                    <?php
                    } ?>

		            <li id="mmenu2" class="listMenuLists main" style="width: 200px; margin-right: 35px; padding: 15px">
		                <a href="productpage"><b><span>Produk Kami</span></b></a>
		            </li>

                    <li class="listMenuLists main" id="menu4" style="width: 200px; margin-right: 35px; padding: 15px"><a href="promo">Promo &amp; Partner</a></li>
                    <li class="listMenuLists main" id="menu4" style="width: 200px; margin-right: 35px; padding: 15px"><a href="faq-koreaversikamu">FAQ</a></li>
            		<li onclick="location.href='form';" class="listMenuLists main" id="menu4" style="width: 200px; margin-right: 35px; padding: 15px">
                		<a href="../../productpage?scroll=purchase" id="btnBuy" class="btnBuyInvertMobile">Yuk! Beli Disini!</a>
              		</li>
		            <?php if(false){ ?><li class="listMenuLists main" style=" margin-right: 20px; padding: 10px; border-radius: 20px;">
		                <a href="form" id="btnBuy" style="margin-left: 10px">Yuk! Beli Disini!</a>
		                <ul class="menuListSubMobile" style="right: 30px;top: 325px;">
		                    <?php if(!isset($_SESSION['email'])){
		                    ?><li class="listMenuListsSubMobile sub" onclick="location.href='otp-login';"><a href="otp-login">Sudah Bergabung? Klik Disini</a></li>
		                    <li class="listMenuListsSubMobile sub" onclick="location.href='apply-influencer';"><a href="apply-influencer">Dapatkan lebih!</a></li>
		                    <li class="listMenuListsSubMobile sub" style="padding-left: 10px" onclick="location.href='faq';"><a href="faq">FAQ</a></li>
		                </ul>
		            </li><?php } ?>

		            <?php
		            	}else if(isset($_SESSION['email']) && $_SESSION['email'] != NULL){/*
		            ?>
                        <li class="listMenuLists main" style="width: 200px; padding-left: 10px" onclick="location.href='profile';"><a href="profile">My Profile</a></li>
		            	<li class="listMenuLists main" style="width: 200px; padding-left: 10px" onclick="location.href='faq';"><a href="faq">FAQ</a></li>
		            	<li class="listMenuLists main" style="width: 200px; padding-left: 10px" onclick="location.href='./controller/logout-proc-m.php';"><a href="./controller/logout-proc-m.php" id="lgt">Logout</a></li>
		            	<?php */
		            } ?>
				</ul>
			</div>
		</div>
	</div>
</body>
