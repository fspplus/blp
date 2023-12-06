<?php
include 'header.php';
$dataUser = getmember($_SESSION['email']);
$products = getproducts($_SESSION['memberid']);

$reffmate_income = reffmateIncome($dataUser['hanwhaReferenceCode']);
// echo "<pre>";
// print_r($_SESSION['email']);
// echo "</pre>";
if($_SESSION['email'] == "08569888077"){
    $reffmate_income = reffmateIncome("0071909949");
}


// echo "Produk disini";
// print_r($_SESSION["memberid"]);

$products = json_decode($products['data'], true);
$countproducts = count($products);


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
//   print_r($_SESSION);
// print_r($products);
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
                    <?php 
                        if($_SESSION['role'] != "agent"){
                    ?>
                        <div class="col-lg-3 col-xlg-2 col-md-5">
                            
                            <a href="#" class="new-purchase">
                                <div class="card">
                                    <div class="card-block cblk" data-id="">
                                        <center class="">
                                            <h4 class="card-title m-t-10">Pembelian Baru</h4>
                                        </center>
                                    </div>
                                </div>
                            </a>
                            
                            <div class="card">
                                <a href="../purchase/profile" class="card-block cblk" data-id="profile">
                                    <center class="">
                                        <h4 class="card-title m-t-10">Profil Saya</h4>
                                    </center>
                                </a>
                                <div class="card-block cblk" data-id="purchase">
                                    <center class=" ">
                                        <h4 class="card-title m-t-10">Produk Saya</h4>
                                    </center>
                                </div>
                                <div class="card-block cblk" data-id="beneficiaries">
                                    <center class="">
                                        <h4 class="card-title m-t-10">Ahli Waris</h4>
                                    </center>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-block cblk" data-id="produk-refferal">
                                    <center class="">
                                        <h4 class="card-title m-t-10">Produk Referral Saya</h4>
                                    </center>
                                </div>
                                <?php 
                                    // if($dataUser['fullName'] == "Cessa armaida"){
                                        ?>
                                    <div class="card-block cblk" data-id="penghasilan-refferal">
                                        <center class="">
                                            <h4 class="card-title m-t-10">Penghasilan Referral Saya</h4>
                                        </center>
                                    </div>
                                        <?php
                                    // }
                                ?>
                            </div>
                            
                            <div class="card">
                                <div class="card-block cblk" data-id="settings">
                                    <center class="">
                                        <h4 class="card-title m-t-10">Pengaturan</h4>
                                    </center>
                                </div>
                                <div class="card-block cblk slgt">
                                    <center class="">
                                        <h4 class="card-title m-t-10 slgt" id="lgt">Keluar</h4>
                                    </center>
                                </div>
                            </div>
                        </div>
                    <?php 
                        }else{
                            ?>
                                <div class="col-lg-3 col-xlg-2 col-md-5">
                                    
                                    <a href="#" class="new-purchase">
                                        <div class="card">
                                            <div class="card-block cblk" data-id="">
                                                <center class="">
                                                    <h4 class="card-title m-t-10">Pembelian Baru</h4>
                                                </center>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <div class="card">
                                        <div class="card-block cblk slgt">
                                            <center class="">
                                                <h4 class="card-title m-t-10 slgt" id="lgt">Keluar</h4>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-9 col-xlg-10 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <div id="profilewrap">
                                    <?php 
                                    if($_SESSION['role'] != "agent"){
                                        include 'view-reffmate/myreffmate.php';
                                    }?>
                                </div>
                                <div id="beneficiarieswrap"><?php include 'view-profile/mybeneficiaries.php'; ?></div>
                                <div id="purchasewrap"><?php include 'view-profile/mypurchase.php'; ?></div>
                                <div id="settingswrap"><?php include 'view-profile/mysettings.php'; ?></div>
                                <div id="produk-refferalwrap"><?php include 'view-reffmate/products.php'; ?></div>
                                <div id="penghasilan-refferalwrap"><?php include 'view-reffmate/penghasilan.php'; ?></div>
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