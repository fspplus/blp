<div id="beneficiaries" class="profilecards">                           
<form class="form-horizontal form-material">   
    <div class="form-group">           
        <label class="col-md-12">Nama Lengkap</label>       
        <div class="col-md-12">
            <h1 style="color: #ff7101"><?php echo $dataUser['fullName']; ?></h1>
            <h3>Bergabung pada <?php echo $newformat ; ?></h3>
            <hr style="width: 100%; height: 2px; background-color: #ff7101; color: #ff7101;">              
        </div>            
    </div>              
    <h3 class="col-md-12">Ahli Waris Terdaftar</h3>
    <?php
    $benefs = getbeneficiary($_SESSION['memberid']);
    $counter = count($benefs);
    $count = 0;
    ?><?php
        while($count < $counter){
            ?>
                <?php  ?>
            <div class="col-md-4 col-lg-4 verTOPnew benefblocks">  
                <div class="form-group">             
                    <label for="example-email" class="col-md-12"><?php getRelationshipName($benefs[$count]['famrel']); ?></label>          
                    <div class="col-md-12">        
                        <h4><?php echo $benefs[$count]['name'] ?></h4>                    
                    </div>                      
                </div>                        
            </div>    
    <?php
        $count += 1;
        }
    ?>                         
</form>
<div class="fullheigth formfloat">
    <div class="formfloat-wrapper">
        <form class="form-horizontal form-material" method="post" id="addbeneficiary" >
            <h3 class="col-md-12">Tambah Ahli Waris</h3>
            <div class="form-group col-md-6 col-lg-6 verTOPnew rowpaddingless">
                <div class="form-group col-sm-12">
                    <label class="col-md-12">Nama Lengkap</label>
                    <input type="text" class="form-control form-control-line" name="fullnamebenef" required>           
                </div>        
                <div class="form-group col-sm-12">
                    <label class="col-md-12">Email Ahli Waris</label>
                    <input type="email" class="form-control form-control-line" name="emailbenef" required>           
                </div>        
                <div class="form-group col-sm-12">
                    <label class="col-md-12">No. Telphone Ahli Waris</label>
                    <input type="tel" class="form-control form-control-line" name="telbenef" required>           
                </div>        
            </div>
            <div class="form-group col-md-6 col-lg-6 verTOPnew rowpaddingless">
                <div class="form-group col-sm-12">
                    <label class="col-md-12">Jenis Kelamin</label>
                    <select class="form-control form-control-line" name="genderbenef" required>
                        <option value="">Pilih Opsi...</option>
                        <option value="M">Pria</option>
			             <option value="F">Wanita</option>
                    </select>
                </div>        
                <div class="form-group col-sm-12">
                    <label class="col-md-12">Hubungan dengan Tertanggung</label> 
                    <select class="form-control form-control-line" name="hubunganbenef" required>
                      <?php
                        $dataFull = familyrelationshiplist();
                        foreach($dataFull as $data){
                            $kerjaan = $data['codeValue'];
                            echo "<option value='".$data['codeId']."'>".$kerjaan."</option>";
                        }
                    ?>
                    </select>
                </div>        
                <div class="form-group col-sm-12">
                    <label class="col-md-12">Tanggal Lahir</label>
                    <input type="date" class="form-control form-control-line" name="tanggalbenef" id="datepicker" required>           
                </div>    
            </div>
                
                <div class="form-group col-sm-12">
                    <input type="submit" class="btn" value="+ Tambahkan">
                </div> 
        </form>
    </div>
</div>
</div>

    <div class="formloader"></div>
<script>
               $(function() {
                    // Get the form.
                    var form = $('#addbeneficiary');

                    // Get the messages div.
                    var formMessages = $('#form-messages');

                    // TODO: The rest of the code will go here...
                    $(form).submit(function(event) {
                            // TODO
                            // Serialize the form data.
                            $("#page-loader").css("display", "block");
                            
                            var formData = $(form).serializeArray();
                            var formArrayData = new FormData();
                            
                            $(formData).each(function(index,element){
                                formArrayData.append(element.name, element.value);
                            })
                            
                            $.ajax({
                                type: 'POST',
                                url: "../controller/addnewbenef.php",
                                data: formArrayData,
                                processData:false,
                                contentType:false,
                                success: function(dataSum) {
                                       // data is ur summary
                                      $('.formloader').html(dataSum);
                                 }
                            })
                        // Stop the browser from submitting the form.
                        event.preventDefault();
                        
                    });
                    
                });
        </script>