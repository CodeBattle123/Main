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
        
        if (mysqli_num_rows($query) != 0) {
            $row = mysqli_fetch_row($query);
            $db_id = $row[0];
            $db_username = $row[1];
            $db_pass = $row[2];
        } else {
            header("location: login.php?noUser=true");
        }

        if (password_verify($pass, $db_pass)) {
			$_SESSION['userid'] = $db_id;
			$_SESSION['username'] = $db_username;
			$_SESSION['password'] = $db_pass;
            header("location: profile.php?user=$username");
		} else {
            header("location: login.php?noUser=true");
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
		<link rel="stylesheet" href="styles/main.css">
        <link rel="stylesheet" href="styles/sidebar.css" media="screen" title="no title">
		<link rel="stylesheet" href="styles/login_register.css">
    </head>
    <body>
        <?php include_once('header.php'); ?>
		
        <div class="wrapper">
            <ul class="messageHolder">
                
           <?php if (isset($_GET['u'])) {
                $temp123 = $_GET['u'];
                echo '<span style="text-align: center; color: darkgreen;">Welcome to our site! You can log in right away.</span>';
                }
                
                if (isset($_POST['submit']) && (($_POST['username'] == '') || ($_POST['pass'] == ''))) {
                    echo "<li class=\"message\">You must fill out all fields.</li>";
                }
                
                if (isset($_GET['noUser'])) {
                    if ($_GET['noUser'] == true) {
                        echo "<li class=\"message\">Wrong username/password combination.</li>";
                    }
                }
            ?>
        </ul>   
            <div class="form">
            <form class="login" action="login.php" method="post">
                <input required="true" type="text" name="username" placeholder="Username"

                <?php if (isset($_GET['u'])) {
                     $temp123 = $_GET['u'];
                     echo ' value="' . $temp123 . '"';
                  }
                ?>

                >
                <input type="password" name="pass" placeholder="Password" 
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
    </body>
</html>
