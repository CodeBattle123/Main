<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-16">
 <title>Battle Arena</title>
 <link rel="stylesheet" type="text/css" href="styles/headerAndFooter.css">
 <link rel="stylesheet" type="text/css" href="styles/main.css">
 <link rel="stylesheet" type="text/css" href="styles/battlesequence.css">
 <link rel="stylesheet" type="text/css" href="styles/sidebar.css">
 <link rel="icon" type="image/png" href="images/icon.png"/>
<script src="scripts/jquery-3.1.1.min.js"></script>
<script src="scripts/post.js"></script>
</head>
<body>
<?php include 'header.php';
CheckIfLogged();
include_once("db/connect.php");
?>

<div class="wrapper">
<div>
   <?php
      // Get current logged user's username
      $uuuser = $_SESSION['username'];

      // Check if get request 'attack' is active
      if(isset($_GET['attack'])) {
         // Get the username of the user that the player is attacking
         // from the request
         $op = $_GET['attack'];
      }

      // Check if get request 'opponent' is active
      if (isset($_GET['opponent'])) {
         // Get the username of the user that the player want to attack
         // from the request
         $opponent = $_GET['opponent'];


         $sql = "SELECT * FROM users WHERE nickname = '$opponent'";
         $query = mysqli_query($connect, $sql);

         $opAvatar;

         // Avatar of the opponent
         file_exists("profile-pics/" . $opponent . ".png") ? $opAvatar = $opponent . ".png" : $opAvatar = "default.png";

         // Display the information about the user
         // such as clan, first name, last name
         while($row = $query->fetch_assoc()){
            echo '<div class="title">Selected opponent:</div>';
			echo '<img class="opAvatar" src="profile-pics/' . $opAvatar . '"/>';
            echo '<div class="opponentInfo">
					<h1 class="userName">' . $row['nickname'] . " - " . $row['xp'] . ' xp</h1>
					<h2 class="names">' . $row['first_name'] . ' ' . $row['last_name'] . '</h2>
					<h2 class="names">' . $row['clan'] . '</h2>
		   		</div>';

            // Button for attacking the selected player
            echo '<a class="attackButton" href="battlesequence.php?attack='. $row['nickname'] . '">Attack this player!</a><br/>';
         }

      // Check if get request 'attack' is active
      } elseif (isset($_GET['attack'])) {
         // Check if post request 'correct' is active
         // this is only when the user choose
         // the correct answer
         if (isset($_POST['correct'])) {
            // check if the user is setting up the challenge 1/2
            if (!isset($_GET['answer'])) {
               // Set temp points for the first user in the q table
               // so when the second user in the challenge players
               // comparison who is the winner can be made
               $sql = "UPDATE q SET temp_points = 1 WHERE (user_1 = '$uuuser' AND user_2 = '$op')";
               $query = mysqli_query($connect, $sql);
               echo '<h2 class="title">You answered correctly.<br/>Please wait for you opponent to play the match.</h2>';
            // or answering it 2/2
            } else {
               // When the second player in the challenge is
               // answering it, the score of the first player
               // is abstacted in a variable
               $points = mysqli_query($connect, "SELECT * FROM q WHERE (user_1 = '$op' AND user_2 = '$uuuser')")->fetch_assoc()['temp_points'];

               // Delete the row in the db table Q
               // where the challenge is stored until the second player answer it
               $sql = "DELETE FROM q WHERE (user_2 = '$uuuser' AND user_1 = '$op')";
               $query = mysqli_query($connect, $sql);

               // get the IDs of the both users
               $uuuser_id = mysqli_query($connect, "SELECT id FROM users WHERE nickname = '$uuuser'")->fetch_assoc()['id'];

               $op_id = mysqli_query($connect, "SELECT id FROM users WHERE nickname = '$op'")->fetch_assoc()['id'];

               // Compare the scores of both players and chose winner or draw
               if ($points == 1) {
                  $winner = 0;
               } else {
                  $winner = $uuuser_id;
               }

               // calculate the xp gain
               $xp = 2*rand(5, 30);

               // get the current xp of both users
               $current_xp_1 = mysqli_query($connect, "SELECT xp FROM users WHERE id = '$uuuser_id'")->fetch_assoc()['xp'];
               $current_xp_2 = mysqli_query($connect, "SELECT xp FROM users WHERE id = '$op_id'")->fetch_assoc()['xp'];

               // calcualte the new xp
               if ($winner == 0) {
                  $new_xp = ($xp) + $current_xp_1;
                  $new_xp2 = $xp + $current_xp_2;
               } else {
                  $new_xp = ($xp) + $current_xp_1;
                  $new_xp2 = $current_xp_2 - $xp;

                  // doesnt let the lossing player drop below 0 xp
                  if ($new_xp2 < 0) {
                     $new_xp2 = 0;
                  }
               }

               // update the new XPs, and save the match in the match history
               $sql = "UPDATE users SET xp='$new_xp' WHERE id='$uuuser_id'";
               $query = mysqli_query($connect, $sql);

               $sql = "UPDATE users SET xp='$new_xp2' WHERE id='$op_id'";
               $query = mysqli_query($connect, $sql);

               $sql = "INSERT INTO battle_log (user1_id, user2_id, winner, won_xp, date)
                                       VALUES ('$uuuser_id', '$op_id', '$winner', '$xp', now());";
               $query = mysqli_query($connect, $sql);
			   
			   echo '<h2 class="title">You have answered correctly.<br />Now check your match history.</h2>';
            }

         // Check if post request 'not_correct' is active
         // this is only when the user choose
         // the uncorrect answer
         } else if(isset($_POST['not_correct'])) {
            // check if the user is setting up the challenge 1/2
            if (!isset($_GET['answer'])) {
               $sql = "UPDATE q SET temp_points = 0 WHERE (user_1 = '$uuuser' AND user_2 = '$op')";
               $query = mysqli_query($connect, $sql);
               echo '<h2 class="title">Incorrect.<br />Please wait for you opponent to play the match.<br />If he also doesn\'t answer correctly to the question, there will be no winner.</h2>';
            // or answering it 2/2
            } else {
               // When the second player in the challenge is
               // answering it, the score of the first player
               // is abstacted in a variable
               $points = mysqli_query($connect, "SELECT * FROM q WHERE (user_1 = '$op' AND user_2 = '$uuuser')")->fetch_assoc()['temp_points'];
               echo $points;

               // Delete the row in the db table Q
               // where the challenge is stored until the second player answer it
               $sql = "DELETE FROM q WHERE (user_2 = '$uuuser' AND user_1 = '$op')";
               $query = mysqli_query($connect, $sql);

               // get the IDs of the both users
               $uuuser_id = mysqli_query($connect, "SELECT id FROM users WHERE nickname = '$uuuser'")->fetch_assoc()['id'];

               $op_id = mysqli_query($connect, "SELECT id FROM users WHERE nickname = '$op'")->fetch_assoc()['id'];

               // compare the score of the users and chose winner
               if ($points == 1) {
                  $winner = $op_id;
               } else {
                  $winner = 0;
               }

               // calculate xp gain
               $xp = 2*rand(5, 30);

               // get the current xp of both users
               $current_xp_1 = mysqli_query($connect, "SELECT xp FROM users WHERE id = '$uuuser_id'")->fetch_assoc()['xp'];
               $current_xp_2 = mysqli_query($connect, "SELECT xp FROM users WHERE id = '$op_id'")->fetch_assoc()['xp'];

               // calculate the new xp
               if ($winner == 0) {
                  $new_xp = $xp + $current_xp_1;
                  $new_xp2 = $xp + $current_xp_2;
               } else {
                  $new_xp = $current_xp_1 - $xp;

                  // dont let the xp drop below 0 on the losing player
                  if ($new_xp < 0) {
                     $new_xp = 0;
                  }

                  $new_xp2 = $current_xp_2 + $xp;
               }

               // update the new XPs, and save the match in the match history
               $sql = "UPDATE users SET xp='$new_xp' WHERE id='$uuuser_id'";
               $query = mysqli_query($connect, $sql);
               $sql = "UPDATE users SET xp='$new_xp2' WHERE id='$op_id'";
               $query = mysqli_query($connect, $sql);

               $sql = "INSERT INTO battle_log (user1_id, user2_id, winner, won_xp, date)
                                       VALUES ('$uuuser_id', '$op_id', '$winner', '$xp', now());";
               $query = mysqli_query($connect, $sql);
			   
			   echo '<h2 class="title">Incorrect. . .<br />Pray for the best.</h2>';
            }

         // If not post request is set no answer is given, so the
         // arena wll be displayed
         } else {
            // check if the user doesnt attack himself
            // if he is display message, and dont let him does that
            if (strtolower($_GET['attack']) != strtolower($_SESSION['username'])) {
               // check if both users have already set up challenge
               // If the have display message that they cant make new challenge
               // If the haven't display the arena
               if (isset($_GET['answer']) && ($_GET['answer']=='y')) {
                  $sql = "SELECT * FROM q WHERE (user_1='$uuuser' AND user_2='$op')";
               } else {
                  $sql = "SELECT * FROM q WHERE ((user_1='$uuuser' AND user_2='$op') OR (user_2='$uuuser' AND user_1='$op'))";
               }

               $query = mysqli_query($connect, $sql);
               $zecount2 = mysqli_num_rows($query);
               if ($zecount2 == 0) {
                  if (!isset($_GET['answer'])) {
                     $sql = "INSERT INTO q (user_1, user_2) VALUES ('$uuuser','$op')";
                     $query = mysqli_query($connect, $sql);
                  }
                  displayTheArena($username, $op);
               } else {
                  echo '<h1 class="alreadyChallenged">You already have set up challenge versus this player.</h1>';
               }
            } else {
               echo '<h3 class="title">Sorry, we are against masochism<br>...but you may punch yourself in the face :)</h3>';
            }
         }
      // If no attack or opponent get request is ative
      // display the user list of all users and
      // list of the users that have already set up
      // challenge versus him at the top
      } else {
         $zeuser = $_SESSION['username'];
         $sql = "SELECT * FROM q WHERE user_2='$zeuser'";
         $query = mysqli_query($connect, $sql);
         $zecount = mysqli_num_rows($query);
         if ($zecount > 0) {
            echo '<h1 class="title">Those players challenge you to play versus them!</h1>';
            while($row = $query->fetch_assoc()){
               echo '<a class="attacker" href="battlesequence.php?answer=y&attack='. $row['user_1'] . '">'.  $row['user_1'] . '</a>';
            }
         }
         echo '<div class="title">Choose an opponent:</div>
         		<ul class="displayOpt">
         			<li class="opt"><a href="battlesequence.php?byname">By Name</a></li>
         			<li class="opt"><a href="battlesequence.php?rand">Random</a></li>
         			<li class="opt"><a href="battlesequence.php?xp">By XP</a></li>
         		</ul>';

      // filter how the users to be displayed
		if (isset($_GET['byname'])) {
			$sql = "SELECT * FROM users ORDER BY nickname";
		}
		else if(isset($_GET['rand'])) {
			$sql = "SELECT * FRoM users ORDER BY RAND()";
		}
		else if(isset($_GET['xp'])) {
			$sql = "SELECT * FROM users ORDER BY xp DESC";
		}
		else {
			$sql = "SELECT * FRoM users ORDER BY RAND()";
		}
         $query = mysqli_query($connect, $sql);

         echo '<ul class="opponents">';

         while($row = $query->fetch_assoc()){
            if (strtolower($row['nickname']) == strtolower($_SESSION['username'])) {
               // THIS CHECKS IF THE USER
               // THAT YOU ATTACK
               // IS THE CURRENTLLY
               // LOGGED USER
               continue;
            }
            echo '<li><a class="user" href="battlesequence.php?opponent='. $row['nickname'] . '">' . $row['nickname'] . '<span>' . $row['xp'] . '</span></a></li>';
         }
         echo '</ul>';
      }
   ?>
