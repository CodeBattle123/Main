<?php
    include_once("db/login_status.php");

    if($logged){
    	header("location: index.php");
        exit();
    }

    if (isset($_POST['submit']) && !($_POST['username'] == "") && !($_POST['pass'] == "")) {
        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $pass = $_POST['pass'];

        $sql = "SELECT id, nickname, password FROM users WHERE nickname='$username' LIMIT 1";
        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_row($query);
		$db_id = $row[0];
		$db_username = $row[1];
        $db_pass = $row[2];

		if ($pass == $db_pass) {
			$_SESSION['userid'] = $db_id;
			$_SESSION['username'] = $db_username;
			$_SESSION['password'] = $db_pass;
            header("location: profile.php?user=$username");
		}
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
		<link rel="stylesheet" href="styles/main.css">
        <link rel="stylesheet" href="styles/sidebar.css" media="screen" title="no title">
		<script type="text/javascript" src="scripts/moveToHeader.js"></script>
    </head>
    <body id="bod" onresize="move()">
        <?php include_once('header.php'); ?>
        <div class="wrapper">
           <?php if (isset($_GET['u'])) {
                $temp123 = $_GET['u'];
                echo '<span style="text-align: center; color: darkgreen;">Welcome to our site! You can log in right away.</span>';
             }
           ?>
            <?php
                if (isset($_POST['submit']) && (($_POST['username'] == "") || ($_POST['pass'] == ""))) {
                    echo "<li class=\"message\">You must set values to username and password.</li>";
                }

                if (isset($_POST['submit']) && ($pass != $db_pass)) {
        			echo "<li class=\"message\">Wrong username/password combination.</li>";
                }
            ?>
            <div class="form">
            <form class="login" action="login.php" method="post">
                <input type="text" name="username" placeholder="Username"

                <?php if (isset($_GET['u'])) {
                     $temp123 = $_GET['u'];
                     echo ' value="' . $temp123 . '"';
                  }
                ?>

                >
                <input autofocus type="password" name="pass" placeholder="Password"

                <?php if (isset($_GET['u'])) {
                     echo ' id="focusThis"';
                  }
                ?>

                >
                <input type="submit" name="submit" value="Login">
            </form>
            </div>
        </div>

        <script type="text/javascript">
         function FocusOnInput()
         {
            document.getElementById("focusThis").focus();
         }
         </script>

        <?php  include_once('footer.html'); ?>
    </body>
</html>
