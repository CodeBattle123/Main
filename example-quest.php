	<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <link rel="stylesheet" href="styles/sidebar.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/example-quest-style.css">
    <script>
        function play(audio){
            var win = document.getElementById("win");
            var loss = document.getElementById("loss");
            audio.play();
        }
    </script>


    <meta charset="UTF-8">
    <title>Quests</title>

</head>
<body>
<?php include 'header.php' ?>

<div class="wrapper">
    <audio id="win" src="audio/nakov-correct.wav" ></audio>
    <audio id="loss" src="audio/nakov-wrong.mp3" ></audio>

    <div class="questContainer">
        <h1 class="langName">Test Your <span>Ruby</span> Skills</h1>
        <h3 class="level">Level 1/10</h3>
        <hr>
        <h4 class="objective">Fill Blanks to Print Numbers 1 to 10</h4>
       <div class="codeContainer">
			<div class="container">
            <pre class="quest">
<span>i=1</span>
<input type="text" id="ex-quest-input-1" class="input" maxlength="5"><span> i&lt;11 </span></input>
	<input type="text" id="ex-quest-input-2" class="input" maxlength="5"><span>"i: ", i ,"\n"</span></input>
	<span>i</span><input type="text" id="ex-quest-input-3" class="input" maxlength="2"><span>1</span></input>
<span>end</span>
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
    let inputs = document.getElementsByClassName('input');

	var finished = true;

    for(item of inputs) {
        item.style.width = (item.maxLength * 15) + 'px';
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

    function CalcResult() {

        let i1 = $("#ex-quest-input-1").val();
        let i2 = $("#ex-quest-input-2").val();
        let i3 = $("#ex-quest-input-3").val();
        let result = true;

        if (i1.toLowerCase() != "while") {
            result = false;
        }
        if (i2.toLowerCase() != "print") {
            result = false;
        }
        if (i3.toLowerCase() != "+=") {
            result = false;
        }

        if (result == true) {
            finished = true;
            play(win);
            return correct;
        }
        else {
            finished = true;
            play(loss);
            return wrong;
        }
    }

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
