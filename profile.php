
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

	<?php
		$sql = "SELECT * FROM users WHERE nickname = '$current_user'";
		$query = mysqli_query($connect, $sql);
		$row = $query->fetch_assoc();
		echo 'the user have ' . $row['xp'] . 'xp';
		?>

	<div class="text">
		<p>This is information about me</p>
	</div>

	<div class="match-history">
		<h2 class="desc">Match History</h2>
	</div>

	<div class="table-history" style="max-width: 100%">
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
                <td>' . '+' . $row['wonned_xp'] . '</td>
                <td>' . $row['date'] . '</td>
               </tr>
               ';
					} else {
						echo '<tr class="loss" >
		        <td><img src="images/footer_github.png" height="20"><a href="profile.php?user='.$current_user.'">' . $current_user . '</a></td>
                <td>' . $result . '</td>
                <td><img src="images/footer_github.png" height="20"><a href="profile.php?user='.$opponent.'">' . $opponent . '</a></td>
                <td>' . '-' . $row['wonned_xp'] . '</td>
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
