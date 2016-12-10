<?php
    include '../db/connect.php';
    include '../db/login_status.php';

    if (isset($_GET['team_id'])){
        $team_id = $_GET['team_id'];
        $sql = "INSERT INTO team_inbox VALUES ('$team_id', $log_id)";
        mysqli_query($connect, $sql);
        header("location: ../make-clan.php?success=true");
    }
?>