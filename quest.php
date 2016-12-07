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
<?php
	//Open file
	function OhMyGod(){
		echo "Jesus Help Us.";
	}

	// Variable to store the way we will take the language progress from the database.
	$langModeled = "";

	switch ($_GET['lang']) {
		case 'csharp':
			$langModeled = "CSharp";
			break;
		case 'cpp':
			$langModeled = "CPP";
			break;
		case 'java':
			$langModeled = "Java";
			break;
		case 'javascript':
			$langModeled = "JS";
			break;
		case 'php':
			$langModeled = "PHP";
			break;
		case 'ruby':
			$langModeled = "Ruby";
			break;
		case 'python':
			$langModeled = "Python";
			break;
		case 'swift':
			$langModeled = "Swift";
			break;
	}

	//Get language progress
	$sql = "SELECT * FROM language_progress WHERE user_id=$log_id";
	$result = mysqli_query($connect, $sql)->fetch_assoc();

	$objective = "";
	if ($quest = fopen('Quests\\' . $_GET['lang']. "\\" . $result[$langModeled] . '_obj.txt', "r")) {
		$objective = fgets($quest);
		fclose($quest);
	} else OhMyGod();

	$code = array();
	if ($quest = fopen('Quests\\' . $_GET['lang']. "\\" . $result[$langModeled] .'_code.txt', "r")) {
		while (!feof($quest)) {
			$line = fgets($quest);
			array_push($code, $line);
		}
		fclose($quest);
	} else OhMyGod();

	$answers = array();
	$answersLength = array();
	if ($quest = fopen('Quests\\' . $_GET['lang']. "\\" . $result[$langModeled] . '_ans.txt', "r")) {
		while (!feof($quest)) {
			$line = fgets($quest);
			array_push($answers, trim($line));
		}
		fclose($quest);
	} else OhMyGod();

	for ($i=0; $i < count($answers); $i++) {
		$length = strlen(trim($answers[$i]));
		array_push($answersLength, $length);
	}

	$answerLengthIterator = 0;
	for ($i=0; $i < count($code); $i++) {
		if (substr_count($code[$i], '{option}') != 0) {
			$code[$i] = str_replace('{option}', '<input type="text" id="quest-input" class="input" maxlength="' . $answersLength[$answerLengthIterator] . '" />', $code[$i]);
			$answerLengthIterator = $answerLengthIterator + 1;
		}
	}
?>

<div class="wrapper">
    <div class="questContainer">
        <h1 class="langName">Test Your <span><?= $_GET['lang']?></span> Skills</h1>
        <h3 class="level">Level <?=$result[$langModeled]?>/10</h3>
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
        item.style.width = (item.maxLength * 15) + 'px';
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
	let fields = document.getElementsByClassName('quest-input');

    function CalcResult() {
		let fieldIterator = 0;
        <?php foreach ($answers as $answer): ?>
		if (!(fields[fieldIterator].innerHTML) == "<?= $answer?>") {
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
