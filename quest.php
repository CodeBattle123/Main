<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <link rel="stylesheet" href="styles/sidebar.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/example-quest-style.css">
	<script src="scripts/post.js"></script>
	<script src="scripts/timer.js"></script>
    <meta charset="UTF-8">
    <title>Quests</title>

</head>

<body>
<?php 
	include 'header.php';
	CheckIfLogged();
    $level = $_GET['level'];
    include_once ('scripts/questPage.php');
?>

<div class="wrapper">
    <?php
        if ($passed == true){
            echo '<li>Already passed</li>';
        }
        else{
            echo '
        <div class="questContainer">
        <h1 class="langName">Test Your <span><?=$langTitle?></span> Skills</h1>
        <h3 class="level">Level ' . $progressToScreen . '/5</h3>
		<hr>
        <h4 class="objective"><?= $objective?></h4>
       <div class="codeContainer">
			<div class="container">
            <pre class="quest">';
                foreach ($code as $line) {
                    echo $line;
                }
        echo '
            </pre>
			</div>

            <div id="counter">
                <br><input type="button" class="checkButton" id="submitQuest" value="check"><br>
                <span id="result"  onload="reveal()">Result: </span>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
	var line = "";
    let inputs = document.getElementsByClassName("input");
	var finished = true;

    for(item of inputs) {
        item.style.width = (item.maxLength * 19) + "px";
    }

	let result = true;
	let answers = [];
	</script>';

        }
    ?>

	<?php foreach ($answers as $answer): ?>
		<script type="text/javascript">
			line = "<?php echo $answer ?>";
			answers.push(line);
		</script>
	<?php endforeach; ?>

	<script>
	let fields = document.getElementsByClassName("quest");

    function CalcResult() {
		let fieldIterator = 1;

		<?php foreach ($answers as $answer): ?>
			if (fields[fieldIterator].value != "<?= $answer?>") {
				result = false;
			}
			fieldIterator++;
        <?php endforeach; ?>

        if (result == true) {
            finished = true;
			return correct;
        }
        else {
            finished = true;
            return wrong;
        }
    }

	var correct = "<span style='display:block; color:green;'> <img style='width: 50%' src='images/nakov-correct.png' alt='Correct'></span>";
	var wrong = "<span style='display:block; color:red;'> <img style='width: 50%' src='images/nakov-wrong.png' alt='Wrong'></span>";


//Start show and start timer
	setTimeout(function () {
		window.onload = countdown();
		finished = false;
	}, 1500);

    $(document).keypress(function (k) {
        if (k.which == 13) {
			setTimeout(function () {
				if (CalcResult() == correct) {
					post("scripts/passQuest.php", {language: '<?=$langSQL?>', user_id: '<?=$log_id?>', lang: '<?=$_GET['lang']?>', level: '<?=$level?>'});
				}
			}, 3000);

            document.getElementById('submitQuest').style.boxShadow = "none";
			document.getElementById('submitQuest').style.top = "10px";

			setTimeout(function () {
				if (finished == true) {
					document.getElementById('submitQuest').style.boxShadow = "0px 10px 0px rgb(110, 110, 110)";
					document.getElementById('submitQuest').style.top = "0px";
					return;
				}

				document.getElementById('submitQuest').style.boxShadow = "0px 10px 0px rgb(110, 110, 110)";
				document.getElementById('submitQuest').style.top = "0px";
				document.getElementById('result').innerHTML = document.getElementById('result').innerHTML + CalcResult();
			}, 100);
        }
    });

    $('#submitQuest').click( function () {
		setTimeout(function () {
			if (CalcResult() == correct) {
				post("scripts/passQuest.php", {language: '<?=$langSQL?>', user_id: '<?=$log_id?>', lang: '<?=$_GET['lang']?>'});
			}
		}, 3000);

		document.getElementById('submitQuest').style.boxShadow = "none";
		document.getElementById('submitQuest').style.top = "10px";

		setTimeout(function () {
			if (finished == true) {
				document.getElementById('submitQuest').style.boxShadow = "0px 10px 0px rgb(110, 110, 110)";
				document.getElementById('submitQuest').style.top = "0px";
				return;
			}

			document.getElementById('submitQuest').style.boxShadow = "0px 10px 0px rgb(110, 110, 110)";
			document.getElementById('submitQuest').style.top = "0px";
			document.getElementById('result').innerHTML = document.getElementById('result').innerHTML + CalcResult();
		}, 100);
    });

        </script>
    </div>

<?php include_once('footer.html'); ?>
</body>
</html>