<?php
session_start();
include '../jsonapp/json-hanwha-api.php';  writelog();
    include '../jsonapp/sesschkr.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
    ?>
        <html>
            
            <body>
                <!--Content Start-->
              <div id="form6" class="container containerform animated fadeInRight" style="padding: 5% 0">
                <div class="row">
                  <div class="col-md-12 col-12 align-self-center">
                    <div class="step" style="margin-bottom: 2%">
                        <div class="row" style="padding: 0px !important; margin: 0px !important; display: -webkit-box;">
                            <div class="btn2 col-lg-2 col-md-12 col-12" onclick="back('frm5q')">&lt;</div>
                    <div class="col-lg-10 col-md-12 col-12 displayDesktop" src="../assets/images/form/steps/step-06.png" width="100%"><img src="../assets/images/form/steps/Hanwhalife-bucketlist-step-06.png" width="100%"></div>
                        </div>
                        <img src="../assets/images/form/steps/Hanwhalife-bucketlist-step-06.png" width="100%" class="displayMobile">
                        <h1 style="color: #ff7101; font-weight: bold;">METODE PEMBAYARAN PREMI</h1>
                    </div>
                  </div>
                </div>
                <form method="post" id="data-payment" action="./formaplikasi/checkva.php">  
                <div class="row">
                    <div class="col-lg-12 col-md-4 col-12 align-self-center">
                        <label for="referralcode" style="display: inline-block; margin-right: 1%;">Gunakan Referral ID</label>
                        <input type="text" class="txedit" name="referralcode" placeholder="Referral ID" value="<?php if(isset($_SESSION['ref'])){echo $_SESSION['ref'];} ?>" style="display: inline-block; width: 74%"<?php if(isset($_SESSION['ref'])){echo "readonly";} ?>>
                        <div>
                            <ul>
                                <li>Agency: kode Agent (contoh: 91809137)</li>
                                <li>HLI Employee: 6 digit NIK (contoh: 000108)</li>
                                <li>Influencer: ID Instagram (contoh: @hanwhaindonesia)</li>
                            </ul>
                        </div>
                    </div><br>
                    <?php if(false){ ?>
                    <h3 class="col-lg-12 col-md-12 col-12">Pilih Bank Pembayaran!</h3><br>
                    <?php if(0){ ?>
                    <label class="col-lg-4 col-md-4 col-12 align-self-center" id="bankOptions">
                        <input type="radio" class="option-input" name="paymentbank" value="008" required>
                        <img src="/assets/images/banklogo/Hanwhalife-bucketlist-0912387.png" width="100%">
                    </label>
                    <?php } ?>
                    <label class="col-lg-4 col-md-4 col-12 align-self-center" id="bankOptions">
                        <input type="radio" class="option-input" name="paymentbank" value="014" required checked>
                        <img src="/assets/images/banklogo/Hanwhalife-bucketlist-18320.png" width="100%">
                    </label>
                    <label class="col-lg-4 col-md-4 col-12 align-self-center" id="bankOptions">
                        <input type="radio" class="option-input" name="paymentbank" value="009" required>
                        <img src="/assets/images/banklogo/Hanwhalife-bucketlist-18283.png" width="100%">
                    </label>
                    <label class="col-lg-4 col-md-4 col-12 align-self-center" id="bankOptions">
                        <input type="radio" class="option-input" name="paymentbank" value="013" required>
                        <img src="/assets/images/banklogo/Hanwhalife-bucketlist-1239.png" width="100%">
                    </label>
                    <?php } ?>
                </div>  
                <div class="row" style="border-top: 3px solid #ff7101; border-bottom: 3px solid #ff7101; padding-top: 15px; padding-bottom: 15px; background-color: rgba(237,237,237,0.2);">
                    <h3 class="col-lg-12 col-md-12 col-12">Pilih Pengembalian Asuransi Akhir.</h3>
                    <div class="col-lg-4 col-md-4 col-12 align-self-center">
                        <span>Pada masa berakhirnya asuransi, anda akan menerima uang sesuai dengan jumlah yang akan disepakati oleh asuransi.</span>
                    </div><br>
                    <div id="cashoptions" class="col-12 col-lg-6 col-md-12" style=" padding-bottom: 20px;">
                        <select class="txedit bankoption" name="bankoption" style="opacity: 1;" required>
                            <option disabled selected value="">Pilih Bank</option>
                            <?php 
                                $databank = banklist();
                                foreach($databank as $data){
                                    $bankName = $data['codeValue'];
                                    $bankCode = $data['codeId'];
                                    echo "<option value='$bankCode'>".$bankName."</option>";
                                }
                            ?>
                        </select><br>
                        <input type="text" class="txedit" name="namebutab" placeholder="Nama sesuai Buku Tabungan" required>
                        <input type="number" class="txedit acctnumber" name="acctnumber" pattern="[0-9]*" placeholder="Nomor Rekening Bank" required>
                    </div>
                    <div id="req7" class="col-lg-12 col-md-12 col-12" style="border: 2px #ff7101 solid; padding: 5px">
                        <p>Dengan mengisi dan melengkapi data diri yang dipersyaratkan untuk mengikuti program asuransi jiwa ini, saya sebagai calon pemegang polis mengajukan permohonan asuransi jiwa kepada PT Hanwha Life Insurance Indonesia ("Penanggung") dan menyatakan bahwa:</p>
                        <ul>
                            <li>Semua data, pernyataan, dan jawaban yang saya berikan dalam formulir online untuk keikutsertaan saya dalam program asuransi berlaku sebagai Formulir Permintaan Asuransi Jiwa dan diisi secara langsung oleh diri sendiri, benar dan akan menjadi dasar bagi berlakunya Kontrak Asuransi Jiwa yang akan disetujui dan dikeluarkan oleh pihak Penanggung. Apabila di kemudian hari terdapat keterangan/informasi yang bertentangan dengan keadaan sebenarnya tetapi tidak dinyatakan/dikemukakan dalam Formulir Permintaan Asuransi Jiwa ini, di mana dalam hal apabila keterangan/informasi yang sebenarnya diberikan sejak awal, maka pertanggungan asuransi tidak akan dijamin atau dipertanggungkan dengan syarat dan ketentuan yang sama, maka Penanggung berhak untuk membatalkan Polis dan/atau menolak klaim yang diajukan.</li>

                            <li>Memberikan kuasa yang tidak dapat ditarik kembali atau dibatalkan kepada setiap Dokter/Tenaga Medis/Rumah Sakit/Klinik/Puskesmas/Laboratorium, perusahaan asuransi atau perusahaan reasuransi, badan, instansi/lembaga atau pihak lain yang mempunyai catatan riwayat kesehatan, penyakit, atau informasi lain mengenai diri Saya/Kami untuk diberikan kepada Penanggung. Kuasa ini tetap berlaku pada waktu Saya/Kami masih hidup maupun sesudah Saya/Kami meninggal. Salinan Surat Kuasa ini berlaku sesuai dengan aslinya. Pemberian kuasa ini tidak dapat ditarik lagi dan mengikat para pengganti/penerima manfaat dan orang yang ditunjuk dan tetap berlaku setelah Saya/Kami meninggal/dalam keadaan cacat.</li>

                            <li>Mengijinkan Penanggung untuk membagikan atau mempertukarkan informasi yang terdapat dalam program asuransi ini dan/atau formulir tambahan lainnya mengenai diri Saya/Kami kepada otoritas pajak negara Indonesia dan/atau otoritas pajak negara lain dalam rangka pertukaran informasi antar pemerintah, serta melepaskan segala hak-hak yang mungkin dimiliki yang dapat mencegah Penanggung untuk memenuhi ketentuan hukum dan pertaturan perundangan yang berlaku.</li>

                            <li>Menyatakan bahwa pembayaran Premi untuk Polis yang diajukan berdasarkan Formulir Permintaan Asuransi Jiwa ini tidak berasal dari/untuk tujuan pidana pencucian uang, berkaitan dengan pendanaan terorisme dan/atau tindak pidana lain yang dilarang berdasarkan peraturan dan perundang-undangan yang berlaku di Indonesia.</li>

                            <li>Menyetujui dan/atau menyatakan telah menerima kuasa dari Pemegang Polis untuk menerima Polis hanya dalam format softcopy.</li>

                            <li>Menyetujui Pertanggungan ini mulai berlaku sejak Masa Pertanggungan yang tercantum dalam Polis yang diterbitkan oleh Penanggung.</li>
                        </ul>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12" style="margin-top: 30px">
                        <input type="checkbox" id="cek" name="setuju" value="setuju" required>
                        <label for="cek">Saya setuju dan juga telah membaca dan memahami semua Syarat dan Ketentuan yang ditetapkan PT Hanwha Life Insurance Indonesia di atas, termasuk penjelasan terkait Produk ini.</label>
                    </div>
                    <div id="btnpay7" class="col-lg-12 col-md-12 col-12" style="margin-top: 30px">
                        <input type="submit" value="Pay Now" class="btn">
                    </div>
                </div>
                </form>
              </div>
              <!--Content End-->
            </body>
            <?php 
            if(isset($_SESSION['memberid'])){
                ?>
                    <script>
                           $(function() {
                                // Get the form.
                                var form = $('#data-payment');

                                // Get the messages div.
                                var formMessages = $('#form-messages');

                                // TODO: The rest of the code will go here...
                                $(form).submit(function(event) {
                                    // Stop the browser from submitting the form.
                                    event.preventDefault();

                                    // TODO
                                    // Serialize the form data.
                                    var formData = $(form).serialize();
                                    $.ajax({
                                        type: 'POST',
                                        url: './formaplikasi/newva.php',
                                        data: formData,
                                        success: function(dataSum) {
                                               // data is ur summary
                                              $('.formloader').html(dataSum);
                                              $('html, body').animate({ scrollTop: 0 }, 'slow');
                                              window.history.pushState('Virtual Account', 'Title', '/virtual-account');
                                         }
                                    })
                                });

                            });
                            $(".cashreturn").click(function(){
                                $(".bankoption").css("opacity","1");
                                $(".acctnumber").css("opacity","1");
                                $(".bankoption").attr("required", "required");
                                $(".acctnumber").attr("required","required");
                            });
                            $(".voucherreturn").click(function(){
                                $(".bankoption").css("opacity","0");
                                $(".acctnumber").css("opacity","0");
                                $(".bankoption").removeAttr('required');
                                $(".acctnumber").removeAttr('required');
                            });
                            $("#bankoptions").click(function(){
                                $(this).classList.add("selectedOptions");
                            })
                    </script>
            <?php
            }else if(!isset($_SESSION['memberid'])){?>
            <script>
               $(function() {
                    // Get the form.
                    var form = $('#data-payment');

                    // Get the messages div.
                    var formMessages = $('#form-messages');

                    // TODO: The rest of the code will go here...
                    $(form).submit(function(event) {
                        var isFormValid = true;

                        $("input").each(function(){
                            if ($.trim($(this).val()).length == 0){
                                $(this).addClass("highlight");
                                isFormValid = false;
                            }
                            else{
                                $(this).removeClass("highlight");
                            }
                        });
                        $("select").each(function(){
                            if ($.trim($(this).val()).length == 0){
                                $(this).addClass("highlight");
                                isFormValid = false;
                            }
                            else{
                                $(this).removeClass("highlight");
                            }
                        });
                        // Stop the browser from submitting the form.
                        event.preventDefault();

                        // TODO
                        // Serialize the form data.
                        var formData = $(form).serialize();
                        $.ajax({
                            type: 'POST',
                            url: $(form).attr('action'),
                            data: formData,
                            success: function(dataSum) {
                                   // data is ur summary
                                  $('.formloader').html(dataSum);
                             }
                        })
                    });
                    
                });
                $(".cashreturn").click(function(){
                    $(".bankoption").css("opacity","1");
                    $(".acctnumber").css("opacity","1");
                    $(".bankoption").attr("required", "required");
                    $(".acctnumber").attr("required","required");
                });
                $(".voucherreturn").click(function(){
                    $(".bankoption").css("opacity","0");
                    $(".acctnumber").css("opacity","0");
                    $(".bankoption").removeAttr('required');
                    $(".acctnumber").removeAttr('required');
                });
                $("#bankoptions").click(function(){
                    $(this).classList.add("selectedOptions");
                })
        </script>
            
        </html>
    <?php
            }
?>
<style>
    .row{margin-bottom: 40px !important;}
</style>