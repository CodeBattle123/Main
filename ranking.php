<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Ranking</title>
      <link rel="stylesheet" href="styles/main.css" >
      <link rel="stylesheet" href="styles/headerAndFooter.css" >
      <link rel="stylesheet" href="styles/sidebar.css" >
	  <link rel="stylesheet" href="styles/ranking.css" >
   </head>
   <body>
      <?php include_once('header.php'); ?>

      <div class="wrapper">
         <table>
            <tr>
                <td></td>
                <td><h4>Rank:</h4></td>
               <td>
                  <h4>Name:</h4>
              </td>
              <td>
                  <h4>Exp:</h4>
              </td>

               <td>
                  <h4>Clan:</h4>
              </td>
              <tr>

<?php
    $sql = "SELECT * FROM users";
    $query = mysqli_query($connect, $sql);
    while($row = $query->fetch_assoc()){
        echo '<tr>
            <td><img src="images/footer_github.png" style="height: 30px; margin-left: 5px;"/></td>
            <td>#<b>' . $row['id'] . '</b></td>
            <td>
                <h4 class="name">' . $row['nickname'] . '</h4>
            </td>
                <td>
                <h4 class="exp">' . $row['xp'] . '</h4>
                </td>
            <td>
               <h4>Scrubs</h4></td>
               </tr>';
    }
?>
</table>

      </div>

      <?php include_once('footer.html'); ?>
   </body>
</html>
