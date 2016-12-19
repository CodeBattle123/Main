<?php

include_once 'db/login_status.php';
// Variable to store the way we will take the language progress from the database.

$langSQL = "";
$level=$_GET['level'];
$passed = false;

switch ($_GET['lang']) {
	case 'csharp':
		$langSQL = "CSharp";
		break;
	case 'cpp':
		$langSQL = "CPP";
		break;
	case 'java':
		$langSQL = "Java";
		break;
	case 'javascript':
		$langSQL = "JS";
		break;
	case 'php':
		$langSQL = "PHP";
		break;
	case 'ruby':
		$langSQL = "Ruby";
		break;
	case 'python':
		$langSQL = "Python";
		break;
	case 'swift':
		$langSQL = "Swift";
		break;
}

$sql = "SELECT * from language_progress WHERE user_id = $log_id";
$query= mysqli_query($connect,$sql);
$result= $query->fetch_assoc();
$progress = $result[$langSQL];
$progressToScreen = ($progress % 5);
if ($progressToScreen == 0)
    $progressToScreen = 5;

if ($progress > intval($level) * 5){
    $passed = true;
}

$langTitle = "";

switch ($langSQL) {
	case 'CSharp':
		$langTitle = "C#";
		break;
	case 'CPP':
		$langTitle = "C++";
		break;
	case 'Java':
		$langTitle = "Java";
		break;
	case 'JS':
		$langTitle = "JavaScript";
		break;
	case 'PHP':
		$langTitle = "PHP";
		break;
	case 'Ruby':
		$langTitle = "Ruby";
		break;
	case 'Python':
		$langTitle = "Ruby";
		break;
	case 'Swift':
		$langTitle = "Swift";
		break;
}

//Open file
function OhMyGod(){
	echo "Jesus Help Us.";
}

//Get language progress
$sql = "SELECT * FROM language_progress WHERE user_id=$log_id";
$result = mysqli_query($connect, $sql)->fetch_assoc();

$objective = "";
if ($quest = fopen('Quests/' . $_GET['lang']. "/" . $result[$langSQL] . '_obj.txt', "r")) {
	$objective = fgets($quest);
	fclose($quest);
} else OhMyGod();

$code = array();
if ($quest = fopen('Quests/' . $_GET['lang']. "/" . $result[$langSQL] .'_code.txt', "r")) {
	while (!feof($quest)) {
		$line = fgets($quest);
		array_push($code, $line);
	}
	fclose($quest);
} else OhMyGod();

$answers = array();
$answersLength = array();
if ($quest = fopen('Quests/' . $_GET['lang']. "/" . $result[$langSQL] . '_ans.txt', "r")) {
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
		$code[$i] = str_replace('{option}', '<input type="text" class="input quest" maxlength="' . $answersLength[$answerLengthIterator] . '" />', $code[$i]);
		$answerLengthIterator = $answerLengthIterator + 1;
	}
}
?>