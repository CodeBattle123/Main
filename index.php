<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <link rel="stylesheet" href="styles/homestyle.css">
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <script type="text/javascript" src='scripts/home-script.js'></script>
    <script type="text/javascript" src='scripts/circulate.js'></script>
    <script type="text/javascript" src="scripts/jquery-easing.js"></script>
    <meta charset="UTF-8">
    <title>home</title>
</head>
<body>
<?php include_once('header.html'); ?>

    <div id="home-banner">
        <!--toni - BANNER HERE -->
    </div>

<div id="outer-home-div">
    <div id="p-home-div">
        <p id="p-home">Text text text texttexttexttexttexttexttexttext.</p>
    </div>

    <div id="btn-home-join-div">
        <input type="button" value="Join The Battle" id="btn-home-join">
    </div>
</div>
<!--Toni - when changing size of #mustache or pic, css #mustache, property 'left' needs to be adjusted-->
<img src="images/mustache.png" alt="mustache" id="mustache">

<?php include_once('footer.html'); ?>
</body>
</html>