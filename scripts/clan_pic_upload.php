<?php

include  '../db/connect.php';
include '../db/login_status.php';

$clan_name = "$log_clan";

if (isset($_FILES["fileToUpload"])) {
//picture upload
$target_dir = "../clan-pics/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$filename = $target_dir . basename($clan_name . "." . "png");
// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    $validate = true;
if($check !== false) {
    $uploadOk = 1;
} else {
    echo "File is not an image.";
    $uploadOk = 0;
    $validate = false;
    header("location: ../clan_edit.php");
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $validate = false;
    $uploadOk = 0;
    header("location: ../clan_edit.php");
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $validate = false;
    $uploadOk = 0;
    header("location: ../clan_edit.php");
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    $validate = false;
    header("location: ../clan_edit.php");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $filename)) {
        echo "The file has been uploaded.";
        header("location: ../clan_edit.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
        $validate = false;
        header("location: ../clan_edit.php");
    }
}
}