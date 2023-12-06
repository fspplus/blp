<?php include 'header.php';
$dataUser = getmember($_SESSION['email']);
$products = getproducts($_SESSION['memberid']);
// print_r($products);
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
  ?>
                <div class="row" style="padding-top: 20px;">
                    <!-- Column -->
                    <div class="col-lg-3 col-xlg-2 col-md-5">
                        
                        <a href="profile" class="new-purchase">
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
                                <div id="maturitywrap"><?php include 'view-profile/paymentmethod.php'; ?></div>
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