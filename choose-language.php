<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
    <link rel="stylesheet" href="styles/headerAndFooter.css">
	<link rel="stylesheet" href="styles/sidebar.css">
	<link rel="stylesheet" href="styles/main.css">
	<link rel="stylesheet" href="styles/choose_language_style.css">
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <title>Choose language</title>
</head>
<body>
<?php
include_once('header.php');
CheckIfLogged();

$idd = $_SESSION['userid'];
$query = "SELECT * FROM language_progress WHERE user_id='$idd' LIMIT 1";

$results = mysqli_query($connect, $query);
$row = mysqli_fetch_row($results);
?>

<div class="wrapper">
	<h3>Your languages</h3>
	<h5>Pick a language to master</h5>

	<div class="languages">
		<a href="langCourse.php?lang=csharp" class="lang-options" id="lang-csharp">
	        <div class="lang-options-p">C#</div>

			<div class="meter_container">
				<div class="meter">
					<span class="meterFill"></span>
				</div>
			</div>
	    </a>

		<a href="langCourse.php?lang=cpp" class="lang-options" id="lang-c++">
			<div class="lang-options-p">C++</div>

			<div class="meter_container">
				<div class="meter">
					<span class="meterFill"></span>
				</div>
			</div>
		</a>

	    <a href="langCourse.php?lang=java" class="lang-options" id="lang-java">
	        <div class="lang-options-p">Java</div>

			<div class="meter_container">
				<div class="meter">
					<span class="meterFill"></span>
				</div>
			</div>
	    </a>

	    <a href="langCourse.php?lang=javascript" class="lang-options" id="lang-javascript">
	        <div class="lang-options-p">JavaScript</div>

			<div class="meter_container">
				<div class="meter">
					<span class="meterFill"></span>
				</div>
			</div>
	    </a>

		<a href="langCourse.php?lang=php" class="lang-options" id="lang-php">
			<div class="lang-options-p">PHP</div>

			<div class="meter_container">
				<div class="meter">
					<span class="meterFill"></span>
				</div>
			</div>
		</a>

	    <a href="langCourse.php?lang=ruby" class="lang-options" id="lang-ruby">
	        <div class="lang-options-p">Ruby</div>

			<div class="meter_container">
				<div class="meter">
					<span class="meterFill"></span>
				</div>
			</div>
	    </a>

	    <a href="langCourse.php?lang=python" class="lang-options" id="lang-python">
	        <div class="lang-options-p">Python</div>

			<div class="meter_container">
				<div class="meter">
					<span class="meterFill"></span>
				</div>
			</div>
	    </a>

	    <a href="langCourse.php?lang=swift" class="lang-options" id="lang-swift">
	        <div class="lang-options-p">Swift</div>

			<div class="meter_container">
				<div class="meter">
					<span class="meterFill"></span>
				</div>
			</div>
	    </a>

		<script type="text/javascript">
			var elements = document.getElementsByClassName('meterFill');

			elements[0].style.width = String(parseInt("<?php echo $row[1]; ?>") * 10) + "%";
			elements[1].style.width = String(parseInt("<?php echo $row[2]; ?>") * 10) + "%";
			elements[2].style.width = String(parseInt("<?php echo $row[3]; ?>") * 10) + "%";
			elements[3].style.width = String(parseInt("<?php echo $row[4]; ?>") * 10) + "%";
			elements[4].style.width = String(parseInt("<?php echo $row[5]; ?>") * 10) + "%";
			elements[5].style.width = String(parseInt("<?php echo $row[6]; ?>") * 10) + "%";
			elements[6].style.width = String(parseInt("<?php echo $row[7]; ?>") * 10) + "%";
			elements[7].style.width = String(parseInt("<?php echo $row[8]; ?>") * 10) + "%";


		</script>

	</div>
</div>

<?php include_once('footer.html'); ?>
</body>
