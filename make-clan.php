<!DOCTYPE html>
<?php
include_once("db/login_status.php");

if (!$logged) {
    header("location: index.php");
    exit();
}

?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <link rel="stylesheet" href="styles/sidebar.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/make-clan.css">
    <meta charset="UTF-8">
    <title>home</title>
</head>

<body>

<?php include_once('header.php'); ?>


<div class="wrapper">

    <div class="clan_profile">
        <h2 align="center">Clan Profile</h2>
    </div>

    <div class="section">

        <div class="make-clan">

            <h2>Make clan</h2>

            <form action="make-clan.php" method="post" enctype="multipart/form-data">
                <p>Clan name:</p>
                <input type="text" name="clanname" placeholder="Name"/>

                <p class="description">Clan description:</p>
                <textarea name="description" rows="4" cols="50"></textarea>
                <br>

                <p>Clan Profile Pic:</p>
                <input type="file" name="fileToUpload" id="fileToUpload" value="Upload picture"/><br>
                <input type="submit" name="submit_clan" value="Submit"/>
            </form>

        </div>

        <div class="find-clan">

            <h2 class="find-section">Find clan</h2>
            <form class="find">
                <div class="search_bar">
                    <input type="text" name="search" placeholder="Search.."/>
                </div>
                <div class="submit-btn">
                    <input type="submit" name="find_clan" value="Find Clan"/>
                    <input type="submit" name="request_join" value="Request to Join"/>
                </div>
            </form>

        </div>

    </div>

</div>

<?php

if (isset($_POST['submit_clan'])) {
    $validate = true;

    $clan_name = $_POST['clanname'];

    //checks if the team already exsists
    $test = mysqli_query($connect, "SELECT count(*) as count FROM teams WHERE name='$clan_name'")->fetch_assoc();

    if ($test['count'] > 1) {
        echo "A clan with this name already exsists.";
        $validate = false;
    }

    if (strlen($clan_name) == 0) {
        echo "<li class=\"message\">You must enter your clan name.</li>";
        $validate = false;
    }

    $clan_description = $_POST['description'];
    if (strlen($clan_description) == 0) {
        echo "<li class=\"message\">You must enter your clan description.</li>";
        $validate = false;
    }

    if ($validate == true) {
        $clan_name = mysqli_real_escape_string($connect, $_POST['clanname']);
        $clan_description = mysqli_real_escape_string($connect, $_POST['description']);
        $sql = "INSERT INTO teams (name, description) VALUES ('$clan_name', '$clan_description')";
        if (mysqli_query($connect, $sql)) {
            echo "Records added successfully.";
        }
    }
}
?>

<!--picture upload-->
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$clan_name = mysqli_real_escape_string($connect, $_POST['clanname']);

$filename = $target_dir . basename($clan_name . "." . $imageFileType);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
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
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>



<?php
if (isset($_POST['find_clan'])) {
    $clan_search = mysqli_real_escape_string($connect, $_POST['search']);
    $user_name = $_SESSION ['username'];
    $query = 'SELECT clan FROM users WHERE clan = "$clan_name"';
    $result = $connect->query($query);

    if (!$result->num_rows == 0) {
        echo 'Clan not found';
    } else {
        $row = $query->fetch_assoc();
        echo '<h1>' . $row['clan'] . '</h1>';
    }
}
?>
<?php include_once('footer.html'); ?>

</body>
</html>