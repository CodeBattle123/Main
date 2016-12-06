<?php
	session_start();
	include_once("connect.php");

	$logged = false;
	$log_id = "";
	$log_username = "";
	$log_password = "";

	if(isset($_SESSION["userid"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])) {
		$log_id = preg_replace('#[^0-9]#', '', $_SESSION['userid']);
		$log_username = preg_replace('#[^a-z0-9]#i', '', $_SESSION['username']);
		$log_password = $_SESSION['password'];

		$sql = "SELECT * FROM users, teams WHERE users.clan=teams.name";
		$log_clan = mysqli_query($connect, $sql)->fetch_assoc()['name'];

		$sql = "SELECT id FROM users WHERE id='$log_id' AND nickname='$log_username' AND password='$log_password' LIMIT 1";
	    $query = mysqli_query($connect, $sql);
	    $numrows = mysqli_num_rows($query);
		if($numrows > 0){
			$logged = true;
		}
	}
?>
