<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clan Page</title>
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <link rel="stylesheet" href="styles/sidebar.css">
    <link rel="stylesheet" href="styles/clanPage.css">
    <link rel="stylesheet" href="styles/clan_edit.css">
    <link rel="stylesheet" href="styles/main.css">

</head>
<body>
<?php include_once('header.php');
CheckIfLogged();
?>

<?php

//Checking if the logged user is the leader of the clan.
//If the logged user is the leader then the elements for the leader are shown
$leader = mysqli_query($connect, "SELECT * FROM teams WHERE name = '$log_clan'")->fetch_assoc()['leader'];
$isLeader = ($username==$leader);
?>

<main class="wrapper">
	
	<div class="imageHolder">
		<!-- Button for deleting the clan -->
	    <form action="scripts/clan_edit.php" method="post">
	        <input Onclick="return confirm('Are you sure you want to delete this clan?')" type="submit" value="Delete clan" name="deleteclan" class="Submit">
	    </form>
		
		<!-- Clan image -->
	    <div class="clanAvatarHolder">  <img class="clanAvatar"   src="clan-pics/<?=$log_clan . ".png"?>" alt="asd"> </div>

		<!-- Form for changing the clan IMAGE. -->
	    <div class="clanInfo">
	        <form action="scripts/clan_pic_upload.php" method="post" enctype="multipart/form-data" class="imageForm">
	            <h3 class="imgHeader">Select an image to upload</h3>
	            <input type="submit" value="Upload Image" name="submit" class="Submitpic">
	            <input type="file" name="fileToUpload" id="fileToUpload">
	        </form>
	    </div>
	</div>
	

    <h3 class="clanName"><?=$log_clan?></h3>

    <?php
    //gets current team description
    $sql = "SELECT * FROM teams WHERE name='$log_clan'";
    $description = mysqli_query($connect, $sql)->fetch_assoc()['description'];
    ?>
	
	<!-- Form for changing the DESCRIPTION of the can -->
    <form action="scripts/clan_edit.php" method="post">
        <h2>description</h2>
        <textarea class="clanDesc" name="description"><?=$description?></textarea>
        <input type="submit" value="Update description" name="submit" class="Submit">
    </form>

    <ul class="members">
        <?php
		//Get the members of the clan
        $sql = "SELECT * FROM users WHERE clan='$log_clan'";
        $query = mysqli_query($connect, $sql);
		
		//Display every member of the clan with buttons on the side for KICKING and MAKING LEADER of clan
        while ($row = $query->fetch_assoc()) {
            $member_name = $row['nickname'];
            if ($isLeader){
                $remove="";
                if ($member_name!=$leader){
                    $remove = '<form class="functionsholder" action="scripts/removeFromClan.php" method="post">
						  <input type="hidden" name="username" value="' . $member_name . '">
						  <input Onclick="return confirm(\'Are you sure you want to remove this user from the clan?\')" class="memberOpt" type="submit" name="remove" value="remove">
						  <input Onclick="return confirm(\'Are you sure you want to make this user the clan leader?\')" class="memberOpt" type="submit" name="makeleader" value="Make leader">
					  </form>';
                }
				//If the query gets to the leader display him without the buttons.
                echo '<li class="member"><a href="profile.php?user=' . $member_name . '">' .  $member_name .  '</a>' .$remove . '</li>';
            }
			
			//Display the leaders 
            else{
                echo '<li class="member"><a href="profile.php?user=' . $member_name . '">' . $member_name . '</a></li>';
            }
        }
        ?>
    </ul>

</main>

<?php include_once('footer.html') ?>
</body>
</html>