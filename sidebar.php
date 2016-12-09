<?php
    if ($logged) {
        echo '<div class="sidebar">
            <ul class="sidebar_container" id="sidebarList">
                <li><a href="index.php" class="link">Home</a></li>
                <li><a href="choose-language.php" class="link">Quests</a></li>
                <li><a href="battlesequence.php" class="link">Battle arena</a></li>
                <li><a href="ranking.php" class="link">Rankings</a></li>
                <li><a href="clanPage.php" class="link">Clan</a></li>
                <li><a href="clan-rankings.php" class="link">Clan rankings</a></li>
                <li><a href="profile.php?user=' . $_SESSION['username'] . '" class="link">Profile</a></li>
                <li><a href="AboutUs.php" class="link">About</a></li>
                <li><a href="contactus.php" class="link">Contact us</a></li>
            </ul>
        </div>';
    } else {
        echo '<div class="sidebar">
            <ul class="sidebar_container" id="sidebarList">
                <li><a href="index.php" class="link">Home</a></li>
                <li><a href="ranking.php" class="link">Rankings</a></li>
                <li><a href="clan-rankings.php" class="link">Clan rankings</a></li>
                <li><a href="AboutUs.php" class="link">About</a></li>
                <li><a href="contactus.php" class="link">Contact us</a></li>
            </ul>
        </div>';
    }
