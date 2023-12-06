<?php
    $conn = new mysqli("mysql.dreambox.id", "dreambox", "madafaka081?", "hanwhauser_db");

    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }/*else{
        echo "success!";
    }*/
?>