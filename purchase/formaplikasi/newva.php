<?php 
    session_start();
    include '../jsonapp/json-hanwha-api.php';  writelog();
    include '../jsonapp/sesschkr.php';
    include '../connectdb.php';
    date_default_timezone_set('Asia/Jakarta');
    $key = keyapi();

    /*print_r($_SESSION);

    print_r($_POST);*/

    $dataplan = searchPlan($_SESSION['productid']);
    
    $getuser = "SELECT * FROM `temp_datatertanggung` WHERE id_form=".$_SESSION['registid'];
    $result = mysqli_query($conn,$getuser);

    $purchasedate = date("YmdHis");
    //getuser benef
    $getBenef = "SELECT * FROM `temp_beneficiary` WHERE id_formbenef=".$_SESSION['registid'];
    $beneficiaryResult = mysqli_query($conn,$getBenef);

    if ($beneficiaryResult->num_rows > 0 && $beneficiaryResult->num_rows < 5) {
        // output data of each row
        $count = 0;
        while($benef = mysqli_fetch_assoc($beneficiaryResult)) {
        
        //echo "This is your erro: ".$benef['temp_tanggallahir'];
        $benef['temp_tanggallahir'] = date('Ymd', strtotime($benef['temp_tanggallahir']));
        //echo "This is your erro: ".$benef['temp_tanggallahir'];
            $detailNameFull[$count] = $benef['temp_namalengkap'];
            $detailRelation[$count] = $benef['temp_relasi'];
            $detailGender[$count] = $benef['temp_gender'];
            $detailTanggalBenef[$count] = $benef['temp_tanggallahir'];
            $detailPresentasiBenef[$count] = $benef['temp_persentasi'];
            $detailEmail[$count] = $benef['temp_email'];
            $detailphoneNumBenef[$count] = "0".$benef['temp_benefnumber'];
            
            $count += 1;
        }
    } else {
        echo "<script>alert('NOT ALLOWED!'); window.location.replace(./);</script>";
    }

    if($_POST['returninterest'] == 'voucher'){
        $_POST['bankoption'] = 0;
        $_POST['acctnumber'] = 0;
    }
    if($_POST['referralcode'] == NULL){
        $_POST['referralcode'] = 0;
    }

    $curl = curl_init();
    
    $portfields = "{\r\n    \"memberId\": ".$_SESSION['registid'].",\r\n    \"productId\": ".$dataplan['productId'].",\r\n    \"referenceCode\": \"".$_POST['referralcode']."\",\r\n    \"productCode\": \"".$dataplan['productCode']."\",\r\n    \"parentProductId\": ".$dataplan['parentProductId'].",\r\n    \"tenor\": ".$dataplan['tenor'].",\r\n    \"paymentMethod\": \"M\",\r\n    \"paymentType\": 2,\r\n    \"up\": ".$dataplan['up'].",\r\n    \"agrementDisclaimer\": 701,\r\n    \"premium\": ".$dataplan['fixedPremiumAmount'].",\r\n    \"autoDebet\":\"Y\",\r\n    \"purchaseDate\": \"".$purchasedate."\",\r\n    \"bankCode\": \"".$_POST['bankoption']."\",\n \"ropBankCode\":\"".$_POST['bankoption']."\",\r\n    \"bankAccount\": \"".$_POST['acctnumber']."\",\r\n    \"bankAccountName\": \"".$_POST['namebutab']."\"\r\n ,\r\n  \"beneficiary\": [\n ";

    $looper = 0;
    while($looper < $count){
        $seq = $looper+1;
        if($looper == 0){
            $portfields .= "{\n      \"seqNo\": \"".$seq."\",\n \"mobileNo\": \""."0".$detailphoneNumBenef[$looper]."\",\n \"name\": \"".$detailNameFull[$looper]."\",\n      \"famrel\": ".$detailRelation[$looper].",\n      \"gender\": \"".$detailGender[$looper]."\",\n      \"birthDate\": \"".$detailTanggalBenef[$looper]."\",\n      \"percentage\": ".$detailPresentasiBenef[$looper].",\n      \"email\": \"".$detailEmail[$looper]."\"\n    }";
        }else{
            $portfields .= ",{\n      \"seqNo\": \"".$seq."\",\n \"mobileNo\": \""."0".$detailphoneNumBenef[$looper]."\",\n \"name\": \"".$detailNameFull[$looper]."\",\n      \"famrel\": ".$detailRelation[$looper].",\n      \"gender\": \"".$detailGender[$looper]."\",\n      \"birthDate\": \"".$detailTanggalBenef[$looper]."\",\n      \"percentage\": ".$detailPresentasiBenef[$looper].",\n      \"email\": \"".$detailEmail[$looper]."\"\n    }";
        }
        
        $looper += 1;
    }
    $portfields .= "]\n}\n";
    echo $portfields;
    $browser = getbrowser();
    $browser = $browser['name'];
    $currdate = date('Y-m-d H:i:s');
    //$insertlog = "INSERT INTO logbase VALUES(NULL, 'existinglog-".$portfields."','". $browser."','". $currdate."')";
    //$result = mysqli_query($conn,$insertlog);
    curl_setopt_array($curl, array(
      CURLOPT_PORT => "8080",
      CURLOPT_URL => "http://192.168.0.220:8080/hanwhaservices/purchase",
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
        "Content-Length: ",
        "Content-Type: application/json",
        "Host: ws-uat.hanwhalife.co.id",
        "Postman-Token: 29c456c5-93d1-4952-909d-453af68bab4a,bd2a13f4-14ba-40fa-9ec0-95f2d06baff9",
        "User-Agent: PostmanRuntime/7.16.3",
        "cache-control: no-cache",
        "token: 0LOjWiMnOxWfQuhDhpIn9wp2dS4J0wK7dEbK2y6W7L7VXv6teuV7SA2c14nvoFvH"
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
    $getuser = "DELETE FROM `temp_beneficiary` WHERE id_formbenef=".$_SESSION['registid'];
    $result = mysqli_query($conn,$getuser);
?>
<?php 
    if($resultcode == 4201){
?>
<div id="form6" class="container containerform animated fadeInRight" style="padding: 5% 0">
  <div class="row">
    <div class="col-lg-3 col-md-12 col-12"></div>
    <div class="col-lg-6 col-md-12 col-12 align-self-center">
      <div class="step" style="margin-bottom: 2%; text-align:center;">
          <img src="/assets/images/form/thankyou-va.png" style="text-align:center; margin-bottom: 15px;">
          <h3>Terimakasih telah membeli produk<br>Hanwha Bucket List!</h3>
          <p>Pembayaran bisa dilakukan ke nomor virtual account yang telah kami kirimkan ke email anda.</p>
          <br>
          <br>
          <a href="./" class="btn2">FINISH</a>
      </div>
    </div>
  </div>
</div>
<?php
    }else if($resultcode == 3101){
?>
<div id="form6" class="container containerform animated fadeInRight" style="padding: 5% 0">
  <div class="row">
    <div class="col-lg-3 col-md-12 col-12"></div>
    <div class="col-lg-6 col-md-12 col-12 align-self-center">
      <div class="step" style="margin-bottom: 2%; text-align:center;">
          <img src="/assets/images/form/thankyou-va.png" style="text-align:center; margin-bottom: 15px;">
          <h3>Mohon Maaf</h3>
          <p>Email yang anda gunakan sudah terdaftar dalam pembelian kami. Pastikan anda sudah menerima email untuk melakukan pembayaran atau sudah mengaktifkan akun anda.</p>
          <br>
          <br>
          <a href="./" class="btn2">FINISH</a>
      </div>
    </div>
  </div>
</div>
<?php
    }else if($resultcode == 4301 || $resultcode == -1){
?>
<div id="form6" class="container containerform animated fadeInRight" style="padding: 5% 0">
  <div class="row">
    <div class="col-lg-3 col-md-12 col-12"></div>
    <div class="col-lg-6 col-md-12 col-12 align-self-center">
      <div class="step" style="margin-bottom: 2%; text-align:center;">
          <img src="/assets/images/form/thankyou-va.png" style="text-align:center; margin-bottom: 15px;">
          <h3>Mohon Maaf</h3>
          <p>Pembelian anda gagal di proses. Pastikan semua detail yang dimasukan sudah benar dan sesuai dengan data anda serta ketentuan informasi yang telah kami informasikan.</p>
          <br>
          <br>
          <a href="./" class="btn2">FINISH</a>
      </div>
    </div>
  </div>
</div>
<?php
    }else if($resultcode == 3107){
?>
<div id="form6" class="container containerform animated fadeInRight" style="padding: 5% 0">
  <div class="row">
    <div class="col-lg-3 col-md-12 col-12"></div>
    <div class="col-lg-6 col-md-12 col-12 align-self-center">
      <div class="step" style="margin-bottom: 2%; text-align:center;">
          <img src="/assets/images/form/thankyou-va.png" style="text-align:center; margin-bottom: 15px;">
          <h3>Mohon Maaf</h3>
          <p>Pembelian anda gagal di proses. Pastikan semua detail yang dimasukan sudah benar dan sesuai dengan data anda serta ketentuan informasi yang telah kami informasikan.</p>
          <br>
          <br>
          <a href="./" class="btn2">FINISH</a>
      </div>
    </div>
  </div>
</div>
<?php
    }
?>
<style>
    #page-loader{display: none !important;}
</style>