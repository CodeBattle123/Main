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
    <form class="form" action="contactus.php" method="post" enctype="multipart/form-data" >
		
		<?php
            if (isset($_POST['submit'])){
                $validate = true;

                $email_to="you@gmail.com";

                $name = $_POST['name'];
                if (strlen($name) == 0) {
                    echo "<li class=\"message\">You must enter your name.</li>";
                    $validate = false;
                }

                $email_from = preg_replace('#[^a-z0-9]#i', '', $_POST['email']);
                if (strlen($email_from) < 1) {
                    echo '<li class="message">Email must be inputed.</li>';
                    $validate = false;
                }

                $subject = $_POST['subject'];
                if (strlen($subject) == 0) {
                    echo "<li class=\"message\">You must enter a subject.</li>";
                    $validate = false;
                }

                $text = $_POST['text'];
                if (strlen($text) == 0) {
                    echo "<li class=\"message\">You must enter a message.</li>";
                    $validate = false;
                }

                if ($validate==true){

                    $headers = 'From: ' . $email_from . "\r\n".
                        'Reply-To: ' . $email_from ."\r\n" .
                        'X-Mailer: PHP/' . phpversion();


                    mail($email_to, $subject, $text, $headers);

                    echo "<li class=\"message\">Thank you for contacting us. We will be in touch with you soon.</li>";
                }
            }
        ?>

		
        <fieldset class="messagePart">
            <label for="name">Name</label><br>
            <input type="text" name="name" id="name" placeholder="Your full name" />
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

        <input class="submit" name="submit" type="submit" value="Send" />
    </form>

    <iframe frameborder="0" class="map" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJtxmnpMyFqkAR11jn2Lz8U98&key=AIzaSyAveHIKy7pEHie0CkXQRzdsRQXE4tvenSg" allowfullscreen>
      </iframe>
</div>
<?php include 'footer.html'?>
</body>
</html>
