<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <link rel="stylesheet" href="styles/sidebar.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/profile.css">
    <link rel="stylesheet" href="styles/profile_edit.css">
    <meta charset="UTF-8">
    <title>Edit profile</title>
</head>

<body>

<?php include_once('header.php'); ?>
<?php
if (isset($_POST['description'])) {
	$description = $_POST['description'];
	$sql = "UPDATE users SET description='$description' WHERE nickname ='$username'";
	$query = mysqli_query($connect, $sql);
}
?>

<?php
$user = $_SESSION ['username'];
file_exists("profile-pics/" . $user . ".png") ? $profilepic = $user . ".png" : $profilepic = "default.png"
?>
<div class="wrapper">
	<?php if (isset($_POST['changes'])): ?>
		<h2>Changes were made successfully</h2>
	<?php endif; ?>
    <div class="profileContainer">
		<h2><?=$username?></h2>
	    <div class="profile-pic" align="center">
	        <img src="profile-pics/<?=$profilepic?>" alt="Profile picture" class="profile">
	    </div>
		
		<form action="profile_edit.php" method="post" enctype="multipart/form-data" class="imageForm">
			<h3 class="imgHeader">Select an image to upload</h3>
			<input type="submit" value="Upload Image" name="submit" class="Submit">
			<input type="file" name="fileToUpload" id="fileToUpload">
		</form>
	</div>
	
	<hr>
	
    <?php
    $sql = "SELECT * FROM users WHERE nickname='$user'";
    $description = mysqli_query($connect, $sql)->fetch_assoc()['description'];
    ?>
    <form action="profile_edit.php" method="post">
		<h2>description</h2>
        <textarea class="profileDesc" name="description"><?=$description?></textarea>
        <input type="submit" value="Update description" name="submit" class="Submit">
    </form>
	
	<hr>
	
	<div class="editInfoCont">
	    <form class="register" action="profile_edit.php" method="post">
			<fieldset class="names">
				<h2>Names</h2>
		        <input type="text" name="firstname" placeholder="First Name" class="field">
		        <input type="text" name="lastname" placeholder="Last Name" class="field">
				<input type="submit" name="submitnames" value="Save changes" class="Submit height">
			</fieldset>
		</form>
		
		<form class="register" action="profile_edit.php" method="post">
			<fieldset class="passwords">
				<h2>password</h2>
		        <input type="password" name="password" placeholder="Password" class="field">
		        <input type="password" name="password2" placeholder="Re-type" class="field">
				<input type="submit" name="submitpassword" value="Save changes" class="Submit height">
			</fieldset>
		</form>
	</div>
	
</div>
<?php
//pic upload
if (isset($_FILES["fileToUpload"]["name"])) {
	$username = $_SESSION ['username'];
	$target_dir = "profile-pics/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$filename = $target_dir . basename($username . "." . "png");
// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
// Check file size
	if ($_FILES["fileToUpload"]["size"] > 5000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $filename)) {
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}



//update names
if (isset($_POST['submitnames'])) {
    $validate = true;
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

    if ($validate) {
        $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name'  WHERE nickname ='$username'";
        $query = mysqli_query($connect, $sql);
        if ($query) {
            echo '<li class="message" style="color: green;">You have successfully updated your account!</li>';
			$_POST['changes'] = true;
        }
    }
}

//update password
if (isset($_POST['submitpassword'])) {
	$validate = true;

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

	if ($validate) {
		$sql = "UPDATE users SET password='$password'  WHERE nickname ='$username'";
		$query = mysqli_query($connect, $sql);
		if ($query) {
			echo '<li class="message" style="color: green;">You have successfully updated your account!</li>';
			$_POST['changes'] = true;
		}
	}
}
?>
<?php include_once('footer.html'); ?>
</body>
</html>
