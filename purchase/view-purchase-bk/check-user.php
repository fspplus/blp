<?php 
    $curl = curl_init();

    if(isset($_GET['email'])){
        $sendIcons = ".divEmail";
    }
    if(isset($_GET['phoneNum'])){
        $sendIcons = ".divPhone";
    }
    if(isset($_GET['nik'])){
        $sendIcons = ".divNIK";
    }

    curl_setopt_array($curl, array(
      CURLOPT_PORT => "8080",
      CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/member/collect?skip=0&max=1",
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

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
        //echo $response;
        $data = json_decode($response, "true");
        $datas = json_decode($data['data'], "true");
        if($data['result_code'] == 1000){
            //print_r($datas);
            echo "<ul style='color: red;'>";
            if($datas[0]['emailAddress'] == $_GET['email']){
                echo "<script>$('.divEmail .icon').css('display','block')</script>";
                echo "<li>Email sudah terdaftar</li>";
            }
            if($datas[0]['mobilePhone'] == $_GET['phoneNum']){
                echo "<script>$('.divPhone .icon').css('display','block')</script>";
                echo "<li>Nomor telphone sudah terdaftar</li>";
            }
            if($datas[0]['identityNumber'] == $_GET['nik']){
                echo "<script>$('.divNik .icon').css('display','block')</script>";
                echo "<li>Nomor KTP sudah terdaftar.</li>";
            }
            echo "</ul>";
            echo "<script>$('.btn-submitter').attr('disabled','true')</script>";
        }else if($data['result_code'] = 1001){
            echo "<script>$('.btn-submitter').removeAttr('disabled'); $('".$sendIcons." .icon').css('display', 'none');</script>";
        }
    }
?>