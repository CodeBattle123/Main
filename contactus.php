<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-16">
    <title>About us</title>
    <link rel="stylesheet" type="text/css" href="styles/headerAndFooter.css">
    <link rel="stylesheet" type="text/css" href="styles/aboutusstyle.css">
    <link rel="stylesheet" type="text/css" href="styles/contactusstyle.css">
    <link rel="stylesheet" type="text/css" href="styles/sidebar.css">
    <link rel="icon" type="image/png" href="images/icon.png"/>
</head>
<body>
<?php include 'header.php'?>

<div class="wrapper">
    <form class="form">
        <p class="name">
            <label class="inputLabel" for="name">Name</label><br>
            <input type="text" name="name" id="name" placeholder="Your full name" />
        </p>

        <p class="email">
            <label class="inputLabel" for="email">Email</label><br>
            <input type="text" name="email" id="email" placeholder="Your email" />
        </p>

        <p class="web">
            <label class="inputLabel" for="web">Subject</label><br>
            <input type="text" name="subject" id="subject" placeholder="Subject" />
        </p>

        <p class="text">
            <textarea name="text" placeholder="Your message" /></textarea>
        </p>

        <p class="submit">
            <input type="submit" value="Send" />
        </p>
    </form>

    <iframe  frameborder="0" class="map" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJtxmnpMyFqkAR11jn2Lz8U98&key=AIzaSyAveHIKy7pEHie0CkXQRzdsRQXE4tvenSg" allowfullscreen>
      </iframe>
</div>
<?php include 'footer.html'?>
</body>
</html>
