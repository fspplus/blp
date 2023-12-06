<div id="addBenef<?php echo $_GET['ctrbenef']; ?>">
    <input type="hidden" name="hanwhaTtlBenef" id="hanwhaTtlBenef" value="<?php echo $_GET['ctrbenef']-1; ?>">
    <?php if($_GET['ctrbenef'] < 5){ ?>
    <div class="col-12 p-t-20 p-b-20 m-b-20" id="addBenef" onclick="<?php if($_GET['logged'] == "true"){ echo "addBenefLogged";}else{echo "addBenef";} ?>(<?php echo $_GET['ctrbenef']; ?>)"><h5>Tambahkan Ahli Waris</h5></div>
    <?php } ?>
</div>