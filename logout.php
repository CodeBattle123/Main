<?php
    session_start();
    $_SESSION['userid'] = "";
    $_SESSION['username'] = "";
    $_SESSION['password'] = "";
 	session_unset();
    session_destroy();
	header("location: index.php");
?>
