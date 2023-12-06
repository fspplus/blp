<?php 
    include ('header.php');
    if(!isset($_GET['stat']) || $_GET['stat'] == NULL){
?>
        <!-- PAGE CONTAINER-->
        <div id="pagecontainer" class="page-container">
            <?php include ('includes/include-faqX.php'); ?>
        </div>
<?php 
    }else if(isset($_GET['stat']) && $_GET['stat'] == 'newpost'){
?>
        <div id="pagecontainer" class="page-container">
            <?php include ('includes/editor-faq.php'); ?>
        </div>
<?php
    }else if(isset($_GET['stat']) && $_GET['stat'] == 'edit' && $_GET['post'] != NULL){
?>
        <div id="pagecontainer" class="page-container">
            <?php include ('includes/update-faq.php'); ?>
        </div>
<?php
    }else if(isset($_GET['stat']) && $_GET['stat'] == "delete" && $_GET['post'] != NULL){
        include('controller/delfaq.php');
    }
    include ('footer.php');
?>

<script>
    $(".navbar-sidebar li").removeClass("active");
    $("#faqMobile").addClass("active");
    $(".navbar-sidebar #faq").addClass("active");
    console.log($("#popup").attr("class"));
</script>