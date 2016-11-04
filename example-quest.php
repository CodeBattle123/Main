<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/headerAndFooter.css">
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <link rel="stylesheet" href="styles/example-quest-style.css">
    <meta charset="UTF-8">
    <title>quests</title>
</head>
<body>
<?php include_once('header.html'); ?>

<div id="ex-quest-outer">

    <h1 id="ex-quest-h1">Test Your Ruby Skills</h1>
    <h3 id="ruby-level-h3">Level <span id="ruby-level">1</span>/10</h3>
    <div id="ruby-timer-level-1"></div>

    <div id="ex-quest-div">

        <div style="margin-left: 10%;padding-top: 5%">

        <h4 id="ex-quest-h4">Fill Blanks to Print Numbers 1 to 10 </h4>

        <p id="ex-quest-p">
            &ltirb&gt <br>
            <br>
            i=1 <br>
            <input type="text" id="ex-quest-input-1" class="inputs-demo" style="width: 60px"> i<11 <br>
            <input type="text" id="ex-quest-input-2" class="inputs-demo" style="width: 60px"> "i: ", i ,"\n" <br>
            i <input type="text" id="ex-quest-input-3" class="inputs-demo" style="width: 60px"> 1 <br>
            end <br>
            <br>


            &lt/irb&gt
        </p>

        <input type="button" id="btn-submit-quest-example" value="check"> <br>

       Result: <span id="example-quest-result"></span>
    </div>
    </div>
</div>

<script>
    $('#btn-submit-quest-example').click(function () {
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

            document.getElementById('example-quest-result').textContent = result;

        });

</script>

<?php include_once('footer.html'); ?>
</body>
</html>
