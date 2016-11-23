<?php
	if (isset($_SESSION)) {
		header("Location: index.php");
	}

	if (isset($_POST['submit'])) {
		session_start();
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] = $_POST['pass'];
		header("Location: profile.php");
	}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="styles/headerAndFooter.css"/>
        <link rel="stylesheet" href="styles/login_register.css">
        <link rel="stylesheet" href="styles/sidebar.css" media="screen" title="no title">
    </head>
    <body>
        <?php include_once('header.php'); ?>
        <div class="wrapper">
            <div class="form">
            <form class="login" action="login.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="pass" placeholder="Password">
                <input type="submit" name="submit" value="Login">
            </form>
            </div>
        </div>
        <?php  include_once('footer.html'); ?>
    </body>
</html>
