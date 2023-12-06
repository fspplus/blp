<?php
session_start();
ob_start();
session_set_cookie_params(0);

if(!isset($_POST['vldnm'])){
    header("Location: ../profile?err=1");
}else{
    $curl = curl_init();
    $dataPropFull = json_decode($_POST['indivPayor']);
    $data = json_decode($dataPropFull);
    $maritalStatus = $data -> maritalStatus;
    $indivPayor = $data -> indivPayor;
    $nonindivPayor = $data -> nonindivPayor;
    $boType = $data -> boType;

    $detail = array("uraianPekerjaan"=>$_POST['uraianPekerjaan'],"namaLembaga"=>$_POST['namaLembaga']
        ,"bidangUsaha"=>$_POST['bidangUsaha'],);
    $additionProp = array("jobDetail"=>$detail,"maritalStatus"=>$_POST['statmerit']
                 ,"indivPayor" => $indivPayor,"nonindivPayor"=>$nonindivPayor
                 ,"boType"=>$boType
            );
    $json_data = array("memberId"=>$_POST['vldnm'],"lineAddress1"=>$_POST['lineAddress1']
		,"lineAddress2"=>$_POST['lineAddress2'],"postalCode"=>$_POST['postalCode']
        ,"homePhone"=>$_POST['homePhone'],"birthPlace"=>$_POST['birthPlace'],"emailAddress"=>$_POST['emailAddress']
        ,"mobilePhone"=>$_POST['mobilePhone'],"cityAddress"=>$_POST['cityAddress'],"jobType"=>$_POST['jobType']
        ,"additionalProperties"=>$additionProp);
        
    $post_data = json_encode($json_data);     
    // echo $post_data;
    
    curl_setopt_array($curl, array(	
        CURLOPT_PORT => "8080",
        CURLOPT_URL => "http://192.168.70.70/hanwhaservices/member/update",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $post_data,
        CURLOPT_HTTPHEADER => array(
          "Accept: application/json",
          "Cache-Control: no-cache",
          "Content-Type: application/json",
          'flagupd: 1',
          "token: wSP+b1UNHLe6Q13RnVEiyWlDFuPqKR5Gl+rWovjh8Y9+wYV6i0zM+A2c14nvoFvH"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);
    //echo $response;
      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
          $data = json_decode($response, true);
          if($data['result_code'] == 3101){
              header("Location: ../profile?err=3101");
          }
          else if($data['result_code'] == 3100){
              header("Location: ../profile?err=3100");
          }
          else if($data['result_code'] == 3101){
              header("Location: ../profile?err=3102");
          }
          else if($data['result_code'] == 3101){
              header("Location: ../profile?err=3105");
          }else if ($data['result_code'] == 1210){
            //   header("Location: ../profile");
            
            unset($_SESSION['email']);
            $_SESSION['email'] = $_POST['emailAddress'];
          }
          echo json_encode($data['result_code']);
      } 
      
}

?>