<?php

include  '../db/connect.php';
include '../db/login_status.php';


if (isset($_POST['description'])) {
    $description = $_POST['description'];
    $sql = "UPDATE teams SET description='$description' WHERE name ='$log_clan'";
    $query = mysqli_query($connect, $sql);
}


?>