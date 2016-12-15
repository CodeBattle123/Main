<?php
   function iHateJavaScriptSoMuch() {
      $uuuser1 = $GLOBALS['uuuser'];
      $op1 = $GLOBALS['op'];
      $connect1 = $GLOBALS['connect'];

      if (!isset($_GET['answer'])) {
         $sql = "UPDATE q SET temp_points = 1 WHERE (user_1 = '$uuuser1' AND user_2 = '$op1')";
         $query = mysqli_query($connect1, $sql);
      } else {
         $sql = "DELETE FROM q WHERE (user_2 = '$uuuser1' AND user_1 = '$op1')";
         $query = mysqli_query($connect1, $sql);

         $uuuser_id = mysqli_query($connect1, "SELECT id FROM users WHERE nickname = '$uuuser'")->fetch_assoc()['id'];

         $op_id = mysqli_query($connect1, "SELECT id FROM users WHERE nickname = '$op'")->fetch_assoc()['id'];

         $sql = "INSERT INTO battle_log (user1_id, user2_id, winner, won_xp, date)
                                 VALUES ('$uuuser_id', '$op_id', '0', '238479', now());";
         $query = mysqli_query($connect1, $sql);
      }
   }

   function iHateJavaScriptSoMuch2() {
      $uuuser1 = $GLOBALS['uuuser'];
      $op1 = $GLOBALS['op'];
      $connect1 = $GLOBALS['connect'];

      if (!isset($_GET['answer'])) {
         $sql = "UPDATE q SET temp_points = 0 WHERE (user_1 = '$uuuser1' AND user_2 = '$op1' AND temp_points <> 1)";
         $query = mysqli_query($connect1, $sql);
      }
   }
?>
