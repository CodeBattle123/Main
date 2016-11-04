<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <link rel="stylesheet" href="styles/choose_language_style.css">
    <meta charset="UTF-8">
    <title>choose language</title>
</head>
<body>
<?php include_once('header.html'); ?>

<h3>Choose a Language to Conquer</h3>

<div class="choose-lang-outer-div">

    <div class="lang-options" id="lang-csharp">
        <p class="lang-options-p">C#</p>
    </div>

    <div class="lang-options" id="lang-java">
        <p class="lang-options-p">Java</p>
    </div>

    <div class="lang-options" id="lang-php">
        <p class="lang-options-p">PHP</p>
    </div>

    <div class="lang-options" id="lang-javascript">
        <p class="lang-options-p">JavaScript</p>
    </div>

    <div class="lang-options" id="lang-c++">
        <p class="lang-options-p">C++</p>
    </div>
<!--Toni - if clicked demo script will run-->
    <div class="lang-options" id="lang-ruby">
        <p class="lang-options-p">Ruby</p>
        <p id="ruby-quest-progress">Completed 0/10</p>
    </div>

    <div class="lang-options" id="lang-python">
        <p class="lang-options-p">Python</p>
    </div>

    <div class="lang-options" id="lang-swift">
        <p class="lang-options-p">Swift</p>
    </div>

</div>


<!--Toni - demo script to link to ruby-->
<script>

    $(document).ready( function () {
        $('#lang-ruby').click( function () {
            window.location = 'accept-quest.php';
        });
    });

</script>

<?php include_once('footer.html'); ?>
</body>
