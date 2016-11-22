<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <link rel="stylesheet" href="styles/profile.css">
    <link rel="stylesheet" href="styles/sidebar.css">
    <meta charset="UTF-8">
    <title>home</title>
</head>
<body>

<?php include_once('header.php'); ?>

<div class="wrapper">
<div class="username" >
    <h2 align="center">Username</h2>
</div>

<div class="profile" align="center">
    <img src="images/user-profile.png" alt="Profile picture" class="profile">
</div>

<table class="profileinfo" cellpadding="40" cellspacing="20" style="margin: 10px auto;">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Score</th>
        <th>Ranking</th>
    </tr>
    <tr>
        <th>Data</th>
        <th>Data</th>
        <th>Data</th>
        <th>Data</th>
    </tr>

</table>

<div class="textarea" style="margin: 10px" align="center">
   <textarea style="width: 400px; height: 150px;">
    This is information about me
   </textarea>
</div>
</div>

<?php include_once('footer.html'); ?>
</body>

</html>
