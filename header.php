<?php
	include_once("db/login_status.php");
	
	function CheckIfLogged(){
		if (!isset($_SESSION['userid'])) {
			header('location: index.php');
		}
	}

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
?>

<header>
   <div class="headAndLogo">
   <a href="index.php"><img src="images/Logo.svg" alt="hlogo" class="logo"/></a>
   <a href="index.php"><h1 class="header-title">CodeBattles</h1></a>
	</div>

   <div class="nav">
	   <ul id="list">
		   <?php
				if (!$logged) {
					echo '<li><a href="login.php" class="tab">Login</a></li>
						  <li><a href="register.php" class="tab">Register</a></li>
						  <li class="hidden"><a href="index.php" class="tab hidden">Home</a></li>
		                  <li class="hidden"><a href="choose-language.php" class="tab hidden">Quests</a></li>
		                  <li class="hidden"><a href="battlesequence.php" class="tab hidden">Battle arena</a></li>
		                  <li class="hidden"><a href="ranking.php" class="tab hidden">Rankings</a></li>
		                  <li class="hidden"><a href="clanPage.php" class="tab hidden">Clan</a></li>
		                  <li class="hidden"><a href="clan-rankings.php" class="tab hidden">Clan rankings</a></li>
		                  <li class="hidden"><a href="profile.php?user=' . $log_username . '" class="tab hidden">Profile</a></li>
		                  <li class="hidden"><a href="AboutUs.php" class="tab hidden">About</a></li>
		                  <li class="hidden"><a href="contactus.php" class="tab hidden">Contact us</a></li>';
				} else {
					echo '<li><a href="profile.php" class="tab">' . $log_username . '</a></li>
		  				<li><a href="logout.php" class="tab">Log Out</a></li>
						<li class="hidden"><a href="index.php" class="tab hidden">Home</a></li>
		                <li class="hidden"><a href="ranking.php" class="tab hidden">Rankings</a></li>
		                <li class="hidden"><a href="clan-rankings.php" class="tab">Clan rankings</a></li>
		                <li class="hidden"><a href="AboutUs.php" class="tab hidden">About</a></li>
		                <li class="hidden"><a href="contactus.php" class="tab hidden">Contact us</a></li>';
					}
				?>
	   </ul>
	</div>
 </header>


<?php
    include_once('sidebar.php');
?>
