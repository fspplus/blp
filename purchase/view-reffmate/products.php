<pre>
<?php 
    // print_r($countproducts);
    // echo "<pre>";
    // print_r($reffmate_income);
    // echo "</pre>";
?>
</pre>
<div id="produk-refferal" class="profilecards">                           
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
    <?php foreach($reffmate_income['data']['referralDetail'] as $reffdetail){ ?>
        <div class="col-md-12 col-lg-12 verTOPnew benefblocks row" style="padding: 15px 15px 5px !important;"> 
        <?php $timestamp = strtotime($reffdetail['purchaseDate']); ?>
            <div class="form-group col-md-12 col-lg-12 verTOPnew">                
                <div class="col-md-12">
                    <h5 style="color: #139ec6"><?php echo $reffdetail['productName'] ?></h5>  
                    <!-- <div class="" style="font-size: 14px;">No. Polis<h5 style="color: #ff7101; display: inline-block; margin-left: 10px;">1011800046001400-789</h5> | No. Virtual Account <h5 style="display: inline-block;">20124507</h5></div>      -->
                    <!-- <div>Status Polis: <h5 style="color: #ff7101; display: inline-block; margin-left: 10px;">INFORCE</h5></div> -->
                    <div>Status Freelook: <h5 style="color: #ff7101; display: inline-block; margin-left: 10px;"><?php if($timestamp < strtotime('+2 weeks')){ echo "Dalam Masa Freelook"; }else{ echo "Selesai Masa Freelook"; } ?></h5></div>                  
                </div> 
            </div>
            <div class="form-group col-md-4 col-lg-4">             
                <label class="col-md-12" style="font-size: 14px;">Tanggal Pembelian<br><h5 style="color: #139ec6;"><?php echo date("d M y", $timestamp)?></h5></label>            
            </div> 
            <!-- <div class="form-group col-md-4 col-lg-4">        
                <label class="col-md-12" style="font-size: 14px;">Metode Pembayaran<br><h5 style="color: #139ec6;">Virtual Account</h5></label>
            </div> -->
            <div class="form-group col-12">      
                <div class="col-md-12">
                    <div class="" style="font-size: 14px;">Detail Pemegang<h5 style="color: #ff7101; "><?php echo $reffdetail['fullName'] ?> / <?php echo $reffdetail['emailAddress'] ?> / Ph.: <?php echo $reffdetail['mobilePhone'] ?></h5></div> 
                </div>         
            </div>                     
        </div>         
        <?php } ?>    
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