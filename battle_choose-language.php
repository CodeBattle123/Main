<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-16">
    <title>About us</title>
    <link rel="stylesheet" type="text/css" href="styles/headerAndFooter.css">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <link rel="stylesheet" type="text/css" href="styles/battle_choose-language.css">
    <link rel="stylesheet" type="text/css" href="styles/sidebar.css">
    <link rel="icon" type="image/png" href="images/icon.png"/>
</head>
<body>
<?php include 'header.php' ?>

<div class="wrapper">
    <h1>Play against other players!</h1>
    <h2>Choose a language</h2>
    <select>
        <option value=""></option>
        <option value="c#">C#</option>
        <option value="c++">C++</option>
        <option value="java">Java</option>
        <option value="javascript">Javascript</option>
        <option value="php">PHP</option>
        <option value="ruby">Ruby</option>
        <option value="python">Python</option>
    </select>
    <h2>Choose a difficulty</h2>
    <select>
        <option value="easy">Easy</option>
        <option value="medium">Medium</option>
        <option value="hard">Hard</option>
    </select>
    <input type="submit" value="PLAY" class="btn">

</div>


<?php include 'footer.html'?>
</body>
</html>
