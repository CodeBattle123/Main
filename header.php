<?php
    include_once('db/connect.php');
?>

<header>
   <a href="index.php"><img src="images/Logo.svg" alt="hlogo" class="logo"/></a>
   <h1 class="header-title">CodeBattles</h1>

   <div class="nav">
      <ul id="list">
         <li><a href="login.php" class="tab">Login</a></li>
         <li><a href="register.php" class="tab">Register</a></li>
      </ul>
   </div>
</header>
<?php
    include_once('sidebar.html');
?>
