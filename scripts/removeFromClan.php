<?php

include  '../db/connect.php';
include '../db/login_status.php';

echo $log_clan . "<br>";
$user_name = $_POST['username'];




if (isset($_POST['remove'])){
    $sql = "UPDATE users SET clan = '' WHERE nickname = '$user_name'";
    mysqli_query($connect, $sql);
    header("location: ../clanPage.php");
}


if (isset($_POST['makeleader'])){
    $sql = "UPDATE teams SET leader = '$user_name' WHERE name = '$log_clan'";
    mysqli_query($connect, $sql);
    header("location: ../clanPage.php");
}

?>