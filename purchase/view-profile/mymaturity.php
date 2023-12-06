<?php
$counter = 0;

if(!isset($products) && !isset($_GET['policycode'])){
    $data_info = json_decode($datas['data'], true);
    // print_r($data_info);
    $product['policyCode'] = $data_info['policyCode']; 
    $product['productName'] = "-"; 
    $product['memberName'] = $data_info['policyHolder']; 
    $product['bankAccount'] = $data_info['accountNo']; 
    $product['bankAccountName'] = $data_info['accountName']; 
    $product['bankCode'] = $data_info['bankCode']; 
}else if(isset($_GET['policycode'])){

}else{
    foreach($products as $product){
        if($product['productId'] == $_GET['product_id']){
            $show_product = $product;
        }
    }
}

if(!isset($_POST['policyHolder'])){
?>   
    <div class="form-group">           
        <label class="col-md-12">Nomor Polis | Tipe Plan</label>       
        <div class="col-md-12">
            <h1 style="color: #ff7101"><?php echo $product['policyCode']?></h1>
            <!-- <h3>Bergabung pada <?php echo $newformat ; ?></h3> -->
            <hr style="width: 100%; height: 2px; background-color: #ff7101; color: #ff7101;">              
        </div>            
    </div>   
    <form class="form-horizontal form-material rowpaddingless " action="#" method="post" enctype="multipart/form-data" id="formMaturity">
        <div class="form-group">
            <label class="col-md-12">Nama Lengkap</label>
            <div class="col-md-12">
                <input type="text" placeholder="<?php if ($product['memberName'] != "NULL"){ echo $product['memberName'];}else{ echo "";} ?>" class="form-control form-control-line" value="<?php if ($product['memberName'] != "NULL"){ echo $product['memberName'];}else{ echo "";} ?>" name="policyHolder" id="memberName" required readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-12">Nomor Polis</label>
            <div class="col-md-12">
                <input type="text" placeholder="<?php if ($product['policyCode'] != "NULL"){ echo $product['policyCode'];}else{ echo "";} ?>" class="form-control form-control-line" value="<?php if ($product['policyCode'] != "NULL"){ echo $product['policyCode'];}else{ echo "";} ?>" name="policyCode" id="policyCode" required readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-12">Bank</label>
            <div class="col-md-12">
                <select name="bankCode" required>
                    <option value="" disabled selected>Pilih Bank</option>
                    <?php 
                        $databank = banklist();
                        foreach($databank as $data){
                            $bankName = $data['codeValue'];
                            $bankCode = $data['codeId'];
                            $selected = "";
                            if($product['bankCode'] == $bankCode){
                                $selected = "selected";
                            }
                            echo "<option value='$bankCode' $selected>".$bankName."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-12">No. Rekening</label>
            <div class="col-md-12">
                <input type="tel" placeholder="<?php if ($product['bankAccount'] != "NULL"){ echo $product['bankAccount'];}else{ echo "";} ?>" class="form-control form-control-line" value="<?php if ($product['bankAccount'] != "NULL"){ echo $product['bankAccount'];}else{ echo "";} ?>" name="accountNo" id="bankAccount" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-12">Nama Pemilik Rekening</label>
            <div class="col-md-12">
                <input type="text" placeholder="<?php if ($product['bankAccountName'] != "NULL"){ echo $product['bankAccountName'];}else{ echo "";} ?>" class="form-control form-control-line" value="<?php if ($product['bankAccountName'] != "NULL"){ echo $product['bankAccountName'];}else{ echo "";} ?>" name="accountName" id="bankAccountName" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-12 mb-1">Upload Buku Tabungan</label>
            <small class="col-md-12">Ukuran File Maksimal 5MB.</small>
            <div class="col-md-12 mt-1">
                <input id="bukutabungan" name="buku-tabungan" type="file" class="file" data-preview-file-type="text" accept="image/x-png,image/gif,image/jpeg, image/jpg, image/png" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success submitForm">Konfirmasi</button>
    </form>
<?php 
}else{
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    $json_form['policyCode'] = $_POST['policyCode'];
    $json_form['policyHolder'] = $_POST['policyHolder'];
    $json_form['confirmMtr'] = "y";
    $json_form['bankCode'] = $_POST['bankCode'];
    
    $databank = banklist();
    foreach($databank as $data){
        $bankName = $data['codeValue'];
        $bankCode = $data['codeId'];
        $selected = "";
        if($_POST['bankCode'] == $bankCode){
            $json_form['bankName'] = $bankName;
        }
    }
    $json_form['accountNo'] = $_POST['accountNo'];
    $json_form['accountName'] = $_POST['accountName'];


    $target_dir = "/var/www/uat.koreaversikamu.co.id/purchase/uploads/";
    $uploadOk = 1;
    $target_file = $target_dir . basename($_FILES["buku-tabungan"]["name"]);
    $target_fileName = $target_dir . $_POST['policyHolder']." - ".$_POST['policyCode'];
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $target_fileName .= ".".$imageFileType;
    
    $json_form['urlPath'] = '\\\\192.168.70.72\purchase\uploads\\'.$_POST['policyHolder'].' - '.$_POST['policyCode'].".".$imageFileType;
    
    // Check if image file is a actual image or fake image
    if(isset($_POST['policyHolder'])) {
        $check = getimagesize($_FILES["buku-tabungan"]["tmp_name"]);
        if($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            // echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["buku-tabungan"]["tmp_name"], $target_fileName)) {
        // echo "The file ". htmlspecialchars( basename( $_FILES["buku-tabungan"]["name"])). " has been uploaded.";
        } else {
        // echo "Sorry, there was an error uploading your file.";
        }
    }


    $json_sent = json_encode($json_form);
    // print_r($json_sent);
    $fin = sendMaturity($json_sent);
    if($fin['result_code'] == 1000){
    ?>
        <div class="text-center">
            <h3>Terimakasih, data anda sudah kami terima!</h3>
            <h4>Jika ada perubahan data, bapak/ibu dapat menghubungi Customer Care melalui email di alamat care@hanwhalife.co.id</h4>
            <a href="<?php echo $backLogin; ?>" class="btn btn-success">Kembali ke Profil</a>
        </div>
    <?php
    }else{
        ?>
        <div class="text-center">
            <h3>Maaf data anda tidak bisa kami simpan.</h3>
            <h4>Jika ada perubahan data, bapak/ibu dapat menghubungi Customer Care melalui email di alamat care@hanwhalife.co.id</h4>
            <a href="<?php echo $backLogin; ?>" class="btn btn-success">Kembali ke Profil</a>
        </div>
        <?php
    }
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
<script>
    $("#bukutabungan").fileinput({
        showUpload: false,
        showCancel: false,
        maxFileSize: 5000,
        allowedFileType : ['image'],
        allowedFileExtensions : ['jpg','jpeg','png'],
        msgSizeTooLarge: 'File "{name}" melebihi ukuran limit <b>5MB</b>. Silahkan upload dengan ukuran yang lebih kecil.'
    }).on('fileuploaderror', function(event, data, msg) {
        var size = data.files[0].size,
            maxFileSize = $(this).data().fileinput.maxFileSize,
            formatSize = (s) => {
                i = Math.floor(Math.log(s) / Math.log(1024));
                sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
                out = (s / Math.pow(1024, i)).toFixed(2) * 1 + ' ' + sizes[i];
                return out;
            };

        msg = msg.replace('{customSize}', formatSize(size));
        msg = msg.replace('{customMaxSize}', formatSize(maxFileSize * 1024 /* Convert KB to Bytes */));
        $('li[data-file-id="'+data.id+'"]').html(msg);
    });
    $("#formMaturity").on("submit",function(e){
        e.preventDefault();
        bootbox.confirm({
            title: "Anda yakin?",
            size: "small",
            message: "Anda hanya bisa melakukan konfirmasi sebanyak 1x. Pastikan data yang sudah anda masukan sudah tepat sebelum mengirimkan data anda.",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancel'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Confirm'
                }
            },
            callback: function (result) {
                if(result){
                    $("#formMaturity").submit();
                    // window.location.href = "../../products/delete/"+delID;
                }
            }
        });

    })
    
    // $("#bukutabungan").fileinput({
    //     allowedFileExtensions: ["jpeg", "jpg", "png", "gif"],
    //     'maxFileSize': 2000,
    //     resizeImage: true
    // });
</script>
<style>
.modal-content{
    height: auto !important;
}
    #page-loader{
        display: none !important;
    }
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
</style>