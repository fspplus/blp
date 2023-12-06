<pre>
<?php 
    // print_r($countproducts);
    // echo "<pre>";
    // print_r($products);
    // echo "</pre>";
?>
</pre>
<div id="purchase" class="profilecards">                           
<form class="form-horizontal form-material">   
    <div class="form-group">           
        <label class="col-md-12">Nama Lengkap</label>       
        <div class="col-md-12">
            <h1 style="color: #ff7101"><?php echo $dataUser['fullName']; ?></h1>
            <h3>Bergabung pada <?php echo $newformat ; ?></h3>
            <hr style="width: 100%; height: 2px; background-color: #ff7101; color: #ff7101;">              
        </div>            
    </div>              
    <h3 class="col-md-12">Daftar Produk Dibeli</h3>
    <?php 
                $counter = 0;
                if(!isset($countproducts) || $countproducts == NULL){
                    ?>
        <div class="col-md-12 col-lg-12 verTOPnew benefblocks row" style="padding: 15px 15px 5px !important;">  
            <div class="form-group col-md-12 col-lg-12 verTOPnew">                
                <div class="col-md-12">        
                    <h3 style="color: #ff7101;">Belum ada pembelian! <a href="product-page" style="color: #139ec6; text-decoration: underline;">Yuk segera lakukan pembelian sekarang!</a></h3>            
                </div> 
            </div>                     
        </div>
    <?php
                }
                while($counter < $countproducts){
                    if($products[$counter]['policyCode'] == "XXX"){
                        ?>
    <div class="col-md-12 col-lg-12 verTOPnew benefblocks row" style="padding: 15px 15px 5px !important;">  
            <div class="form-group col-md-12 col-lg-12 verTOPnew">                
                <div class="col-md-6">        
                    <h3 style="color: #ff7101;"><?php echo $products[$counter]['productName']." Rp.".$products[$counter]['premium']."/bulan"; ?></h3>  
                    <div class="" style="font-size: 14px;">No. Polis<h3 style="color: #ff7101; display: inline-block; margin-left: 10px;"><?php echo $products[$counter]['policyCode']; ?></h3></div>                            
                </div> 
            </div>    
            <div class="form-group col-md-4 col-lg-4">             
                <label class="col-md-12" style="font-size: 14px;">Tanggal Pembelian<br><h3 style="color: #139ec6;">Belum Terbit</h3></label>            
            </div> 
            <div class="form-group col-md-4 col-lg-4">           
                <label class="col-md-12" style="font-size: 14px;">Akhir Masa Pembayaran<br><h3 style="color: #139ec6;">Belum Terbit</h3></label>           
            </div>  
            <div class="form-group col-md-12 col-lg-12">           
                <div class="col-md-12">Belum Terbit</div>        
            </div>                 
        </div>
                        <?php
                    }else{
                        $time = date("d M, Y",strtotime($products[$counter]['purchaseDate']));
                        //$time = strtotime($products[$counter]['purchaseDate']);
                        // $newpurchase = date('d M, Y', strtotime($time));
                        $newpurchase = $time;
                        //$time = strtotime($products[$counter]['maturityDate']);
                        //$maturitydate = date('d M, Y', $time);
                        $time = date("d M, Y",strtotime($products[$counter]['maturityDate']));
                        // $maturitydate = date('d M, Y', strtotime($time));
                        $maturitydate = $time;
                        $time = strtotime($products[$counter]['issuedDate']);
                        $issued = date('d M, Y', $time);

                        $status = getPolicyStatus_detail($products[$counter]['policyCode']);
                        $link_url = getMaturityLink($products[$counter]['policyCode']);
                        
                        $link = json_decode($link_url, true);

                        $status = json_decode($status['message'], true);
                        // echo "<pre>";
                        // print_r($status);
                        // echo "</pre>";

                        $converted_duedate = date_converter($status['policyduedate']['dueDate']);

                        if($products[$counter]['autoDebet']){
                            $statusName = "Autodebet";                            
                        }else{
                            $statusName = "Virtual Account";
                        }
                ?>
    
        <div class="col-md-12 col-lg-12 verTOPnew benefblocks row"  style="padding: 15px 15px 5px !important;"> 
            <div class="form-group col-md-12 col-lg-12 verTOPnew">                
                <div class="col-md-12">
                    <h3 style="color: #ff7101;"><?php echo $products[$counter]['productName']." ".$products[$counter]['premium']."/bulan"; ?></h3>  
                    <div class="" style="font-size: 14px;">No. Polis<h3 style="color: #ff7101; display: inline-block; margin-left: 10px;"><?php echo $products[$counter]['policyCode']; ?></h3> | No. Virtual Account <h3 style="display: inline-block;"><?php echo $products[$counter]['generalVANumber']; ?></h3></div>     
                    <div>Status: <h5 style="color: #ff7101; display: inline-block; margin-left: 10px;"><?php echo $status['policystatus']['polStatus'] ?></h5></div>
                    <div class="" style="font-size: 14px;">Detail Pemegang<h3 style="color: #ff7101; display: inline-block; margin-left: 10px;"><?php echo $products[$counter]['memberName']." / ".$products[$counter]['emailAddress']." / ID No.: ".$products[$counter]['identityNumber']." / Ph.: ".$products[$counter]['mobilePhone']; ?></h3></div>                            
                </div> 
            </div>
            <div class="form-group col-md-4 col-lg-4">             
                <label class="col-md-12" style="font-size: 14px;">Tanggal Pembelian<br><h3 style="color: #139ec6;"><?php echo date_toID($newpurchase); ?></h3></label>            
            </div> 
            <div class="form-group col-md-4 col-lg-4">           
                <label class="col-md-12" style="font-size: 14px;">Akhir Masa Pembayaran<br><h3 style="color: #139ec6;"><?php echo date_toID($maturitydate); ?></h3></label>           
            </div>  
            <div class="form-group col-md-4 col-lg-4">           
                <label class="col-md-12" style="font-size: 14px;">Pembayaran Terakhir<br><h3 style="color: #139ec6;"><?php echo date_toID(date("d M,Y", strtotime($status['policystatus']['date']))); ?></h3></label>           
            </div>  
            <div class="form-group col-md-4 col-lg-4">   
            <?php 
                if($status['policyduedate']['dueDate'] == "null"){
                    ?>
                        <label class="col-md-12" style="font-size: 14px;">Pembayaran Berikutnya<br><h3 style="color: #139ec6;"></h3></label>
                    <?php
                }else{
                    // echo "Tanggalnya: ";
                    // echo $status['policyduedate']['dueDate'];
                    // echo "<pre>";
                    // print_r($status);
                    // echo "</pre>";
                    ?>
                        <!-- <label class="col-md-12" style="font-size: 14px;">Pembayaran Berikutnya<br><h3 style="color: #139ec6;"><?php echo date_toID(date("d M,Y", strtotime($converted_duedate))); ?></h3></label> -->
                        <label class="col-md-12" style="font-size: 14px;">Pembayaran Berikutnya<br><h3 style="color: #139ec6;"><?php echo date('d M, Y', strtotime($status['policyduedate']['dueDate'])); ?></h3></label>
                    <?php
                }
            ?> 
            </div>
            <div class="form-group col-md-4 col-lg-4">        
                <label class="col-md-12" style="font-size: 14px;">Metode Pembayaran<br><h3 style="color: #139ec6;"><?php echo $status['policyduedate']['modeName']; ?></h3></label>
                <a href="payment-method?orderId=<?php echo $products[$counter]['orderId']; ?>" class="btn btn-success" style="width: 100% !important;">Ubah Metode Pembayaran</a>
            </div>
            <div class="form-group col-md-4 col-lg-4">
            </div>
            <div class="form-group col-md-12 col-lg-12">           
                <!-- <div class="col-md-12"><span class="btn2" id="epolis" data-set="<?php echo $products[$counter]['policyCode']; ?>">Kirim E-Policy</span></div>   -->
                <a href="payment-history?product_id=<?php echo $products[$counter]['policyCode']; ?>" class="btn btn-success">Riwayat Pembayaran</a>
                <a href="#!" id="epolis" data-set="<?php echo $products[$counter]['policyCode']; ?>" class="btn btn-success">Kirim E-Policy</a>    
                <?php 
                // echo isset($link['result_code']);
                // echo $status['policystatus']['date'];
                // echo "<br>";
                // print_r($link_url);
                // echo date("Y-m-d", strtotime($status['policystatus']['date']));
                // echo "<pre>";
                // print_r($status);
                // echo "</pre>";
                if($status['policystatus']['polStatus'] == "INFORCE" && date("Y-m-d") >= date("Y-m-d", strtotime($status['policystatus']['date'])) && !isset($link['result_code'])){
                    ?>
                    <a href="<?php echo $link_url; ?>" class="btn btn-success">Validasi Maturity</a>
                <?php }else if($status['policystatus']['polStatus'] == "INFORCE" && date("Y-m-d") >= date("Y-m-d", strtotime($status['policystatus']['date'])) && isset($link['result_code'])){
                    ?>
                        <a href="#!" class="btn btn-success btn-notallowed">Validasi Maturity</a>
                    <?php
                } ?>
            </div>                        
        </div> 
                <?php
                    }
                    $counter += 1;
                }
            ?>                             
