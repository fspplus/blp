<?php
    include 'connectdb.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    print_r($_POST);
    if(isset($_POST) && $_POST['faq_question'] != NULL){
        
        $_POST['faq_status'] = "active";
        $_POST['faq_sort'] = "2";
        $_POST['faq_date'] = date("Y-m-d");
        
        $stmt = $conn->prepare("INSERT INTO `faq_table` (`faq_id`, `faq_category`, `faq_question`, `faq_answers`, `faq_status`, `faq_date`, `faq_sort`) VALUES (NULL, ?, ?, ?, ?, ?, ?);");

        $stmt->bind_param("sssssi", urldecode($_POST['faq_category']), $_POST['faq_question'], $_POST['faq_answer'], $_POST['faq_status'],$_POST['faq_date'], $_POST['faq_sort']);

        //echo "INSERT INTO `faq_table` (`faq_id`, `faq_category`, `faq_question`, `faq_answers`, `faq_status`, `faq_date`, `faq_sort`) VALUES (NULL, '".$_POST['faq_category']."', '".$_POST['faq_question']."', '".$_POST['faq_answer']."', '".$_POST['faq_status']."', '".$_POST['faq_date']."', '".$_POST['faq_sort']."');";
        
        $stmt->execute();
        $stmt->close();
         echo "<span>Please Wait ... </span><script>window.location.href='../faq';</script>";
    }else{
        echo $empty;
    }
?>