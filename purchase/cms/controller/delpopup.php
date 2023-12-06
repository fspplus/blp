<?php
    $stmt = $conn->prepare("DELETE FROM `popup_table` WHERE `popup_id` = ?;");

    $stmt->bind_param("i", $_GET['post']);

    $stmt->execute();
    $stmt->close();
    echo "<span>Please Wait ... </span><script>window.location.href='./popup?not=success&id=".$_GET['post']."';</script>";
?>