</form>
    <div class="profilesetalert"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script>

    $(".btn-notallowed").on("click",function(e){
        e.preventDefault();
        bootbox.alert({
            title: "Akses ditolak",
            size: "small",
            message: "Anda telah mengkonfirmasi validasi data. Silahkan hubungi care@hanwhalife.co.id jika ada perubahan"
        });
        // bootbox.confirm({
        //     title: "Maaf",
        //     size: "small",
        //     message: "Anda hanya bisa melakukan konfirmasi sebanyak 1x. Jika ada perubahan data silahkan hubung care@hanwhalife.co.id",
        //     buttons: {
        //         cancel: {
        //             label: '<i class="fa fa-times"></i> Cancel'
        //         },
        //         // confirm: {
        //         //     label: '<i class="fa fa-check"></i> Confirm'
        //         // }
        //     },
        //     callback: function (result) {
        //         if(result){
        //             $("#formMaturity").submit();
        //             // window.location.href = "../../products/delete/"+delID;
        //         }
        //     }
        // });

    })
    $('#epolis').click(function(){

        var policy_Code = $(this).data('set');

        $.ajax({
                type: 'POST',
                url: "./controller/sendpolicy.php",
                data: {"policyCode": policy_Code},
                success: function(dataSum) {
                       // data is ur summary
                      $('.profilesetalert').html(dataSum);
                 }
            })
    });
    </script>
    <style>
        .bootbox{
            z-index: 10000000000 !important;
        }
        .modal-content{
            height: auto !important;
        }
    </style>
</div>