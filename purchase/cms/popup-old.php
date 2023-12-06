<?php 
    include ('header.php');
    if(!isset($_GET['stat']) || $_GET['stat'] == NULL){
?>
        <!-- PAGE CONTAINER-->
        <div id="pagecontainer" class="page-container">
            <?php include ('includes/newpopup.php'); ?>
        </div>
<?php 
    }else if(isset($_GET['stat']) && $_GET['stat'] == 'newpost'){
?>
        <div id="pagecontainer" class="page-container">
            <?php include ('includes/editor-popup.php'); ?>
        </div>
<?php
    }else if(isset($_GET['stat']) && $_GET['stat'] == 'edit' && $_GET['post'] != NULL){
?>
        <div id="pagecontainer" class="page-container">
            <?php include ('includes/update-popup.php'); ?>
        </div>
<?php
    }else if(isset($_GET['stat']) && $_GET['stat'] == 'delete' && $_GET['post'] != NULL){
        include('controller/delpopup.php');
    }
    include ('footer.php');
?>
<script>
    $(".navbar-sidebar li").removeClass("active");
    $("#popupMobile").addClass("active");
    $(".navbar-sidebar #popup").addClass("active");
    console.log($("#popup").attr("class"));
</script>