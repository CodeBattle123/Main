<?php

if(isset($_POST['submitMessage'])) {

    include_once('db/connect.php');
    $clanName = $_POST['clanName'];
    $userName = $_POST['userName'];
    $message = $_POST['message'];
    $date = $_POST['date'];


    $sql1 = "SELECT * FROM teams WHERE name = $clanName";
    $teamid = mysqli_query($connect, $sql1);
    $sql2 = "SELECT * FROM users WHERE nickname = $userName";
    $userid = mysqli_query($connect, $sql2);


    $sql3 = mysqli_query($connect, "INSERT INTO team-chat (team_id, user_id, message, date) VALUES ('$teamid', '$userid', '$message', '$date')");
} 
