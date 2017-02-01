<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/png" href="images/icon.png"/>
		<link rel="stylesheet" href="styles/headerAndFooter.css">
		<link rel="stylesheet" href="styles/sidebar.css">
		<link rel="stylesheet" href="styles/main.css">
		<link rel="stylesheet" href="styles/profile.css">
		<meta charset="UTF-8">
		<title>Profile</title>
	</head>

	<body>
		<?php include_once('header.php');
			CheckIfLogged();

		if(!isset($_GET['user'])) {
		    header("location: profile.php?user=$log_username");
		    exit();
		}

		if (isset($_GET['user'])) {
		    $user = $_GET['user'];
		    $sql = "SELECT nickname FROM users WHERE nickname='$user'";
		    $result = $connect->query($sql);

		    if ($result->num_rows == 0) {
		        header("location: index.php");
		        exit();
		    }
		}
		?>

		<?php
			if (isset($_GET['user'])) {
			    $current_user = mysqli_real_escape_string($connect, $_GET['user']);
			}
		?>

		<?php
			file_exists("profile-pics/" . $current_user . ".png") ? $profilepic = $current_user . ".png" : $profilepic = "default.png";
		?>

		<div class="wrapper">
			<div class="userContainer">
			    <div class="username">
			        <h2 align="center"><?= $current_user ?></h2>
			    </div>

				<div class="profile-pic">
					<img src="profile-pics/<?=$profilepic?>" alt="Profile picture" class="profile">
				</div>

				<?php
				if ($_SESSION ['username'] == $current_user)
					echo '<a href="profile_edit.php" class="editPageButton">Edit profile</a>';
					$sql = "SELECT * FROM users WHERE nickname='$current_user'";
					$query = mysqli_query($connect, $sql);
					$row = $query->fetch_assoc();
					echo '<h3 class="xp">' . $row['xp'] . ' XP</h3>';
				?>

			</div>
			<table class="profileinfo" cellpadding="40" cellspacing="20" style="margin: 40px auto;">
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Score</th>
					<th>Ranking</th>
				</tr>
				<?php
				$userid = $_SESSION ['userid'];



				//gets the rank of the current user
				$rank = mysqli_query($connect, "SELECT nickname,
				 (SELECT COUNT(*)+1
		 		FROM user_ranking
				 WHERE xp > t.xp) as rank
		 		FROM user_ranking t
				WHERE nickname = '$current_user'")->fetch_assoc()['rank'];

		        echo '<tr>
		            <td>
		                <h4>' . $row['first_name'] . '</h4>
		            </td>
		                <td>
		                <h4>' . $row['last_name'] . '</h4>
		                </td>
		            <td>
		               <h4>' . $row['xp'] . '</h4>
		            </td>
		                        <td>
		               <h4>' . '#' . $rank . '</h4>
		            </td>
		               </tr>';
				?>

				<?php
					if ($row['description'] != "") {
						echo '<div class="profileDesc">
							<p>' . $row['description'] . '</p>
						</div>';
					}
		 		?>

		        <div class="match-history">
		            <h2 class="matchHistory">Match History</h2>
		        </div>

		        <div class="table-history">
		            <table class="match-history-table">
		                <tr>
		                    <th colspan="2">Username</th>
		                    <th>Result</th>
		                    <th colspan="2">Opponent</th>
		                    <th>Gained/Lost XP</th>
		                    <th>Date</th>
		                </tr>
		                <tr>
		                    <?php
		                    $sql = "SELECT id FROM users WHERE nickname = '$current_user' LIMIT 1";
		                    $query = mysqli_query($connect, $sql);
		                    while ($row = $query->fetch_assoc()) {
		                        $userid = $row['id'];
		                    }
		                    $sql = "SELECT * FROM battle_log WHERE user1_id = '$userid' || user2_id = '$userid' ORDER BY date DESC";
		                    $query = mysqli_query($connect, $sql);
		                    while ($row = $query->fetch_assoc()) {

		                        if ($row['user1_id'] == $userid) {
		                            $opponentid = $row['user2_id'];
		                        } else {
		                            $opponentid = $row['user1_id'];
		                        }

										if ($row['winner'] == 0) {
											$result = 'draw';
		                        } else if ($row['winner'] == $userid) {
		                            $result = 'win';
		                        } else {
		                            $result = 'loss';
		                        }

		                        $opponent = mysqli_query($connect, "SELECT * FROM users WHERE id = '$opponentid'")->fetch_assoc()['nickname'];
		                        file_exists("profile-pics/" . $opponent . ".png") ? $opponentpic = $opponent . ".png" : $opponentpic = "default.png";
		                        file_exists("profile-pics/" . $current_user . ".png") ? $current_user_pic = $current_user . ".png" : $current_user_pic = "default.png";

		                            echo '<tr class="' . $result . '" >
				        <td><img style="float: right;" class="profilesmall" src="profile-pics/' . $current_user_pic . '"></td><td style="text-align: left;"><a class="matchName" href="profile.php?user=' . $current_user . '">' . $current_user . '</a></td>
		                <td>' . $result . '</td>
				        <td><img class="profilesmall" style="float: right;" src="profile-pics/' . $opponentpic . '"></td><td style="text-align: left;"><a class="matchName" href="profile.php?user=' . $opponent . '">' . $opponent . '</a></td>
		                <td> ';

	if ($result == "loss") {
		echo "-";
	} else {
		echo "+";
	}

							$timestamp = strtotime($row['date']);

							 echo  $row['won_xp'] . '</td>
		                <td>' . date("H:i d/m/Y", $timestamp) . '</td>
		               </tr>
		               ';
		            }

		                    ?>
		                    <script>
		                        var matches = document.getElementsByClassName("loss");
		                        for (row of matches) {
		                            row.style.backgroundColor = "#DA4E4E";
		                        }

										var matches = document.getElementsByClassName("draw");
		                        for (row of matches) {
		                            row.style.backgroundColor = "yellow";
		                        }
		                    </script>
		            </table>
		        </div>
		</div>

		<?php include_once('footer.html'); ?>
	</body>
</html>
