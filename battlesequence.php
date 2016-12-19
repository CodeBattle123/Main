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
<div class="">
   <?php
      $uuuser = $_SESSION['username'];
      if(isset($_GET['attack'])) {
         $op = $_GET['attack'];
      }

      if (isset($_GET['opponent'])) {
         $opponent = $_GET['opponent'];

         $sql = "SELECT * FROM users WHERE nickname = '$opponent'";
         $query = mysqli_query($connect, $sql);

         while($row = $query->fetch_assoc()){
            echo '<div class="title">Selected opponent:</div>';
            echo '<div class="opponentInfo">
					<h1 class="userName">' . $row['nickname'] . '</h1>
					<h2 class="names">' . $row['first_name'] . ' ' . $row['last_name'] . '</h2>
					<h2 class="names">' . $row['clan'] . '</h2>
		   		</div>';

            echo '<a href="battlesequence.php?attack='. $row['nickname'] . '">Attack this player!</a><br/>';
         }
      } elseif (isset($_GET['attack'])) {
         if (isset($_POST['correct'])) {
            if (!isset($_GET['answer'])) {
               $sql = "UPDATE q SET temp_points = 1 WHERE (user_1 = '$uuuser' AND user_2 = '$op')";
               $query = mysqli_query($connect, $sql);
               echo 'You answered correctly. Please wait for you opponent to play the match.';
            } else {
               $points = mysqli_query($connect, "SELECT * FROM q WHERE (user_1 = '$op' AND user_2 = '$uuuser')")->fetch_assoc()['temp_points'];

               $sql = "DELETE FROM q WHERE (user_2 = '$uuuser' AND user_1 = '$op')";
               $query = mysqli_query($connect, $sql);

               $uuuser_id = mysqli_query($connect, "SELECT id FROM users WHERE nickname = '$uuuser'")->fetch_assoc()['id'];

               $op_id = mysqli_query($connect, "SELECT id FROM users WHERE nickname = '$op'")->fetch_assoc()['id'];

               if ($points == 1) {
                  $winner = 0;
               } else {
                  $winner = $uuuser_id;
               }

               $xp = 2*rand(5, 30);

               $current_xp_1 = mysqli_query($connect, "SELECT xp FROM users WHERE id = '$uuuser_id'")->fetch_assoc()['xp'];
               $current_xp_2 = mysqli_query($connect, "SELECT xp FROM users WHERE id = '$op_id'")->fetch_assoc()['xp'];

               if ($winner == 0) {
                  $new_xp = ($xp) + $current_xp_1;
                  $new_xp2 = $xp + $current_xp_2;
               } else {
                  $new_xp = ($xp) + $current_xp_1;
                  $new_xp2 = $current_xp_2 - $xp;
               }

               $sql = "UPDATE users SET xp='$new_xp' WHERE id='$uuuser_id'";
               $query = mysqli_query($connect, $sql);

               $sql = "UPDATE users SET xp='$new_xp2' WHERE id='$op_id'";
               $query = mysqli_query($connect, $sql);

               $sql = "INSERT INTO battle_log (user1_id, user2_id, winner, won_xp, date)
                                       VALUES ('$uuuser_id', '$op_id', '$winner', '$xp', now());";
               $query = mysqli_query($connect, $sql);

            }
         } else if(isset($_POST['not_correct'])) {
            if (!isset($_GET['answer'])) {
               $sql = "UPDATE q SET temp_points = 0 WHERE (user_1 = '$uuuser' AND user_2 = '$op')";
               $query = mysqli_query($connect, $sql);
               echo 'You didn\'t answered correctly. Please wait for you opponent to play the match. If he don\'t answer correct to the question too, there will be no winner.';
            } else {
               $points = mysqli_query($connect, "SELECT * FROM q WHERE (user_1 = '$op' AND user_2 = '$uuuser')")->fetch_assoc()['temp_points'];
               echo $points;

               $sql = "DELETE FROM q WHERE (user_2 = '$uuuser' AND user_1 = '$op')";
               $query = mysqli_query($connect, $sql);

               $uuuser_id = mysqli_query($connect, "SELECT id FROM users WHERE nickname = '$uuuser'")->fetch_assoc()['id'];

               $op_id = mysqli_query($connect, "SELECT id FROM users WHERE nickname = '$op'")->fetch_assoc()['id'];

               if ($points == 1) {
                  $winner = $op_id;
               } else {
                  $winner = 0;
               }

               $xp = 2*rand(5, 30);

               $current_xp_1 = mysqli_query($connect, "SELECT xp FROM users WHERE id = '$uuuser_id'")->fetch_assoc()['xp'];
               $current_xp_2 = mysqli_query($connect, "SELECT xp FROM users WHERE id = '$op_id'")->fetch_assoc()['xp'];

               if ($winner == 0) {
                  $new_xp = ($xp) + $current_xp_1;
                  $new_xp2 = $xp + $current_xp_2;
               } else {
                  $new_xp = $current_xp_1 - $xp;
                  $new_xp2 = $current_xp_2 + $xp;
               }

               $sql = "UPDATE users SET xp='$new_xp' WHERE id='$uuuser_id'";
               $query = mysqli_query($connect, $sql);

               $sql = "UPDATE users SET xp='$new_xp2' WHERE id='$op_id'";
               $query = mysqli_query($connect, $sql);

               $sql = "INSERT INTO battle_log (user1_id, user2_id, winner, won_xp, date)
                                       VALUES ('$uuuser_id', '$op_id', '$winner', '$xp', now());";
               $query = mysqli_query($connect, $sql);
            }
         } else {
            if (strtolower($_GET['attack']) != strtolower($_SESSION['username'])) {
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
                  displayTheArena();
               } else {
                  echo 'You already have set up challenge versus this player.';
               }
            } else {
               echo 'Sorry, we are against masochism...';
               echo "<br>...but you may punch yourself in the face :)";
            }
         }
      } else {
         $zeuser = $_SESSION['username'];
         $sql = "SELECT * FROM q WHERE user_2='$zeuser'";
         $query = mysqli_query($connect, $sql);
         $zecount = mysqli_num_rows($query);
         if ($zecount > 0) {
            echo "o:::::::[]========><br>";
            echo "Those players challenge you to play versus them!<br>";
            while($row = $query->fetch_assoc()){
               echo '<a href="battlesequence.php?answer=y&attack='. $row['user_1'] . '">'.  $row['user_1'] . '</a><br>';
            }
         }
         echo '<div class="title">Choose an opponent:</div>
         		<ul class="displayOpt">
         			<li class="opt"><a href="battlesequence.php?byname">By Name</a></li>
         			<li class="opt"><a href="battlesequence.php?rand">Random</a></li>
         			<li class="opt"><a href="battlesequence.php?xp">By XP</a></li>
         		</ul>';

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
   function displayTheArena(){
      echo '
         <div class="content">
            <div class="player">
               <div class="profile-photo">
                  <div class="username">username</div>
               </div>

               <div class="score">
                  <div class="point"></div>
                  <div class="point"></div>
                  <div class="point"></div>
                  <div class="point"></div>
                  <div class="point"></div>
               </div>
            </div>

            <p>VS</p>

            <div class="player">
               <div class="profile-photo">
               <div class="username">username</div>
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
            <div class="line"></div>

            <div class="q">
               Is this question?
            </div>

            <div class="line"></div>
            <div data="yes" class="a a1 correct" onClick="check(); getAnswer(this)" id>
               No.
            </div>

            <div data="no" class="a a2 notcorrect" onClick="check(); getAnswer(this)">
               Yes.
            </div>

            <div class="line" style="margin-top: 50px;"></div>
            <div data="no" class="a a3 notcorrect" onClick="check(); getAnswer(this)">
               Probably.
            </div>

            <div data="no" class="a a4 notcorrect" onClick="check(); getAnswer(this)">
               Is this the best question you can think of?
            </div>

         </div>';
      }//Display the arena function used if two users are challenged
?>

<script>
   //The containers of the DOM elements
   let answer = document.getElementsByClassName('correct');
   let options = document.getElementsByClassName('a');
   //variables to use for seeing if the player gave the correct answer
   let correct = false;

   function check(){
      for (op of options) {
         op.style.b ackground = "red";
      }
      answer[0].style.background = "green";
   }
</script>

<form id="correct_form" action="#" method="post">
   <input type="hidden" name="correct" value="1">
</form>

<form id="not_correct_form" action="#" method="post">
   <input type="hidden" name="not_correct" value="2">
</form>

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
