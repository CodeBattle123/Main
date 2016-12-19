<?php

include  '../db/connect.php';
include '../db/login_status.php';

    if (isset($_POST['leaveclan'])) {
        mysqli_query($connect, "UPDATE users SET clan='' WHERE nickname='$username'");
        $query = mysqli_query($connect, $sql);
        header("location: ../make-clan.php");
    }

?>