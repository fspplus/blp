<?php 
    $curl = curl_init();

    if(isset($_GET['email'])){
        $sendIcons = ".divEmail";
    }
    if(isset($_GET['phoneNum'])){
        $sendIcons = ".divPhone";
        if(substr($_GET['phoneNum'], 0 ,1) === "0"){
            $_GET['phoneNum'] = "62".substr($_GET['phoneNum'], 1, 15);
        }
    }
    if(isset($_GET['nik'])){
        $sendIcons = ".divNIK";
    }

    curl_setopt_array($curl, array(
      CURLOPT_PORT => "8080",
      CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/member/collect?skip=0&max=100",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{\n                \"mobilePhone\": \"".$_GET['phoneNum']."\",\n                \"emailAddress\": \"".$_GET['email']."\",\n                \"identityNumber\": \"".$_GET['nik']."\"\n}",
      CURLOPT_HTTPHEADER => array(
        "Accept: application/json",
        "Accept-Encoding: gzip, deflate",
        "Cache-Control: no-cache",
        "Connection: keep-alive",
        "Content-Type: application/json",
        "cache-control: no-cache",
        "token: wSP+b1UNHLe6Q13RnVEiyWlDFuPqKR5Gl+rWovjh8Y9+wYV6i0zM+A2c14nvoFvH"
      ),
    ));
    // echo "{\n                \"mobilePhone\": \"".$_GET['phoneNum']."\",\n                \"emailAddress\": \"".$_GET['email']."\",\n                \"identityNumber\": \"".$_GET['nik']."\"\n}'";

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
        // echo $response;
        $data = json_decode($response, "true");
        $dataAll = json_decode($data['data'], "true");
        // print_r($datas);
        // echo "{\n                \"mobilePhone\": \"".$_GET['phoneNum']."\",\n                \"emailAddress\": \"".$_GET['email']."\",\n                \"identityNumber\": \"".$_GET['nik']."\"\n}'";
        if($data['result_code'] == 1000){
            $emailYes = $phoneYes = $identityYes = false;
            foreach($dataAll as $datas){
                if($datas['emailAddress'] == $_GET['email'] && $datas['emailAddress'] != NULL){
                    $emailYes = true;
                }
                if($datas['mobilePhone'] == $_GET['phoneNum'] && $datas['mobilePhone'] != NULL){
                    $phoneYes = true;
                }
                if($datas['identityNumber'] == $_GET['nik'] && $datas['identityNumber'] != NULL){
                    $identityYes = true;
                }
            }

            echo "<ul style='color: red;'>";
            if($emailYes == true){
                echo "<script>$('.divEmail .icon').css('display','block')</script>";
                echo "<li>Email sudah terdaftar</li>";
            }else{
                echo "<script>$('.divEmail .icon').hide()</script>";
            }
            if($phoneYes == true){
                echo "<script>$('.divPhone .icon').css('display','block')</script>";
                echo "<li>Nomor telphone sudah terdaftar</li>";
            }else{
                echo "<script>$('.divPhone .icon').hide()</script>";
            }
            if($identityYes == true){
                echo "<script>$('.divNik .icon').css('display','block')</script>";
                echo "<li>Nomor KTP sudah terdaftar.</li>";
            }else{
                echo "<script>$('.divNik .icon').hide()</script>";
            }
            echo "</ul>";
            echo "<script>$('.btn-submitter').attr('disabled','true')</script>";
        }else if($data['result_code'] = 1001){
            echo "<script>$('.btn-submitter').removeAttr('disabled'); $('.icon').css('display', 'none');</script>";
        }
    }
?>