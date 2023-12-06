<?php 
    $ctrBenef = $_GET['ctr'];
?>
          <div class="row animated fadeIn">
                  <div class="col-md-12 col-12 align-self-center">
                    <div class="step" style="margin-bottom: 2%">
                        <p style="color: #ff7101; font-size: 18px; display: inline-block;" onclick="loadExtra(<?php echo $ctrBenef+1; ?>)">+ Tambah Ahli Waris</p>
                        <input type="hidden" value="<?php echo $ctrBenef; ?>" name="ctrs">
                    </div>
                  </div>
                </div>