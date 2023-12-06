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

    if ($result->num_rows > 0 && $result->num_rows < 2) {
        // output data of each row
        while($user = mysqli_fetch_assoc($result)) {
            //print_r($user);
            $detailName = $user['temp_nama'];
            $detailtgllahir = $user['temp_tgllahir'];
            $detailNikah = $user['temp_statusnikah'];
            $detailHP = $user['temp_hp'];
            $detailAddr1 = $user['temp_addrs1'];
            $detailAddr2 = $user['temp_addrs2'];
            $detailCity = $user['temp_city'];
            $detailPostalAddr = $user['postaladdr1'];
            $detailEmailUser = $user['temp_email'];
            $detailPekerjaan = $user['temp_pekerjaan'];
            $detailGender = $user['temp_gender'];
            $detailTempatLahir = $user['temp_tempatlahir'];
            $detailNoktp = $user['temp_noktp'];
            $detailTelpRumah = $user['temp_telprumah'];
            $detailKTPAlamat1 = $user['temp_address1'];
            $detailKTPAlamat2 = $user['temp_address2'];
            $detailKota1 = $user['temp_cityaddrs'];
            $detailPostalKTP = $user['postaladdr2'];
            $detailpendapatan = $user['temp_pendapatan'];
        }
    } else {
        echo "<script>alert('NOT ALLOWED!'); window.location.replace(./);</script>";
    }
    $purchasedate = date("YmdHis");
    //getuser benef
    $getBenef = "SELECT * FROM `temp_beneficiary` WHERE id_formbenef=".$_SESSION['registid'];
    $beneficiaryResult = mysqli_query($conn,$getBenef);
    if ($beneficiaryResult->num_rows > 0 && $beneficiaryResult->num_rows < 6) {
        // output data of each row
        $count = 0;
        while($benef = mysqli_fetch_assoc($beneficiaryResult)) {
            $detailNameFull[$count] = $benef['temp_namalengkap'];
            $detailRelation[$count] = $benef['temp_relasi'];
            $detailGenders[$count] = $benef['temp_gender'];
            $detailTanggalBenef[$count] = $benef['temp_tanggallahir'];
            $detailPresentasiBenef[$count] = $benef['temp_persentasi'];
            $detailEmail[$count] = $benef['temp_email'];
            $detailphoneNumBenef[$count] = $benef['temp_benefnumber'];
            
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
    
    $portfields = "{\n  \"personalData\": {\n    \"fullName\": \"".$detailName."\",\n    \"birthDate\": \"".$detailtgllahir."\",\n    \"birthPlace\": \"".$detailTempatLahir."\",\n    \"emailAddress\": \"".$detailEmailUser."\",\n    \"mobilePhone\": \""."0".$detailHP."\",\n    \"homePhone\": \""."0".$detailTelpRumah."\",\n    \"lineAddress1\": \"".$detailAddr1."\",\n    \"lineAddress2\": \"".$detailAddr2."\",\n    \"cityAddress\": \"".$detailCity."\",\n    \"postalCode\": \"".$detailPostalAddr."\",\n    \"sameMailing\": \"".$_SESSION['mailing']."\" ,\n    \"mailingLineAddress1\": \"".$detailKTPAlamat1."\",\n    \"mailingLineAddress2\": \"".$detailKTPAlamat2."\",\n    \"mailingCityAddress\": \"".$detailKota1."\",\n    \"mailingpostalCode\": ".$detailPostalKTP.",\n    \"gender\": \"".$detailGender."\",\n    \"jobType\": \"".$detailPekerjaan."\",\n    \"identityType\": 1, \n    \"identityNumber\": \"".$detailNoktp."\",\n    \"incomeSource\": \"".$detailpendapatan."\"\n  },\n  \"purchase\": {\n    \"productId\": ".$dataplan['productId'].",\n    \"referenceCode\": \"".$_POST['referralcode']."\",\n    \"productCode\": \"".$dataplan['productCode']."\",\n    \"parentProductId\": ".$dataplan['parentProductId'].",\n    \"tenor\": ".$dataplan['tenor'].",\n    \"paymentMethod\": \"M\",\n    \"paymentType\": 2,\n    \"up\": ".$dataplan['up'].",\n    \"agrementDisclaimer\": 701,\n    \"premium\": ".$dataplan['fixedPremiumAmount'].",\n    \"autoDebet\":\"Y\",\n    \"purchaseDate\": \"".$purchasedate."\",\n    \"bankCode\": \"".$_POST['bankoption']."\",\n \"ropBankCode\":\"".$_POST['bankoption']."\",\r\n    \"bankAccount\": \"".$_POST['acctnumber']."\",\r\n    \"bankAccountName\": \"".$_POST['namebutab']."\"\r\n },\n  \"beneficiary\": [\n ";


    $looper = 0;
    while($looper < $count){
        $seq = $looper+1;
        if($looper == 0){
            $portfields .= "{\n      \"seqNo\": \"".$seq."\",\n \"mobileNo\": \""."0".$detailphoneNumBenef[$looper]."\",\n \"name\": \"".$detailNameFull[$looper]."\",\n      \"famrel\": ".$detailRelation[$looper].",\n      \"gender\": \"".$detailGenders[$looper]."\",\n      \"birthDate\": \"".$detailTanggalBenef[$looper]."\",\n      \"percentage\": ".$detailPresentasiBenef[$looper].",\n      \"email\": \"".$detailEmail[$looper]."\"\n    }";
        }else{
            $portfields .= ",{\n      \"seqNo\": \"".$seq."\",\n \"mobileNo\": \""."0".$detailphoneNumBenef[$looper]."\",\n \"name\": \"".$detailNameFull[$looper]."\",\n      \"famrel\": ".$detailRelation[$looper].",\n      \"gender\": \"".$detailGenders[$looper]."\",\n      \"birthDate\": \"".$detailTanggalBenef[$looper]."\",\n      \"percentage\": ".$detailPresentasiBenef[$looper].",\n      \"email\": \"".$detailEmail[$looper]."\"\n    }";
        }
        
        $looper += 1;
    }
    $portfields .= "]\n}\n";

    $portfields;
    $browser = getbrowser();
    $browser = $browser['name'];
    $currdate = date('Y-m-d h:m:s');
    $insertlog = "INSERT INTO logbase VALUES(NULL, 'newlog-".$portfields."','". $browser."','". $currdate."')";
    $result = mysqli_query($conn,$insertlog);

curl_setopt_array($curl, array(
      CURLOPT_PORT => "8080",
      CURLOPT_URL => "http://192.168.0.220:8080/hanwhaservices/member/signup",
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
        "token: 0LOjWiMnOxWfQuhDhpIn9wp2dS4J0wK7dEbK2y6W7L7VXv6teuV7SA2c14nvoFvH"
      ),
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

    $to      = 'fery@dorado.id';
    $subject = 'Submission Form dari Server BucketList di Hanwha a.n '.$detailName;
    $message = '<div>Data below is the submitted Portfields:<br>'.$portfields.'<br><br>With Result Code '.$resultcode.'</div>';
    $headers = 'From: bucketlist@koreaversikamu.co.id' . "\r\n" .
        'Reply-To: bucketlist@koreaversikamu.co.id' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
?>
<?php 
    if($resultcode == 3100){
        
    session_destroy();
?>
<div id="form6" class="container containerform animated fadeInRight" style="padding: 5% 0">
    
    <div class="row" style="padding: 0px !important; margin: 0px !important; display: -webkit-box; display: none;">
        <img class="col-lg-10 col-md-10 col-10" src="../assets/images/form/steps/step-07.png" width="100%">
    </div>
  <div class="row">
    <div class="col-lg-3 col-md-12 col-12"></div>
    <div class="col-lg-6 col-md-12 col-12 align-self-center">
      <div class="step" style="margin-bottom: 2%; text-align:center;">
          <img src="/assets/images/form/Hanwhalife-bucketlist-thankyou-va.png" style="text-align:center; margin-bottom: 15px;">
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
    <div class="row" style="padding: 0px !important; margin: 0px !important; display: -webkit-box; display: none;">
        <img class="col-lg-10 col-md-10 col-10" src="../assets/images/form/steps/step-07.png" width="100%">
    </div>
  <div class="row">
    <div class="col-lg-3 col-md-12 col-12"></div>
    <div class="col-lg-6 col-md-12 col-12 align-self-center">
      <div class="step" style="margin-bottom: 2%; text-align:center;">
          <img src="/assets/images/form/Hanwhalife-bucketlist-thankyou-va.png" style="text-align:center; margin-bottom: 15px;">
          <h3>Mohon Maaf</h3>
          <p>Email/ID KTP/Nomor Telephone yang anda gunakan sudah terdaftar dalam pembelian kami. Pastikan anda sudah menerima email untuk melakukan pembayaran atau sudah mengaktifkan akun anda.</p>
          <br>
          <br>
          <div href="#!" class="btn2" onclick="back('frm3k','<?php echo $_SESSION['productid']; ?>')">Kembali Ke Step 3</div>
      </div>
    </div>
  </div>
</div>
<?php
    }else if($resultcode == 4301){
?>
<div id="form6" class="container containerform animated fadeInRight" style="padding: 5% 0">
    <div class="row" style="padding: 0px !important; margin: 0px !important; display: -webkit-box; display: none;">
        <img class="col-lg-10 col-md-10 col-10" src="../assets/images/form/steps/step-07.png" width="100%">
    </div>
  <div class="row">
    <div class="col-lg-3 col-md-12 col-12"></div>
    <div class="col-lg-6 col-md-12 col-12 align-self-center">
      <div class="step" style="margin-bottom: 2%; text-align:center;">
          <img src="/assets/images/form/Hanwhalife-bucketlist-thankyou-va.png" style="text-align:center; margin-bottom: 15px;">
          <h3>Mohon Maaf</h3>
          <p>Pembelian anda gagal di proses. Pastikan semua detail yang dimasukan sudah benar dan sesuai dengan data anda serta ketentuan informasi yang telah kami informasikan.</p>
          <br>
          <br>
          <div href="#!" class="btn2" onclick="back('frm6k','<?php echo $_SESSION['productid']; ?>')">Kembali Ke Step 3</div>
      </div>
    </div>
  </div>
</div>
<?php
    }else if($resultcode == -1){
?>
<div id="form6" class="container containerform animated fadeInRight" style="padding: 5% 0">
    <div class="row" style="padding: 0px !important; margin: 0px !important; display: -webkit-box; display: none;">
        <img class="col-lg-10 col-md-10 col-10" src="../assets/images/form/steps/step-07.png" width="100%">
    </div>
  <div class="row">
    <div class="col-lg-3 col-md-12 col-12"></div>
    <div class="col-lg-6 col-md-12 col-12 align-self-center">
      <div class="step" style="margin-bottom: 2%; text-align:center;">
          <img src="/assets/images/form/Hanwhalife-bucketlist-thankyou-va.png" style="text-align:center; margin-bottom: 15px;">
          <h3>Mohon Maaf</h3>
          <p>Sistem Error -1. Silahkan hubungi <span style="color: #ff7101;">Hanwha Support mengenai hal ini untuk bantuan lebih lanjut.</span></p>
          <br>
          <br>
          <div href="#!" class="btn2" onclick="back('frm6k','<?php echo $_SESSION['productid']; ?>')">Kembali Ke Awal</div>
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