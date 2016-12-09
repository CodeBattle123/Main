<?php
include_once('db/connect.php');

for ($i=0; $i < 10; $i++) {
    $sql = "INSERT INTO users (nickname, email, password) VALUES ('Auto_Created_user_$i','email_$i','pass_$i')";
    $query = mysqli_query($connect, $sql);
    if ($query) {
        echo "Account #" . $i . " created.<br>";
    }
}
?>
