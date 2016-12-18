<?php
 	include_once('../db/connect.php');
	print_r($_POST);
	$langBack = $_POST['lang'];
	$lang = $_POST['language'];
	$user_id = $_POST['user_id'];

	$sql = "UPDATE language_progress SET $lang = $lang + 1 
	WHERE user_id = $user_id ";
	mysqli_query($connect, $sql);
    $xp = mysqli_query($connect, "SELECT * FROM users WHERE id='$user_id'")->fetch_assoc()["xp"];

    $langprogress = mysqli_query($connect, "SELECT * FROM language_progress WHERE user_id='$user_id'")->fetch_assoc()[$lang];
    $points = ($langprogress - 1) * 50;
    mysqli_query($connect, "UPDATE users SET xp = $xp + $points WHERE id='$user_id'");


	header('location: ../quest.php?lang=' . $langBack);