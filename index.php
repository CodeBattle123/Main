<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <link rel="stylesheet" href="styles/main.css">
	<link rel="stylesheet" href="styles/sidebar.css">
	<link rel="stylesheet" href="styles/index.css">

    <meta charset="UTF-8">
    <title>home</title>
</head>

<body id="bod">
<?php include_once('header.php'); 
if ($logged) {
	header("location: profile.php");
}?>

<div class="wrapper">
	
        <div class="content">
			<div class="topButton">
				<a href="register.php">Join the battle now!</a>
			</div>
			
	        <div class="AboutSect">
				<div class="innerContent">
		            <h1>About the project</h1>
					<hr>
		            <p>
		                Show off your programming knowledge and compete against other players to get to first place in the leader board. Gather with friends in your very own clan and make it the best one out there.
		            </p>
				</div>
	        </div>
	    </div>
		
</div>
</body>
</html>
