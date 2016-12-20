<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
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
            $sql = "SELECT * FROM clan_ranking";
            $query = mysqli_query($connect, $sql);
            $rank = 1;
            while($row = $query->fetch_assoc()) {
                echo '<tr>
		            <td><img class="clanpic" src="clan-pics/'. $row['name'] . ".png" .'"/></td>
		            <td>#<b>' . $rank . '</b></td>
		            <td><a class="name" target="_blank" href="clanPage.php?clan=' . $row['name'] . '">' . $row['name'] . '</td>
		            <td>' . $row['total'] . '</td>
               </tr>
               ';
                $rank++;
            }
            ?>

    </table>

</div>

<?php if (!$logged): ?>
	<style>
		.wrapper {
			width: 100%;
		}
	</style>
<?php endif; ?>
<?php include_once('footer.html'); ?>
</body>
</html>
