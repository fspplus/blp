<?php 
  $base_url_uat = "http://192.168.0.220:8080";
  // $base_url = "https://ws-uat.hanwhalife.co.id";
  $token_uat = "0LOjWiMnOxWfQuhDhpIn9wp2dS4J0wK7dEbK2y6W7L7VXv6teuV7SA2c14nvoFvH";

  $base_url = "http://192.168.70.70:8080";
  $token = "wSP+b1UNHLe6Q13RnVEiyWlDFuPqKR5Gl+rWovjh8Y9+wYV6i0zM+A2c14nvoFvH";
    include 'connectdb.php';

    if(isset($_SESSION['dataForm1']['hanwhaposition'])){
      if(!isset($_SESSION['dataForm1']['hanwhaposition'])){
        $_SESSION['dataForm1']['hanwhaposition'] = "";
      }
      if(!isset($_SESSION['dataForm1']['hanwhacompanyname'])){
        $_SESSION['dataForm1']['hanwhacompanyname'] = "";
      }
      if(!isset($_SESSION['dataForm1']['hanwhasector'])){
        $_SESSION['dataForm1']['hanwhasector'] = "";
      }
      if(!isset($_SESSION['dataForm1']['hanwhastatus'])){
        $_SESSION['dataForm1']['hanwhastatus'] = "";
      }
    }

$curl = curl_init();

$dataplan = searchPlan($_SESSION['product']['plan']);
$purchasedate = date("YmdHis");
  
if(isset($_SESSION['dataForm1']['hanwhadob'])){
  $dateDob = str_replace("-","", $_SESSION['dataForm1']['hanwhadob']);
}

if(isset($_SESSION['dataForm1'])){
  if(!isset($_SESSION['dataForm1']['hanwhacitizenOthers_bo'])){
    $_SESSION['dataForm1']['hanwhacitizenOthers_bo'] = "";
  }
  if(!isset($_SESSION['dataForm1']['hanwhapendapatanlainSumber_bo'])){
    $_SESSION['dataForm1']['hanwhapendapatanlainSumber_bo'] = "";
  }
  if(!isset($_SESSION['dataForm1']['hanwhapendapatanlainValue_bo'])){
    $_SESSION['dataForm1']['hanwhapendapatanlainValue_bo'] = "";
  }
}
// echo "<pre>";
// print_r($_SESSION);
// die();

