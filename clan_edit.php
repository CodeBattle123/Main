<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clan Page</title>
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <link rel="stylesheet" href="styles/sidebar.css" media="screen" title="no title">
    <link rel="stylesheet" href="styles/clanPage.css" media="screen" title="no title">
    <link rel="stylesheet" href="styles/clan_edit.css">
    <link rel="stylesheet" href="styles/main.css">

</head>
<body>
<?php include_once('header.php');
CheckIfLogged();

$sql = "SELECT DISTINCT * FROM team_inbox WHERE team_name = '$log_clan'";
$requests = mysqli_query($connect,$sql);
?>

<?php
$leader = mysqli_query($connect, "SELECT * FROM teams WHERE name = '$log_clan'")->fetch_assoc()['leader'];
$isLeader = ($username==$leader);
?>

<main class="wrapper">
    <div class="clanAvatarHolder">  <img class="clanAvatar"   src="uploads/<?=$log_clan . ".png"?>" alt="asd"> </div>

    <div class="clanInfo">

        <?php

        if ($isLeader) {

            echo '  <div class="inbox">
        <ul><span class="first">Requests: ()</span>
    <div class="veil">';

            while ($row = $requests->fetch_assoc()) {
                $user_id = $row['user_id'];
                $user_name = mysqli_query($connect, "SELECT * from users WHERE id = '$user_id'")->fetch_assoc()['nickname'];

                echo '<li class="request">
					   <p class="requestContents"><span class="target">' . $user_name . '</span> wants to join your clan.</p>
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

    <h3 class="clanName"><?= $log_clan ?></h3>

    <?php
    //gets current team description
    $sql = "SELECT * FROM teams WHERE name='$log_clan'";
    $description = mysqli_query($connect, $sql)->fetch_assoc()['description'];
    ?>

    <form action="scripts/clan_edit.php" method="post">
        <h2>description</h2>
        <textarea class="clannDesc" name="description"><?=$description?></textarea>
        <input type="submit" value="Update description" name="submit" class="Submit">
    </form>

    <ul class="members">
        <?php

        $sql = "SELECT * FROM users WHERE clan='$log_clan'";
        $query = mysqli_query($connect, $sql);
        while ($row = $query->fetch_assoc()) {
            $member_name = $row['nickname'];

            if ($isLeader){
                $remove="";
                if ($member_name!=$leader){
                    $remove = '<form class="answers" action="scripts/removeFromClan.php" method="post">
						  <input type="hidden" name="username" value="' . $member_name . '">
						  <input class="Submit" type="submit" name="remove" value="remove">
						  <input class="Submit" type="submit" name="makeleader" value="Make leader">
					  </form>';
                }
                echo '<li class="member">' . $member_name . $remove . '<a href="profile.php?user=' . $member_name . '">View Profile</a></li>';
            }
            else{
                echo '<li class="member">' . $member_name . '<a href="profile.php?user=' . $member_name . '">View Profile</a></li>';
            }
        }
        ?>
    </ul>

</main>

<?php include_once('footer.html') ?>
</body>
</html>