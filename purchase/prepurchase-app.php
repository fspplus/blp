<?php 
ob_start();
session_start();
if(isset($_GET['plan'])){
    $_SESSION['product']['plan'] = $_GET['plan'];
}else if(!isset($_SESSION['product']['plan']) || $_SESSION['product']['plan'] == NULL){
    header("Location: pages-error-404");
    echo "<script>alert('err!');</script>";
    exit();
} 

?>
<html>
    <head></head>
<?php
    include 'header.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    /*$dataFull = searchPlan($_GET['plan']);
    $result = $dataFull;
    if($result == -100 || $result == NULL){
        echo "<script>alert('Not Allowed!')</script>";
        echo "<script>window.location.replace('./');</script>";
    }else{
        
        if($result['productId'] == 1 || $result['productId'] == 2 || $result['productId'] == 3){
            $planname = "PLAN A Bucket List";
            $oneyear = "Rp 1.200.000";
            $twoyear = "Rp 600.000";
            $threeyear = "Rp 400.000";
            $up = "Rp 50.000.000";
            $textadd = "Menurut survey dari 10 besar travel agent di Indonesia, untuk pergi kekorea selama 5H3M membutuhkan biaya kurang lebih 14jtan.";
        }else{
            $planname = "PLAN B Bucket List";
            $oneyear = "Rp 1.800.000";
            $twoyear = "Rp 900.000";
            $threeyear = "Rp 600.000";
            $up = "Rp 100.000.000";
            $textadd = "Menurut survey dari 10 besar travel agent di Indonesia, untuk pergi kekorea selama 7H5M membutuhkan biaya kurang lebih 20jtan.";
        }*/
        $key = "token: wSP+b1UNHLe6Q13RnVEiyWlDFuPqKR5Gl+rWovjh8Y9+wYV6i0zM+A2c14nvoFvH";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "8080",
            CURLOPT_URL => "http://192.168.70.70:8080/hanwhaservices/member/search/".$_GET['email'],
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
        
        curl_close($curl);
        $datas = json_decode($response, true);
        $_SESSION['role'] = "customer";
    ?>
        <style>
            .big{font-size: 35px ;line-height: 50px !important;}
        </style>
      <div class="row" style="margin-bottom: 2%; padding-top: 10%">
          <?php 
            // print_r($datas);
            if($datas['result_code'] == 1000){
                $datas['data'] = json_decode($datas['data'], true);
                $_SESSION['email'] = $datas['data']['emailAddress'];
                $_SESSION['fullname'] = $datas['data']['fullName'];
                $_SESSION['memberid'] = $datas['data']['memberId'];
            }
        //     echo "<br>";
        //   print_r($_SESSION);
            if(isset($_SESSION['email'])){
                if(!isset($_GET['view'])){
                    include 'view-purchase/prepurchase-logged.php'; 
                }else if(isset($_GET['view'])){
                    $include_string = "view-purchase/prepurchase-".$_GET['view'].".php";
                    if(!file_exists($include_string)){
                        include 'view-purchase/prepurchase-logged.php'; 
                    }else{
                        include($include_string);
                    }
                }
            }else if(isset($_GET['view'])){
                $include_string = "view-purchase/prepurchase-".$_GET['view'].".php";
                if(!file_exists($include_string)){
                    //echo "<script>window.location.href='pages-error-404.php';</script>";
                }else{
                    include($include_string);
                }
            }else if(!isset($_SESSION['email'])){
                include 'view-purchase/prepurchase-new.php'; 
            }
          ?>
      </div>
    
    <?php
    //}
?>
<body>
  <?php  ?>

  
<?php include 'float-dorado.php'; ?>

  <?php include 'footer.php'; ?>
</body>
</html>
