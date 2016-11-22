<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <link rel="stylesheet" href="styles/sidebar.css">
    <link rel="stylesheet" href="styles/login_register.css">
    <link rel="stylesheet" href="styles/main.css">
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
<?php include_once('header.php'); ?>
<?php
    if (isset($_POST['submit'])) {
        $validate = true;
    	$username = preg_replace('#[^a-z0-9]#i', '', $_POST['username']);
    	$sql = "SELECT id FROM users WHERE nickname='$username' LIMIT 1";
        $query = mysqli_query($connect, $sql);
        $already_used = mysqli_num_rows($query);
        if (strlen($username) < 3 || strlen($username) > 16) {
    	    echo '<div class="validate">Username must be between 3 & 16 characters.</div>';
            $validate = false;
        }
    	if (strlen($username) == 0 || is_numeric($username[0])) {
    	    echo '<div class="validate">Usernames must begin with a letter.</div>';
            $validate = false;
        }
        if (!$already_used < 1) {
    	    echo '<div class="validate">Username \'' . $username . '\' is already taken.</div>';
            $validate = false;
        }

        $password = $_POST['password'];
        if (strlen($password) < 6 || strlen($password) > 100) {
    	    echo '<div class="validate">Password must be between 6 & 100 characters.</div>';
            $validate = false;
        }

        $password2 = $_POST['password2'];
        if (strlen($password2) == 0 || $password != $password2) {
            echo '<div class="validate">Passwords must be the same.</div>';
            $validate = false;
        }

        $email = preg_replace('#[^a-z0-9]#i', '', $_POST['email']);
        if (strlen($email) < 1) {
    	    echo '<div class="validate">Email must be inputed.</div>';
            $validate = false;
        }

        if ($validate) {
            $sql = "INSERT INTO users (nickname, email, password) VALUES ('$username','$email','$password')";
            $query = mysqli_query($connect, $sql);
            if ($query) {
                echo '<div class="validate" style="color: green;">You have successfully created your account!</div>';
            }
        }
    }
?>

<div class="wrapper">
    <div class="form">
    <form class="register" action="register.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password2" placeholder="Re-type">
        <input type="email" name="email" placeholder="Email">
        <input type="submit" name="submit" value="Register">
    </form>
    </div>
</div>

<?php include_once('footer.html'); ?>
</body>
</html>
