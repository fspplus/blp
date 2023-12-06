<?php 
    include 'connectdb.php';
if(isset($_SESSION['dataForm1'])){
    $session_avail = FALSE;
}else{
    $session_avail = TRUE;
}
?>
<div class="row"><div class="form-group row rowpaddingless">
    <div class="col-md-9">
        Nama Lengkap
        <h1 style="color: #ff7101"><?php echo $dataUser['fullName']; ?></h1>
        <h3>Bergabung pada 
            <?php 
            
            $time = strftime("%d %b, %Y",strtotime($dataUser['joinDate']));
            //$time = strtotime($dataUser['joinDate']);
            //$newformat = date('d M Y',$time); 
            $newformat = $time;
            echo $newformat."<br>"; 
            //echo $dataUser['hanwhaReferenceCode'];

            @$dataRefCode = refCodeUsed($dataUser['hanwhaReferenceCode']);
            if($dataRefCode != NULL){
                $countRefCode = count($dataRefCode);
            }else{
                //echo "Referral Code anda belum digunakan oleh siapapun";
                $countRefCode = 0;
            }
            ?>
            
        </h3>
    </div>

    <?php 
        if($dataUser['memberType'] == 3){
        ?>
        <div class="col-md-3">
            Status: Nasabah <br><br>
            <a href="../purchase/reffmate" class="btn btn-success">Daftar Referral Mate</a>
        </div>
        <?php
        }else if($dataUser['memberType'] == 8){
            ?>
            <div class="col-md-3">
                Status: Referral Mate <br><br>
                <a href="../purchase/reffmate" class="btn btn-success">Update Data Referral Mate</a>
            </div>
            <?php
        }
    ?>

    <hr style="width: 100%; height: 2px; background-color: #ff7101; color: #ff7101;">
</div>
<h5 class="col-md-12" style="padding: 10px 0px 0px">Referral Code: <?php print_r($dataUser['hanwhaReferenceCode']); ?></h5>
<?php 
    if($dataUser['memberType'] == 8){
    ?>
    Link Referral Anda: <copy>https://bucketlistplan.co.id/product-page?reff=<?php echo $dataUser['hanwhaReferenceCode']; ?></copy><br><copylink onclick="copylink()" class="btn btn-success">Copy</copylink>
    <a class="btn btn-success" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('https://bucketlistplan.co.id/product-page?reff='.$dataUser['hanwhaReferenceCode']) ?>&t=Gabungyuk" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"target="_blank" title="Share on Twitter"><i class="fa fa-facebook"></i></a>
    <a class="btn btn-success" href="https://twitter.com/share?url=<?php echo urlencode('https://bucketlistplan.co.id/product-page?reff='.$dataUser['hanwhaReferenceCode']) ?>&via=bucketlistplan.co.id&text=gabungyuk" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"target="_blank" title="Share on Facebook"><i class="fa fa-twitter"></i></a>
    <a class="btn btn-success" target="_blank" href="https://api.whatsapp.com/send?phone=&text=<?php echo urlencode("Mau dapat perlindungan dengan manfaat saving? yuk kepoin produknya, dijamin untung! dapatkan sald e-wallet hingga 300k. https://bucketlistplan.co.id/product-page?reff=".$dataUser['hanwhaReferenceCode']); ?>"><i class="fa fa-whatsapp"></i></a>

    <input class="d-none" type="text" name="url" id="urlLong" value="https://bucketlistplan.co.id/product-page?reff=<?php echo $dataUser['hanwhaReferenceCode']; ?>">
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
    <?php
    }
?>
<div class="col-12 mt-3 rowpaddingless">
    <table class="tablebkt" border="2px #ff7101 solid">
        <tbody><tr>
        <th><h5>Referral ID Used</h5></th>
        <td><h5><?php echo $countRefCode; ?></h5></td>
        </tr>
    </tbody></table>
