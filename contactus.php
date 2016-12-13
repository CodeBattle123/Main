<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-16">
    <title>About us</title>
    <link rel="stylesheet" type="text/css" href="styles/headerAndFooter.css">
    <link rel="stylesheet" type="text/css" href="styles/sidebar.css">
	<link rel="stylesheet" type="text/css" href="styles/main.css">
	<link rel="stylesheet" type="text/css" href="styles/contactusstyle.css">
    <link rel="icon" type="image/png" href="images/icon.png"/>
</head>
<body>
<?php include 'header.php' ?>

<div class="wrapper">
    <form class="messageForm">
        <fieldset class="messagePart">
            <label for="name">Name</label><br>
            <input type="text" name="name" id="name" placeholder="Full name" />
        </fieldset>

        <fieldset class="messagePart">
            <label for="email">Email</label><br>
            <input type="text" name="email" id="email" placeholder="Email" />
        </fieldset>

        <fieldset class="messagePart">
            <label class="subject" for="web">Subject</label><br>
            <input type="text" name="subject" id="subject" placeholder="Subject" />
        </fieldset>

        <fieldset class="messagePart">
            <textarea name="text" placeholder="Message" /></textarea>
        </fieldset>

        <input class="submit" type="submit" value="Send" />
    </form>

    <iframe frameborder="0" class="map" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJtxmnpMyFqkAR11jn2Lz8U98&key=AIzaSyAveHIKy7pEHie0CkXQRzdsRQXE4tvenSg" allowfullscreen>
      </iframe>
</div>
<?php include 'footer.html'?>
</body>
</html>
