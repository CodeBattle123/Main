<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clan Page</title>
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <link rel="stylesheet" href="styles/sidebar.css" media="screen" title="no title">
    <link rel="stylesheet" href="styles/clanPage.css" media="screen" title="no title">
    <script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
    <script type="text/babel" src="chat/chat.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react-dom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

</head>
<body>
<?php include_once('header.php');

         <div class="clanInfo">
            <?php
            $user_name = $_SESSION ['username'];

            $sql = "SELECT * FROM users WHERE nickname = '$user_name'";

            $query = mysqli_query($connect, $sql);

            $row = $query->fetch_assoc();

            echo '<h1>' . $row['clan'] . '</h1>';

            ?>
            <h3 class="clanName">Behf</h3>
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
        </div>-->

        <div id="clanChat">

        </div>

    </div>

    <style>
        #clanChat ul {
            font-family: Sidebar;
            list-style: none;
            max-height: 400px;
            overflow-y: scroll;
        }
        #clanChat li {
            border: 1px solid black;
            height: 50px;
            line-height: 50px;
        }

        #clanChat #message {
            width: 85%;
            height: 30px
            padding: 10px;
        }

        #clanChat #btn{
            font-family: Quest;
            width: 100px;
            height: 55px;
        }

        #clanChat span {
            text-align: left;
            padding: 0 20px;
            margin-right: 30px;
            font-weight: bolder;
            float: left;
            width: 130px;
            border-right: 1px solid black;
        }


    </style>

</main>
<script>


</script>

<?php include_once('footer.html') ?>
</body>
</html>
