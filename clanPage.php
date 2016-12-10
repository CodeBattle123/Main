<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clan Page</title>
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <link rel="stylesheet" href="styles/sidebar.css" media="screen" title="no title">
    <link rel="stylesheet" href="styles/clanPage.css" media="screen" title="no title">
	<link rel="stylesheet" href="styles/main.css">
    <script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
    <script type="text/babel" src="chat/chat.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react-dom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="scripts/post.js"></script>
		
	</script>

</head>
<body>
<?php include_once('header.php'); 
	CheckIfLogged();
	
	$sql = "SELECT DISTINCT * FROM team_inbox WHERE team_name = '$log_clan'";
    $requests = mysqli_query($connect,$sql);
?>

<main class="wrapper">
    <div class="clanAvatarHolder">  <img class="clanAvatar"   src="uploads/<?=$log_clan . ".png"?>" alt="asd"> </div>

         <div class="clanInfo">
			<div class="inbox">
				<ul><span class="first">Requests: ()</span>
					<div class="veil">
						<?php
					   while($row = $requests->fetch_assoc()) {
						   $user_id = $row['user_id'];
						   $user_name = mysqli_query($connect, "SELECT * from users WHERE id = '$user_id'")->fetch_assoc()['nickname'];

					   echo '<li class="request">
					   <p class="requestContents"><span class="target">' . $user_name  . '</span> wants to join your clan.</p>
					  <form class="answers" action="scripts/addToClan.php" method="post">
						  <input type="hidden" name="userid" value="'. $user_id .'">
						  <input class="answerButton accept" type="submit" name="Add" value="Accept">
						  <input class="answerButton deny" type="submit" name="Deny" value="Deny">
					  </form>
					  </li>';

					   }
					   ?>
					</div>
				</ul>
			</div>

            <h3 class="clanName"><?= $log_clan ?></h3>
			
			<?php
			$sql = "SELECT * FROM teams WHERE name='$log_clan'";
			$query = mysqli_query($connect, $sql)->fetch_assoc();
			?>
			
			<?php if (trim($query['description']) != "") : ?>
				<h3 class="clanDesc"><?php echo $query['description']; ?></h3>
			<?php endif; ?>

            <ul class="members">
			   <?php
			   		$sql = "SELECT * FROM `team-to-user` WHERE `team-id`=1";
					$query = mysqli_query($connect, $sql);
					while ($row = $query->fetch_assoc()) {
						$userid = $row['user-id'];
						$sql = "SELECT * FROM `users` WHERE id='$userid'";
						$user = mysqli_query($connect, $sql)->fetch_assoc()['nickname'];
						echo '<li class="member">' . $user . '<a href="profile.php?user=' . $user . '">View Profile</a></li>';
					}
			    ?>
            </ul>
            <!-- For getting the chat to be scolled to the bottom automatically -->
            <script type="text/javascript">
                var chat = document.getElementById("chat");
                chat.scrollTop = chat.scrollHeight;
            </script>

        <div id="clanChat">
			
        </div>
</main>

<?php include_once('footer.html') ?>
</body>
</html>