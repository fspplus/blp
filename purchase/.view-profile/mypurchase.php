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
                    <h3 style="color: #ff7101;">Belum ada pembelian! <a href="../form" style="color: #139ec6; text-decoration: underline;">Yuk segera lakukan pembelian sekarang!</a></h3>            
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
                <div class="col-md-12">        
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
                        $time = strftime("%d %b, %Y",strtotime($products[$counter]['purchaseDate']));
                        //$time = strtotime($products[$counter]['purchaseDate']);
                        //$newpurchase = date('d M, Y', $time);
                        $newpurchase = $time;
                        //$time = strtotime($products[$counter]['maturityDate']);
                        //$maturitydate = date('d M, Y', $time);
                        $time = strftime("%d %b, %Y",strtotime($products[$counter]['maturityDate']));
                        $maturitydate = $time;
                        $time = strtotime($products[$counter]['issuedDate']);
                        $issued = date('d M, Y', $time);
                ?>
    
        <div class="col-md-12 col-lg-12 verTOPnew benefblocks row"  style="padding: 15px 15px 5px !important;">  
            <div class="form-group col-md-12 col-lg-12 verTOPnew">                
                <div class="col-md-12">
                    <h3 style="color: #ff7101;"><?php echo $products[$counter]['productName']." ".$products[$counter]['premium']."/bulan"; ?></h3>  
                    <div class="" style="font-size: 14px;">No. Polis<h3 style="color: #ff7101; display: inline-block; margin-left: 10px;"><?php echo $products[$counter]['policyCode']; ?></h3> | No. Virtual Account <h3 style="display: inline-block;"><?php echo $products[$counter]['generalVANumber']; ?></h3></div>     
                    <div class="" style="font-size: 14px;">Detail Pemegang<h3 style="color: #ff7101; display: inline-block; margin-left: 10px;"><?php echo $products[$counter]['memberName']." / ".$products[$counter]['emailAddress']." / ID No.: ".$products[$counter]['identityNumber']." / Ph.: ".$products[$counter]['mobilePhone']; ?></h3></div>                            
                </div> 
            </div>
            <div class="form-group col-md-4 col-lg-4">             
                <label class="col-md-12" style="font-size: 14px;">Tanggal Pembelian<br><h3 style="color: #139ec6;"><?php echo $newpurchase; ?></h3></label>            
            </div> 
            <div class="form-group col-md-4 col-lg-4">           
                <label class="col-md-12" style="font-size: 14px;">Akhir Masa Pembayaran<br><h3 style="color: #139ec6;"><?php echo $maturitydate; ?></h3></label>           
            </div>  
            <div class="form-group col-md-12 col-lg-12">           
                <div class="col-md-12"><span class="btn2" id="epolis" data-set="<?php echo $products[$counter]['policyCode']; ?>">Kirim E-Policy</span></div>        
            </div>                        
        </div> 
                <?php
                    }
                    $counter += 1;
                }
            ?>                             
</form>
</div>