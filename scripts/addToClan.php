<?php

include  '../db/connect.php';
include '../db/login_status.php';

echo $log_clan . "<br>";
$userid = $_POST['userid'];


if (isset($_POST['Add'])){
    $sql = "UPDATE users SET clan = '$log_clan' WHERE id = $userid";
    mysqli_query($connect, $sql);
    header("location: ../clanPage.php");
}

if (isset($_POST['Deny']) || isset($_POST['Add'])){
    $sql = "DELETE FROM team_inbox WHERE user_id = $userid AND team_name = '$log_clan'";
    mysqli_query($connect, $sql);
    echo"removed from records";
    header("location: ../clanPage.php");
}
 ?>