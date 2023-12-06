<?php
 date_default_timezone_set("Asia/Jakarta") ;
    include 'connectdb.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if(isset($_POST)){
        
        $_POST['last_edit'] = date("Y-m-d");
        if(isset($_FILES)){
            $_POST['popup_img'] = "../uploads/popup/".$_GET['post'] ." - ". $_POST['last_edit'].".jpeg";

            unlink($_POST["popup_img"]);
            echo "Deleting ".$_POST["popup_img"];
            define ('SITE_ROOT', realpath(dirname(__FILE__)));
            move_uploaded_file($_FILES['popup_img']['tmp_name'], '../uploads/popup/' . $_GET['post'] ." - ". $_POST['last_edit'].".jpeg");
            
            
            $_POST['end_date'] = str_replace("/","-",$_POST['end_date']);
            $_POST['start_date'] = str_replace("/","-",$_POST['start_date']);
            
            $_POST['popup_img'] = "./uploads/popup/".$_GET['post'] ." - ". $_POST['last_edit'].".jpeg";
            
            $stmt = $conn->prepare("UPDATE `popup_table` SET `popup_img` = ?, `popup_title` = ?, `start_date` = ?, `end_date` = ?, `last_edit` = ?  WHERE `popup_id` = ?;");

            //echo $_POST['popup_img'].",". $_POST['popup_title'].",". $_POST['start_date'].",". $_POST['end_date'].",". $_POST['last_edit'].",".  $_GET['post'];

            $stmt->bind_param("sssssi", $_POST['popup_img'], $_POST['popup_title'], $_POST['start_date'], $_POST['end_date'], $_POST['last_edit'], $_GET['post']);
        }else{
            $stmt = $conn->prepare("UPDATE `popup_table` SET `popup_title` = ?, `start_date` = ?, `end_date` = ?, `last_edit` = ?  WHERE `popup_id` = ?;");

            //echo $_POST['popup_img'].",". $_POST['popup_title'].",". $_POST['start_date'].",". $_POST['end_date'].",". $_POST['last_edit'].",".  $_GET['post'];

            $stmt->bind_param("ssssi", $_POST['popup_title'], $_POST['start_date'], $_POST['end_date'], $_POST['last_edit'], $_GET['post']);
        }
        //echo "INSERT INTO `faq_table` (`faq_id`, `faq_category`, `faq_question`, `faq_answers`, `faq_status`, `faq_date`, `faq_sort`) VALUES (NULL, '".$_POST['faq_category']."', '".$_POST['faq_question']."', '".$_POST['faq_answer']."', '".$_POST['faq_status']."', '".$_POST['faq_date']."', '".$_POST['faq_sort']."');";
        
        $stmt->execute();
        $stmt->close();
        
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        
        echo "<br>Please wait... ";
        echo "<script>window.location.href = '../popup?update=success'</script>";
    }else{
        echo $empty;
        echo "<script>window.location.href = '../popup?update=fail'</script>";
    }
?>