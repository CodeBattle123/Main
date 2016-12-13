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
         if (isset($_GET['opponent'])) {
            $opponent = $_GET['opponent'];

            $sql = "SELECT * FROM users WHERE nickname = '$opponent'";
            $query = mysqli_query($connect, $sql);

            while($row = $query->fetch_assoc()){
               echo "Selected opponent: ";
               echo ucfirst($row['first_name']) . ' \'' . $row['nickname'] . '\' ' . ucfirst($row['last_name']);
               echo ' from team ' . $row['clan'];

               echo '<br><a href="battlesequence.php?attack='. $row['nickname'] . '">Attack this player!</a><br>';
            }
         } elseif (isset($_GET['attack'])) {
            if (strtolower($_GET['attack']) != strtolower($_SESSION['username'])) {
               if (!isset($_GET['answer'])) {
                  $uuuser = $_SESSION['username'];
                  $op = $_GET['attack'];
                  $sql = "INSERT INTO q (user_1, user_2) VALUES ('$uuuser','$op')";
                  $query = mysqli_query($connect, $sql);
               }

               displayTheArena();
            } else {
               echo 'Sorry, we are against masochism...';
               echo "<br>...but you may punch yourself in the face :)";
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

            echo '<div class="">Chose an opponent:</div>';
            $sql = "SELECT * FROM users";
            $query = mysqli_query($connect, $sql);

            echo '<table><tr>';
            $counter = 0;

            while($row = $query->fetch_assoc()){
               if (strtolower($row['nickname']) == strtolower($_SESSION['username'])) {
                  // THIS CHECK IF THE USER
                  // THAT YOU ATTACK
                  // IS THE CURRENTLY
                  // LOGGED USER
                  continue;
               }
               $counter++;
               echo '<td><a href="battlesequence.php?opponent='. $row['nickname'] . '">'.$row['nickname'].'</a></td>';
               if ($counter == 4) {
                  $counter = 0;
                  echo '</tr><tr>';
               }
            }
            echo '</tr></table>';
         }
      ?>
   </div>

   <?php function displayTheArena(){
      echo '<div class="content">
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
            <div data="yes" class="a a1 correct" onClick="check(); getAnswer(this)">
               No.
            </div>

            <div data="no" class="a a2" onClick="check(); getAnswer(this)">
               Yes.
            </div>

            <div class="line" style="margin-top: 50px;"></div>
            <div data="no" class="a a3" onClick="check(); getAnswer(this)">
               Probably.
            </div>

            <div data="no" class="a a4" onClick="check(); getAnswer(this)">
               Is this the best question you can think of?
            </div>

         </div>';
   }?>

   <script>
      //The containers of the DOM elements
	  let answer = document.getElementsByClassName('correct');
	  let options = document.getElementsByClassName('a');
	  //variables to use for seeing if the player gave the correct answer
	  let correct = false;

     function check(){
		  for (op of options) {
		  	op.style.background = "red";
		  }
		  answer[0].style.background = "green";
	  }

   function getAnswer(elem) {
      if (elem.getAttribute("data") == "yes") {
         alert("shte si hodq");
         <?php
            if (!isset($_GET['answer'])) {
               $sql = "UPDATE q SET temp_points = 1222222 WHERE (user_1 = '$uuuser' AND user_2 = '$op') LIMIT 1";
               $query = mysqli_query($connect, $sql);
            }
         ?>
         console.log("won");
      }

      if (elem.getAttribute("data") != "yes") {
         alert("sht8t4387g387y8734 hodq");
         <?php
           if (!isset($_GET['answer'])) {
               $sql = "UPDATE q SET temp_points = 123 WHERE (user_1 = '$uuuser' AND user_2 = '$op') LIMIT 1";
               $query = mysqli_query($connect, $sql);
            }
         ?>
         console.log("lost");
      }
   }
   </script>
</div>

<?php include 'footer.html' ?>

</body>
</html>
