<?php
    print_r($_POST);
//echo "ada object: ";
$conditions = "";
    foreach($_POST['selectObject'] as $objects){
        if($conditions == ""){
            $conditions = "faq_id = ".$objects;
        }else{
            $conditions = $conditions." OR faq_id = ".$objects;
        }
    }

//echo $conditions;

    if($_POST['selectbatchaction'] == "deletefaq"){
        $sql = "DELETE `faq_table` SET `faq_status` = active WHERE ".$conditions;
    }else if($_POST['selectbatchaction'] == "activatefaq"){
        $sql = "UPDATE `faq_table` SET `faq_status` = active WHERE ".$conditions;
    }else if($_POST['selectbatchaction'] == "deactivatefaq"){
        $sql = "UPDATE `faq_table` SET `faq_status` = inactive WHERE ".$conditions;
    }

echo $sql;
echo "read";
?>