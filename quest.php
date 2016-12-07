<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <link rel="stylesheet" href="styles/sidebar.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/example-quest-style.css">
    <meta charset="UTF-8">
    <title>Quests</title>

</head>
<body>
<?php include 'header.php' ?>

<?php include 'scripts\questPage.php'; ?>

<div class="wrapper">
    <div class="questContainer">
        <h1 class="langName">Test Your <span><?=$langTitle?></span> Skills</h1>
        <h3 class="level">Level <?=$result[$langSQL]?>/10</h3>
		<hr>
        <h4 class="objective"><?= $objective?></h4>
       <div class="codeContainer">
			<div class="container">
            <pre class="quest">
<?php foreach ($code as $line): ?>
<?php echo $line; ?>
<?php endforeach; ?>
            </pre>
			</div>

            <div id="counter">
                <br><input type="button" class="checkButton" id="submitQuest" value="check"><br>
                <span id="result">Result: </span>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
	var line = "";

    let inputs = document.getElementsByClassName('input');

	var finished = true;

    for(item of inputs) {
        item.style.width = (item.maxLength * 19) + 'px';
    }

	let result = true;
	let answers = [];
	</script>

	<?php foreach ($answers as $answer): ?>
	<script type="text/javascript">
		line = "<?php echo $answer ?>";
		answers.push(line);
	</script>
	<?php endforeach; ?>

	<script>
	let fields = document.getElementsByClassName('quest');

    function CalcResult() {
		let fieldIterator = 1;

		<?php foreach ($answers as $answer): ?>
		if (fields[fieldIterator].value != "<?= $answer?>") {
			result = false;
			console.log("This should have said wrong." + fields[fieldIterator].value);
		}
		fieldIterator++;
        <?php endforeach; ?>

        if (result == true) {
			console.log("This should have said correct");
            finished = true;
			<?php 
			$sql = 'UPDATE language_progress SET $langSQL=($result[' . $langSQL . '] + 1) WHERE user_id=$log_id'; 
			mysqli_query($connect, $sql);
			?>
            return correct;
        }
        else {
            finished = true;
            return wrong;
        }
    }

	function countdown() {
		var seconds = 60;
		function tick() {
			var counter = document.getElementById("counter");
			seconds--;

			counter.innerHTML = "0:" + (seconds < 10 ? "0" : "") + String(seconds)
			+"<br><input type='button' class='checkButton' id='submitQuest' value='check'><br><span id='result'>Result: </span>";

			if (seconds > 0) {
				let t = setTimeout(tick, 1000);
				$('#submitQuest').click(function () {
					clearTimeout(t);
				});
				$(document).keypress(function (k) {
					if (k.which == 13) {
						clearTimeout(t);
					}
				});
			} else {
				alert("Game over");
			}
		}
		tick();
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

<?php include_once('footer.html'); ?>
</body>
</html>