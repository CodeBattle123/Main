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

    <div id="ex-quest-div">

        <h4 id="ex-quest-h4">Fill Blanks to Print Numbers 0 to 10</h4>

        <p id="ex-quest-p">
            &ltirb&gt <br>
            <br>
            i=
            <input type="text" id="ex-quest-input-1" class="inputs-demo"> <br>
            while i < <input type="text" id="ex-quest-input-2"  class="inputs-demo">> <br>
            print "i: ", i ,"\n" <br>
            i <input type="text" id="ex-quest-input-3"  class="inputs-demo"> <br>
            end <br>
            <br>


            &lt/irb&gt
        </p>

        <input type="button" id="btn-submit-quest-example" value="check" onclick="checkResultDemo()"> <br>

        <span id="example-quest-result"></span>

    </div>
</div>

<script>
    function checkResultDemo(){

        let inpt = $("#ex-quest-input-1").text();

        if(inpt!="aaa"){
            alert("hahah");
        }
    }
</script>

<?php include_once('footer.html'); ?>
</body>
</html>