</div>
<div class="row mt-5 p-0" style="margin-bottom: 20px;">
            <div class="col-12">
                <h4 class="textorange"><strong>Update data anda untuk bisa segera mendapatkan benefit lebih dari Bucket List Plan by Hanwha Life Insurance Indonesia!</strong></h4>
            </div>
            <div class="col-12 rowpaddingless formCol">
                <div class="row rowpaddingless">
                    <form class="col-12" action="profile?update=yes" method="POST" id="formUpdate" class="formCol" enctype="multipart/form-data" autocomplete="off">
                        <div class="col-md-12 col-12 align-self-center formCol rowpaddingless">
                            <div class="row rowpaddingless">
                                <div class="col-12 rowpaddingless">
                                    <small>Silahkan masukan data yang sesuai dengan kartu identitas untuk membeli asuransi dari Bucket List Plan - Hanwha Life.</small>
                                </div>
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="text" class="form-controller" name="hanwhadob" placeholder="Tanggal Lahir" id="Pikaday" onkeypress="return false" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhadob'];} ?>" required>
                                    <label for="hanwhadob" style="color: ligthgray;">Tanggal Lahir</label>
                                </div>
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="tel" class="form-controller" name="hanwhanik" placeholder="No. KTP / Passport / KITAS" maxlength="16" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhanik'];} ?>" required>
                                    <label for="hanwhanik" style="color: ligthgray;">No. KTP / Passport / KITAS</label>
                                </div>
                                <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
                                    <h5>Jenis Kelamin</h5>
                                </div>
                                <div class="col-md-6 radioSelector">
                                    <label><input type="radio" name="hanwhagender" value="M"><span>Pria</span></label>
                                </div>
                                <div class="col-md-6 radioSelector">
                                    <label><input type="radio" name="hanwhagender" value="F"><span>Wanita</span></label>
                                </div>
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="tel" class="form-controller" name="hanwhaphone" placeholder="No. Handphone" maxlength="12" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaphone'];} ?>" required>
                                    <label for="hanwhaphone" style="color: ligthgray;">No. Handphone</label>
                                </div>
                                <div class="col-md-12 rowpaddingless">
                                    <label for="hanwhafoto" class="btn btn-lg btn-info btn-block" style="width: 100%; border-radius: 0px; cursor: pointer;">Upload Foto KTP
                                        <input type="file" class="form-controller" name="hanwhafotoktp" placeholder="No. KTP / Passport / KITAS" id="uploadKTP" required style="position: absolute;top: 0;left: 0;width: 100%;opacity: 0;height: 100%; margin: 0px;">
                                    </label>
                                    <small class="m-t-20">File Terpilih: <span id="labelKTP"></span></small>
                                </div>
                                <div class="floating-label col-md-12  p-l-0 p-t-20 p-r-0">
                                    <label for="hanwhaemail" style="color: ligthgray;">Pilih Kota</label>
                                    <small>Silahkan ketik nama kota anda dan pilih dari opsi yang tersedia. Jika tidak tersedia, silahkan hubungi Customer Service Hanwha untuk bantuan lebih lanjut.</small>
                                    <br><small>Jika lokasi berada di luar negri, silahkan ketik "Luar Negri"</small>
                                    <div class="autocomplete">
                                        <input type="text" id="myInput" class="form-controller border-b-orange " name="hanwhapob1" placeholder="Pilih Kota Kelahiran" required style="border-bottom: 1px solid #ff7101 !important;">
                                        <input type="hidden" id="inputKotaLahir" class="form-controller border-b-orange " name="hanwhapob2" placeholder="Pilih Kota Kelahiran" required style="border-bottom: 1px solid #ff7101 !important;">
                                        <label for="hanwhapob1" style="color: ligthgray;">Pilih Kota Kelahiran</label>
                                    </div>
                                    <div id="data-city" style="display: none !important;"><?php getcityVal($conn); ?> </div>
                                </div>
                                <div class="col-md-12 radioSelector p-t-20 p-l-0 p-b-10">
                                    <h5>Pilih Status Pernikahan Anda</h5>
                                </div>
                                <div class="col-md-6 radioSelector">
                                    <label><input type="radio" name="hanwhastatus" value="Menikah"><span>Sudah Menikah</span></label>
                                </div>
                                <div class="col-md-6 radioSelector">
                                    <label class="col-md-6 rowpaddingless"><input type="radio" name="hanwhastatus" value="Belum Menikah"><span>Belum Menikah</span></label>
                                </div>
                                <div class="floating-label col-md-6 rowpaddingless">
                                    <select name="hanwhasourceincome" required>
                                        <option value="" disabled selected>
                                            Pilih Sumber Pendapatan
                                        </option>
                                        <?php 
                                            echo $dataFull = sourceincome();
                                            foreach($dataFull as $data){
                                                $kerjaan = $data['codeValue'];
                                                echo mb_convert_case("<option value='".$data['codeId']."' data-group='".$data['groupCode']."'>".$kerjaan."</option>", MB_CASE_TITLE, "UTF-8");
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="floating-label col-md-6 rowpaddingless">
                                    <select name="hanwhawork" required id="workselector">
                                        <option value="" disabled selected>
                                            Pilih Pekerjaan
                                        </option>
                                        <?php 
                                            $dataFull = jobdesclist();
                                            foreach($dataFull as $data){
                                                $kerjaan = $data['codeValue'];
                                                echo mb_convert_case("<option value='".$data['codeId']."' data-group='".$data['groupCode']."'>".$kerjaan."</option>", MB_CASE_TITLE, "UTF-8");
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="text" class="form-controller" name="hanwhaposition" placeholder="Uraian Pekerjaan &#40; Jabatan/Pangkat/Posisi&#41;" id="hanwhaposition" disabled>
                                    <label for="hanwhaposition" style="color: ligthgray;">Uraian Pekerjaan &#40; Jabatan/Pangkat/Posisi&#41;</label>
                                </div>
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="text" class="form-controller" name="hanwhacompanyname" placeholder="Nama Perusahaan/Instansi/Lembaga" id="hanwhacompanyname" disabled>
                                    <label for="hanwhacompanyname" style="color: ligthgray;">Nama Perusahaan/Instansi/Lembaga</label>
                                </div>
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="text" class="form-controller" name="hanwhasector" placeholder="Bidang Usaha" id="hanwhasector" disabled>
                                    <label for="hanwhasector" style="color: ligthgray;">Bidang Usaha</label>
                                </div>
                                <div class="col-12 rowpaddingless">
                                    <h3 style="margin-top: 10px;">Alamat Surat Menyurat</h3>
                                </div>
                                
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="tel" class="form-controller" name="hanwhaHomephone" placeholder="No. Telp Rumah" required maxlength="12" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaHomephone'];} ?>" >
                                    <label for="hanwhaHomephone" style="color: ligthgray;">No. Telp. Rumah</label>
                                </div>
                                
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="text" class="form-controller" name="hanwhaMailaddr1" placeholder="Baris Alamat 1" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaMailaddr1'];} ?>" required>
                                    <label for="hanwhaMailaddr1" style="color: ligthgray;">Baris Alamat 1</label>
                                </div>
                                
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="text" class="form-controller" name="hanwhaMailaddr2" placeholder="Baris Alamat 2" value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaMailaddr2'];} ?>" required>
                                    <label for="hanwhaMailaddr2" style="color: ligthgray;">Baris Alamat 2</label>
                                </div>
                                
                                <div class="floating-label col-md-12 p-l-0 p-t-20 p-r-0">
                                    <label for="hanwhaemail" style="color: ligthgray;">Pilih Kota</label>
                                    <small>Silahkan ketik nama kota anda dan pilih dari opsi yang tersedia. Jika tidak tersedia, silahkan hubungi Customer Service Hanwha untuk bantuan lebih lanjut.</small>
                                    <br><small>Jika lokasi berada di luar negri, silahkan ketik "Luar Negri"</small>
                                    <div class="autocomplete">
                                        <input type="text" id="addressCity" class="form-controller border-b-orange " name="hanwhaMailcity1" placeholder="Kota Alamat" required style="border-bottom: 1px solid #ff7101 !important;">
                                        <input type="hidden" id="inputKotaAlamat" class="form-controller border-b-orange " name="hanwhaMailcity2" placeholder="Pilih Kota Kelahiran" required style="border-bottom: 1px solid #ff7101 !important;">
                                        <label for="hanwhaMailcity1" style="color: ligthgray;">Kota Alamat</label>
                                    </div>
                                </div>
                                
                                <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                    <input type="tel" class="form-controller" name="hanwhaMailPostal" placeholder="Kode Pos" required value="<?php if($session_avail == FALSE){echo $_SESSION['dataForm1']['hanwhaMailPostal'];} ?>"  maxlength="5">
                                    <label for="hanwhaMailPostal" style="color: ligthgray;">Kode Pos</label>
                                </div>
                                <div class="col-md-12 p-t-20 p-b-20">
                                    <input type="checkbox" id="cek" class="addrcheck" name="hanwhaSameMailing" value="sesuai" onclick="sameKTP()">
                                    <label for="cek">Jika alamat sesuai dengan identitas KTP</label>
                                </div>
                                <div id="ktpaddr" style="width: 100%;">
                                    <div class="col-12 rowpaddingless">
                                        <h3 style="margin-top: 10px;">Alamat KTP</h3>
                                    </div>
                                    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                        <input type="text" class="form-controller" name="hanwhaKTPaddr1" placeholder="Baris Alamat 1" id="addr1KTP" required>
                                        <label for="hanwhaKTPaddr1" style="color: ligthgray;">Baris Alamat 1</label>
                                    </div>

                                    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                        <input type="text" class="form-controller" name="hanwhaKTPaddr2" placeholder="Baris Alamat 2" id="addr2KTP" required>
                                        <label for="hanwhaKTPaddr2" style="color: ligthgray;">Baris Alamat 2</label>
                                    </div>

                                    <div class="floating-label col-md-12  p-l-0 p-t-20 p-r-0">
                                        <label for="hanwhaemail" style="color: ligthgray;">Pilih Kota</label>
                                        <small>Silahkan ketik nama kota anda dan pilih dari opsi yang tersedia. Jika tidak tersedia, silahkan hubungi Customer Service Hanwha untuk bantuan lebih lanjut.</small>
                                    <br><small>Jika lokasi berada di luar negri, silahkan ketik "Luar Negri"</small>
                                        <div class="autocomplete">
                                            <input type="text" id="inputKotaKTP1" class="form-controller border-b-orange " name="hanwhaKTPcity1" placeholder="Kota Alamat" required style="border-bottom: 1px solid #ff7101 !important;" id="city1KTP">
                                            <input type="hidden" id="inputKotaKTP2" class="form-controller border-b-orange " name="hanwhaKTPcity2" placeholder="Pilih Kota Kelahiran" required id="city2KTP">
                                            <label for="hanwhaKTPcity1" style="color: ligthgray;">Kota Alamat</label>
                                        </div>
                                    </div>
                                    <div class="floating-label border-b-orange col-md-12 rowpaddingless">
                                        <input type="tel" class="form-controller" name="hanwhaKTPPostal" placeholder="Kode Pos" id="postalKTP" required maxlength="5">
                                        <label for="hanwhaKTPPostal" style="color: ligthgray;">Kode Pos</label>
                                    </div>
                                </div>
                                <div class="col-md-12 p-b-30"><div class="limit"></div></div>
                                <input class="btn btn-lg btn-info btn-block" type="submit" value="Lanjutkan">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<!--<script>
$(function() {
         // Get the form.
         var form = $('#formUpdate');

         // Get the messages div.
         var formMessages = $('#form-messages');

         // TODO: The rest of the code will go here...
        
         $(form).submit(function(event) {
             // Stop the browser from submitting the form.
             event.preventDefault();
             // TODO
             // Serialize the form data.
             $("#page-loader").css("display", "block");
             var formData = $(form).serialize();
             $.ajax({
                 type: 'POST',
                 method: 'POST',
                 url: "../controller/update-proc.php",
                 data: form.serialize(),
                 success: function(dataSum) {
                        // data is ur summary
                       $('.scriptloader').html(dataSum);
                        $("#page-loader").css("display", "none");
                  }
             })
         });
                    
     });
</script>-->