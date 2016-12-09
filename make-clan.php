<!DOCTYPE html>
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
                <fieldset class="">
                    <p class="fieldTitle">Clan name:</p>
                    <input type="text" name="clanname" placeholder="Name"/>
                </fieldset>

                <fieldset>
                    <p  class="fieldTitle">Clan description:</p>
                    <textarea name="description" rows="4" cols="50"></textarea>
                </fieldset>

                <fieldset>
                    <p class="fieldTitle">Clan Insignia:</p>
                    <input type="file" name="fileToUpload" id="fileToUpload"/><br>
                </fieldset>
                <input type="submit" name="submit_clan" value="Submit"/>
            </form>
        </div>

        <div class="find-clan">
            <h2 class="find-section">Find clan</h2>

            <form class="find" method="post" action="make-clan.php">
                <div class="search_bar">
                    <input type="text" name="search" placeholder="Search..."/>
                </div>
                <?php

                if (isset($_POST['find_clan'])) {

                    $search = $_POST['search'];
                    $sql = "SELECT name, id FROM teams WHERE name = '$search'";
                    $result = $connect->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<li>clan: ' . $row['name'] . '<a href="scripts/clanRequest.php?team_id=' . $row['id'] . '">Click  me</as></li>';
                        }
                    } else {
                        echo "0 results";
                    }
                }
                if (isset($_POST['find_clan']) && $_POST['search'] == ""){
                    echo "<p>Please enter a search</p>";
                }

                ?>

                <div class="submit-btn">
                    <input type="submit" name="find_clan" value="Find Clan"/>
                    <input type="submit" name="request_join" value="Request to Join"/>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['submit_clan'])) {
        $validate = true;

        $clan_name = $_POST['clanname'];
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
            $sql = "INSERT INTO teams (teamname, description) VALUES ('$clan_name', '$clan_description')";
            if (mysqli_query($connect, $sql)) {
                echo "Records added successfully.";
            }
        }

        //<!--picture upload-->

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
        if(isset($_POST["submit_clan"])) {
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
        if ($_FILES["fileToUpload"]["size"] > 500000) {
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
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

    }



        /*$search = $_POST['search'];
        $sql = "SELECT name FROM teams WHERE name = '$search'";

        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_row($query);

        echo "<li>" . $row['name'] . "</li>\n";*/

    /* $clan_search = mysqli_real_escape_string($connect, $_POST['search']);
     $user_name = $_SESSION ['username'];
     $query = 'SELECT clan FROM users WHERE clan = "$clan_name"';
     $result = $connect->query($query);

     if (!$result->num_rows == 0) {
         echo 'Clan not found';
     } else {
         $row = $query->fetch_assoc();
         echo '<h1>' . $row['clan'] . '</h1>';
     }*/

    if (isset($_POST['request_join'])){

    }

    ?>



</div>

<?php include_once('footer.html'); ?>

</body>
</html>
