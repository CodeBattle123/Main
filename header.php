<?php

	function get_browser_name($user_agent)
	{
	if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
	elseif (strpos($user_agent, 'Edge')) return 'Edge';
	elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
	elseif (strpos($user_agent, 'Safari')) return 'Safari';
	elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
	elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';

	return 'Other';
	}

// Usage:
	$browserCheck = get_browser_name($_SERVER['HTTP_USER_AGENT']);

	if ($browserCheck == "Internet Explorer") {
		echo "Please get a different browser.";
		exit;
	}

    include_once('db/connect.php');

	session_start();
?>

<header>
   <a href="index.php"><img src="images/Logo.svg" alt="hlogo" class="logo"/></a>
   <h1 class="header-title">CodeBattles</h1>

<?php

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	echo '<div class="nav">
	   <ul id="list">
		  <li><a href="login.php" class="tab">Login</a></li>
		  <li><a href="register.php" class="tab">Register</a></li>
	   </ul>
	</div>
 </header>';
}

else {
	echo '<div class="nav">
	   <ul id="list">
		  <li><a href="profile.php" class="tab">My Profile</a></li>
		  <li><a href="logout.php" class="tab">Log Out</a></li>
	   </ul>
	</div>
 </header>';
}

?>
<?php
    include_once('sidebar.html');
?>
