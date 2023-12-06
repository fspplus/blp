<?php

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    include '/var/www/html/jsonapp/json-hanwha-api.php';
    $bankLists = bankADlist();
    foreach($bankLists as $list){
        // print_r($list);
        if($list['codeId'] == $_POST['bankName']){
            $_POST['autodebetBankname'] = $list['codeValue'];
        }
    }

    $json_form = array();
    $json_form['orderId'] = $_POST['orderId'];
    $json_form['paymentType'] = $_POST['paymentType'];
    $json_form['autodebetBankno'] = $_POST['bankNumhber'];
    $json_form['autodebetBankname'] = $_POST['autodebetBankname'];
    $json_form['autodebetBankcode'] = $_POST['bankName'];
    $json_form['autodebetCCexpdt'] = "";

    $json_sent = json_encode($json_form);
    // print_r($json_sent);

    $key = keyapi();

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://192.168.70.70:8080/hanwhaservices/member/updautodebetbank',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>$json_sent,
        CURLOPT_HTTPHEADER => array(
            $key,
          'Accept: application/json',
          'Content-Type: application/json'
        ),
      ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    // echo $response;

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    }else if($response == NULL){
        ?>
            <script>
                alert("Data gagal diupdate!");
                window.location.href = "/purchase/payment-method?orderId=<?php echo $_POST['orderId']; ?>";
            </script>
        <?php
    } else {
        $data = json_decode($response, true);
        if($data['result_code'] == 1210){
            ?>
                <script>
                    alert("Data berhasil diupdate!");
                    window.location.href = "/purchase/profile?orderId=<?php echo $_POST['orderId']; ?>";
                </script>
            <?php
        }
    }
    // return $dataFull;