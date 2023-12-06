<style>
.floatWa{
font-size: 30px;
    position: fixed;
    right: -180px;
    bottom: 15px !important;
    background-color: #ff7101;
    z-index: 100001;
    color: white;
    text-align: center;
    text-decoration: none;
    border-radius: 15px 0px 0px 15px;
    transition: all .5s;
    opacity: 0.85;
    font-size: 16px;
    height: 100px;
    width: 280px;
    text-align: left;
}
.floatWa:before{
font-size:2em;
margin: 0em .5em;
}
.floatWa:hover{
background-color:#ff7101;
color:white;
right: 0px;
text-decoration: none;
}
    .floatWaAbsolute{
        position: absolute;
        margin-top: -90px;
        left: 110px;
    }
    
    @media only screen and (max-width:700px){
        .mobileNoshow{
            display: none;
        }
        .floatWa{
            bottom: 15px !important;
            top: unset;
            opacity: 0.5;
            transition: all .3s;
        }
        .floatWa:hover{
            opacity: 1;
        }
    }
</style>
<?php 
if(isset($_GET['plan'])){
    if($_GET['plan'] == 1){
        $urladd = "./productpage?plan=4";
    } else if($_GET['plan'] == 4){
        $urladd = "./productpage?plan=1";
    } 
}

if(isset($_SESSION['product']['plan'])){
?>
<a class="floatWa" href="prepurchase" target="_blank">
    <img src="../assets/images/Hanwhalife-bucketlist-jalan-jalan-ke-korea.jpg" width="100px" style="border-radius: 15px 0px 0px 15px;">
    <div class="floatWaAbsolute"><div style="position: relative;"><span style="font-size: 20px; color: white;">Yuk lanjutin rencana mu ke Korea!</span></div></div>          
</a>
<?php } ?>