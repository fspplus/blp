<?php 
    include 'connectdb.php';
if(isset($_SESSION['dataForm1'])){
    $session_avail = FALSE;
}else{
    $session_avail = TRUE;
}
?>

<div class="row" style="margin-bottom: 20px;">
            <div class="col-12 p-0">
                <h1 class="textorange"><strong>Selamat datang Agent <?php echo $_SESSION['fullname'] ?>!</strong></h1>
            </div>
            <div class="col-12 mt-5 p-0">
                Link Referral Anda: <copy>https://bucketlistplan.co.id/product-page?reff=<?php echo $_SESSION['agent-data']['agent_code']; ?></copy><br><copylink onclick="copylink()" class="btn btn-success">Copy</copylink>
                <a class="btn btn-success" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('https://bucketlistplan.co.id/product-page?reff='.$_SESSION['agent-data']['agent_code']) ?>&t=Gabungyuk" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"target="_blank" title="Share on Twitter"><i class="fa fa-facebook"></i></a>
                <a class="btn btn-success" href="https://twitter.com/share?url=<?php echo urlencode('https://bucketlistplan.co.id/product-page?reff='.$_SESSION['agent-data']['agent_code']) ?>&via=bucketlistplan.co.id&text=gabungyuk" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"target="_blank" title="Share on Facebook"><i class="fa fa-twitter"></i></a>
                <a class="btn btn-success" target="_blank" href="https://api.whatsapp.com/send?phone=&text=<?php echo urlencode("Yuk segera gabung ke Bucketlistplan.co.id dari Hanwhalife untuk mendapatkan proteksi dan kesempatan jalan-jalan ke korea! https://bucketlistplan.co.id/product-page?reff=".$_SESSION['agent-data']['agent_code']); ?>"><i class="fa fa-whatsapp"></i></a>

                <input class="d-none" type="text" name="url" id="urlLong" value="https://bucketlistplan.co.id/product-page?reff=<?php echo $_SESSION['agent-data']['agent_code']; ?>">
                <script>
                    function copylink() {
                        /* Get the text field */
                        var copyText = document.getElementById("urlLong");

                        /* Select the text field */
                        copyText.select(); 
                        copyText.setSelectionRange(0, 99999); /* For mobile devices */

                        /* Copy the text inside the text field */
                        navigator.clipboard.writeText(copyText.value);

                        /* Alert the copied text */
                        alert("Link anda berhasil di copy!");
                    }
                </script>

                <h2 class="textorange">Daftar Polis</h2>
                <hr>
                <?php 
                    $refs = referralLists($_SESSION['agent-data']['agent_code']);
                    $refs_fin = json_decode($refs['data'], true);

                    foreach($refs_fin as $ref){

                        $status = getPolicyStatus_detail($ref['policyCode']);
                        $status = json_decode($status['message'], true);
                        // echo "<pre>";
                        // print_r($status);
                        // echo "</pre>";

                        $converted_duedate = date_converter($status['policyduedate']['dueDate']);
                        ?>
                        <div class="col-md-12 col-lg-12 verTOPnew benefblocks row"  style="padding: 15px 15px 5px !important;"> 
                            <div class="form-group col-md-12 col-lg-12 verTOPnew">                
                                <div class="col-md-12">
                                    <h3 style="color: #139ec6"><?php echo $ref['productName']." ".$ref['premium']."/bulan"; ?></h3>  
                                    <div class="" style="font-size: 14px;">No. Polis<h3 style="color: #ff7101; display: inline-block; margin-left: 10px;"><?php echo $ref['policyCode']; ?></h3> | No. Virtual Account <h3 style="display: inline-block;"><?php echo $ref['generalVANumber']; ?></h3></div>     
                                    <div>Status: <h5 style="color: #ff7101; display: inline-block; margin-left: 10px;"><?php echo $status['policystatus']['polStatus'] ?></h5></div>
                                    <div class="" style="font-size: 14px;">Detail Pemegang<h3 style="color: #ff7101; display: inline-block; margin-left: 10px;"><?php echo $ref['memberName']." / ".$ref['emailAddress']." / ID No.: ".$ref['identityNumber']." / Ph.: ".$ref['mobilePhone']; ?></h3></div>                            
                                </div> 
                            </div>
                            <div class="form-group col-md-4 col-lg-4">             
                                <label class="col-md-12" style="font-size: 14px;">Tanggal Pembelian<br><h3 style="color: #139ec6;"><?php echo date("d M,Y", strtotime($ref['purchaseDate'])); ?></h3></label>            
                            </div> 
                            <div class="form-group col-md-4 col-lg-4">           
                                <label class="col-md-12" style="font-size: 14px;">Akhir Masa Pembayaran<br><h3 style="color: #139ec6;"><?php echo date("d M,Y", strtotime($ref['maturityDate'])); ?></h3></label>           
                            </div>  
                            <!-- <div class="form-group col-md-4 col-lg-4">           
                                <label class="col-md-12" style="font-size: 14px;">Pembayaran Terakhir<br><h3 style="color: #139ec6;"><?php echo date_toID(date("d M,Y", strtotime($status['policystatus']['date']))); ?></h3></label>           
                            </div>   -->
                            <div class="form-group col-md-4 col-lg-4">   
                            <?php 
                                if($status['policyduedate']['dueDate'] == "null"){
                                    ?>
                                        <label class="col-md-12" style="font-size: 14px;">Pembayaran Berikutnya<br><h3 style="color: #139ec6;"></h3></label>
                                    <?php
                                }else{
                                    // echo "Tanggalnya: ";
                                    // echo $status['policyduedate']['dueDate'];
                                    ?>
                                        <label class="col-md-12" style="font-size: 14px;">Pembayaran Berikutnya<br><h3 style="color: #139ec6;"><?php echo date_toID(date("d M,Y", strtotime($converted_duedate))); ?></h3></label>
                                    <?php
                                }
                            ?> 
                            </div>
                            <div class="form-group col-md-4 col-lg-4">        
                                <label class="col-md-12" style="font-size: 14px;">Metode Pembayaran<br><h3 style="color: #139ec6;"><?php echo $status['policyduedate']['modeName']; ?></h3></label>
                            </div>
                            <div class="form-group col-md-4 col-lg-4">
                            </div>                     
                        </div> 
                        <?php
                    }
                ?>

                <table id="ref_table" class="col-12 d-none">
                    <thead>
                        <tr>
                            <th>Nomor Polis</th>
                            <th>Tanggal Issued</th>
                            <th>Nama Pemegang Polis</th>
                            <th>Model Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($refs_fin as $ref){
                                echo "<tr>";
                                echo "<td>".$ref['policyCode']."</td>";
                                echo "<td>".$ref['issuedDate']."</td>";
                                echo "<td>".$ref['memberName']."</td>";
                                echo "<td>".$ref['paymentMethod']."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            $(document).ready(function(){
            })
        </script>