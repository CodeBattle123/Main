<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
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


<?php include_once('header.php');
CheckIfLogged();
$sql = "SELECT DISTINCT * FROM team_inbox WHERE team_name = '$log_clan'";
$requests = mysqli_query($connect,$sql);
$numrows = mysqli_num_rows($requests);
?>

<?php
$leader = mysqli_query($connect, "SELECT * FROM teams WHERE name = '$log_clan'")->fetch_assoc()['leader'];
$isLeader = ($username==$leader);
?>

<main class="wrapper">
	<div class="imageContainer">

    <?php
    if ($isLeader) {
        echo '    <a href="clan_edit.php" class="editPageButton">Edit clan</a>';
    } else {
        echo '
    <form action="scripts/leaveclan.php" method="post">
    <input Onclick="return confirm(\'Are you sure you want to leave this clan?\')" type="submit" value="Leave clan" name="leaveclan" class="editPageButton"> 
    </form>';
    }
    ?>
    <h3 class="clanName"><?= $log_clan ?></h3>

    <div class="clanAvatarHolder">
		<img class="clanAvatar" src="clan-pics/<?=$log_clan . ".png"?>" alt="asd">
	</div>
	</div>
	<?php
	if ($isLeader) {
		echo '
		<div class="inbox">
		<ul><span class="first">Requests: (' . $numrows . ')</span>
		<div class="veil">';
		
		while ($row = $requests->fetch_assoc()) {
			$user_id = $row['user_id'];
			$user_name = mysqli_query($connect, "SELECT * from users WHERE id = '$user_id'")->fetch_assoc()['nickname'];
			echo '<li class="request">
			<p class="requestContents"><span class="target"><a class="requestusername" target="_blank" href="profile.php?user=' . $user_name . '">' . $user_name . '</a></span> wants to join your clan.</p>
			<form class="answers" action="scripts/addToClan.php" method="post">
			<input type="hidden" name="userid" value="' . $user_id . '">
			<input class="answerButton accept" type="submit" name="Add" value="Accept">
			<input class="answerButton deny" type="submit" name="Deny" value="Deny">
			</form>
			</li>';
			
		}
	}
	?>
</div>
</ul>
</div>

    <div class="clanInfo">


    <?php
    $sql = "SELECT * FROM teams WHERE name='$log_clan'";
    $query = mysqli_query($connect, $sql)->fetch_assoc();
    ?>

    <?php if (trim($query['description']) != "") : ?>
        <h3 class="clanDesc"><?php echo $query['description']; ?></h3>
    <?php endif; ?>

    <ul class="members">
        <?php

        $sql = "SELECT * FROM users WHERE clan='$log_clan'";
        $query = mysqli_query($connect, $sql);
        while ($row = $query->fetch_assoc()) {
            $member_name = $row['nickname'];
            echo '<li class="member">' . $member_name . '<a href="profile.php?user=' . $member_name . '">View Profile</a></li>';
        }
        ?>
    </ul>
	
    <!-- For getting the chat to be scolled to the bottom automatically -->
    <script type="text/javascript">
        var chat = document.getElementById("chat");
        chat.scrollTop = chat.scrollHeight;
    </script>

    <div id="clanChat"></div>
	
	</div>
</main>

<?php include_once('footer.html') ?>
</body>
</html>