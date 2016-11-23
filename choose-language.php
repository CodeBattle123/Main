    <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/headerAndFooter.css">
	<link rel="stylesheet" href="styles/sidebar.css">
	<link rel="stylesheet" href="styles/main.css">
	<link rel="stylesheet" href="styles/choose_language_style.css">
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <title>choose language</title>
</head>
<body>
<?php include_once('header.php'); ?>


<div class="wrapper">
	<h3>Your languages</h3>
	<h5>Pick a language to master</h5>

	<div class="languages">
	    <a href="langCourse.php" class="lang-options" id="lang-csharp">
	        <div class="lang-options-p">C#</div>

			<div class="meter_container">
				<div class="meter">
					<span></span>
				</div>
			</div>
	    </a>

	    <a href="langCourse.php" class="lang-options" id="lang-java">
	        <div class="lang-options-p">Java</div>

			<div class="meter_container">
				<div class="meter">
					<span></span>
				</div>
			</div>
	    </a>

	    <a href="langCourse.php" class="lang-options" id="lang-php">
	        <div class="lang-options-p">PHP</div>

			<div class="meter_container">
				<div class="meter">
					<span></span>
				</div>
			</div>
	    </a>

	    <a href="langCourse.php" class="lang-options" id="lang-javascript">
	        <div class="lang-options-p">JavaScript</div>

			<div class="meter_container">
				<div class="meter">
					<span></span>
				</div>
			</div>
	    </a>

	    <a href="langCourse.php" class="lang-options" id="lang-c++">
	        <div class="lang-options-p">C++</div>

			<div class="meter_container">
				<div class="meter">
					<span></span>
				</div>
			</div>
	    </a>
	<!--Toni - if clicked demo script will run-->
	    <a href="langCourse.php" class="lang-options" id="lang-ruby">
	        <div class="lang-options-p">Ruby</div>

			<div class="meter_container">
				<div class="meter">
					<span></span>
				</div>
			</div>
	    </a>

	    <a href="langCourse.php" class="lang-options" id="lang-python">
	        <div class="lang-options-p">Python</div>

			<div class="meter_container">
				<div class="meter">
					<span></span>
				</div>
			</div>
	    </a>

	    <a href="langCourse.php" class="lang-options" id="lang-swift">
	        <div class="lang-options-p">Swift</div>

			<div class="meter_container">
				<div class="meter">
					<span></span>
				</div>
			</div>
	    </a>

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
