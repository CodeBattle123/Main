<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Clan Page</title>
      <link rel="stylesheet" href="styles/headerAndFooter.css">
      <link rel="stylesheet" href="styles/sidebar.css" media="screen" title="no title">
      <link rel="stylesheet" href="styles/clanPage.css" media="screen" title="no title">
   </head>
   <body>
      <?php include_once ('header.php'); ?>

      <main>
         <div class="clanAvatarHolder"></div>

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
               <li class="member">User<a href="#">View Profile</a></li>
               <li class="member">User<a href="#">View Profile</a></li>
               <li class="member">User<a href="#">View Profile</a></li>
               <li class="member">User<a href="#">View Profile</a></li>
               <li class="member">User<a href="#">View Profile</a></li>
               <li class="member">User<a href="#">View Profile</a></li>
            </ul>

            <div class="clanChat">
               <ul>
                  <li class="chatLog"><span class="user">Sam</span><span class="message">Greetins!</span></li>
                  <li class="chatLog"><span class="user">Sam</span><span class="message">Greetins!</span></li>
                  <li class="chatLog"><span class="user">Sam</span><span class="message">Greetins!</span></li>
                  <li class="chatLog"><span class="user">Sam</span><span class="message">Greetins!</span></li>
                  <li class="chatLog"><span class="user">Sam</span><span class="message">Greetins!</span></li>
                  <li class="chatLog"><span class="user">Sam</span><span class="message">Greetins!</span></li>
                  <li class="chatLog"><span class="user">Sam</span><span class="message">Greetins!</span></li>
                  <li class="chatLog"><span class="user">Sam</span><span class="message">Greetins!</span></li>
                  <li class="chatLog"><span class="user">Sam</span><span class="message">Greetins!</span></li>
                  <li class="chatLog"><span class="user">Sam</span><span class="message">Greetins!</span></li>
                  <li class="chatLog"><span class="user">Sam</span><span class="message">Greetins!</span></li>
               </ul>

               <div class="messageInput">
                  <input class="input" type="text" name="text" placeholder="Enter your message here.">
                  <input type="Submit" name="submit" value="Submit">
               </div>
            </div>

         </div>
      </main>

      <?php include_once ('footer.html') ?>
   </body>
</html>
