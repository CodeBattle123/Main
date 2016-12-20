<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <link rel="stylesheet" href="styles/sidebar.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/make-clan.css">
    <link rel="icon" type="image/png" href="images/icon.png"/>
    <meta charset="UTfF-8">
    <title>Create clan</title>
</head>

<body>

<?php include_once('header.php');
	CheckIfLogged();
	$sql = "SELECT clan FROM users WHERE id='$log_id'";
	$result = mysqli_query($connect, $sql)->fetch_assoc();
	if ($result['clan'] != "") {
		header('location: clanPage.php?clan=' . $result['clan']);
	}
	$username = $_SESSION['username'];
?>

<div class="wrapper">

    <div class="clan_profile">
        <h2 class="Header">Clan Profile</h2>
    </div>

    <div class="errors"></div>

    <div class="section">
        <div class="make-clan">
            <h2 class="Header">Make clan</h2>

            <form action="make-clan.php" method="post" enctype="multipart/form-data">
                <?php
                //picture upload
                if (isset($_POST['submit_clan']) && isset($_FILES["fileToUpload"])) {
                    $clan_name = $_POST['clanname'];
                    $validate = true;

                    if (strlen($clan_name) == 0) {
                        echo 'You must enter your clan name.<br>';
                        $validate = false;
                    }

                    $clan_description = $_POST['description'];
                    if (strlen($clan_description) == 0) {
                        echo 'You must enter your clan description.<br>';
                        $validate = false;
                    }

                    //picture upload
                    $target_dir = "clan-pics/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                    $filename = $target_dir . basename($clan_name . "." . "png");
                    // Check if image file is an actual image or fake image
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {
                        $uploadOk = 1;
                    } else {
                        echo 'File is not an image.<br>';
                        $uploadOk = 0;
                        $validate = false;
                    }
                    // Check file size
                    if ($_FILES["fileToUpload"]["size"] > 50000000) {
                        echo 'Sorry, your file is too large.<br>';
                        $validate = false;
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif"
                    ) {
                        echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>';
                        $validate = false;
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo 'Sorry, your file was not uploaded.<br>';
                        $validate = false;
                        // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $filename)) {
                        } else {
                            echo 'Sorry, there was an error uploading your file.<br>';
                            $validate = false;
                        }

                        if ($validate == true) {
                            $clan_name = mysqli_real_escape_string($connect, $_POST['clanname']);
                            $clan_description = mysqli_real_escape_string($connect, $_POST['description']);
                            $sql = "INSERT INTO teams (name, description, leader) VALUES ('$clan_name', '$clan_description', '$username')";
                            mysqli_query($connect, $sql);
                            mysqli_query($connect, "UPDATE users SET clan='$clan_name' WHERE id='$log_id'");
                            header("location: make-clan.php");
                        }

                    }
                }
                ?>
				<fieldset class="">
                    <p class="fieldTitle">Clan name:</p>
                    <input type="text" name="clanname" placeholder="Name"/>
                </fieldset>

                <fieldset>
                    <p  class="fieldTitle">Clan description:</p>
                    <textarea name="description" ></textarea>
                </fieldset>

                <fieldset>
                    <p class="fieldTitle">Clan Insignia:</p>
                    <input type="file" name="fileToUpload" id="fileToUpload"/><br>
                </fieldset>
                <input type="submit" name="submit_clan" value="Submit"/>
            </form>

        </div>

        <div class="find-clan">

            <h2 class="Header">Find clan</h2>

			<form class="find" method="post" action="make-clan.php">
                <div class="search_bar">
                    <input type="text" name="search" placeholder="Search..."/>
                </div>

				<ul class="foundMatches">
					<?php
					if (!isset($_POST['find_clan'])) {
						$sql = "SELECT name FROM teams";
						$results = mysqli_query($connect, $sql);
						while ($row = $results->fetch_assoc()) {
							echo '<li class="match">clan: ' . $row['name'] . '<a href="scripts/clanRequest.php?team_id=' . $row['name'] . '">Request</a></li>';
						}
					}

					if (isset($_POST['find_clan'])) {

						$search = $_POST['search'];
						$sql = "SELECT name FROM teams WHERE name = '$search'";
						$result = $connect->query($sql);

						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								echo '<li class="match">clan: ' . $row['name'] . '<a href="scripts/clanRequest.php?team_id=' . $row['name'] . '">Request</a></li>';
							}
						} else {
							echo "0 results";
						}
					}
					if (isset($_POST['find_clan']) && $_POST['search'] == ""){
						echo "<p>Please enter a search</p>";
					}
					if (isset($_GET['success'])){
						echo '<li class="message">Successfully sent request</li>';
					}
					?>
				</ul>


                <input class="submit-btn" type="submit" name="find_clan"value="Find Clan"/>
                </div>
            </form>
        </div>
    </div>




</div>

<?php include_once('footer.html'); ?>

</body>
</html>
