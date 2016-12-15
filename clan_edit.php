<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clan Page</title>
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <link rel="stylesheet" href="styles/sidebar.css" media="screen" title="no title">
    <link rel="stylesheet" href="styles/clanPage.css" media="screen" title="no title">
    <link rel="stylesheet" href="styles/profile_edit.css">
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

    <form action="scripts/clan_edit.php" method="post">
        <input Onclick="return confirm('Are you sure you want to delete this clan?')" type="submit" value="Delete clan" name="deleteclan" class="Submit">
    </form>

    <div class="clanAvatarHolder">  <img class="clanAvatar"   src="clan-pics/<?=$log_clan . ".png"?>" alt="asd"> </div>

    <div class="clanInfo">

    </div>
    </ul>
    </div>

    <h3 class="clanName"><?=$log_clan?></h3>

    <?php
    //gets current team description
    $sql = "SELECT * FROM teams WHERE name='$log_clan'";
    $description = mysqli_query($connect, $sql)->fetch_assoc()['description'];
    ?>

    <form action="scripts/clan_edit.php" method="post">
        <h2>description</h2>
        <textarea class="clanDesc" name="description"><?=$description?></textarea>
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
                    $remove = '<form action="scripts/removeFromClan.php" method="post">
						  <input type="hidden" name="username" value="' . $member_name . '">
						  <input Onclick="return confirm(\'Are you sure you want to remove this user from the clan?\')" class="Submit" type="submit" name="remove" value="remove">
						  <input Onclick="return confirm(\'Are you sure you want to make this user the clan leader?\')" class="Submit" type="submit" name="makeleader" value="Make leader">
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