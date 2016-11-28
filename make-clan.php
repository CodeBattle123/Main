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

<?php
$clan_name = mysqli_real_escape_string($connect, $_POST['clanname']);
$clan_description  = mysqli_real_escape_string($connect, $_POST['description']);

$sql = "INSERT INTO teams (teamname, description) VALUES ('$clan_name', '$clan_description')";
if(mysqli_query($connect, $sql)){
    echo "Records added successfully.";
}
?>

<div class="wrapper">

    <div class="clan_profile" >
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
                <input type="file" name="picture-upload" value="Upload picture"/><br>
                <input type="submit" name="submit"/>

            </form>

        </div>

        <div class="find-clan">

            <h2 class="find-section">Find clan</h2>
            <form class="find">
                <div class="search_bar">
                    <input type="text" name="search" placeholder="Search.."/>
                </div>
                <div class="submit-btn">
                    <input type="submit" value="Join Clan"/>
                </div>
            </form>


        </div>

    </div>

</div>

<?php include_once('footer.html'); ?>

</body>
</html>