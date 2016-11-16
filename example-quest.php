<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <link rel="stylesheet" href="styles/example-quest-style.css">
    <link rel="stylesheet" href="styles/sidebar.css">
    <link rel="stylesheet" href="styles/main.css">
    <meta charset="UTF-8">
    <title>quests</title>
</head>
<body>
<?php include 'header.php' ?>
<?php include 'sidebar.html' ?>
<div class="wrapper">
    <h1 class="langName">Test Your Ruby Skills</h1>
    <h3 class="level">Level 1/10</h3>

    <div class="questContainer">
            <h4 class="objective">Fill Blanks to Print Numbers 1 to 10 </h4>
            <div id="counter"></div>
            <pre class="quest">
                <span>i=1</span><!-- <span>&lt;irb&gt;</span> -->
                <input type="text" id="ex-quest-input-1" class="input" style="width: 60px" ><span>i<11</span></input>
                <input type="text" id="ex-quest-input-2" class="input" style="width: 60px" cols="3"><span>"i: ", i ,"\n"</span></input>
                <span>i</span><input type="text" id="ex-quest-input-3" class="input" style="width: 60px" ><span>1</span></input>
                <span>end</span><!-- <span>&lt;/irb&gt;</span> -->
            </pre>

            <input type="button" id="btn-submit-quest-example" value="check"> <br>
            Result: <span id="result"></span>
    </div>
</div>

<script>
    function countdown() {
        var seconds = 60;
        function tick() {
            var counter = document.getElementById("counter");
            seconds--;
            counter.innerHTML = "0:" + (seconds < 10 ? "0" : "") + String(seconds);
            if (seconds > 0) {
                let t = setTimeout(tick, 1000);
                $('#btn-submit-quest-example').click(function () {
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
    function CalcResult() {
        let i1 = $("#ex-quest-input-1").val();
        let i2 = $("#ex-quest-input-2").val();
        let i3 = $("#ex-quest-input-3").val();
        let result = true;
        if (i1 != "while") {
            result = false;
        }
        if (i2 != "print" && i2 != "puts") {
            result = false;
        }
        if (i3 != "+=") {
            result = false;
        }
        return result;
    }
    window.onload = countdown();
    $(document).keypress(function (k) {
        if (k.which == 13) {
            document.getElementById('example-quest-result').textContent = CalcResult();
        }
    });
    $('#btn-submit-quest-example').click(function () {
        document.getElementById('example-quest-result').textContent = CalcResult();
    });
</script>

<?php include_once('footer.html'); ?>
</body>
</html>
