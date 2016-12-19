<?php
	if (!isset($_GET['lang'])) {
		header("location: choose-language.php");
		exit();
	}

	$lang = "";

	switch ($_GET['lang']) {
		case 'csharp':
			$lang = "C#";
			break;
		case 'cpp':
			$lang = "C++";
			break;
		case 'java':
			$lang = "Java";
			break;
		case 'javascript':
			$lang = "JavaScript";
			break;
		case 'php':
			$lang = "PHP";
			break;
		case 'ruby':
			$lang = "Ruby";
			break;
		case 'python':
			$lang = "Python";
			break;
		case 'swift':
			$lang = "Swift";
			break;
		default:
			header("location: choose-language.php");
			break;
	}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?= $lang ?></title>

		<link rel="stylesheet" href="styles/headerAndFooter.css">
		<link rel="stylesheet" href="styles/main.css">
		<link rel="stylesheet" href="styles/sidebar.css">
		<link rel="stylesheet" href="styles/langCourse.css">
	</head>
	<body>
		<?php include_once 'header.php'; ?>

		<div class="wrapper">
			<h1 class="langName"><?= $lang ?></h1>

			<div class="devision">
				<h2 class="level">Begginer</h2>
				<div class="circleContainer">
					<a href="quest.php?lang=<?= $_GET['lang']?>&level=1" class="circle"></a>
					<a href="quest.php?lang=<?= $_GET['lang']?>&level=2" class="circle"></a>
					<a href="quest.php?lang=<?= $_GET['lang']?>&level=3" class="circle"></a>
					<a href="quest.php?lang=<?= $_GET['lang']?>&level=4" class="circle"></a>
					<a href="quest.php?lang=<?= $_GET['lang']?>&level=5" class="circle"></a>
				</div>
			</div>
			<div class="devision">
				<h2 class="level">Intermediate</h2>
				<div class="circleContainer">
					<a href="#" class="circle"></a>
					<a href="#" class="circle"></a>
				</div>
			</div>
			<div class="devision">
				<h2 class="level">Advanced</h2>
				<div class="circleContainer">
					<a href="#" class="circle"></a>
				</div>
			</div>
			<div class="devision">
				<h2 class="level">Master</h2>
				<div class="circleContainer">
					<a href="#" class="circle"></a>
					<a href="#" class="circle"></a>
					<a href="#" class="circle"></a>
				</div>
			</div>

		</div>

		<?php include_once 'footer.html'; ?>
	</body>
</html>
