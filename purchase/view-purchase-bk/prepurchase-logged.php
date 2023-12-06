<?php 
    include 'connectdb.php';
if(isset($_SESSION['dataForm1'])){
    unset($_SESSION['dataForm1']);
    unset($_SESSION['ropBank']);
}
?>

<div class="row" style="margin-bottom: 20px;">
            <div class="col-12">
                <h1 class="textorange"><strong>Paket Terpilih</strong></h1>
            </div>
            <?php include 'view-selected.php'; ?>
            <div class="col-12 col-md-8 formCol">
                <div class="row rowpaddingless">
                    <?php 
                    if(isset($_GET['err'])){
                        if($_GET['err'] == 1000){
                            echo "<h3 class='alert'>Error 1000! System is offline or not responding!</h3>";
                        }else if($_GET['err'] == 1005){
                            echo "<h3 class='alert'>Error 1005! Not Found!</h3>";
                        }else if($_GET['err'] == 1003){
                            echo "<h3 class='alert'>Error 1003! Duplicate?</h3>";
                        }else if($_GET['err'] == -1){
                            echo "<h3 class='alert'>Not responding -1 error</h3>";
                        }
                    }
                    
                    ?>
                    <h3 class="col-12">Halo <?php echo $_SESSION['fullname']; ?></h3>
                    <form class="col-12" action="prepurchase?view=search-user" method="POST" id="" class="formCol">
                        <div class="col-md-12 col-12 align-self-center formCol rowpaddingless">
                            <div class="row rowpaddingless">
                                <div class="col-12 rowpaddingless">
                                    <h5>Silahkan masukkan NIK dan Nomor Telephone calon pemegang Polis.</h5>
                                    <small>Jika anda membeli untuk diri sendiri silahkan <a href="prepurchase?view=self">klik disini</a></small>
                                </div>
                                <div class="floating-label border-b-orange col-md-5 rowpaddingless">
                                    <input type="tel" class="form-controller" name="hanwhanik" placeholder="NIK" required maxlength="16">
                                    <label for="hanwhanik" style="color: ligthgray;">NIK</label>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="floating-label border-b-orange col-md-5 rowpaddingless">
                                    <input type="email" class="form-controller" name="hanwhaemail" placeholder="Email" required>
                                    <label for="hanwhaemail" style="color: ligthgray;">Email</label>
                                    <div class="scriptloader"></div>
                                </div>
                                <div class="col-md-1"></div>
                                <input class="btnBuyInvert" type="submit" value="Cari">
                            </div>
                        </div>
                    </form>
                    </div><br><br>
                <div class="row rowpaddingless userdata">
                    
                </div>
            </div>
        </div>