$input_bo = "";
if(isset($_SESSION['dataForm1']['hanwhawork'])){
  if($_SESSION['dataForm1']['hanwhawork'] == "Job10" || $_SESSION['dataForm1']['hanwhawork'] == "Job14" ){
    if(isset($_SESSION['dataForm1']['inputTambahan'])){
      if($_SESSION['dataForm1']['inputTambahan'] == "Y"){
        $_SESSION['dataForm1']['hanwhadob_bo'] = str_replace("-","", $_SESSION['dataForm1']['hanwhadob_bo']);
        $input_bo = "\"policyPayor\":{\"fullName\":\"".$_SESSION['dataForm1']['hanwhaname_bo']."\",\"birthDate\":\"".$_SESSION['dataForm1']['hanwhadob_bo']."\",\"birthPlace\":\"\",\"emailAddress\":\"".$_SESSION['dataForm1']['hanwhaemail_bo']."\",\"mobilePhone\":\"".$_SESSION['dataForm1']['hanwhaphone_bo']."\",\"homePhone\":\"".$_SESSION['dataForm1']['hanwhaphone_bo']."\",\"lineAddress1\":\"".$_SESSION['dataForm1']['hanwhaKTPaddr1_bo']."\",\"lineAddress2\":\"".$_SESSION['dataForm1']['hanwhaKTPaddr2_bo']."\",\"cityAddress\":\"".$_SESSION['dataForm1']['hanwhaKTPcity1_bo']."\",\"postalCode\":\"".$_SESSION['dataForm1']['hanwhaKTPPostal_bo']."\",\"sameMailing\":\"0\",\"mailingLineAddress1\":\"".$_SESSION['dataForm1']['hanwhaKTPaddr1_bo']."\",\"mailingLineAddress2\":\"".$_SESSION['dataForm1']['hanwhaKTPaddr2_bo']."\",\"mailingCityAddress\":\"".$_SESSION['dataForm1']['hanwhaKTPcity1_bo']."\",\"mailingpostalCode\":".$_SESSION['dataForm1']['hanwhaKTPPostal_bo'].",\"gender\":\"".$_SESSION['dataForm1']['hanwhagender_bo']."\",\"jobType\":\"".$_SESSION['dataForm1']['hanwhawork_bo']."\",\"identityType\":1,\"identityNumber\":\"".$_SESSION['dataForm1']['hanwhanik_bo']."\",\"incomeSource\":\"".$_SESSION['dataForm1']['hanwhasourceincome_bo']."\",\"additionalProperties\":{\"jobDetail\":{\"uraianPekerjaan\":\"\",\"namaLembaga\":\"\",\"bidangUsaha\":\" \"},\"maritalStatus\":\"".$_SESSION['dataForm1']["hanwhastatus_bo"]."\",\"boType\":\"2\",\"indivPayor\":{\"marital\":\"\",\"citizenship\":\"".$_SESSION['dataForm1']['hanwhacitizen_bo']."\",\"nationality\":\"".$_SESSION['dataForm1']['hanwhacitizenOthers_bo']."\",\"occupationid\":\"".$_SESSION['dataForm1']['hanwhawork_bo']."\",\"occupationdesc\":\"\",\"jobpos\":\"\",\"incomesourcedesc\":\"".$_SESSION['dataForm1']['hanwpendapatantetap_bo']."\",\"incomesrcoth\":\"".$_SESSION['dataForm1']['hanwpendapatantetap_bo']."\",\"incomeoth\":\"".$_SESSION['dataForm1']['hanwpendapatanlainnya_bo']."\",\"incomeothdesc\":\"".$_SESSION['dataForm1']['hanwpendapatanlainSumber_bo']."\",\"incomeothtype\":\"".$_SESSION['dataForm1']['hanwpendapatanlainnyaValue_bo']."\",\"npwp\":\"".$_SESSION['dataForm1']['hanwhaNPWP_bo']."\",\"relwinsured\":\"".$_SESSION['dataForm1']['hanwhaemail_bo']."\",\"relwholder\":\"".$_SESSION['dataForm1']['hubungan_BO']."\",\"kitasNo\":\"".$_SESSION['dataForm1']['hanwhanik_bo']."\",\"office_phone1\":\"".$_SESSION['dataForm1']['hanwhaWorkphone_bo']."\",\"office_phone2\":\"\",\"office_email\":\"\"}}},";
      }else if($_SESSION['dataForm1']['inputTambahan'] == "N"){
        $input_bo = "\"policyPayor\":{\"fullName\":\"Selleyyu Halim\",\"birthDate\":\"19881018\",\"birthPlace\":\"Tebing tinggi\",\"emailAddress\":\"wqw@yahoo.com\",\"mobilePhone\":\"08514322465899\",\"homePhone\":\"0614524829\",\"lineAddress1\":\"Jl.Selamat Ketaren komp.mutiara palace blok:B3\",\"lineAddress2\":\"Jl.dewa ruci no:54\",\"cityAddress\":\"Medan\",\"postalCode\":20112,\"sameMailing\":\"1\",\"mailingLineAddress1\":\"Jl.Selamat Ketaren komp.mutiara palace blok:B3\",\"mailingLineAddress2\":\"Jl.dewa ruci no:54\",\"mailingCityAddress\":\"Medan\",\"mailingpostalCode\":20112,\"gender\":\"F\",\"jobType\":\"Job13\",\"identityType\":1,\"identityNumber\":\"1271195812960001\",\"incomeSource\":\"1\",\"additionalProperties\":{\"jobDetail\":{\"uraianPekerjaan\":\"\",\"namaLembaga\":\"\",\"bidangUsaha\":\" \"},\"maritalStatus\":\"N\",\"boType\":\"1\",\"nonindivPayor\":{\"citizenship\":\"wni\",\"nationality\":\"nationalitytestnon\",\"jobpos\":\"jobpostestnon\",\"companyname\":\"PT. JADEVIS Tbk\",\"lineofbusiness\":\"lineofbusinesstestnon\",\"npwp\":\"npwptestnon\",\"relwinsured\":\"relwinsuredtestnon\",\"relwholder\":\"relwholdertestnon\",\"companyDeed\":\"companyDeedtestnon\",\"kitasNo\":\"091110339395\",\"menkumhamNo\":\"028312312398311\",\"businessEntity\":\"businessEntitytestnon\",\"reasonsforInsuring\":\"reasonsforInsuringtestnon\",\"office_phone1\":\"0812929292000\",\"office_phone2\":\"0812929292000\",\"office_email\":\"2131@gmail.com\"}}},";
      }
    }
  }
}
if(!isset($_SESSION['newPurchaseExist'])){
  
$policy_holder = "\"policyHolder\":{\n\"fullName\": \"".$_SESSION['dataForm1']['hanwhaname']."\",\n    \"birthDate\": \"".$dateDob."\", \n\"birthPlace\": \"".$_SESSION['dataForm1']['hanwhapob1']."\",\n\"emailAddress\": \"".$_SESSION['dataForm1']['hanwhaemail']."\",\n\"mobilePhone\": \"".$_SESSION['dataForm1']['hanwhaphone']."\",\n\"homePhone\": \"".$_SESSION['dataForm1']['hanwhaHomephone']."\",\n\"lineAddress1\": \"".$_SESSION['dataForm1']['hanwhaKTPaddr1']."\",\n\"lineAddress2\": \"".$_SESSION['dataForm1']['hanwhaKTPaddr2']."\",\n\"cityAddress\": \"".$_SESSION['dataForm1']['hanwhaKTPcity2']."\",\n\"postalCode\": ".$_SESSION['dataForm1']['hanwhaKTPPostal'].",\n\"sameMailing\": \"".$_SESSION['dataForm1']['hanwhaSameMailing']."\",\n\"mailingLineAddress1\": \"".$_SESSION['dataForm1']['hanwhaMailaddr1']."\",\n\"mailingLineAddress2\": \"".$_SESSION['dataForm1']['hanwhaMailaddr2']."\",\n\"mailingCityAddress\": \"".$_SESSION['dataForm1']['hanwhaMailcity2']."\",\n\"mailingpostalCode\": ".$_SESSION['dataForm1']['hanwhaMailPostal'].",\n\"gender\": \"".$_SESSION['dataForm1']['hanwhagender']."\",\n\"jobType\": \"".$_SESSION['dataForm1']['hanwhawork']."\",\n\"identityType\": 1,\n\"identityNumber\": \"".$_SESSION['dataForm1']['hanwhanik']."\",\n\"incomeSource\": \"".$_SESSION['dataForm1']['hanwhasourceincome']."\",\n\"additionalProperties\": {\n\"jobDetail\": {\n\"uraianPekerjaan\": \"".$_SESSION['dataForm1']['hanwhaposition']."\",\n\"namaLembaga\": \"".$_SESSION['dataForm1']['hanwhacompanyname']."\",\n\t\t\t\t\"bidangUsaha\": \"".$_SESSION['dataForm1']['hanwhasector']." \"\n\t\t\t},\n\t\t\t\"maritalStatus\": \"".$_SESSION['dataForm1']['hanwhastatus']."\"\n\t\t}\n},";
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

    $portfields = "{\n\"personalData\": {\n\"fullName\": \"".$_SESSION['dataForm1']['hanwhaname']."\",\n    \"birthDate\": \"".$dateDob."\", \n\"birthPlace\": \"".$_SESSION['dataForm1']['hanwhapob1']."\",\n\"emailAddress\": \"".$_SESSION['dataForm1']['hanwhaemail']."\",\n\"mobilePhone\": \"".$_SESSION['dataForm1']['hanwhaphone']."\",\n\"homePhone\": \"".$_SESSION['dataForm1']['hanwhaHomephone']."\",\n\"lineAddress1\": \"".$_SESSION['dataForm1']['hanwhaKTPaddr1']."\",\n\"lineAddress2\": \"".$_SESSION['dataForm1']['hanwhaKTPaddr2']."\",\n\"cityAddress\": \"".$_SESSION['dataForm1']['hanwhaKTPcity2']."\",\n\"postalCode\": ".$_SESSION['dataForm1']['hanwhaKTPPostal'].",\n\"sameMailing\": \"".$_SESSION['dataForm1']['hanwhaSameMailing']."\",\n\"mailingLineAddress1\": \"".$_SESSION['dataForm1']['hanwhaMailaddr1']."\",\n\"mailingLineAddress2\": \"".$_SESSION['dataForm1']['hanwhaMailaddr2']."\",\n\"mailingCityAddress\": \"".$_SESSION['dataForm1']['hanwhaMailcity2']."\",\n\"mailingpostalCode\": ".$_SESSION['dataForm1']['hanwhaMailPostal'].",\n\"gender\": \"".$_SESSION['dataForm1']['hanwhagender']."\",\n\"jobType\": \"".$_SESSION['dataForm1']['hanwhawork']."\",\n\"identityType\": 1,\n\"identityNumber\": \"".$_SESSION['dataForm1']['hanwhanik']."\",\n\"incomeSource\": \"".$_SESSION['dataForm1']['hanwhasourceincome']."\",\n\"additionalProperties\": {\n\"jobDetail\": {\n\"uraianPekerjaan\": \"".$_SESSION['dataForm1']['hanwhaposition']."\",\n\"namaLembaga\": \"".$_SESSION['dataForm1']['hanwhacompanyname']."\",\n\t\t\t\t\"bidangUsaha\": \"".$_SESSION['dataForm1']['hanwhasector']." \"\n\t\t\t},\n\t\t\t\"maritalStatus\": \"".$_SESSION['dataForm1']['hanwhastatus']."\"\n\t\t}\n    },".$policy_holder.$input_bo."\n\n\"purchase\": {\n\"productId\": ".$dataplan['productId'].",\n\"referenceCode\": \"".$_SESSION['ropBank']['hanwhareferral']."\",\n\"productCode\": \"".$dataplan['productCode']."\",\n\"parentProductId\": ".$dataplan['productId'].",\n\"tenor\": ".$dataplan['tenor'].",\n\"paymentMethod\": \"".$dataplan['paymentMethod']."\",\n\"paymentType\": 2,\n\"up\": ".$dataplan['up'].",\n\"agrementDisclaimer\": 701,\n\"premium\": ".$dataplan['fixedPremiumAmount'].",\n\"autoDebet\": \"Y\",\n\"purchaseDate\": \"".$purchasedate."\",\n\"bankCode\": \"".$_SESSION['ropBank']['bankROP']."\",\n\"ropBankCode\": \"".$_SESSION['ropBank']['bankROP']."\",\n\"bankAccount\": \"".$_SESSION['ropBank']['ropAccNumber']."\",\n\"bankAccountName\": \"".$_SESSION['ropBank']['ropAccName']."\",\n\"ewalletNo\": \"".$_SESSION['ropBank']['ewalletNo']."\",\n\"ewalletType\": \"".$_SESSION['ropBank']['ewalletType']."\",\n\"ewalletName\": \"".$_SESSION['ropBank']['ewalletName']."\",\n\"additionalInfo\": {\n\"selfPurchaseFlag\": 1\n,\n\t\t\t\"dealsCode\": \"".$_SESSION['ropBank']['promoCode']."\"\n}\n},\n\"beneficiary\": [".$beneficiary_list."\n]\n}";
    // dd($portfields);
    // echo $portfields;
    // die();
    curl_setopt_array($curl, array(
      CURLOPT_PORT => "8080",
      CURLOPT_URL => $base_url."/hanwhaservices/member/signup",
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
        "token: ".$token
      ),
    ));


    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "Ini kan? cURL Error #:" . $err;
    } else {
        $write = "{\n\"personalData\": {\n\"fullName\": \"".$_SESSION['dataForm1']['hanwhaname']."\",\n    \"birthDate\": \"".$dateDob."\", \n\"birthPlace\": \"".$_SESSION['dataForm1']['hanwhapob1']."\",\n\"emailAddress\": \"".$_SESSION['dataForm1']['hanwhaemail']."\",\n\"mobilePhone\": \"".$_SESSION['dataForm1']['hanwhaphone']."\",\n\"homePhone\": \"".$_SESSION['dataForm1']['hanwhaHomephone']."\",\n\"lineAddress1\": \"".$_SESSION['dataForm1']['hanwhaKTPaddr1']."\",\n\"lineAddress2\": \"".$_SESSION['dataForm1']['hanwhaKTPaddr2']."\",\n\"cityAddress\": \"".$_SESSION['dataForm1']['hanwhaKTPcity2']."\",\n\"postalCode\": ".$_SESSION['dataForm1']['hanwhaKTPPostal'].",\n\"sameMailing\": \"".$_SESSION['dataForm1']['hanwhaSameMailing']."\",\n\"mailingLineAddress1\": \"".$_SESSION['dataForm1']['hanwhaMailaddr1']."\",\n\"mailingLineAddress2\": \"".$_SESSION['dataForm1']['hanwhaMailaddr2']."\",\n\"mailingCityAddress\": \"".$_SESSION['dataForm1']['hanwhaMailcity2']."\",\n\"mailingpostalCode\": ".$_SESSION['dataForm1']['hanwhaMailPostal'].",\n\"gender\": \"".$_SESSION['dataForm1']['hanwhagender']."\",\n\"jobType\": \"".$_SESSION['dataForm1']['hanwhawork']."\",\n\"identityType\": 1,\n\"identityNumber\": \"".$_SESSION['dataForm1']['hanwhanik']."\",\n\"incomeSource\": \"".$_SESSION['dataForm1']['hanwhasourceincome']."\",\n\"additionalProperties\": {\n\"jobDetail\": {\n\"uraianPekerjaan\": \"".$_SESSION['dataForm1']['hanwhaposition']."\",\n\"namaLembaga\": \"".$_SESSION['dataForm1']['hanwhacompanyname']."\",\n\t\t\t\t\"bidangUsaha\": \"".$_SESSION['dataForm1']['hanwhasector']." \"\n\t\t\t},\n\t\t\t\"dealsCode\": \"".$_SESSION['ropBank']['promoCode']."\",\n\t\t\t\"maritalStatus\": \"".$_SESSION['dataForm1']['hanwhastatus']."\"\n\t\t}\n    }".$input_bo."\n\n\"purchase\": {\n\"productId\": ".$dataplan['productId'].",\n\"referenceCode\": \"".$_SESSION['ropBank']['hanwhareferral']."\",\n\"productCode\": \"".$dataplan['productCode']."\",\n\"parentProductId\": ".$dataplan['productId'].",\n\"tenor\": ".$dataplan['tenor'].",\n\"paymentMethod\": \"".$dataplan['paymentMethod']."\",\n\"paymentType\": 2,\n\"up\": ".$dataplan['up'].",\n\"agrementDisclaimer\": 701,\n\"premium\": ".$dataplan['fixedPremiumAmount'].",\n\"autoDebet\": \"Y\",\n\"purchaseDate\": \"".$purchasedate."\",\n\"bankCode\": \"".$_SESSION['ropBank']['bankROP']."\",\n\"ropBankCode\": \"".$_SESSION['ropBank']['bankROP']."\",\n\"bankAccount\": \"".$_SESSION['ropBank']['ropAccNumber']."\",\n\"bankAccountName\": \"".$_SESSION['ropBank']['ropAccName']."\",\n\"additionalInfo\": {\n\"selfPurchaseFlag\": 1\n,\n\t\t\t\"dealsCode\": \"".$_SESSION['ropBank']['promoCode']."\"\n}\n},\n\"beneficiary\": [".$beneficiary_list."\n]\n}";
        $data = json_decode($response,true);
        writelogNewPurchase($portfields);
        //echo $write;
    }
    // print_r("signup");
}
else if(isset($_SESSION['newPurchaseExist'] )){
  // echo "<pre>";
  // print_r($_SESSION);
    if($_SESSION['dataForm1']['hanwhanik'] == ""){
        $url = $base_url."/hanwhaservices/purchase";

        $dateOfBirth = strtotime($_SESSION['newPurchaseExist']['birthDate']);
        $dateOfBirth = date("Ymd", $dateOfBirth);
      
        $policy_holder = "\"policyHolder\":{\n\"fullName\": \"".$_SESSION['newPurchaseExist']['fullName']."\",\n    \"birthDate\": \"".$dateOfBirth."\", \n\"birthPlace\": \"".$_SESSION['newPurchaseExist']['birthPlace']."\",\n\"emailAddress\": \"".$_SESSION['newPurchaseExist']['emailAddress']."\",\n\"mobilePhone\": \"".$_SESSION['newPurchaseExist']['mobilePhone']."\",\n\"homePhone\": \"".$_SESSION['newPurchaseExist']['homePhone']."\",\n\"lineAddress1\": \"".$_SESSION['newPurchaseExist']['mailingLineAddress1']."\",\n\"lineAddress2\": \"".$_SESSION['newPurchaseExist']['mailingLineAddress2']."\",\n\"cityAddress\": \"".$_SESSION['newPurchaseExist']['mailingCityAddress']."\",\n\"postalCode\": ".$_SESSION['newPurchaseExist']['postalCode'].",\n\"sameMailing\": \"1\",\n\"mailingLineAddress1\": \"0\",\n\"mailingLineAddress2\": \"0\",\n\"mailingCityAddress\": \"0\",\n\"mailingpostalCode\": 0,\n\"gender\": \"".$_SESSION['newPurchaseExist']['gender']."\",\n\"jobType\": \"".$_SESSION['newPurchaseExist']['jobType']."\",\n\"identityType\": 1,\n\"identityNumber\": \"".$_SESSION['newPurchaseExist']['identityNumber']."\",\n\"incomeSource\": \"".$_SESSION['newPurchaseExist']['incomeSource']."\",\n\"additionalProperties\": {\n\"jobDetail\": {\n\"uraianPekerjaan\": \"\",\n\"namaLembaga\": \"\",\n\t\t\t\t\"bidangUsaha\": \" \"\n\t\t\t},\n\t\t\t\"maritalStatus\": \"\"\n\t\t}\n},";

        $portfields = "{\r\n    \"memberId\": ".$_SESSION['sendMemberID'].",\r\n    \"productId\": ".$dataplan['productId'].",\r\n    \"referenceCode\": \"".$_SESSION['ropBank']['hanwhareferral']."\",\r\n    \"productCode\": \"".$dataplan['productCode']."\",\r\n    \"parentProductId\": ".$dataplan['parentProductId'].",\r\n    \"tenor\": ".$dataplan['tenor'].",\r\n    \"paymentMethod\": \"".$dataplan['paymentMethod']."\",\r\n    \"paymentType\": 2,\r\n    \"up\": ".$dataplan['up'].",\r\n    \"agrementDisclaimer\": 701,\r\n    \"premium\": ".$dataplan['fixedPremiumAmount'].",\r\n    \"autoDebet\":\"Y\",\r\n    \"purchaseDate\": \"".$purchasedate."\",\r\n    \"bankCode\": \"".$_SESSION['ropBank']['bankROP']."\",\n\"ropBankCode\": \"".$_SESSION['ropBank']['bankROP']."\",\n \"bankAccount\": \"".$_SESSION['ropBank']['ropAccNumber']."\",\r\n    \"bankAccountName\": \"".$_SESSION['ropBank']['ropAccName']."\"\r\n ,\n\"ewalletNo\": \"".$_SESSION['ropBank']['ewalletNo']."\",\n\"ewalletType\": \"".$_SESSION['ropBank']['ewalletType']."\",\n\"ewalletName\": \"".$_SESSION['ropBank']['ewalletName']."\",".$policy_holder."\n\"additionalInfo\": {\n\"selfPurchaseFlag\": 1\n,\n\t\t\t\"dealsCode\": \"".$_SESSION['ropBank']['promoCode']."\"\n},\r\n  \"beneficiary\": [\n ";
    }else{
        $url = $base_url."/hanwhaservices/member/signup";
        // echo $url;

        $policy_holder = "\"policyHolder\":{\n\"fullName\": \"".$_SESSION['dataForm1']['hanwhaname']."\",\n    \"birthDate\": \"".$dateDob."\", \n\"birthPlace\": \"".$_SESSION['dataForm1']['hanwhapob1']."\",\n\"emailAddress\": \"".$_SESSION['dataForm1']['hanwhaemail']."\",\n\"mobilePhone\": \"".$_SESSION['dataForm1']['hanwhaphone']."\",\n\"homePhone\": \"".$_SESSION['dataForm1']['hanwhaHomephone']."\",\n\"lineAddress1\": \"".$_SESSION['dataForm1']['hanwhaKTPaddr1']."\",\n\"lineAddress2\": \"".$_SESSION['dataForm1']['hanwhaKTPaddr2']."\",\n\"cityAddress\": \"".$_SESSION['dataForm1']['hanwhaKTPcity2']."\",\n\"postalCode\": ".$_SESSION['dataForm1']['hanwhaKTPPostal'].",\n\"sameMailing\": \"".$_SESSION['dataForm1']['hanwhaSameMailing']."\",\n\"mailingLineAddress1\": \"".$_SESSION['dataForm1']['hanwhaMailaddr1']."\",\n\"mailingLineAddress2\": \"".$_SESSION['dataForm1']['hanwhaMailaddr2']."\",\n\"mailingCityAddress\": \"".$_SESSION['dataForm1']['hanwhaMailcity2']."\",\n\"mailingpostalCode\": ".$_SESSION['dataForm1']['hanwhaMailPostal'].",\n\"gender\": \"".$_SESSION['dataForm1']['hanwhagender']."\",\n\"jobType\": \"".$_SESSION['dataForm1']['hanwhawork']."\",\n\"identityType\": 1,\n\"identityNumber\": \"".$_SESSION['dataForm1']['hanwhanik']."\",\n\"incomeSource\": \"".$_SESSION['dataForm1']['hanwhasourceincome']."\",\n\"additionalProperties\": {\n\"jobDetail\": {\n\"uraianPekerjaan\": \"".$_SESSION['dataForm1']['hanwhaposition']."\",\n\"namaLembaga\": \"".$_SESSION['dataForm1']['hanwhacompanyname']."\",\n\t\t\t\t\"bidangUsaha\": \"".$_SESSION['dataForm1']['hanwhasector']." \"\n\t\t\t},\n\t\t\t\"maritalStatus\": \"".$_SESSION['dataForm1']['hanwhastatus']."\"\n\t\t}\n},";

        $dateDob = str_replace("-","", $_SESSION['dataForm1']['hanwhadob']);
        $portfields = "{\n\"personalData\": {\n\"fullName\": \"".$_SESSION['dataForm1']['hanwhaname']."\",\n    \"birthDate\": \"".$dateDob."\", \n\"birthPlace\": \"".$_SESSION['dataForm1']['hanwhapob1']."\",\n\"emailAddress\": \"".$_SESSION['dataForm1']['hanwhaemail']."\",\n\"mobilePhone\": \"".$_SESSION['dataForm1']['hanwhaphone']."\",\n\"homePhone\": \"".$_SESSION['dataForm1']['hanwhaHomephone']."\",\n\"lineAddress1\": \"".$_SESSION['dataForm1']['hanwhaKTPaddr1']."\",\n\"lineAddress2\": \"".$_SESSION['dataForm1']['hanwhaKTPaddr2']."\",\n\"cityAddress\": \"".$_SESSION['dataForm1']['hanwhaKTPcity2']."\",\n\"postalCode\": ".$_SESSION['dataForm1']['hanwhaKTPPostal'].",\n\"sameMailing\": \"".$_SESSION['dataForm1']['hanwhaSameMailing']."\",\n\"mailingLineAddress1\": \"".$_SESSION['dataForm1']['hanwhaMailaddr1']."\",\n\"mailingLineAddress2\": \"".$_SESSION['dataForm1']['hanwhaMailaddr2']."\",\n\"mailingCityAddress\": \"".$_SESSION['dataForm1']['hanwhaMailcity2']."\",\n\"mailingpostalCode\": ".$_SESSION['dataForm1']['hanwhaMailPostal'].",\n\"gender\": \"".$_SESSION['dataForm1']['hanwhagender']."\",\n\"jobType\": \"".$_SESSION['dataForm1']['hanwhawork']."\",\n\"identityType\": 1,\n\"identityNumber\": \"".$_SESSION['dataForm1']['hanwhanik']."\",\n\"incomeSource\": \"".$_SESSION['dataForm1']['hanwhasourceincome']."\",\n\"additionalProperties\": {\n\"jobDetail\": {\n\"uraianPekerjaan\": \"".$_SESSION['dataForm1']['hanwhaposition']."\",\n\"namaLembaga\": \"".$_SESSION['dataForm1']['hanwhacompanyname']."\",\n\t\t\t\t\"bidangUsaha\": \"".$_SESSION['dataForm1']['hanwhasector']." \"\n\t\t\t},\n\t\t\t\"maritalStatus\": \"".$_SESSION['dataForm1']['hanwhastatus']."\"\n\t\t}\n    },".$policy_holder."\n\"purchase\": {\n\"productId\": ".$dataplan['productId'].",\n\"referenceCode\": \"".$_SESSION['ropBank']['hanwhareferral']."\",\n\"productCode\": \"".$dataplan['productCode']."\",\n\"parentProductId\": ".$dataplan['productId'].",\n\"tenor\": ".$dataplan['tenor'].",\n\"paymentMethod\": \"".$dataplan['paymentMethod']."\",\n\"paymentType\": 2,\n\"up\": ".$dataplan['up'].",\n\"agrementDisclaimer\": 701,\n\"premium\": ".$dataplan['fixedPremiumAmount'].",\n\"autoDebet\": \"Y\",\n\"purchaseDate\": \"".$purchasedate."\",\n\"bankCode\": \"".$_SESSION['ropBank']['bankROP']."\",\n\"ropBankCode\": \"".$_SESSION['ropBank']['bankROP']."\",\n\"bankAccount\": \"".$_SESSION['ropBank']['ropAccNumber']."\",\n\"bankAccountName\": \"".$_SESSION['ropBank']['ropAccName']."\",\n\"ewalletNo\": \"".$_SESSION['ropBank']['ewalletNo']."\",\n\"ewalletType\": \"".$_SESSION['ropBank']['ewalletType']."\",\n\"ewalletName\": \"".$_SESSION['ropBank']['ewalletName']."\",\n\"additionalInfo\": {\n\"selfPurchaseFlag\": 1\n,\n\t\t\t\"dealsCode\": \"".$_SESSION['ropBank']['promoCode']."\"\n}\n},\n\"beneficiary\": [\n ";
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

    // dd($portfields);
    // echo $portfields;
    // die();
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>$portfields,
      CURLOPT_HTTPHEADER => array(
        "token: ".$token,
        "Accept: application/json",
        "Content-Type: application/json",
        "Content-Type: text/plain"
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
}


// echo "<div style='display:block;width: 100%; overflow: scroll;'>".$portfields."</div>";
?>

<div class="row" style="margin-bottom: 20px;">
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
                }else if($data['result_code'] == 3103){
            ?>
              
                    
              <div class="row" style="padding: 0px !important; margin: 0px !important; display: -webkit-box; display: none;">
                    <img class="col-lg-10 col-md-10 col-10" src="../assets/images/form/steps/step-07.png" width="100%">
                </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-12 align-self-center">
                  <div class="step" style="margin-bottom: 2%; text-align:center;">
                      <img src="/assets/images/form/Hanwhalife-bucketlist-thankyou-va.png" style="text-align:center; margin-bottom: 15px;">
                      <h3>Mohon Maaf</h3>
                      <p style="text-align:center;">Email/KTp/No handphone anda sudah pernah digunakan sebelumnya. Silahkan LOGIN untuk melakukan pembelian</p>
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
                              <p style="text-align:center; width: 100%;">Silahkan cek email anda untuk aktivasi account</p>
                              <br>
                              <br>
                              <a href="profile" class="btn2">FINISH</a>
                          </div>
                        </div>
                      </div>

                      <?php
                }else if($data['result_code'] == 3107 || $data['result_code'] == 1005){
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
                    <?php 
                    // print_r($response);
                    if($data['result_code'] != 3100 && $data['result_code'] != 4201){ ?>
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
<?php 
// echo $resultcode."<br>";
// echo $token."<br>";
// echo $response;
// echo $url;
// // echo "<pre>";
// // print_r($_SESSION);
// // echo "</pre>";
// echo $portfields;
?>