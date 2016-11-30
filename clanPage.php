<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Clan Page</title>
      <link rel="stylesheet" href="styles/headerAndFooter.css">
      <link rel="stylesheet" href="styles/sidebar.css" media="screen" title="no title">
      <link rel="stylesheet" href="styles/clanPage.css" media="screen" title="no title">
   </head>
   <body>
      <?php include_once ('header.php'); ?>

      <main>
         <div class="clanAvatarHolder"></div>

         <div class="clanInfo">
            <h3 class="clanName">BadBoyz</h3>
            <h3 class="clanDesc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>

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

            <div class="clanChat">
               <ul id="chat">
				  	<h2>Chat</h2>
				  	<?php
						$sql = "SELECT * FROM `team-chat` ORDER BY `date` ASC";
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
      </main>

      <?php include_once ('footer.html') ?>
   </body>
</html>
