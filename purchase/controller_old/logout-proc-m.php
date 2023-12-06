<?php
    session_start();
    session_set_cookie_params(0);
    session_destroy();
    echo "<script>window.location.href='../';</script>";
?>