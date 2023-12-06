<?php
if(!isset($_POST['vldnm'])){
    header("Location: ../profile?err=1");
}else{
    /*$curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_PORT => "8080",
      CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/member/update",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{\n  \"memberId\": 278,\n\t\"sameMailing\": 0,\n\t\"memberType\": 3,\n\t\"identityType\": 1,\n\t\"jobType\": \"job2\",\n\t\"hanwhaReferenceCode\": 19919712,\n\t\"mobilePhone\": 8569888077,\n\t\"homePhone\": 8569888077,\n\t\"incomeSource\": \"SLR\",\n\t\"lineAddress1\": \"UMN\",\n\t\"lineAddress2\": \"Gading Serpong\",\n\t\"cityAddress\": \"Tangerang\",\n\t\"postalCode\": \"15810\"\n}",
      CURLOPT_HTTPHEADER => array(
        "Accept: application/json",
        "Accept-Encoding: gzip, deflate",
        "Cache-Control: no-cache",
        "Connection: keep-alive",
        "Content-Length: 322",
        "Content-Type: application/json",
        "Host: 192.168.70.70:8080",
        "User-Agent: PostmanRuntime/7.19.0",
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
      echo $response;
    }*/
    
    print_r($_POST);
}
?>