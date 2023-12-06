<?php
if(!isset($_POST['vldnm'])){
    header("Location: ../profile?err=1");
}else{
    if(isset($_POST['profileupdate'])){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://192.168.70.70/hanwhaservices/member/update",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\n  \"memberId\": ".$_POST['vldnm'].",\n\t\"jobType\": \"".$_POST['hanwhawork']."\",\n\t\"mobilePhone\": ".$_POST['mobilePhone'].",\n\t\"homePhone\": ".$_POST['homePhone'].",\n\t\"incomeSource\": \"".$_POST['hanwhasourceincome']."\",\n\t\"lineAddress1\": \"".$_POST['lineAddress1']."\",\n\t\"lineAddress2\": \"".$_POST['lineAddress2']."\",\n\t\"cityAddress\": \"".$_POST['lineAddress2']."\",\n\t\"postalCode\": \"".$_POST['postalCode']."\"\n}",
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "token: wSP+b1UNHLe6Q13RnVEiyWlDFuPqKR5Gl+rWovjh8Y9+wYV6i0zM+A2c14nvoFvH"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

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
            }
        }
        
    }else if(isset($_POST['ktpupdate'])){
        $name = $_POST['vldnm'];
        $id = $_POST['vlddi'];
        $file = $_FILES["ktpfile"]["tmp_name"];
        print_r($_FILES["ktpfile"]["tmp_name"]);
        define ('SITE_ROOT', realpath(dirname(__FILE__)));
        if(file_exists('/var/www/html/assets/images/ktpuploads/' . $name ." - ". $id.".jpeg")){
            echo "file exists!";
            //unlink('/var/www/html/assets/images/ktpuploads/' . $name ." - ". $id.".jpeg");
            //$fname = $fname . "(older".rand().")";
            rename('/var/www/html/assets/images/ktpuploads/' . $name ." - ". $id.".jpeg", '/var/www/html/assets/images/ktpuploads/' . $name ." - ". $id."(date-".date("Y-m-d-h-i-s").").jpeg");
        }else{
            echo "doesn't exists!";
        }
        if(move_uploaded_file($_FILES["ktpfile"]["tmp_name"], '/var/www/html/assets/images/ktpuploads/' . $name ." - ". $id.".jpeg")){
            echo "True";   
            header("Location: ../profile");
        }else{
            echo "False";
            print_r($_FILES);
            echo $_FILES['ktpfile']['error'];
            header("Location: ../profile?err=0");
        }
    }
}
?>