</div>

<?php
   //The finction that contain the arena itself
   function displayTheArena($user, $op){
      echo '
         <div class="content">
            <div class="player">
               <div class="profile-photo">
                  <div class="username">' . $user . '</div>
               </div>

               <div class="score">
                  <div class="point"></div>
                  <div class="point"></div>
                  <div class="point"></div>
                  <div class="point"></div>
                  <div class="point"></div>
               </div>
            </div>

            <h1 class="battleTitle">VS</h1>

            <div class="player">
               <div class="profile-photo">
               <div class="username">' . $op . '</div>
               </div>

               <div class="score">
               <div class="point"></div>
               <div class="point"></div>
               <div class="point"></div>
               <div class="point"></div>
               <div class="point"></div>
               </div>
            </div>
         </div>

         <div class="battle">
            <div class="question">
               <p>Is this question?</p>
            </div>

            <div data="yes" class="answer a1 correct" onClick="check(); getAnswer(this)">
            	No.
            </div>

            <div data="no" class="answer a2 notcorrect" onClick="check(); getAnswer(this)">
                Yes.
            </div>

            <div data="no" class="answer a3 notcorrect" onClick="check(); getAnswer(this)">
                Probably.
            </div>

            <div data="no" class="answer a4 notcorrect" onClick="check(); getAnswer(this)">
                Is this the best question you can think of? I think not!
            </div>

         </div>';
      }
?>

<script>
   //The containers of the DOM elements
   let answer = document.getElementsByClassName('correct');
   let options = document.getElementsByClassName('answer');
   //variables to use for seeing if the player gave the correct answer
   let correct = false;

   // change that color of the answers after
   // the user chose one of them
   function check(){
      for (op of options) {
         op.style.background = "red";
      }
      answer[0].style.background = "green";
   }
</script>

<!-- forms that are send when answer is chosen -->
<form id="correct_form" action="#" method="post">
   <input type="hidden" name="correct" value="1">
</form>

<form id="not_correct_form" action="#" method="post">
   <input type="hidden" name="not_correct" value="2">
</form>
 <!-- with this js code -->
<script type="text/javascript">
   var correct_form = document.getElementById("correct_form");
   var not_correct_form = document.getElementById("not_correct_form");

   $('.correct').click(function(){
      correct_form.submit();
      console.log(1);
   });

   $('.notcorrect').click(function(){
      not_correct_form.submit();
      console.log(2);
   });
</script>
</div>

<?php include 'footer.html' ?>

</body>
</html>
