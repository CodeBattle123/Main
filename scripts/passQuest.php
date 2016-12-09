<?php
 	include_once('../db/connect.php');
	print_r($_POST);
	$langBack = $_POST['lang'];
	$lang = $_POST['language'];
	$user_id = $_POST['user_id'];
	$sql = "UPDATE language_progress SET $lang = $lang + 1 
	WHERE user_id = $user_id ";
	
	mysqli_query($connect, $sql);
	
	header('location: ../quest.php?lang=' . $langBack);