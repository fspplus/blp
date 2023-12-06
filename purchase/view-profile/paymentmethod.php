<?php
$counter = 0;
if(!isset($_POST['memberName'])){
    // $paymenthistories = paymentHistroy($_GET['product_id']);
    // $paymenthistories =  json_decode($paymenthistories['data'], true);
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
?>   
    <div class="form-group">           
        <label class="col-md-12">Nama Lengkap</label>       
        <div class="col-md-12">
            <h1 style="color: #ff7101"><?php echo $dataUser['fullName']; ?></h1>
            <!-- <h3>Bergabung pada <?php echo $newformat ; ?></h3> -->
            <hr style="width: 100%; height: 2px; background-color: #ff7101; color: #ff7101;">              
        </div>            
    </div>   
    <div class="form-group">
        <form action="../../purchase/controller/updatepaymentmethod" method="post" class="">
        <div class="form-group">
            <label for="payType">Metode Pembayaran</label>
            <select name="paymentType" id="paymentType" class="form-control" required>
                <option value="" disabled selected>Pilih opsi pembayaran</option>
                <option value="3">Autodebet Rekening</option>
                <option value="4">Virtual Account</option>
            </select>
        </div>
        <input type="hidden" name="orderId" value="<?php echo $_GET['orderId'] ?>">
            <div class="form-group">
                <label for="bankName">Nama Bank</label>
                <select name="bankName" id="bankName" class="form-control" required>
                    <option value="" disabled selected>Pilih salah satu</option>

                    <?php 
                        $databank = bankADlist();
                        foreach($databank as $data){
                            $bankName = $data['codeValue'];
                            $bankCode = $data['codeId'];
                            echo "<option value='$bankCode' data-name='".$bankName."'>".$bankName."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group d-none" id="form-bank">
                Silahkan Download Formulir pengajuan disini <a href="#" target="_blank" id="download-form" class="btn btn-success" download>Download</a>
            </div>
            <div class="form-group">
                <label for="bankNumber">Nomor Rekening untuk Autodebet</label>
                <input type="tel" name="bankNumhber" id="bankNumber" required class="form-control">
            </div>
            <div class="form-group" style="color: black !important;">
                <h3>
                    Anda harus mengisi formulir serta melengkapi persyaratan, Anda harus mengisi formulir dan melengkapi persyaratan, lalu kirimkan ke alamat::
                </h3>
                <strong style="color: #ff7101 !important;">PT Hanwha Life Insurance Indonesia| UP: Digital TF SSI (Deta Puri Lestari)</strong><br>
                World Trade Center I, Jl. Jend. Sudirman No.Kav.29, RT.1/RW.3,<br>
                Kuningan, Karet Tengsin, Setia Budi, Kota Jakarta Selatan,<br>
                Daerah Khusus Ibukota Jakarta <br>
                Jakarta Selatan 12920, Indonesia <br>
                Untuk kelanjutan proses pengajuan auto debet akan kami informasikan melalui Whatsapp/Email
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" style="width: 500px !important;">Ajukan Pengubahan Metode Pembayaran</button>
            </div>
        </form>
    </div>
<?php 
}else{
    ?>
    <div class="text-center">
        <h3>Terimakasih, data anda sudah kami terima!</h3>
        <h4>Jika ada perubahan data, bapak/ibu dapat menghubungi Customer Care melalui email di alamat care@hanwhalife.co.id</h4>
        <a href="profile" class="btn btn-success">Kembali ke Profil</a>
    </div>
    <?php
}
?>

<script>
    $("#bankName").on("change", function(){
        $("#form-bank").removeClass("d-none");
        var bankName = $(this).val();
        // alert(bankName);
        $("#download-form").attr("href", "https://bucketlistplan.co.id/wp-content/uploads/2021/06/form-"+bankName+".pdf");
    })
</script>
<style>
    .modal-backdrop {
        z-index: 100 !important;
    }
    .glyphicon-folder-open:before{
        content: "\F76F";
    }
    .glyphicon-upload:before{
        content: "\F415";
    }
    .glyphicon-trash:before{
        content: "\F1C0";
    }
    .glyphicon-zoom-in:before{
        content: "\F34B";
    }
    .glyphicon-resize-vertical:before{
        content: "\F45D";
    }
    .glyphicon-fullscreen:before{
        content: "\F293";
    }
    .glyphicon-resize-full:before{
        content: "\F655";
    }
    .glyphicon-remove:before{
        content: "\F5AD";
    }
    th:after{
        display: none !important;
    }
    th, td{
        border-right: 1px solid lightgray !important;
    }
    tr{
        padding: 10px;
    }
</style>