<?php
$counter = 0;
if(!isset($_POST['memberName'])){
    $paymenthistories = paymentHistroy($_GET['product_id']);
    $paymenthistories =  json_decode($paymenthistories['data'], true);
    // echo "<pre>";
    // print_r($paymenthistories);
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
        <h3 class="col-12">No. Polis: <?php echo $_GET['product_id']; ?> | <?php echo $paymenthistories[0]['planName']; ?></h3>
        <table class="col-12 table table-stripped" id="paymentHistory">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Periode Pembayaran</th>
                    <th>Cara Pembayaran</th>
                    <th>Jumlah</th>
                    <th>Nomor Invoice</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $stepper = 1;
                foreach($paymenthistories as $paymentHistory){
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $stepper; $stepper++; ?></td>
                            <td>
                                    <?php 
                                        if($paymentHistory['paymentStatus'] == "PAID"){
                                            echo $paymentHistory['paidDate'];
                                        }else{
                                            echo "Belum dibayarkan";
                                        }
                                    ?>
                                    <?php //echo $paymentHistory['dueDate'] ?>
                            </td>
                            <td class="text-center"><?php echo $paymentHistory['paySeq'] ?></td>
                            <td class="text-center">
                                <?php 
                                    if(!isset($paymentHistory['modeName'])){
                                        echo "Belum dibayarkan";
                                    }else{
                                        echo $paymentHistory['modeName'];
                                    }
                                ?>
                            </td>
                            <td>Rp. <?php echo number_format($paymentHistory['amountPaid'] , 0, ',', '.') ?></td>
                            <td>
                                <?php 
                                    if(!isset($paymentHistory['invoiceNo'])){
                                        echo "Belum dibayarkan";
                                    }else{
                                        echo $paymentHistory['invoiceNo'];
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>
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