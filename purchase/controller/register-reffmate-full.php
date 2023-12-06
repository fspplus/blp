<?php
include '../jsonapp/json-hanwha-api.php';
if(!isset($_POST)){
    echo "None";
}else if(isset($_POST)){
    $dataUser = getmember($_POST['vldemail']);
    // define ('SITE_ROOT', realpath(dirname(__FILE__)));
    $unid = uniqid('reffmate');
    
    $name = $_POST['vldnm'];
    // $name = 924;
    $image = false;
    $img_loc['doc_account'] = "";
    $img_loc['doc_profile'] = "";
    $img_loc['doc_npwp'] = "";

    // print_r($_FILES['doc_account']);
    // die();

    $naming_file = $name."-".$_FILES['doc_account']['name'];
    $file_name = $_FILES['doc_account']['name'];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    // print_r($naming_file);
    // print_r($ext);
    // die();
    if(file_exists($_FILES['doc_account']['tmp_name'][0])) {
        $file_name = $_FILES['doc_account']['name'];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["doc_account"]["tmp_name"], '/var/www/html/assets/images/reffmate/' . $name ."-doc_account-".$unid."-".date("ymdHis").".".$ext);
        $img_loc['doc_account'] = '/var/www/html/assets/images/reffmate/' . $name ."-doc_account-".$unid."-".date("ymdHis").".".$ext;
        $image = true;
    }else{
        $image = false;
    }
    if(file_exists($_FILES['doc_profile']['tmp_name'][0])) {
        $file_name = $_FILES['doc_profile']['name'];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["doc_profile"]["tmp_name"], '/var/www/html/assets/images/reffmate/' . $name ."-doc_profile-".$unid."-".date("ymdHis").".".$ext);
        $img_loc['doc_profile'] = '/var/www/html/assets/images/reffmate/' . $name ."-doc_profile-".$unid."-".date("ymdHis").".".$ext;
        $image = true;
    }else{
        $image = false;
    }
    if(file_exists($_FILES['doc_npwp']['tmp_name'][0])) {
        $file_name = $_FILES['doc_npwp']['name'];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["doc_npwp"]["tmp_name"], '/var/www/html/assets/images/reffmate/' . $name ."-doc_npwp-".$unid."-".date("ymdHis").".".$ext);
        $img_loc['doc_npwp'] = '/var/www/html/assets/images/reffmate/' . $name ."-doc_npwp-".$unid."-".date("ymdHis").".".$ext;
        $image = true;
    }else{
        $image = false;
    }

    if($image == false){
        // header("Location: ../purchase/reffmate?err=Please%20select%20an%image"));
    }



    if($dataUser['memberType'] == 3){
        $actionType = 1;
    }else{
        $actionType = 2;
    }
    // print_r($_POST);
    // die();

    //     //BASE

    $curl = curl_init();

    $sendfile['fullName'] = $name;
    $sendfile['bankAccount'] = $_POST['bankAccount'];
    $sendfile['bankCode'] = $_POST['bankCode'];
    $sendfile['bankBranch'] = $_POST['bankBranch'];
    if($img_loc['doc_account'] != ""){
        $sendfile['doc_account'] = new CURLFILE($img_loc['doc_account']);
    }
    if($img_loc['doc_profile'] != ""){
        $sendfile['doc_profile'] = new CURLFILE($img_loc['doc_profile']);
    }
    else{
        header("Location: ../../purchase/reffmate?stat=".urlencode("Mohon masukan Pas Foto anda! Registrasi anda belum berhasil."));
    }
    if($img_loc['doc_npwp'] != ""){
        $sendfile['doc_npwp'] = new CURLFILE($img_loc['doc_npwp']);
    }
    $sendfile['actionType'] = 3;
    $sendfile['emailAdd'] = $_POST['hanwhaemail'];
    $sendfile['mobilePhone'] = $_POST['hanwhaphone'];

    echo "<pre>";
    // print_r($sendfile);
    echo "</pre>";

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://192.168.70.70:8080/hanwhaservices/member/referralMate',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $sendfile,
        CURLOPT_HTTPHEADER => array(
          'token: wSP+b1UNHLe6Q13RnVEiyWlDFuPqKR5Gl+rWovjh8Y9+wYV6i0zM+A2c14nvoFvH',
          'domainserver: https://bucketlistplan.co.id'
        ),
    ));

    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl , CURLINFO_HTTP_CODE); // this results 0 every time
    // print_r(array('memberId' => $name,'bankAccount' => $_POST['bankAccount'],'bankCode' => $_POST['bankCode'],'bankBranch' => $_POST['bankBranch'],'doc_account'=> new CURLFILE($_FILES['doc_account']['tmp_name'], $_FILES['doc_account']['type'], $_FILES['doc_account']['name']),'doc_profile'=> new CURLFILE($_FILES['doc_profile']['tmp_name'], $_FILES['doc_profile']['type'], $_FILES['doc_profile']['name']),'doc_npwp'=> new CURLFILE($_FILES['doc_npwp']['tmp_name'], $_FILES['doc_npwp']['type'], $_FILES['doc_npwp']['name']),'actionType' => '2'));
    // curl_close($curl);

    // echo "<br>Balikan server: <br>";

    // echo "httpcode: ".$httpCode;
    // echo "<br>";
    // echo "response dari server w/ success code: ";
    // print_r($response);

    // if($response == ""){
    //     echo "<br>Text ini hanya muncul apabila response dari server empty";
    // }
    $response = json_decode($response, true);
    print_r($httpCode);

    // die();

    if($actionType == 1){
        $mess = "Selamat anda telah menjadi Hanwha Orange Mate.";
    }else{
        $mess = "Selamat anda telah menjadi Hanwha Orange Mate.";
    }

    if($response['result_code'] == 1000){
        header("Location: ../../purchase/signup-reffmate?stat=".urlencode($mess));
    }else{
        header("Location: ../../purchase/signup-reffmate?err=".urlencode($response['message']));
    }
}

?>