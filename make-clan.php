<!DOCTYPE html>
<?php
include_once("db/login_status.php");

if ($logged) {
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
}
?>
<!--picture upload-->
<?php
if (isset($_FILES['fileToUpload'])) {
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));

    $allowed = array('txt', 'jpg');

    if (in_array($file_ext, $allowed)) {
        if ($file_error === 0) {
            $file_name_new = uniqid('', true) . '.' . $file_ext;
            $file_destinaton = '\'/var/www/uploads/' . $file_name_new;

            if (move_uploaded_file($file_tmp, $file_destinaton)) {
                echo $file_destinaton;
            }
        }
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

<?php include_once('footer.html'); ?>

</body>
</html>