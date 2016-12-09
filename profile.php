
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<link rel="stylesheet" href="styles/headerAndFooter.css">
	<link rel="stylesheet" href="styles/profile.css">
	<link rel="stylesheet" href="styles/sidebar.css">
	<link rel="stylesheet" href="styles/main.css">

	<meta charset="UTF-8">
	<title>Profile</title>
</head>

<body>

<?php include_once('header.php'); ?>
<?php
if (!isset($_GET['user'])) {
	header("location: profile.php?user=$log_username");
	exit();
}
?>

<?php
	if (isset($_GET['user'])) {
		$current_user = mysqli_real_escape_string($connect, $_GET['user']);
	}
?>

<div class="wrapper">
	<div class="username">
		<h2 align="center"><?=$current_user?></h2>
	</div>

	<div class="profile-pic" align="center">
		<img src="images/footer_github.png" alt="Profile picture" class="profile">
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

		$sql = "SELECT * FROM users WHERE id='$userid'";
		$query = mysqli_query($connect, $sql);
		$row = $query->fetch_assoc();
		echo '<h3 class="xp">' . $row['xp'] . ' XP</h3>';

		//gets the rank of the current user
		$rank = mysqli_query($connect, " SELECT nickname,
		 (SELECT COUNT(*)+1
 		FROM user_ranking
		 WHERE xp > t.xp) as rank
 		FROM user_ranking t
		WHERE id = '$userid'")->fetch_assoc()['rank'];

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
				<th>Username</th>
				<th>Result</th>
				<th>Against</th>
				<th>Gained/Lost XP</th>
				<th>Date</th>
			</tr>
			<tr>
				<?php
$sql = "SELECT id FROM users WHERE nickname = '$current_user' LIMIT 1";
$query = mysqli_query($connect, $sql);
while($row = $query->fetch_assoc()) {
	$userid = $row['id'];
}
				$sql = "SELECT * FROM battle_log WHERE user1_id = '$userid' || user2_id = '$userid' ORDER BY date DESC";
				$query = mysqli_query($connect, $sql);
				while($row = $query->fetch_assoc()) {
					if ($row['user1_id'] == $userid) {
						$opponentid = $row['user2_id'];
					}
					else {
						$opponentid = $row['user1_id'];
					}

					if ($row['winner'] == $userid) {
						$result = 'Victory';
					} else {
						$result = 'Defeat';
					}

					$opponent = mysqli_query($connect, "SELECT * FROM users WHERE id = '$opponentid'")->fetch_assoc()['nickname'];

					if ($result == 'Victory') {
						echo '<tr class="win" >
		        <td><img src="images/footer_github.png" height="20"><a href="profile.php?user='.$current_user.'">' . $current_user . '</a></td>
                <td>' . $result . '</td>
				<td><img src="images/footer_github.png" height="20"><a href="profile.php?user='.$opponent.'">' . $opponent . '</a></td>
                <td>' . '+' . $row['won_xp'] . '</td>
                <td>' . $row['date'] . '</td>
               </tr>
               ';
					} else {
						echo '<tr class="loss" >
		        <td><img src="images/footer_github.png" height="20"><a href="profile.php?user='.$current_user.'">' . $current_user . '</a></td>
                <td>' . $result . '</td>
                <td><img src="images/footer_github.png" height="20"><a href="profile.php?user='.$opponent.'">' . $opponent . '</a></td>
                <td>' . '-' . $row['won_xp'] . '</td>
                <td>' . $row['date'] . '</td>
               </tr>
               ';
					}
				}

				?>
			<script>
				var matches = document.getElementsByClassName("loss");
				for	(row of matches) {
					row.style.backgroundColor = "#DA4E4E";
				}
			</script>
		</table>
	</div>
</div>

<?php include_once('footer.html'); ?>
</body>
</html>
