<?php
    $stmt = $conn->prepare("DELETE FROM `faq_table` WHERE `faq_id` = ?;");

    $stmt->bind_param("i", $_GET['post']);

    $stmt->execute();
    $stmt->close();
    echo "<span>Please Wait ... </span><script>window.location.href='./faq?not=success&id=".$_GET['post']."';</script>";
?>