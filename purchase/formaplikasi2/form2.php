<?php
    include '../jsonapp/json-hanwha-api.php'; writelog();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(isset($_GET['setplan']) && $_GET['setplan'] != NULL){
    
    $plantext = $_GET['setplan'];
    if($plantext == 'pla'){
        $min = 0;
        $max = 2;
        $plan = "A";
    }else if($plantext == 'plb'){
        $min = 3;
        $max = 5;
        $plan = "B";
    }
    
    //cURL Passing to Hanwha API

    $curl = curl_init();
    $key = keyapi();

    curl_setopt_array($curl, array(
      CURLOPT_PORT => "8080",
      CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/product/collect?skip=0&max=10",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_HTTPHEADER => array(
        "accept: application/json",
        "content-type: application/json",
        $key
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
        $data = json_decode($response, true);
        $res = json_decode($data['data'],true);
        /*print_r($res);
        echo '<br><br>'.$res[0]['productName'].'Tenor: '.$res[0]['tenor'].'<br><strong>'.$res[0]['fixedPremiumAmount'].'</strong><br><br>';
        echo $res[1]['productName'].'Tenor: '.$res[1]['tenor'].'<br><strong>'.$res[1]['fixedPremiumAmount'].'</strong><br><br>';
        echo $res[2]['productName'].'Tenor: '.$res[2]['tenor'].'<br><strong>'.$res[2]['fixedPremiumAmount'].'</strong><br><br>';
        echo $res[3]['productName'].'Tenor: '.$res[3]['tenor'].'<br><strong>'.$res[3]['fixedPremiumAmount'].'</strong><br><br>';
        echo $res[4]['productName'].'Tenor: '.$res[4]['tenor'].'<br><strong>'.$res[4]['fixedPremiumAmount'].'</strong><br><br>';
        echo $res[5]['productName'].'Tenor: '.$res[5]['tenor'].'<br><strong>'.$res[5]['fixedPremiumAmount'].'</strong>';*/
    }
    
    ?>
        <html>
            
            <body>
                <!--Content Start-->
              <div id="form2" class="container containerform animated fadeInRight" style="padding: 5% 0">
                <div class="row">
                  <div class="col-md-12 col-12 align-self-center">
                    <div class="step" style="margin-bottom: 2%">
                        <div class="row" style="padding: 0px !important; margin: 0px !important; display: -webkit-box;">
                            <div class="btn2 col-lg-2 col-md-2 col-2" onclick="back('frm1a')">&lt;</div>
                            <div class="col-lg-10 col-md-12 col-12 displayDesktop" src="../assets/images/form/steps/step-02.png" width="100%"><img src="../assets/images/form/steps/step-02.png" width="100%"></div>
                        </div>
                        <img src="../assets/images/form/steps/step-02.png" width="100%" class="displayMobile">
                        <h1 style="color: #ff7101; font-weight: bold;">MASA ASURANSI - PREMI BULANAN <?php //echo $plan; ?></h1>
                    </div>
                  </div>
                </div>

                <div class="row" style="margin-top: 30px">
                  <div class="col-lg-4 col-md-4 col-12 align-self-center">
                    <div class="premi" onclick="planselector('<?php echo $res[$min]['productId'] ?>','<?php echo $plantext; ?>')">
                        <h1>1</h1>
                        <h2>TAHUN</h2>
                        Rp. <?php echo number_format($res[$min]['fixedPremiumAmount'] , 0, ',', '.');   ?>/bulan 
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-12 align-self-center">
                    <div class="premi" onclick="planselector('<?php echo $res[$min+1]['productId'] ?>','<?php echo $plantext; ?>')">
                        <h1>2</h1>
                        <h2>TAHUN</h2>
                        Rp. <?php echo number_format($res[$min+1]['fixedPremiumAmount'] , 0, ',', '.');   ?>/bulan 
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-12 align-self-center">
                    <div class="premi" onclick="planselector('<?php echo $res[$max]['productId'] ?>','<?php echo $plantext; ?>')">
                        <h1>3</h1>
                        <h2>TAHUN</h2>
                        Rp. <?php echo number_format($res[$max]['fixedPremiumAmount'] , 0, ',', '.');   ?>/bulan 
                    </div>
                  </div>
                </div>
              </div>
              <!--Content End-->
            </body>
        </html>
    <?php
}else{
    echo "<script>alert('NOT ALLOWED!');window.location.replace('form');</script>";
}
?>