<?php
    $connect = mysqli_connect("localhost", "root", "", "softuni_project");
    if (!$connect) {
        echo "Mysql connect error.";
    }
?>
