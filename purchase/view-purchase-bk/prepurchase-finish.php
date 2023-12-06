<?php 
    include 'connectdb.php';

$curl = curl_init();

$dataplan = searchPlan($_SESSION['product']['plan']);

$purchasedate = date("YmdHis");

//print_r($_SESSION);
if(!isset($_SESSION['newPurchaseExist'] )){
    
    $counter = 0;
    $beneficiary_list = "";
    while($counter < $_SESSION['dataForm1']['hanwhaTtlBenef']){
        $counter += 1;
        $benefDOB = str_replace("-","", $_SESSION['dataForm1']['hanwhadob'.$counter]);
        if($counter == 1){
            $beneficiary_list .= "{\n\"seqNo\": \"".$counter."\",\n\"mobileNo\": \"".$_SESSION['dataForm1']['telpAhliWaris'.$counter]."\",\n\"name\": \"".$_SESSION['dataForm1']['namaAhliWaris'.$counter]."\",\n\"famrel\": ".$_SESSION['dataForm1']['hubunganAhliWaris'.$counter].",\n\"gender\": \"".$_SESSION['dataForm1']['genderAhliWaris'.$counter]."\",\n\"birthDate\": \"".$benefDOB."\",\n\"percentage\": ".$_SESSION['dataForm1']['persentaseAhliWaris'.$counter].",\n\"email\": \"".$_SESSION['dataForm1']['emailAhliWaris'.$counter]."\"\n}";
        }else{
            $beneficiary_list .= ",{\n\"seqNo\": \"".$counter."\",\n\"mobileNo\": \"".$_SESSION['dataForm1']['telpAhliWaris'.$counter]."\",\n\"name\": \"".$_SESSION['dataForm1']['namaAhliWaris'.$counter]."\",\n\"famrel\": ".$_SESSION['dataForm1']['hubunganAhliWaris'.$counter].",\n\"gender\": \"".$_SESSION['dataForm1']['genderAhliWaris'.$counter]."\",\n\"birthDate\": \"".$benefDOB."\",\n\"percentage\": ".$_SESSION['dataForm1']['persentaseAhliWaris'.$counter].",\n\"email\": \"".$_SESSION['dataForm1']['emailAhliWaris'.$counter]."\"\n}";
        }
    }
    
    $dateDob = str_replace("-","", $_SESSION['dataForm1']['hanwhadob']);
    curl_setopt_array($curl, array(
      CURLOPT_PORT => "8080",
      CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/member/signup",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{\n\"personalData\": {\n\"fullName\": \"".$_SESSION['dataForm1']['hanwhaname']."\",\n    \"birthDate\": \"".$dateDob."\", \n\"birthPlace\": \"".$_SESSION['dataForm1']['hanwhapob1']."\",\n\"emailAddress\": \"".$_SESSION['dataForm1']['hanwhaemail']."\",\n\"mobilePhone\": \"".$_SESSION['dataForm1']['hanwhaphone']."\",\n\"homePhone\": \"".$_SESSION['dataForm1']['hanwhaHomephone']."\",\n\"lineAddress1\": \"".$_SESSION['dataForm1']['hanwhaKTPaddr1']."\",\n\"lineAddress2\": \"".$_SESSION['dataForm1']['hanwhaKTPaddr2']."\",\n\"cityAddress\": \"".$_SESSION['dataForm1']['hanwhaKTPcity2']."\",\n\"postalCode\": ".$_SESSION['dataForm1']['hanwhaKTPPostal'].",\n\"sameMailing\": \"".$_SESSION['dataForm1']['hanwhaSameMailing']."\",\n\"mailingLineAddress1\": \"".$_SESSION['dataForm1']['hanwhaMailaddr1']."\",\n\"mailingLineAddress2\": \"".$_SESSION['dataForm1']['hanwhaMailaddr2']."\",\n\"mailingCityAddress\": \"".$_SESSION['dataForm1']['hanwhaMailcity2']."\",\n\"mailingpostalCode\": ".$_SESSION['dataForm1']['hanwhaMailPostal'].",\n\"gender\": \"".$_SESSION['dataForm1']['hanwhagender']."\",\n\"jobType\": \"".$_SESSION['dataForm1']['hanwhawork']."\",\n\"identityType\": 1,\n\"identityNumber\": \"".$_SESSION['dataForm1']['hanwhanik']."\",\n\"incomeSource\": \"".$_SESSION['dataForm1']['hanwhasourceincome']."\",\n\"additionalProperties\": {\n\"jobDetail\": {\n\"uraianPekerjaan\": \"".$_SESSION['dataForm1']['hanwhaposition']."\",\n\"namaLembaga\": \"".$_SESSION['dataForm1']['hanwhacompanyname']."\",\n\t\t\t\t\"bidangUsaha\": \"".$_SESSION['dataForm1']['hanwhasector']." \"\n\t\t\t},\n\t\t\t\"maritalStatus\": \"".$_SESSION['dataForm1']['hanwhastatus']."\"\n\t\t}\n    },\n\n\"purchase\": {\n\"productId\": ".$dataplan['productId'].",\n\"referenceCode\": \"".$_SESSION['ropBank']['hanwhareferral']."\",\n\"productCode\": \"".$dataplan['productCode']."\",\n\"parentProductId\": ".$dataplan['productId'].",\n\"tenor\": ".$dataplan['tenor'].",\n\"paymentMethod\": \"".$dataplan['paymentMethod']."\",\n\"paymentType\": 2,\n\"up\": ".$dataplan['up'].",\n\"agrementDisclaimer\": 701,\n\"premium\": ".$dataplan['fixedPremiumAmount'].",\n\"autoDebet\": \"Y\",\n\"purchaseDate\": \"".$purchasedate."\",\n\"bankCode\": \"".$_SESSION['ropBank']['bankROP']."\",\n\"ropBankCode\": \"".$_SESSION['ropBank']['bankROP']."\",\n\"bankAccount\": \"".$_SESSION['ropBank']['ropAccNumber']."\",\n\"bankAccountName\": \"".$_SESSION['ropBank']['ropAccName']."\",\n\"additionalInfo\": {\n\"selfPurchaseFlag\": 1\n,\n\t\t\t\"dealsCode\": \"".$_SESSION['ropBank']['promoCode']."\"\n}\n},\n\"beneficiary\": [".$beneficiary_list."\n]\n}",
      CURLOPT_HTTPHEADER => array(
        "Accept: application/json",
        "Accept-Encoding: gzip, deflate",
        "Cache-Control: no-cache",
        "Connection: keep-alive",
        "Content-Type: application/json",
        "token: wSP+b1UNHLe6Q13RnVEiyWlDFuPqKR5Gl+rWovjh8Y9+wYV6i0zM+A2c14nvoFvH"
      ),
    ));


    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
        $write = "{\n\"personalData\": {\n\"fullName\": \"".$_SESSION['dataForm1']['hanwhaname']."\",\n    \"birthDate\": \"".$dateDob."\", \n\"birthPlace\": \"".$_SESSION['dataForm1']['hanwhapob1']."\",\n\"emailAddress\": \"".$_SESSION['dataForm1']['hanwhaemail']."\",\n\"mobilePhone\": \"".$_SESSION['dataForm1']['hanwhaphone']."\",\n\"homePhone\": \"".$_SESSION['dataForm1']['hanwhaHomephone']."\",\n\"lineAddress1\": \"".$_SESSION['dataForm1']['hanwhaKTPaddr1']."\",\n\"lineAddress2\": \"".$_SESSION['dataForm1']['hanwhaKTPaddr2']."\",\n\"cityAddress\": \"".$_SESSION['dataForm1']['hanwhaKTPcity2']."\",\n\"postalCode\": ".$_SESSION['dataForm1']['hanwhaKTPPostal'].",\n\"sameMailing\": \"".$_SESSION['dataForm1']['hanwhaSameMailing']."\",\n\"mailingLineAddress1\": \"".$_SESSION['dataForm1']['hanwhaMailaddr1']."\",\n\"mailingLineAddress2\": \"".$_SESSION['dataForm1']['hanwhaMailaddr2']."\",\n\"mailingCityAddress\": \"".$_SESSION['dataForm1']['hanwhaMailcity2']."\",\n\"mailingpostalCode\": ".$_SESSION['dataForm1']['hanwhaMailPostal'].",\n\"gender\": \"".$_SESSION['dataForm1']['hanwhagender']."\",\n\"jobType\": \"".$_SESSION['dataForm1']['hanwhawork']."\",\n\"identityType\": 1,\n\"identityNumber\": \"".$_SESSION['dataForm1']['hanwhanik']."\",\n\"incomeSource\": \"".$_SESSION['dataForm1']['hanwhasourceincome']."\",\n\"additionalProperties\": {\n\"jobDetail\": {\n\"uraianPekerjaan\": \"".$_SESSION['dataForm1']['hanwhaposition']."\",\n\"namaLembaga\": \"".$_SESSION['dataForm1']['hanwhacompanyname']."\",\n\t\t\t\t\"bidangUsaha\": \"".$_SESSION['dataForm1']['hanwhasector']." \"\n\t\t\t},\n\t\t\t\"dealsCode\": \"".$_SESSION['ropBank']['promoCode']."\",\n\t\t\t\"maritalStatus\": \"".$_SESSION['dataForm1']['hanwhastatus']."\"\n\t\t}\n    },\n\n\"purchase\": {\n\"productId\": ".$dataplan['productId'].",\n\"referenceCode\": \"".$_SESSION['ropBank']['hanwhareferral']."\",\n\"productCode\": \"".$dataplan['productCode']."\",\n\"parentProductId\": ".$dataplan['productId'].",\n\"tenor\": ".$dataplan['tenor'].",\n\"paymentMethod\": \"".$dataplan['paymentMethod']."\",\n\"paymentType\": 2,\n\"up\": ".$dataplan['up'].",\n\"agrementDisclaimer\": 701,\n\"premium\": ".$dataplan['fixedPremiumAmount'].",\n\"autoDebet\": \"Y\",\n\"purchaseDate\": \"".$purchasedate."\",\n\"bankCode\": \"".$_SESSION['ropBank']['bankROP']."\",\n\"ropBankCode\": \"".$_SESSION['ropBank']['bankROP']."\",\n\"bankAccount\": \"".$_SESSION['ropBank']['ropAccNumber']."\",\n\"bankAccountName\": \"".$_SESSION['ropBank']['ropAccName']."\",\n\"additionalInfo\": {\n\"selfPurchaseFlag\": 1\n,\n\t\t\t\"dealsCode\": \"".$_SESSION['ropBank']['promoCode']."\"\n}\n},\n\"beneficiary\": [".$beneficiary_list."\n]\n}";
        $data = json_decode($response,true);
        writelogNewPurchase($write);
        //echo $write;
    }
}
else if(isset($_SESSION['newPurchaseExist'] )){
    /*echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";*/

    if(!isset($_SESSION['dataForm1'])){
        $url = "http://192.168.70.70:8080/hanwhaservices/purchase";
        $portfields = "{\r\n    \"memberId\": ".$_SESSION['sendMemberID'].",\r\n    \"productId\": ".$dataplan['productId'].",\r\n    \"referenceCode\": \"".$_SESSION['ropBank']['hanwhareferral']."\",\r\n    \"productCode\": \"".$dataplan['productCode']."\",\r\n    \"parentProductId\": ".$dataplan['parentProductId'].",\r\n    \"tenor\": ".$dataplan['tenor'].",\r\n    \"paymentMethod\": \"".$dataplan['paymentMethod']."\",\r\n    \"paymentType\": 2,\r\n    \"up\": ".$dataplan['up'].",\r\n    \"agrementDisclaimer\": 701,\r\n    \"premium\": ".$dataplan['fixedPremiumAmount'].",\r\n    \"autoDebet\":\"Y\",\r\n    \"purchaseDate\": \"".$purchasedate."\",\r\n    \"bankCode\": \"".$_SESSION['ropBank']['bankROP']."\",\n \"ropBankCode\":\"".$_SESSION['ropBank']['bankROP']."\",\r\n    \"bankAccount\": \"".$_SESSION['ropBank']['ropAccNumber']."\",\r\n    \"bankAccountName\": \"".$_SESSION['ropBank']['ropAccName']."\"\r\n ,\n\"additionalInfo\": {\n\"selfPurchaseFlag\": 1\n,\n\t\t\t\"dealsCode\": \"".$_SESSION['ropBank']['promoCode']."\"\n},\r\n  \"beneficiary\": [\n ";
    }else{
        $url = "http://192.168.70.70:8080/hanwhaservices/member/signup";
        $dateDob = str_replace("-","", $_SESSION['dataForm1']['hanwhadob']);
        $portfields = "{\n\"personalData\": {\n\"fullName\": \"".$_SESSION['dataForm1']['hanwhaname']."\",\n    \"birthDate\": \"".$dateDob."\", \n\"birthPlace\": \"".$_SESSION['dataForm1']['hanwhapob1']."\",\n\"emailAddress\": \"".$_SESSION['dataForm1']['hanwhaemail']."\",\n\"mobilePhone\": \"".$_SESSION['dataForm1']['hanwhaphone']."\",\n\"homePhone\": \"".$_SESSION['dataForm1']['hanwhaHomephone']."\",\n\"lineAddress1\": \"".$_SESSION['dataForm1']['hanwhaKTPaddr1']."\",\n\"lineAddress2\": \"".$_SESSION['dataForm1']['hanwhaKTPaddr2']."\",\n\"cityAddress\": \"".$_SESSION['dataForm1']['hanwhaKTPcity2']."\",\n\"postalCode\": ".$_SESSION['dataForm1']['hanwhaKTPPostal'].",\n\"sameMailing\": \"".$_SESSION['dataForm1']['hanwhaSameMailing']."\",\n\"mailingLineAddress1\": \"".$_SESSION['dataForm1']['hanwhaMailaddr1']."\",\n\"mailingLineAddress2\": \"".$_SESSION['dataForm1']['hanwhaMailaddr2']."\",\n\"mailingCityAddress\": \"".$_SESSION['dataForm1']['hanwhaMailcity2']."\",\n\"mailingpostalCode\": ".$_SESSION['dataForm1']['hanwhaMailPostal'].",\n\"gender\": \"".$_SESSION['dataForm1']['hanwhagender']."\",\n\"jobType\": \"".$_SESSION['dataForm1']['hanwhawork']."\",\n\"identityType\": 1,\n\"identityNumber\": \"".$_SESSION['dataForm1']['hanwhanik']."\",\n\"incomeSource\": \"".$_SESSION['dataForm1']['hanwhasourceincome']."\",\n\"additionalProperties\": {\n\"jobDetail\": {\n\"uraianPekerjaan\": \"".$_SESSION['dataForm1']['hanwhaposition']."\",\n\"namaLembaga\": \"".$_SESSION['dataForm1']['hanwhacompanyname']."\",\n\t\t\t\t\"bidangUsaha\": \"".$_SESSION['dataForm1']['hanwhasector']." \"\n\t\t\t},\n\t\t\t\"maritalStatus\": \"".$_SESSION['dataForm1']['hanwhastatus']."\"\n\t\t}\n    },\n\"purchase\": {\n\"productId\": ".$dataplan['productId'].",\n\"referenceCode\": \"".$_SESSION['ropBank']['hanwhareferral']."\",\n\"productCode\": \"".$dataplan['productCode']."\",\n\"parentProductId\": ".$dataplan['productId'].",\n\"tenor\": ".$dataplan['tenor'].",\n\"paymentMethod\": \"".$dataplan['paymentMethod']."\",\n\"paymentType\": 2,\n\"up\": ".$dataplan['up'].",\n\"agrementDisclaimer\": 701,\n\"premium\": ".$dataplan['fixedPremiumAmount'].",\n\"autoDebet\": \"Y\",\n\"purchaseDate\": \"".$purchasedate."\",\n\"bankCode\": \"".$_SESSION['ropBank']['bankROP']."\",\n\"ropBankCode\": \"".$_SESSION['ropBank']['bankROP']."\",\n\"bankAccount\": \"".$_SESSION['ropBank']['ropAccNumber']."\",\n\"bankAccountName\": \"".$_SESSION['ropBank']['ropAccName']."\",\n\"additionalInfo\": {\n\"selfPurchaseFlag\": 1\n,\n\t\t\t\"dealsCode\": \"".$_SESSION['ropBank']['promoCode']."\"\n}\n},\n\"beneficiary\": [\n ";
    }

    
    if(isset($_SESSION['beneficiaryExisting'])){
        $looper = 0;
        while($looper < $_SESSION['beneficiaryExisting']['hanwhaTtlBenef']){
            $seq = $looper+1;
            if($looper == 0){
                $portfields .= "{\n      \"seqNo\": \"".$seq."\",\n \"mobileNo\": \""."0".$_SESSION['beneficiaryExisting']["telpAhliWaris".$seq]."\",\n \"name\": \"".$_SESSION['beneficiaryExisting']["namaAhliWaris".$seq]."\",\n      \"famrel\": ".$_SESSION['beneficiaryExisting']["hubunganAhliWaris".$seq].",\n      \"gender\": \"".$_SESSION['beneficiaryExisting']["genderAhliWaris".$seq]."\",\n      \"birthDate\": \"".str_replace("-","",$_SESSION['beneficiaryExisting']["hanwhadob".$seq])."\",\n      \"percentage\": ".$_SESSION['beneficiaryExisting']["persentaseAhliWaris".$seq].",\n      \"email\": \"".$_SESSION['beneficiaryExisting']["emailAhliWaris".$seq]."\"\n    }";
            }else{
                $portfields .= ",{\n      \"seqNo\": \"".$seq."\",\n \"mobileNo\": \""."0".$_SESSION['beneficiaryExisting']["telpAhliWaris".$seq]."\",\n \"name\": \"".$_SESSION['beneficiaryExisting']["namaAhliWaris".$seq]."\",\n      \"famrel\": ".$_SESSION['beneficiaryExisting']["hubunganAhliWaris".$seq].",\n      \"gender\": \"".$_SESSION['beneficiaryExisting']["genderAhliWaris".$seq]."\",\n      \"birthDate\": \"".str_replace("-","",$_SESSION['beneficiaryExisting']["hanwhadob".$seq])."\",\n      \"percentage\": ".$_SESSION['beneficiaryExisting']["persentaseAhliWaris".$seq].",\n      \"email\": \"".$_SESSION['beneficiaryExisting']["emailAhliWaris".$seq]."\"\n    }";
            }

            $looper += 1;
        }
    }else if(isset($_SESSION['dataForm1'])){
        $counter = 0;
        $beneficiary_list = "";
        while($counter < $_SESSION['dataForm1']['hanwhaTtlBenef']){
            $counter += 1;
            $benefDOB = str_replace("-","", $_SESSION['dataForm1']['hanwhadob'.$counter]);
            if($counter == 1){
                $portfields .= "{\n\"seqNo\": \"".$counter."\",\n\"mobileNo\": \"".$_SESSION['dataForm1']['telpAhliWaris'.$counter]."\",\n\"name\": \"".$_SESSION['dataForm1']['namaAhliWaris'.$counter]."\",\n\"famrel\": ".$_SESSION['dataForm1']['hubunganAhliWaris'.$counter].",\n\"gender\": \"".$_SESSION['dataForm1']['genderAhliWaris'.$counter]."\",\n\"birthDate\": \"".$benefDOB."\",\n\"percentage\": ".$_SESSION['dataForm1']['persentaseAhliWaris'.$counter].",\n\"email\": \"".$_SESSION['dataForm1']['emailAhliWaris'.$counter]."\"\n}";
            }else{
                $portfields .= ",{\n\"seqNo\": \"".$counter."\",\n\"mobileNo\": \"".$_SESSION['dataForm1']['telpAhliWaris'.$counter]."\",\n\"name\": \"".$_SESSION['dataForm1']['namaAhliWaris'.$counter]."\",\n\"famrel\": ".$_SESSION['dataForm1']['hubunganAhliWaris'.$counter].",\n\"gender\": \"".$_SESSION['dataForm1']['genderAhliWaris'.$counter]."\",\n\"birthDate\": \"".$benefDOB."\",\n\"percentage\": ".$_SESSION['dataForm1']['persentaseAhliWaris'.$counter].",\n\"email\": \"".$_SESSION['dataForm1']['emailAhliWaris'.$counter]."\"\n}";
            }
        }
    }
    
    $portfields .= "\n  ]\n}\n\n";
    //echo $portfields;
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_PORT => "8080",
      CURLOPT_URL => $url,
      //CURLOPT_URL => "localhost",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $portfields,
      CURLOPT_HTTPHEADER => array(
        "Accept: application/json",
        "Accept-Encoding: gzip, deflate",
        "Cache-Control: no-cache",
        "Connection: keep-alive",
        "Content-Type: application/json",
        "cache-control: no-cache",
        "token: wSP+b1UNHLe6Q13RnVEiyWlDFuPqKR5Gl+rWovjh8Y9+wYV6i0zM+A2c14nvoFvH"
      )
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
        $data = json_decode($response, true);
    }
    $resultcode = $data['result_code'];
}
?>

