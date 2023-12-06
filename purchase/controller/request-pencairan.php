<?php 
    session_start();
    session_set_cookie_params(0);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    include '/var/www/html/jsonapp/json-hanwha-api.php';

    $dataUser = getmember($_SESSION['email']);
    $reffmate_income = reffmateIncome($dataUser['hanwhaReferenceCode']);
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://192.168.70.70:8080/hanwhaservices/sendmail',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "recipientMemberId": "-1",
            "recipientName": "'.$dataUser['fullName'].'", //full name
            "recipientEmailAddress": "'.$dataUser['emailAddress'].'", //email address
            "recipientPolicyCode": "", //no polis
            "mailCode": "REFMATECAIR", //dont change
            "replyToEmailAddress": "digital.agency@hanwhalife.co.id", //dont change
            "replyToRealName": "TEST Informasi Pencairan Dana Referral Mate", //dont change/ask digital agency for wording
            "applicationSourceName": "bucketlist", //dont change
            "maillBCC": [
                "winda.afua@hanwhalife.co.id",
                "ari.jumari@hanwhalife.co.id" //dont change
            ],
            "mailData": {
                "emailAddress": "'.$dataUser['emailAddress'].'", //email address
                "Amount": "'.$reffmate_income['data']['totComm'].'" //Refferal Mate Amount
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'token: wSP+b1UNHLe6Q13RnVEiyWlDFuPqKR5Gl+rWovjh8Y9+wYV6i0zM+A2c14nvoFvH',
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
?>