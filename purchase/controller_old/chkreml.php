<?php
    include '../connectdb.php';
    include './formaplikasi/json-hanwha-api.php';

    $dataFull = searchEmail($_GET['email']);
    foreach($dataFull as $data){
        $result = $data['result_code'];
    }    

    if($result ==1106){
        $res = FALSE;
        return $res;
    }
?>