<div class="row" style="margin-bottom: 20px;">
            <div class="col-12">
<h1 class="textorange"><strong>Paket Terpilih</strong></h1>
            </div>
            <?php include 'view-selected.php'; ?>
            <div class="col-12 col-md-8 formCol">
<div class="row rowpaddingless">
    <form class="col-12" action="prepurchase?view=beneficiary" method="POST" id="" class="formCol">
        <div class="col-md-12 col-12 align-self-center formCol rowpaddingless">
            <div class="" id="sdkb">
	      <!-- Column -->
	      <div id = "colL" class="col-lg-12 col-md-12 p-b-30 m-b-40" style="">
              <?php 
                if($data['result_code'] == -1){
                    ?>
              <div class="row" style="padding: 0px !important; margin: 0px !important; display: -webkit-box; display: none;">
                    <img class="col-lg-10 col-md-10 col-10" src="../assets/images/form/steps/step-07.png" width="100%">
                </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-12 align-self-center">
                  <div class="step" style="margin-bottom: 2%; text-align:center;">
                      <img src="/assets/images/form/Hanwhalife-bucketlist-thankyou-va.png" style="text-align:center; margin-bottom: 15px;">
                      <h3>Mohon Maaf</h3>
                      <p style="text-align:center;">Pembelian anda gagal di proses. Pastikan semua detail yang dimasukan sudah benar dan sesuai dengan data anda serta ketentuan informasi yang telah kami informasikan.</p>
                      <br>
                      <br>
                      <a href="prepurchase?view=data-input" class="btn2">Cek Data Anda Kembali</a>
                  </div>
                </div>
              </div>
              <?php
                }else if($data['result_code'] == 3101){
            ?>
              
                    
              <div class="row" style="padding: 0px !important; margin: 0px !important; display: -webkit-box; display: none;">
                    <img class="col-lg-10 col-md-10 col-10" src="../assets/images/form/steps/step-07.png" width="100%">
                </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-12 align-self-center">
                  <div class="step" style="margin-bottom: 2%; text-align:center;">
                      <img src="/assets/images/form/Hanwhalife-bucketlist-thankyou-va.png" style="text-align:center; margin-bottom: 15px;">
                      <h3>Mohon Maaf</h3>
                      <p style="text-align:center;">Email / KTP / No Telephone anda sudah pernah digunakan sebelumnya. Silahkan periksa atau update data anda kembali untuk bisa melanjutkannya.</p>
                      <br>
                      <br>
                      <a href="prepurchase?view=data-input" class="btn2">Cek Data Anda Kembali</a>
                  </div>
                </div>
              </div>
              
              <?php
                }else if($data['result_code'] == 3100 || $data['result_code'] == 4201){
                    unset($_SESSION['product']);
                    unset($_SESSION['ropBank']);
                    unset($_SESSION['newPurchaseExist']);
                    unset($_SESSION['beneficiaryExisting']);
                    unset($_SESSION['userLogged']);
                    ?>
                      <div class="row" style="padding: 0px !important; margin: 0px !important; display: -webkit-box; display: none;">
                            <img class="col-lg-10 col-md-10 col-10" src="../assets/images/form/steps/step-07.png" width="100%">
                        </div>
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 align-self-center">
                          <div class="step" style="margin-bottom: 2%; text-align:center;">
                              <img src="/assets/images/form/Hanwhalife-bucketlist-thankyou-va.png" style="text-align:center; margin-bottom: 15px;">
                              <h3>Terimakasih telah membeli produk<br>Hanwha Bucket List!</h3>
                              <p style="text-align:center; width: 100%;">Silahkan cek email anda untuk melakukan pembayaran</p>
                              <br>
                              <br>
                              <a href="./" class="btn2">FINISH</a>
                          </div>
                        </div>
                      </div>

                      <?php
                }else if($data['result_code'] == 3107){
                    ?>
                      <div class="row" style="padding: 0px !important; margin: 0px !important; display: -webkit-box; display: none;">
                            <img class="col-lg-10 col-md-10 col-10" src="../assets/images/form/steps/step-07.png" width="100%">
                        </div>
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 align-self-center">
                          <div class="step" style="margin-bottom: 2%; text-align:center;">
                              <img src="/assets/images/form/Hanwhalife-bucketlist-thankyou-va.png" style="text-align:center; margin-bottom: 15px;">
                              <h3>Mohon Maaf</h3>
                              <p>Pembelian anda gagal di proses. Pastikan semua detail yang dimasukan sudah benar dan sesuai dengan data anda serta ketentuan informasi yang telah kami informasikan.</p>
                              <br>
                              <br>
                              <a href="prepurchase?view=data-input" class="btn2">FINISH</a>
                          </div>
                        </div>
                      </div>

                      <?php
                }else if($data['result_code'] == 1002){
                    //session_destroy();
                    ?>
                      <div class="row" style="padding: 0px !important; margin: 0px !important; display: -webkit-box; display: none;">
                            <img class="col-lg-10 col-md-10 col-10" src="../assets/images/form/steps/step-07.png" width="100%">
                        </div>
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 align-self-center">
                          <div class="step" style="margin-bottom: 2%; text-align:center;">
                              <img src="/assets/images/form/Hanwhalife-bucketlist-thankyou-va.png" style="text-align:center; margin-bottom: 15px;">
                              <h3>Missing Purchase Data!<br></h3>
                              <p style="text-align:center; width: 100%;">Silahkan Cek Kembali Data Pembelian Anda!</p>
                              <br>
                              <br>
                              <a href="../productpage" class="btn2">FINISH</a>
                          </div>
                        </div>
                      </div>

                      <?php
                }
              ?>
              <div class="row">
                <div class="col-12">
                    <?php if($data['result_code'] != 3100 && $data['result_code'] != 4201){ ?>
                    <h3 class="alignCenter m-t-20">Error: <?php echo $data['result_code']; ?></h3>
                    <?php } ?>
                  </div>
              </div>
	      </div>
	    </div>
        </div>
    </form>
</div>
            </div>
        </div>