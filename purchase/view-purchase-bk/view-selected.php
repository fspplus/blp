      <div class="col-12 col-md-4">
                <div class="tabletahunanPlan tabletahunan">
                    <?php 
                    
                    
                    if(isset($_SESSION['userLogged']['fullname'])){
                        ?>
                    
                    <h5>Nama Pemegang Polis: </h5>
                    <h5 class="textorange"><?php echo $_SESSION['userLogged']['fullname']; ?></h5>
                    <h5>Email:</h5>
                    <h5 class="textorange "><?php echo $_SESSION['userLogged']['email']; ?></h5>
                    <hr>
                    
                    <?php
                    }
                    
                    if(isset($_SESSION['dataForm1'])){

    if(isset($_SESSION['dataForm1']['hanwhaname'])){
?>
            <h5>Nama Pemegang Polis: </h5>
            <h5 class="textorange"><?php echo $_SESSION['dataForm1']['hanwhaname']; ?></h5>
            <h5>Tanggal Lahir:</h5>
            <h5 class="textorange"><?php echo $_SESSION['dataForm1']['hanwhadob']; ?></h5>
            <h5>Email:</h5>
            <h5 class="textorange "><?php echo $_SESSION['dataForm1']['hanwhaemail']; ?></h5>
                    <hr>
<?php
    }
    
} ?><?php if(isset($_SESSION['ropBank'])){

    if(isset($_SESSION['ropBank']['bankROP'])){
?>
            <h5>ROP Bank Account: </h5>
            <h5 class="textorange"><?php echo $_SESSION['ropBank']['bankROP']."-".$_SESSION['ropBank']['ropAccNumber']; ?></h5>
                    <hr>
<?php
    }
    
}
                    ?>

      
<?php if($_SESSION['product']['plan'] == "1"){ ?>
                    <h2 class="textorange">Plan A - 1 Tahun</h2>
                    <h5>Bulanan:</h5>
                    <h3 class="textorange">1.200rb/bln</h3>
                    <h3>1% Extra Dana</h3>
                    <h5>Total Akumulasi:</h5>
                    <h3 class="textorange big">Rp. 14.544.000,-</h3>
            <?php }else if($_SESSION['product']['plan'] == "2"){ ?>
                    <h2 class="textorange">Plan A - 2 Tahun</h2>
                    <h5>Bulanan:</h5>
                    <h3 class="textorange">600rb/bln</h3>
                    <h3>2% Extra Dana</h3>
                    <h5>Total Akumulasi:</h5>
                    <h3 class="textorange big">Rp. 14.688.000,-</h3>
            <?php }else if($_SESSION['product']['plan'] == "3"){ ?>
                    <h2 class="textorange">Plan A - 3 Tahun</h2>
                    <h5>Bulanan:</h5>
                    <h3 class="textorange">400rb/bln</h3>
                    <h3>3% Extra Dana</h3>
                    <h5>Total Akumulasi:</h5>
                    <h3 class="textorange big">Rp. 14.832.000,-</h3>
            <?php }else if($_SESSION['product']['plan'] == "4"){ ?>
                    <h2 class="textorange">Plan B - 1 Tahun</h2>
                    <h5>Bulanan:</h5>
                    <h3 class="textorange">1.800rb/bln</h3>
                    <h3>1% Extra Dana</h3>
                    <h5>Total Akumulasi:</h5>
                    <h3 class="textorange big">Rp. 21.816.000,-</h3>
            <?php }else if($_SESSION['product']['plan'] == "5"){ ?>
                    <h2 class="textorange">Plan B - 2 Tahun</h2>
                    <h5>Bulanan:</h5>
                    <h3 class="textorange">900rb/bln</h3>
                    <h3>2% Extra Dana</h3>
                    <h5>Total Akumulasi:</h5>
                    <h3 class="textorange big">Rp. 22.032.000,-</h3>
            <?php }else if($_SESSION['product']['plan'] == "6"){ ?>
                    <h2 class="textorange">Plan B - 3 Tahun</h2>
                    <h5>Bulanan:</h5>
                    <h3 class="textorange">600rb/bln</h3>
                    <h3>3% Extra Dana</h3>
                    <h5>Total Akumulasi:</h5>
                    <h3 class="textorange big">Rp. 22.248.000,-</h3>
            <?php }else if($_SESSION['product']['plan'] == "8"){ ?>
                    <h2 class="textorange">Plan M - 1 Tahun</h2>
                    <h5>Bulanan:</h5>
                    <h3 class="textorange">750/bln</h3>
                    <h3>1% Extra Dana</h3>
                    <h5>Total Akumulasi:</h5>
                    <h3 class="textorange big">Rp. 9.090.000,-</h3>
            <?php }else if($_SESSION['product']['plan'] == "9"){ ?>
                    <h2 class="textorange">Plan M - 2 Tahun</h2>
                    <h5>Bulanan:</h5>
                    <h3 class="textorange">375rb/bln</h3>
                    <h3>2% Extra Dana</h3>
                    <h5>Total Akumulasi:</h5>
                    <h3 class="textorange big">Rp. 9.180.000,-</h3>
            <?php }else if($_SESSION['product']['plan'] == "10"){ ?>
                    <h2 class="textorange">Plan B - 3 Tahun</h2>
                    <h5>Bulanan:</h5>
                    <h3 class="textorange">250rb/bln</h3>
                    <h3>3% Extra Dana</h3>
                    <h5>Total Akumulasi:</h5>
                    <h3 class="textorange big">Rp. 9.270.000,-</h3>
            <?php }?>
                    
                </div>
            </div>