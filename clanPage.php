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

</head>
<body>
<?php include_once('header.php'); ?>
<main class="wrapper">
         <div class="clanInfo">
            <h3 class="clanName"><?= $log_clan ?></h3>
			<?php
			$sql = "SELECT * FROM teams WHERE name='$log_clan'";
			$query = mysqli_query($connect, $sql)->fetch_assoc();
			?>
            <h3 class="clanDesc"><?php echo $query['description']; ?></h3>

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

            <div class="clanChat">
               <ul id="chat">
				  	<?php
						$sql = "SELECT * FROM `team-chat` ORDER BY `date` desc";
						$query = mysqli_query($connect, $sql);
						while ($row = $query->fetch_assoc()) {

							$userid = $row['user_id'];
							$sql = "SELECT * FROM users WHERE id='$userid'";
					 		$user = mysqli_query($connect, $sql)->fetch_assoc()['nickname'];
							echo '<li class="chatLog"><span class="user">' . $user .'</span><span class="message">' . $row['message'] . '</span></li>';
						}
				  	?>
               </ul>
			   <!-- For getting the chat to be scolled to the bottom automatically -->
			   <script type="text/javascript">
			   var chat = document.getElementById("chat");
			   chat.scrollTop = chat.scrollHeight;
			   </script>

               <form class="messageInput">
                  <input class="input" type="text" name="text" placeholder="Enter your message here.">
                  <input type="Submit" name="submit" value="Submit">
			  </form>
            </div>
        </div>

        <div id="clanChat">

        </div>

</main>

<?php include_once('footer.html') ?>
</body>
</html>
