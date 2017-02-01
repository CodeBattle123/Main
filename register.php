<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="images/icon.png"/>
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <link rel="stylesheet" href="styles/sidebar.css">
	<link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/login_register.css">
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
<?php include_once('header.php');
if ($logged) {
	header("Location: profile.php");
}?>
<div class="wrapper">
	<ul class="messageHolder">
	<?php
	    if (isset($_POST['submit'])) {
	      $validate = true;
	    	$username = preg_replace('#[^a-z0-9]#i', '', $_POST['username']);
	    	$sql = "SELECT id FROM users WHERE nickname='$username' LIMIT 1";
	        $query = mysqli_query($connect, $sql);
	        $already_used = mysqli_num_rows($query);

			$first_name = $_POST['firstname'];
			if (strlen($first_name) == 0) {
				echo "<li class=\"message\">You must enter your first name.</li>";
				$validate = false;
			}

			$last_name = $_POST['lastname'];
			if (strlen($last_name) == 0) {
				echo "<li class=\"message\">You must enter your last name</li>";
				$validate = false;
			}

	        if (strlen($username) < 3 || strlen($username) > 14) {
	    	    echo '<li class="message">Username must be between 3 & 12 characters.</li>';
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

	        $email = $_POST['email'];
	        if (strlen($email) < 1) {
	    	    echo '<li class="message">Email must be inputed.</li>';
	            $validate = false;
	        }

	        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo '<li class="message">Please enter a valid email addres.</li>';
                $validate = false;
            }
	        if ($validate) {
                $password = password_hash($password, PASSWORD_DEFAULT);
	            $sql = "INSERT INTO users (nickname, email, password, first_name, last_name) VALUES ('$username','$email','$password', '$first_name', '$last_name')";
	            $query = mysqli_query($connect, $sql);
				$sql = "INSERT INTO language_progress(CSharp, CPP, Java, JS, PHP, Ruby, Python, Swift) VALUES('1','1','1','1','1','1','1','1')";
				mysqli_query($connect, $sql);
	            if ($query) {
	                echo '<li class="message" style="color: green;">You have successfully created your account!</li>';
						 header('Location: login.php?u=' . $username);
	            }
	        }
	    }
	?>
	</ul>

    <div class="form">
    <form class="register" action="register.php" method="post">
		<input type="text" name="firstname" placeholder="First Name">
		<input type="text" name="lastname" placeholder="Last Name">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password2" placeholder="Re-type">
        <input type="email" name="email" placeholder="Email">
        <input type="submit" name="submit" value="Register">
    </form>
	</div>
</div>

</body>
</html>
