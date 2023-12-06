<?php
    date_default_timezone_set("Asia/Bangkok");
    function writelog(){
        $logurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $date = date("H:i:s Y-m-d");
        
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        $logip = $ipaddress;
        
        $log = $logip." ".$logurl." ".$date."\n";
        //echo "../../assets/log/log".date("d-m-Y").".log";
        file_put_contents("/var/www/html/assets/log/log".date("d-m-Y").".log", $log, FILE_APPEND);
    }
    function read_meta($urlmeta){
        if($urlmeta == NULL || $urlmeta == ""){
            echo "Koreaversikamu by Hanwha Life Insurance";
        }else{
            echo "Koreaversikamu by Hanwha Life Insurance - ".$urlmeta;
        }
    }
    function getcity($conn){
        $mysql = "SELECT * FROM kabupaten SORT ORDER BY nama ASC";
        $query = mysqli_query($conn,$mysql);
        if($query->num_rows > 0){
            while($data = mysqli_fetch_array($query)){
                //print_r($data);
                $data['nama'] = ucfirst(strtolower($data['nama']));
                echo "<option value=".$data['nama'].">".$data['nama']."</option>";
            }
        }
    }
    function getcityVal($conn){
        $mysql = "SELECT * FROM kabupaten SORT ORDER BY nama ASC";
        $query = mysqli_query($conn,$mysql);
        $ctr = 0;
        if($query->num_rows > 0){
            while($data = mysqli_fetch_array($query)){
                //print_r($data);
                $dataCont[$ctr] = ucfirst(strtolower($data['nama']));
                //echo "<option value=".$data['nama'].">".$data['nama']."</option>";
                $ctr += 1;
            }
        }
        $valuePrint = json_encode($dataCont, true);
        print_r($valuePrint);
        //echo $valuePrint;
    }
    function enabledebug(){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }
    function googlechecker(){
        if($_POST['googlecheck'] != NULL){
            echo "<script>alert('BOTS GO AWAY!'); window.location.href='./';</script>";
        }else{
            return NULL;
        }
    }
    
    function keyapi(){
        $key = "token: wSP+b1UNHLe6Q13RnVEiyWlDFuPqKR5Gl+rWovjh8Y9+wYV6i0zM+A2c14nvoFvH";
        return $key;
    }
    function keyurl(){
        $url = "http://192.168.70.70:8080/hanwhaservices";
        return $url;
    }
    //functional interaction
    function hanwharegister($dataArray){
        
        $key = keyapi();
        $url = keyurl();
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/member/signup",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\r\n  \"personalData\": {\r\n    \"fullName\": \"I Gusti P\",\r\n    \"birthDate\": \"20180824\",\r\n    \"emailAddress\": \"gusti.anom@gmail.com\",\r\n    \"mobilePhone\": \"002591\",\r\n    \"homePhone\": \"02177\",\r\n    \"lineAddress1\": \"WTC 1, lt 12\",\r\n    \"lineAddress2\": \"Jl. Jendral Sudirman\",\r\n    \"cityAddress\": \"Jakarta\",\r\n    \"postalCode\": 12348,\r\n    \"sameMailing\": \"0\" ,\r\n    \"mailingLineAddress1\": \"WTC 2, lt 12\",\r\n    \"mailingLineAddress2\": \"Jl. Jendral Sudirman\",\r\n    \"mailingCityAddress\": \"Jakarta\",\r\n    \"mailingpostalCode\": 12345,\r\n    \"gender\": \"M\",\r\n    \"jobType\": \"JOB2\",\r\n    \"identityType\": 1, \r\n    \"identityNumber\": \"92992\",\r\n    \"credential\": \"9392933\"\r\n  },\r\n  \"purchase\": {\r\n    \"productId\": 2,\r\n    \"referenceCode\": \"DCX39B\",\r\n    \"productCode\": \"B.101\",\r\n    \"parentProductId\": 1,\r\n    \"tenor\": 12,\r\n    \"paymentMethod\": \"M\",\r\n    \"paymentType\": 2,\r\n    \"up\": 1500000,\r\n    \"agrementDisclaimer\": 1,\r\n    \"premium\": 400000,\r\n    \"autoDebet\":\"Y\",\r\n    \"purchaseDate\": \"20180821092122\",\r\n    \"bankCode\": \"013\",\r\n    \"bankAccount\": \"09232039\"\r\n  },\r\n  \"beneficiary\": [\r\n    {\r\n      \"name\": \"anom 2\",\r\n      \"famrel\": 2,\r\n      \"gender\": \"F\",\r\n      \"birthDate\": \"19790908\",\r\n      \"percentage\": 50,\r\n      \"email\": \"aa.bb.com\"\r\n    },\r\n    {\r\n      \"name\": \"anom 1\",\r\n      \"famrel\": 3,\r\n      \"gender\": \"F\",\r\n      \"birthDate\": \"19790908\",\r\n      \"percentage\": 50,\r\n      \"email\": \"cc@dd.com\"\r\n    }\r\n  ]\r\n}\r\n",
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: e626cca0-dcf7-4f6f-a86d-6044b3989825",
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
        }
        return $data['result_code'];
    }

    //acquire information
    function banklist(){
        
        $key = keyapi();
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/properties/banks",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "cache-control: no-cache",
            "content-type: application/json",
            "postman-token: b3e962b3-dc21-afd3-b184-c368a627204f",
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
            $dataFull = json_decode($data['data'], true);
        }
        return $dataFull;
    }
    function jobdesclist(){
        
        $key = keyapi();
        $url = keyurl();
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://192.168.0.220:8080/hanwhaservices/properties/jobdesc",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Accept-Encoding: gzip, deflate",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Content-Length: ",
            "Content-Type: application/json",
            "Host: 192.168.0.220:8080",
            "Postman-Token: a79f4dcb-f686-4172-add1-296f68a39c6c,88403722-7fa2-4062-a146-5c2d05aca1d3",
            "User-Agent: PostmanRuntime/7.16.3",
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
            $dataFull = json_decode($data['data'], true);
        }
        return $dataFull;
    }
    function familyrelationshiplist(){
        
        $key = keyapi();
        $url = keyurl();
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => $url."/properties/familyrelation",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "cache-control: no-cache",
            "content-type: application/json",
            "postman-token: 3f008b71-18c0-f942-a1c3-00c26f3ef9a9",
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
            $dataFull = json_decode($data['data'], true);
        }
        return $dataFull;
    }
    function sourceincome(){
        
        $key = keyapi();
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/properties/incomesource",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: a145805d-3c93-42e5-9873-4d4a7f6c1a9f",
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
            $dataFull = json_decode($data['data'], true);
        }
        return $dataFull;
    }
    function searchEmail($email){
        
        $key = keyapi();
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/member/search/".$email,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "cache-control: no-cache",
            "content-type: application/json",
            "postman-token: d8e9ebed-fe74-e132-b78c-bc13bc8af50f",
            $key
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        }  else {
            $data = json_decode($response, true);
            $dataFull = json_decode($data['data'], true);
        }
        return $dataFull;
    }
    function searchPlan($plan){
        
        $key = keyapi();
        $curl = curl_init();
        $url = "http://192.168.70.70:8080/hanwhaservices/product/search/".$plan;
        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: 35cbe2c0-d059-498d-8e93-96edeacee5ae",
            $key
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        }  else {
            $data = json_decode($response, true);
            if($data['result_code'] != NULL && $data['result_code'] == 1106){
                $data = -100;
            }else{
                $data = json_decode($data['data'], true);
            }
            //
        }
        return $data;
    }
    function productId(){
        
        $key = keyapi();
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/properties/banks",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: 256e59dc-3c82-494b-b882-8c5f5214c799",
            $key
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        }  else {
            $data = json_decode($response, true);
            $dataFull = json_decode($data['data'], true);
        }
        return $dataFull;
    }
    function signin($email, $password){
        
        $key = keyapi();
        $curl = curl_init();
        
        $sendemail = "email: ".$email;
        $sendpass = "password: ".$password;

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          //CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/member/signin",
          CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/member/signin",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: 4f9b2d8b-6c68-49a4-ad74-0b93b4d4284e",
            $sendemail,
            $sendpass,
            $key
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        }else {
            $data = json_decode($response, true);
            if($data == 1000){
                $result = TRUE;
            }else{
                $result = FALSE;
            }
            $dataFull = json_decode($data['data'], true);
        }
        return $dataFull;
    }
    function getmember($email){
        
        $key = keyapi();
        $curl = curl_init();
        
        $url = "http://192.168.70.70:8080/hanwhaservices/member/search/".$email;

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: fb36443d-5a81-457a-8949-c056b480b18b",
            $key
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        }else {
            $data = json_decode($response, true);
            if($data == 1000){
                $result = TRUE;
            }else{
                $result = FALSE;
            }
            $dataFull = json_decode($data['data'], true);
        }
        return $dataFull;
    }
    function verifyhash($hash){
        
        $key = keyapi();
        $curl = curl_init();
        
        $hash = urlencode($hash);
        
        $url = "http://192.168.70.70:8080/hanwhaservices/member/signup/confirm/".$hash;
        
        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: 557d95f3-08e5-4b81-a56b-ad55abc7ec29",
            $key
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        }else {
            $data = json_decode($response, true);
        }
        return $data;
    }
    function confirmemail($hash){

            $key = keyapi();
            $curl = curl_init();

            $hash = urlencode($hash);

            $url = "http://192.168.70.70:8080/hanwhaservices/member/changeemail/confirmchange/".$hash;

            curl_setopt_array($curl, array(
              CURLOPT_PORT => "8080",
              CURLOPT_URL => $url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Cache-Control: no-cache",
                "Content-Type: application/json",
                "Postman-Token: 557d95f3-08e5-4b81-a56b-ad55abc7ec29",
                $key
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              echo "cURL Error #:" . $err;
            }else {
                $data = json_decode($response, true);
            }
            return $data;
        }
    function verifyinfluencer($hash){
        
        $key = keyapi();
        $curl = curl_init();
        
        $hash = urlencode($hash);
        //echo "hash is: ".$hash."<br>";
        $url = "http://192.168.70.70:8080/hanwhaservices/influencer/confirm/".$hash;
        //echo "url is: ". $url."<br>";
        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: 557d95f3-08e5-4b81-a56b-ad55abc7ec29",
            $key
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        }else {
            $data = json_decode($response, true);
        }
        print_r($data);
        return $data;
    }
    function registerinfluencer($postfiles){
        
        $key = keyapi();
        $curl = curl_init();
        
        $dob = explode('-',$postfiles['hanwhabirthdate']);
        $date = $dob['2'];
        $month = $dob['1'];
        $year = $dob['0'];
        $postfiles['tanggallahir'] = $year.$month.$date;
        $postfiles['hanwhamobile'] = str_replace("+", "", $postfiles['hanwhamobile']);
        
        $postfields = "{\r\n  \"emailAddress\": \"".$postfiles['hanwhaemail']."\",\r\n  \"fullName\": \"".$postfiles['hanwhafullname']."\",\r\n  \"dob\": \"".$postfiles['tanggallahir']."\",\r\n  \"phone\": \"".$postfiles['hanwhamobile']."\",\r\n  \"gender\": \"".$postfiles['hanwhagender']."\",\r\n  \"instaId\": \"".$postfiles['hanwhaig']."\"\r\n}";
        
        
        $logurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        $logip = $ipaddress;
        
        $log = $logip." ".$logurl." ".$date." ".$postfields."\n";
        //echo "../../assets/log/log".date("d-m-Y").".log";
        file_put_contents("/var/www/html/assets/log/log".date("d-m-Y").".log", $log, FILE_APPEND);
        
        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/influencer/apply",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $postfields,
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: ec48802c-93bf-4e3a-bcb6-edb7d36b998a",
            $key
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        //echo $postfields;
        curl_close($curl);
        if ($err) {
          echo "cURL Error #:" . $err;
        }else {
            $data = json_decode($response, true);
            //echo $data;
        }
        return $data;
    }
    function setnewpassword($postfiles){
        
        $key = keyapi();
        $curl = curl_init();
        
        $postfields = "{\r\n\t\"newpassword\":\"".$postfiles['passwordOne']."\", \r\n\t\"confirmpassword\":\"".$postfiles['passwordTwo']."\",\r\n\t\"verifycode\":\"".$postfiles['key']."\"\r\n}\r\n";
        
        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/member/resetpassword/performreset",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $postfields,
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: 4a7d3a3a-8ef4-4108-a93c-b37ea9580255",
            $key
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        if ($err) {
          echo "cURL Error #:" . $err;
        }else {
            $data = json_decode($response, true);
        }
        return $data;
    }
    function getbeneficiary($memberid){
        
        $key = keyapi();
        
        $curl = curl_init();
        $url = "http://192.168.70.70:8080/hanwhaservices/beneficiary/collect?memberId=".$memberid."&skip=0&max=10";
        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: 274d81f5-d272-40a7-8f64-31e27dfa881d",
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
            $dataFull = json_decode($data['data'], true);
        }
        return $dataFull;
    }
    function getspecific($memberid, $arrayforbenef){
        //$count = count($arrayforbenef);
        $counter = 0;
        $dataspec[] = array();
        $listbenef = getbeneficiary($memberid);
        $countbenef = count($listbenef);
        $counterForm = 0;
        //print_r($arrayforbenef);
        
        foreach($listbenef as $list){
            //$dataspec['rotate'][] = $list;
            if($arrayforbenef == $list['name']){
                $dataspec['name'] = $list['name'];
                $dataspec['famrel'] = $list['famrel'];
                $dataspec['gender'] = $list['gender'];
                $dataspec['email'] = $list['email'];
                $dataspec['mobileNo'] = $list['mobileNo'];
                $dataspec['birthDate'] = $list['birthDate'];
            }
        }
        return $dataspec;
    }
    function getspecifics($memberid, $arrayforbenef){
        $count = count($arrayforbenef);
        $counter = 0;
        $dataspec[] = array();
        $listbenef = getbeneficiary($memberid);
        $countbenef = count($listbenef);
        $counterForm = 0;
        //print_r($arrayforbenef);
        
        while($counterForm < $count){
            $counter = 0;
                //print_r($arrayforbenef[$counterForm]);
            while($counter < $countbenef){
                if($arrayforbenef[$counterForm] == $listbenef[$counter]['name']){
                    
                //print_r($listbenef[$counter]);
                    $dataspec[$counterForm]['name'] = $listbenef[$counter]['name'];
                    $dataspec[$counterForm]['famrel'] = $listbenef[$counter]['famrel'];
                    $dataspec[$counterForm]['gender'] = $listbenef[$counter]['gender'];
                    $dataspec[$counterForm]['email'] = $listbenef[$counter]['email'];
                    $dataspec[$counterForm]['mobileNo'] = $listbenef[$counter]['mobileNo'];
                    $dataspec[$counterForm]['birthDate'] = $listbenef[$counter]['birthDate'];
                    $dataspec[$counterForm]['seqNo'] = $listbenef[$counter]['seqNo'];
                }
                $counter += 1;
            }
            $counterForm += 1;
            //echo $counterForm;
        }
        return $dataspec;
    }
    function forgetpassword($email){
        
        $key = keyapi();
        
        $curl = curl_init();
        $postfields = "{\r\n  \"email\":\"".$email."\"\r\n}\r\n";
        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/member/resetpassword/request",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $postfields,
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: 5c6bb134-7b92-4f39-ad89-37bbfd84f949",
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
        }
        return $data;
    }
    function getRelationshipName($ident){
        $datalist = familyrelationshiplist();
        $set = $ident - 1;
        echo $datalist[$set]['codeValue'];
    }
    function getrefs($reffcode){
        
        $key = keyapi();
        $portfields = "{\r\n  \"referenceCode\":\"".$reffcode."\"\r\n}\r\n";
        
        $curl = curl_init();
        $postfields = "{\r\n  \"email\":\"".$reffcode."\"\r\n}\r\n";
        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/influencer/myreference?skip=0&max=10&VIEW_FOR_NB_ONLY=Y",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $portfields,
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: 609b8d8c-e64d-4313-9145-50efb52efbac",
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
            $data = json_decode($data['data'], true);
        }
        return $data;
    }
    function getproducts($memberid){
        
        $key = keyapi();
        $url = keyurl();
        $portfields = "{\n\t\"memberId\":".$memberid."\n}";
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/member/mypurchase?skip=0&max=100",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $portfields,
          CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: 0c0890ba-bc32-4d1d-9e62-654a7c21efc6",
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
            $dataFull = json_decode($data['data'], true);
        }
        return $dataFull;
    }
    function changepassword($memberid, $post){
        $key = keyapi();
        
        $portfields = "{\r\n  \"memberId\": ".$memberid.",\r\n  \"oldpassword\": \"".$post['oldPassword']."\",\r\n  \"newpassword\": \"".$post['newPassword']."\"\r\n}\r\n";
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/member/changepassword",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $portfields,
          CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: 0c0890ba-bc32-4d1d-9e62-654a7c21efc6",
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
        }
        return $data['result_code'];
    }
    function changeemail($memberid, $post){
        $key = keyapi();
        
        $portfields = "{\r\n  \"memberId\": ".$memberid.",\r\n  \"email\": \"".$post['newEmail']."\",\r\n  \"currentpassword\": \"".$post['newPassword']."\"\r\n}\r\n";
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/member/changeemail/request",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $portfields,
          CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: 0c0890ba-bc32-4d1d-9e62-654a7c21efc6",
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
        }
        return $data['result_code'];
    }
    function addbenef($memberid, $post){
        $key = keyapi();
        
        $post['tanggalbenef'] = strtotime($post['tanggalbenef']);
        $post['tanggalbenef'] = date("Ymd", $post['tanggalbenef']);
        
        $portfields = "{\n\t\"memberId\":".$memberid.",\n\t \"mobileNo\":\"".$post['telbenef']."\",\n          \"name\": \"".$post['fullnamebenef']."\",\n      \"famrel\": ".$post['hubunganbenef'].",\n      \"gender\": \"".$post['genderbenef']."\",\n      \"birthDate\": \"".$post['tanggalbenef']."\",\n      \"email\": \"".$post['emailbenef']."\"\n}";
        echo $portfields;
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://114.6.22.115:8080/hanwhaservices/beneficiary/add",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $portfields,
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Content-Type: application/json",
            "Postman-Token: 5141d346-c0be-4666-b2bb-ffdf91cfd232",
            "cache-control: no-cache",
            $key
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
            print_r($response);
            $data = json_decode($response, true);
        }
        return $data['result_code'];
    }
    function sendfail(){
        $key = keyapi();
        
        $portfields = "{\n\t\"memberId\":".$memberid.",\n\t \"mobileNo\":\"".$post['telbenef']."\",\n          \"name\": \"".$post['fullnamebenef']."\",\n      \"famrel\": ".$post['hubunganbenef'].",\n      \"gender\": \"".$post['genderbenef']."\",\n      \"birthDate\": \"".$post['tanggalbenef']."\",\n      \"email\": \"".$post['emailbenef']."\"\n}";
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/payment/midtrans/notification/unfinished",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $portfields,
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: e9b03060-8fc1-4ccb-9d4d-383f24c33bdb",
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
        }
        return $data['result_code'];
    }
    function sendsuccess(){
        $key = keyapi();
        
        $portfields = "{\n\t\"memberId\":".$memberid.",\n\t \"mobileNo\":\"".$post['telbenef']."\",\n          \"name\": \"".$post['fullnamebenef']."\",\n      \"famrel\": ".$post['hubunganbenef'].",\n      \"gender\": \"".$post['genderbenef']."\",\n      \"birthDate\": \"".$post['tanggalbenef']."\",\n      \"email\": \"".$post['emailbenef']."\"\n}";
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/payment/midtrans/notification/finish",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $portfields,
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: e9b03060-8fc1-4ccb-9d4d-383f24c33bdb",
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
        }
        return $data['result_code'];
    }
    function senderror(){
        $key = keyapi();
        
        $portfields = "{\n\t\"memberId\":".$memberid.",\n\t \"mobileNo\":\"".$post['telbenef']."\",\n          \"name\": \"".$post['fullnamebenef']."\",\n      \"famrel\": ".$post['hubunganbenef'].",\n      \"gender\": \"".$post['genderbenef']."\",\n      \"birthDate\": \"".$post['tanggalbenef']."\",\n      \"email\": \"".$post['emailbenef']."\"\n}";
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/payment/midtrans/notification/failed",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $portfields,
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: e9b03060-8fc1-4ccb-9d4d-383f24c33bdb",
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
        }
        return $data['result_code'];
    }
    function getpolicy($policycode){
        $key = keyapi();
        
        $url = "http://192.168.70.70:8080/hanwhaservices/member/epolicy/".$policycode;
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Postman-Token: e9b03060-8fc1-4ccb-9d4d-383f24c33bdb",
            $key
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
            $data = TRUE;
        }
    }
    function updateprofile($profile, $memberid){
        $key = keyapi();
        
        $url = "http://139.255.97.238:8080/hanwhaservices/member/epolicy/".$policycode;
        $url = "http://114.6.22.115:8080/hanwhaservices/member/update";
        
        $curl = curl_init();
        
        $portfields = "{\r\n\t\"memberId\": ".$memberid.",\r\n  \"gender\":\"".$profile['genderupdate']."\",\r\n  \"lineAddress1\":\"".$profile['addrline1']."\",\r\n  \"lineAddress2\":\"".$profile['addrline2']."\",\r\n  \"cityAddress\":\"".$profile['cityline1']."\",\r\n  \"postalCode\":\"".$profile['postaladdr']."\"\r\n}\r\n";

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://114.6.22.115:8080/hanwhaservices/member/update",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $portfields,
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Content-Type: application/json",
            "Postman-Token: 88050766-a345-4f5b-838f-7a5d534fb559",
            "cache-control: no-cache",
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
        }
        return $data['result_code'];
    }
function getBrowser() 
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";
    
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'IE'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    }else{
        $bname = $u_agent;
        $ub = $u_agent;
    }
    
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
       
    }
    
    $i = count($matches['browser']);
    if ($i != 1) {
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            //$version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
    
    if ($version==null || $version=="") {$version="?";}
    
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'pattern'    => $pattern
    );
} 
?>
