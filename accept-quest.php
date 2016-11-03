<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <link rel="stylesheet" href="styles/example-quest-style.css">
    <meta charset="UTF-8">
    <title>quests</title>
</head>
<body>
<?php include_once('header.html'); ?>

<div id="ex-quest-outer">

    <h1 id="ex-quest-h1">Test Your Ruby Skills</h1>
    <h3 id="ruby-level">Level 1/10</h3>

    <div id="ex-quest-div">

        <p id="accept-quest-ruby-p">
            Face Ruby
        </p>

        <div id="button-accept-quest-ruby">
            <p>Fight Now</p>
        </div>

    </div>
</div>

<script>
    $(document).ready(function () {
        $('#button-accept-quest-ruby').click(function () {
            window.location = 'example-quest.php';
        });
    });
</script>

<?php include_once('footer.html'); ?>
</body>
</html>
