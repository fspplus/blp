<?php include 'header.php';
// $dataUser = getmember($_SESSION['email']);
// $products = getproducts($_SESSION['memberid']);
// print_r($products);
// $maturityData = notifMaturity($_GET['key']);
if($products != NULL){
    $countproducts = count($products);
}

if(isset($_GET['update'])){
    if($_GET['update'] == "yes"){
        include 'controller/updateprofile.php';
    }
}

?>
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->

<div class="col-md-12 col-12 align-self-center" style="background: url('../../assets/images/background/Hanwhalife-bucketlist-profile.jpg');height: 400px;background-size:cover;padding: 0 -10%;">
  </div>
  <?php 
  if(isset($_GET['key'])){
    $key = urlencode($_GET['key']);
    $key = urlencode($key);
    // echo $_GET['key'];
    // echo $key;

    $datas = notifMaturity($_GET['key']);
    // echo "<pre>";
    // print_r($datas);
    // echo "</pre>";
  }else{
      if(isset($_GET['policycode'])){
        //   echo $_GET['policycode'];
          $data_info = getPolicyStatus_detail($_GET['policycode']);
          $data_info = json_decode($data_info['message'], true);
        //   echo "<pre>";
        //   print_r($data_info);
        //   echo "</pre>";
          if($data_info['policystatus']['polStatus'] != "MATURITY"){
            //   echo "<script>alert('NOT ALLOWED!');</script>";
            //   echo "<script>window.location.href='../../purchase/profile'</script>";
          }
        $product['policyCode'] = $data_info['productdetail']['product']['policyCode']; 
        $product['productName'] = "-"; 
        $product['memberName'] = $data_info['productdetail']['product']['memberName']; 
        $product['bankAccount'] = $data_info['productdetail']['product']['bankAccount']; 
        $product['bankAccountName'] = $data_info['productdetail']['product']['bankAccountName']; 
        $product['bankCode'] = $data_info['productdetail']['product']['bankCode']; 
      }
  }
    if(isset($_GET['update'])){
        if($_GET['update'] == "new"){
            ?>
                <div class="row mt-3">
                    <div class="col-12">
                        <h1><span class="badge badge-info" style="width:100%;">Selamat, data anda sudah berhasil di update</span></h1>
                    </div>
                </div>
            <?php
        }
    }
    if(isset($datas)){
        $backLogin = "otp-login";
    }else{
        $backLogin = "profile";
    }
  ?>
                <div class="row" style="padding-top: 20px;">
                    <!-- Column -->
                    <div class="col-lg-3 col-xlg-2 col-md-5">
                        
                        <a href="<?php echo $backLogin; ?>" class="new-purchase">
                            <div class="card">
                                <div class="card-block cblk" data-id="">
                                    <center class="">
                                        <h4 class="card-title m-t-10">Kembali ke Profile Saya</h4>
                                    </center>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-9 col-xlg-10 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <div id="maturitywrap">
                                    <?php 
                                    // print_r($datas);
                                        if($datas['result_code'] == 3103){
                                            echo "Maaf, kode verifikasi anda tidak valid.<br>ErrCode: ".$datas['result_code']."<br>Message: ".$datas['message'];
                                            echo "<br><br>Jika anda mendapatkan error ini lagi dan mengakses link yang telah dikirimkan oleh sistem, silahkan hubungi Contact Service kami untuk bantuan lebih lanjut.";
                                        }else{
                                            include 'view-profile/mymaturity.php';
                                        } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <?php include 'footer.php'; ?>
</body>

</html>