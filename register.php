<?php
	include_once 'db/login_status.php';
	header('location: index.php');
	exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <link rel="stylesheet" href="styles/sidebar.css">
	<link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/login_register.css">
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
<?php include_once('header.php'); ?>
<div class="wrapper">
	<?php
	    if (isset($_POST['submit'])) {
	        $validate = true;
	    	$username = preg_replace('#[^a-z0-9]#i', '', $_POST['username']);
	    	$sql = "SELECT id FROM users WHERE nickname='$username' LIMIT 1";
	        $query = mysqli_query($connect, $sql);
	        $already_used = mysqli_num_rows($query);
	        if (strlen($username) < 3 || strlen($username) > 16) {
	    	    echo '<li class="messae">Username must be between 3 & 16 characters.</li>';
	            $validate = false;
	        }
	    	if (strlen($username) == 0 || is_numeric($username[0])) {
	    	    echo '<li class="message">Usernames must begin with a letter.</li>';
	            $validate = false;
	        }
	        if (!$already_used < 1) {
	    	    echo '<li class="message">Username \'' . $username . '\' is already taken.</li>';
	            $validate = false;
	        }

	        $password = $_POST['password'];
	        if (strlen($password) < 6 || strlen($password) > 100) {
	    	    echo '<li class="message">Password must be between 6 & 100 characters.</li>';
	            $validate = false;
	        }

	        $password2 = $_POST['password2'];
	        if (strlen($password2) == 0 || $password != $password2) {
	            echo '<li class="message">Passwords must be the same.</li>';
	            $validate = false;
	        }

	        $email = preg_replace('#[^a-z0-9]#i', '', $_POST['email']);
	        if (strlen($email) < 1) {
	    	    echo '<li class="message">Email must be inputed.</li>';
	            $validate = false;
	        }

	        if ($validate) {
	            $sql = "INSERT INTO users (nickname, email, password) VALUES ('$username','$email','$password')";
	            $query = mysqli_query($connect, $sql);
	            if ($query) {
	                echo '<li class="message" style="color: green;">You have successfully created your account!</li>';
	            }
	        }
	    }
	?>
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
