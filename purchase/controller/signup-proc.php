<?php
    session_start();
    session_set_cookie_params(0);
    include '../jsonapp/json-hanwha-api.php';
    //print_r($_POST);
    $checkdb = registerNew($_POST['hanwhafullname'], $_POST['hanwhaemail'], $_POST['hanwhaphone']);
    if($checkdb['result_code'] == 3100){
        echo "Registrasi anda berhasil! Silahkan cek email anda untuk mengaktifkan akun anda.";
        echo "<style>.scriptloader{top: 0 !important;}</style>";
    }else if($checkdb['result_code'] == 3101){
        echo "Identity Taken!";
        echo "<style>.scriptloader{top: 0 !important;}</style>";
    }else{
        echo $checkdb['result_code'];
    }
?>