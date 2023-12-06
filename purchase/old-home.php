<?php $urlmeta = "Home"; $urldesc = "Hanwha life indonesia menyediakan asuransi jiwa, investasi dan asuransi kesehatan terbaik di Indonesia yang menawarkan berbagai keunggulan untuk Anda"; include 'header.php';

?>
    <style type="text/css">
        .container-fluid{padding: 0}
    </style>

<body>
    <div class="row page-titles homehtml">
        <div id="idxheader" class="col-md-12 col-12 align-self-center headerpage parallax2">
            <div class="row">
                <div class="col-lg-1 col-md-12 col-12"></div>
                <div class="col-lg-5 col-md-4 col-12 align-self-center animated fadeInLeft delay-2s">
                    <img class="headimg" src="../assets/images/hanwhauserasset/Hanwhalife-bucketlist-slider-place.png" style="width: 100%">
                </div>
                <div class="col-lg-6 col-md-8 col-12 align-self-center" style="margin-bottom: 20px">
                    
                    <?php if(true){?><h1>
                        Wujudkan Liburanmu <br>bersama <br><span style="color: #ff7101; font-weight: 800;">HANWHA BUCKET LIST PLAN</span>
                    </h1><br>
                    <?php } ?>
                    <a href="/productpage?plan=1" id="btnBuy">CARI TAU YUK!</a><br class="displayMobile"><br class="displayMobile"><?php if(false){ ?><a href="../assets/itin/Bucket List_Brochure_Web.pdf" target="_blank" id="btnBuy" style="margin-left: 10px;">DOWNLOAD BROCHURE</a><?php }  ?>
                    <div class="row noPads displayDesktop" style="margin: 30px 0px; padding: 0px !important;">
                        <h2 class="col-12" style="margin: 5px 0px !important;">Kenapa sih harus punya</h2>
                        <h1 class="col-12" style="margin: 5px 0px !important;">Hanwha Bucket List plan?</h1>
                        <div class="col-lg-2 col-md-2 col-12 align-self-center">
                            <img src="../assets/images/hanwhauserasset/Hanwhalife-bucketlist-hanwha-earnings.png" width="65%">
                        </div>
                        <div class="col-lg-10 col-md-10 col-12 align-self-center">
                            <h4 style="color: #ff7101;">Bisa dapat lebih</h4>
                            <h4>Dari akumulasi dana kamu</h4>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12 align-self-center">
                            <img src="../assets/images/hanwhauserasset/Hanwhalife-bucketlist-hanwha-overturned-car.png" width="65%">
                        </div>
                        <div class="col-lg-10 col-md-10 col-12 align-self-center">
                            <h4 style="color: #ff7101;">Proteksi Asuransi Jiwa Kecelakaan</h4>
                            <h4>Hingga 100 jt Rupiah</h4>
                        </div>
                        <?php if(false){ ?>
                        <div class="col-lg-2 col-md-2 col-12 align-self-center">
                            <img src="../assets/images/hanwhauserasset/Hanwhalife-bucketlist-hanwha-tag.png" width="65%">
                        </div>
                        <div class="col-lg-10 col-md-10 col-12 align-self-center">
                            <h4 style="color: #ff7101;">Spesial Benefit di Korea & Potongan Belanja</h4>
                            <h4>di Duty Free hingga 20%</h4>
                        </div><?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-12 col-lg-12 align-self-center displayMobile" style="margin: 30px 0px;">
            <div class="row">
                        <h2 class="col-12" style="margin: 5px 0px !important;">Kenapa sih harus punya</h2>
                        <h1 class="col-12" style="margin: 5px 0px 10px 0px !important;">Hanwha Bucket List plan?</h1>
                        <div class="col-lg-2 col-md-2 col-4 align-self-center">
                            <img src="../assets/images/hanwhauserasset/Hanwhalife-bucketlist-hanwha-earnings.png" width="65%">
                        </div>
                        <div class="col-lg-10 col-md-10 col-8 align-self-center">
                            <h4 style="color: #ff7101;">Bisa dapat lebih</h4>
                            <h4>Dari akumulasi dana kamu</h4>
                        </div>
                        <div class="col-lg-2 col-md-2 col-4 align-self-center">
                            <img src="../assets/images/hanwhauserasset/Hanwhalife-bucketlist-hanwha-overturned-car.png" width="65%">
                        </div>
                        <div class="col-lg-10 col-md-10 col-8 align-self-center">
                            <h4 style="color: #ff7101;">Proteksi Asuransi Jiwa Kecelakaan</h4>
                            <h4>Hingga 100 jt Rupiah</h4>
                        </div>
                        <?php if(false){ ?>
                        <div class="col-lg-2 col-md-2 col-4 align-self-center">
                            <img src="../assets/images/hanwhauserasset/Hanwhalife-bucketlist-hanwha-tag.png" width="65%">
                        </div>
                        <div class="col-lg-10 col-md-10 col-8 align-self-center">
                            <h4 style="color: #ff7101;">Spesial Benefit di Korea & Potongan Belanja</h4>
                            <h4>di Duty Free hingga 20%</h4>
                        </div>
                        <?php } ?>
            </div>
        </div>
        <div id="pilihpaket" class="col-md-12 col-12 align-self-center" style="padding-top: 20px;">
            <h1 style="text-align: center; margin: 60px 0px 30px;">
                IDE LIBURAN SERU ALA<p id="spasi"><br></p>
                <span style="color: #ff7101; font-weight: bold;">#HanwhaBucketList</span>
            </h1>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 align-self-center" style="margin-left: -18px">
                    <div class="menuList">
                        <ul class="ul-menuList">
                            <li class=""><a href="#!" onclick="openTab(event, 'spring')" class="tablinks active">Spring</a></li>
                            <li class=""><a href="#!" onclick="openTab(event, 'summer')" class="tablinks">Summer</a></li>
                            <li class=""><a href="#!" onclick="openTab(event, 'autumn')" class="tablinks">Autumn</a></li>
                            <li class=""><a href="#!" onclick="openTab(event, 'winter')" class="tablinks">Winter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="spring block row default" id="spring">
                    <div class="col-lg-4 col-md-12 col-12 align-self-center">
                        <img src="../assets/images/hanwhauserasset/seasons/spring/Hanwhalife-bucketlist-spring-1.jpg" style="width: 100%; margin-bottom: 30px">
                    </div>
                    <div class="col-lg-4 col-md-12 col-12 align-self-center">
                        <img src="../assets/images/hanwhauserasset/seasons/spring/Hanwhalife-bucketlist-spring-2.jpg" style="width: 100%; margin-bottom: 30px">
                    </div>
                    <div class="col-lg-4 col-md-12 col-12 align-self-center">
                        <img src="../assets/images/hanwhauserasset/seasons/spring/Hanwhalife-bucketlist-spring-3.jpg" style="width: 100%; margin-bottom: 30px">
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 align-self-center align-center-btnviewour">
                        <a href="../assets/itin/Itinerary-hanwha-spring-compressed.pdf" class="btn2" target="_blank">View our list!</a>
                    </div>
                </div>
                <div class="summer block row" id="summer">
                    <div class="col-lg-4 col-md-12 col-12 align-self-center">
                        <img src="../assets/images/hanwhauserasset/seasons/summer/Hanwhalife-bucketlist-summer-1.jpg" style="width: 100%; margin-bottom: 30px">
                    </div>
                    <div class="col-lg-4 col-md-12 col-12 align-self-center">
                        <img src="../assets/images/hanwhauserasset/seasons/summer/Hanwhalife-bucketlist-summer-2.jpg" style="width: 100%; margin-bottom: 30px">
                    </div>
                    <div class="col-lg-4 col-md-12 col-12 align-self-center">
                        <img src="../assets/images/hanwhauserasset/seasons/summer/Hanwhalife-bucketlist-summer-3.jpg" style="width: 100%; margin-bottom: 30px">
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 align-self-center align-center-btnviewour">
                        <a href="../assets/itin/Itinerary-hanwha-summer-compressed.pdf" class="btn2" target="_blank">View our list!</a>
                    </div>
                </div>
                <div class="autumn block row" id="autumn">
                    <div class="col-lg-4 col-md-12 col-12 align-self-center">
                        <img src="../assets/images/hanwhauserasset/seasons/autumn/Hanwhalife-bucketlist-autumn-1.jpg" style="width: 100%; margin-bottom: 30px">
                    </div>
                    <div class="col-lg-4 col-md-12 col-12 align-self-center">
                        <img src="../assets/images/hanwhauserasset/seasons/autumn/Hanwhalife-bucketlist-autumn-2.jpg" style="width: 100%; margin-bottom: 30px">
                    </div>
                    <div class="col-lg-4 col-md-12 col-12 align-self-center">
                        <img src="../assets/images/hanwhauserasset/seasons/autumn/Hanwhalife-bucketlist-autumn-3.jpg" style="width: 100%; margin-bottom: 30px">
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 align-self-center align-center-btnviewour">
                        <a href="../assets/itin/Itinerary-hanwha-autumn-compressed.pdf" class="btn2" target="_blank">View our list!</a>
                    </div>
                </div>
                <div class="winter block row" id="winter">
                    <div class="col-lg-4 col-md-12 col-12 align-self-center">
                        <img src="../assets/images/hanwhauserasset/seasons/winter/Hanwhalife-bucketlist-winter-1.jpg" style="width: 100%; margin-bottom: 30px">
                    </div>
                    <div class="col-lg-4 col-md-12 col-12 align-self-center">
                        <img src="../assets/images/hanwhauserasset/seasons/winter/Hanwhalife-bucketlist-winter-2.jpg" style="width: 100%; margin-bottom: 30px">
                    </div>
                    <div class="col-lg-4 col-md-12 col-12 align-self-center">
                        <img src="../assets/images/hanwhauserasset/seasons/winter/Hanwhalife-bucketlist-winter-3.jpg" style="width: 100%; margin-bottom: 30px">
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 align-self-center align-center-btnviewour">
                        <a href="../assets/itin/Itinerary-hanwha-winter-compressed.pdf" class="btn2" target="_blank">View our list!</a>
                    </div>
                </div>
            </div>
            <h1 style="text-align: center; margin: 50px 0px 30px;">
                TERTARIK?<p id="spasi"><br></p>
                <span style="color: #ff7101; font-weight: bold;">YUK RENCANAKAN!</span>
            </h1>
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-6 col-md-12"></div>
            </div>
            <div class="row slcplan">
                <!-- Column -->
                <div class="col-lg-6 col-md-12 noPads">
                    <a href="productpage?plan=1"><img src="../assets/images/hanwhauserasset/Hanwhalife-bucketlist-plan-A.jpg" style="width: 100%;"></a>
                </div>
                <div class="col-lg-6 col-md-12 planB">
                    <a href="productpage?plan=4"><img src="../assets/images/hanwhauserasset/Hanwhalife-bucketlist-plan-B.jpg" style="width: 100%;"></a>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
    </div>
        <div class="row page-titles homehtml" style=" padding-bottom: 0; margin-bottom: 0px !important;">
            <div class="col-md-12 col-12 align-self-center headerpage parallax3">
                <div class="row">
                    <div class="col-md-12 col-12 align-self-center" style="margin: 10% 0%; padding: 0% 10%">
                        <h1 class="joinIndex">
                            Gabung sekarang dan dapatkan manfaat menarik dari Hanwha
                        </h1>
                        <div style="text-align: center; margin-top: 2%">
                            <a href="form" id="btnBuy" style="font-size: 20px; width: 200px;">#KoreaVersiKamu</a>
                        </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
</body>
        <?php include 'footer.php'; ?>
</html>
