<?php
   if ($logged) {
      echo '<div class="sidebar">
      <ul class="sidebar_container" id="sidebarList">
	  <li><a href="profile.php?user=' . $_SESSION['username'] . '" class="link">Profile</a></li>
      <li><a href="choose-language.php" class="link">Quests</a></li>
      <li><a href="battlesequence.php" class="link">Battle arena';

      $zeuser = $_SESSION['username'];
      $sql = "SELECT id FROM q WHERE user_2='$zeuser'";
      $query = mysqli_query($connect, $sql);
      $zecount = mysqli_num_rows($query);
      if ($zecount > 0) {
         echo ' (' . $zecount . ')';
      }

      echo '</a></li>
      <li><a href="ranking.php" class="link">Rankings</a></li>
      <li><a href="make-clan.php" class="link">Clan</a></li>
      <li><a href="clan-rankings.php" class="link">Clan rankings</a></li>
      <li><a href="AboutUs.php" class="link">About</a></li>
      <li><a href="contactus.php" class="link">Contact us</a></li>
      </ul>
      </div>';
   }
?>
