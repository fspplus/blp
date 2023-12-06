<pre>
<?php
    $reffmate_income = reffmateIncome($dataUser['hanwhaReferenceCode']);
    if($_SESSION['email'] == "08569888077"){
        $reffmate_income = reffmateIncome("19252478");

    echo "<pre>";
    print_r($reffmate_income);
    echo "</pre>";
    }
?>
</pre>
<div id="penghasilan-refferal" class="profilecards">                           
<form class="form-horizontal form-material">   
    <div class="form-group">           
        <label class="col-md-12">Nama Lengkap</label>       
        <div class="col-md-12">
            <h1 style="color: #ff7101"><?php echo $dataUser['fullName']; ?></h1>
            <h3>Bergabung pada <?php echo $newformat ; ?></h3>
            <hr style="width: 100%; height: 2px; background-color: #ff7101; color: #ff7101;">              
        </div>            
    </div>              
    <div class="row mb-5"><h3 class="col-md-8">Penghasilan</h3><div class="col-md-4">
                        <?php // <a href="#!" id="btn-pencairan" class="btn btn-md bg-hanwha mt-2">Cairkan ke Rekening</a> 
?> 
</div></div>
    <div class="mb-5 d-none">
        <canvas id="myChart" width="400" height="100"></canvas>
        <script>
            var year = new Date().getFullYear();
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sept', 'Okt', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Pendapatan perbulan di Tahun '+ year,
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
        
    </div>
    <div class="row statistic-income">
        <div class="card-deck m-0 mb-5">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Total Pendapatan</h5>
                <h3 class="card-text">
                    Rp. <?php 
                        echo $reffmate_income['data']['totComm'];
                        ?>,-
                </h3>
                </div>
                <!-- <div class="card-footer">
                <small class="">Last updated 3 mins ago</small>
                </div> -->
            </div>
            <!-- <div class="card">
                <div class="card-body">
                <h5 class="card-title">Total Pendapatan Bulan Ini</h5>
                <h3 class="card-text">
                    Rp. 500K,-
                </h3>
                </div>
                <div class="card-footer">
                <small class="">Last updated 3 mins ago</small>
                </div>
            </div> -->
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Total Referral Terpakai</h5>
                <h3 class="card-text">
                    <?php echo $reffmate_income['data']['refUsageMonth']; ?>x
                </h3>
                </div>
                <!-- <div class="card-footer">
                <small class="">Last updated 3 mins ago</small>
                </div> -->
            </div>
        </div>
    </div>
    <div class="accordion" id="accordionExample">
        <?php 
            $reffmate_income = reffmateIncome($dataUser['hanwhaReferenceCode'], "", date("Ym", strtotime("-1 months"))."01", date("Ym")."01");
            // echo date("Ym", strtotime("-1 months"))."01";
            if($_SESSION['email'] == "08569888077"){
                $reffmate_income = reffmateIncome("0071909949", "", date("Ym", strtotime("-1 months"))."01", date("Ym")."01");
            
        
                // echo "<pre>";
                // print_r($reffmate_income);
                // echo "</pre>";
            }
        ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <?php echo date("F Y", strtotime("-1 months")) ?>
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body row">
                    <div class="col-12 text-center mb-3">
                        <strong>Total Penggunaan | Pendapatan Bulan <?php echo date("F Y", strtotime("-1 months")) ?></strong>
                        <h5 class="text-hanwha">
                            <?php echo $reffmate_income['data']['refUsageMonth'] ?> Referral | Rp <?php echo $reffmate_income['data']['totComm'] ?>
                        </h5>
                    </div>
                    <div class="col-6">
                        <strong>Lewat Masa Freelook</strong>
                        <h5 class="text-hanwha">
                            Rp <?php echo $reffmate_income['data']['moreincomeFreelook'] ?>
                        </h5>
                    </div>
                    <div class="col-6">
                        <strong>Dalam Masa Freelook</strong>
                        <h5 class="text-hanwha">
                            Rp <?php echo $reffmate_income['data']['incomeFreelook'] ?>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            $reffmate_income = reffmateIncome($dataUser['hanwhaReferenceCode'], "", date("Ym", strtotime("-2 months"))."01", date("Ym", strtotime("-1 months"))."01");
            // echo date("Ym", strtotime("-1 months"))."01";
            if($_SESSION['email'] == "08569888077"){
                $reffmate_income = reffmateIncome("0071909949", "", date("Ym", strtotime("-2 months"))."01", date("Ym", strtotime("-1 months"))."01");
            
        
                // echo "<pre>";
                // print_r($reffmate_income);
                // echo "</pre>";
            }
        ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                <?php echo date("F Y", strtotime("-2 months")) ?>
            </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body row">
                    <div class="col-12 text-center mb-3">
                        <strong>Total Penggunaan | Pendapatan Bulan <?php echo date("F Y", strtotime("-2 months")) ?></strong>
                        <h5 class="text-hanwha">
                            <?php echo $reffmate_income['data']['refUsageMonth'] ?> Referral | Rp <?php echo $reffmate_income['data']['totComm'] ?>
                        </h5>
                    </div>
                    <div class="col-6">
                        <strong>Lewat Masa Freelook</strong>
                        <h5 class="text-hanwha">
                            Rp <?php echo $reffmate_income['data']['moreincomeFreelook'] ?>
                        </h5>
                        <!-- <a href="#!" class="btn btn-md bg-hanwha mt-2">Cairkan ke Rekening</a> -->
                    </div>
                    <div class="col-6">
                        <strong>Dalam Masa Freelook</strong>
                        <h5 class="text-hanwha">
                            Rp <?php echo $reffmate_income['data']['incomeFreelook'] ?>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            $reffmate_income = reffmateIncome($dataUser['hanwhaReferenceCode'], "", date("Ym", strtotime("-3 months"))."01", date("Ym", strtotime("-2 months"))."01");
            // echo date("Ym", strtotime("-1 months"))."01";
            if($_SESSION['email'] == "08569888077"){
                $reffmate_income = reffmateIncome("0071909949", "", date("Ym", strtotime("-3 months"))."01", date("Ym", strtotime("-2 months"))."01");
            

                // echo "<pre>";
                // print_r($reffmate_income);
                // echo "</pre>";
            }
        ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                <?php echo date("F Y", strtotime("-3 months")) ?>
            </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body row">
                    <div class="col-12 text-center mb-3">
                        <strong>Total Penggunaan | Pendapatan Bulan <?php echo date("F Y", strtotime("-3 months")) ?></strong>
                        <h5 class="text-hanwha">
                            <?php echo $reffmate_income['data']['refUsageMonth'] ?> Referral | Rp <?php echo $reffmate_income['data']['totComm'] ?>
                        </h5>
                    </div>
                    <div class="col-6">
                        <strong>Lewat Masa Freelook</strong>
                        <h5 class="text-hanwha">
                            Rp <?php echo $reffmate_income['data']['moreincomeFreelook'] ?>
                        </h5>
                        <!-- <a href="#!" class="btn btn-md bg-hanwha mt-2">Cairkan ke Rekening</a> -->
                    </div>
                    <div class="col-6">
                        <strong>Dalam Masa Freelook</strong>
                        <h5 class="text-hanwha">
                            Rp <?php echo $reffmate_income['data']['incomeFreelook'] ?>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    
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



    $("#btn-pencairan").on("click",function(e){
        bootbox.confirm({
            message: "Anda akan mengajukan permohonan pencairan.<br>Untuk pencairan penghasilan yang diajukan pada tanggal 1-15 akan di transfer pada tanggal 25.<br>Untuk pencairan penghasilan yang diajukan pada tanggal 16-31 akan di transfer pada tanggal 10.",
            buttons: {
                confirm: {
                    label: 'Ya',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Tidak',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if(result){
                    $.ajax({
                        type: 'POST',
                        url: "./controller/request-pencairan.php",
                        success: function(data) {
                            result = $.parseJSON(data);
                            console.log(result);
                            if(result['result_code']){
                                messageAlert = "<p><h3>Hallo sahabat Referral Mate,</h3><br /><br />Selamat kamu berhasil mengajukan pencairan pendapatan sebesar <sesuai nominal yang dicairkan> saat ini pengajuan kamu sedang kami proses, dan akan di transfer ke rekening kamu pada:<br />Pengajuan tanggal 1-15 akan di transfer pada tanggal 25<br />Pengajuan tanggal 16-31 akan di transfer pada tanggal 10<br />Jika pada tanggal transfer dana belum masuk ke rekening, silakan hubungi kami di digital.agency@hanwhalife.co.id atau hubungi 021-50816100 (ext) 3516/3517/3518/3519<br />Atau melalui DM Instagram @ecommerce.hanwhalife</p>"
                                bootbox.alert({
                                    message: messageAlert,
                                    backdrop: true
                                });
                            } 
                        }
                    })
                }
            }
        });
    })
    </script>
    <style>
        .bootbox{
            z-index: 10000000000 !important;
        }
        .modal-content{
            height: auto !important;
        }
        .accordion-body{
            padding-bottom: 20px;
        }
    </style>
</div>