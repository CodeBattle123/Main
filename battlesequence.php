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
            displayTheArena();
         } else {
            echo '<div class="">Chose an opponent:</div>';
            $sql = "SELECT * FROM users LIMIT 10";
            $query = mysqli_query($connect, $sql);

            while($row = $query->fetch_assoc()){
               echo '<a href="battlesequence.php?opponent='. $row['nickname'] . '">'.$row['nickname'].'</a><br>';
            }
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
	  
	  function getAnswer(elem) {
		  if (elem.getAttribute("data") == "yes") {
			  correct = true;
		  }
		  else {
			  correct = false;
		  }
	  }
	  
	  function check(){
		  for (op of options) {
		  	op.style.background = "red";
		  }
		  answer[0].style.background = "green";
	  }
	  
   </script>
</div>

<?php include 'footer.html' ?>

</body>
</html>
