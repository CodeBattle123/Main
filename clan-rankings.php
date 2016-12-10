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
        <tr>

            <?php
            $sql = "SELECT * FROM teams";
            $query = mysqli_query($connect, $sql);
            $user = $_SESSION['username'];

            while($row = $query->fetch_assoc()){
                $clanname = $row['name'];
                $query1 = mysqli_query($connect, "SELECT SUM(xp) AS totalxp FROM users WHERE clan = '$clanname' LIMIT 1");
                $row1 = mysqli_fetch_assoc($query1);
                $sum = $row1['totalxp'];
                if (!isset($sum)) {
                    $sum = 0;
                }

                mysqli_query($connect, "UPDATE teams SET xp ='$sum' WHERE name = '$clanname' LIMIT 1");

            }
            ?>

            <?php
            $sql = "SELECT * FROM clan_ranking";
            $query = mysqli_query($connect, $sql);
            $rank = 1;
            while($row = $query->fetch_assoc()) {
                echo '<tr>
		            <td><img src="images/footer_github.png" style="height: 30px; margin-left: 5px;"/></td>
		            <td>#<b>' . $rank . '</b></td>
		            <td>' . $row['name'] . '</td>
		            <td>' . $row['xp'] . '</td>
               </tr>
               ';
                $rank++;
            }

            ?>

    </table>

</div>

<?php include_once('footer.html'); ?>
</body>
</html>
