<?php

include  '../db/connect.php';
include '../db/login_status.php';


if (isset($_POST['description'])) {
    $description = $_POST['description'];
    $sql = "UPDATE teams SET description='$description' WHERE name ='$log_clan'";
    $query = mysqli_query($connect, $sql);
    header("location: ../clan_edit.php");
}

if (isset($_POST['deleteclan'])) {
    mysqli_query($connect, "UPDATE users SET clan='' WHERE clan='$log_clan'");
    $sql = "DELETE FROM teams WHERE name ='$log_clan'";
    $query = mysqli_query($connect, $sql);
    header("location: ../make-clan.php");
}

?>