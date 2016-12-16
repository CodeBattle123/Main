<?php
include  '../db/connect.php';
include '../db/login_status.php';


	if (isset($_POST['submit_clan'])) {
        $clan_name = $_POST['clanname'];
        $validate = true;

        if (strlen($clan_name) == 0) {
            echo "<li class=\"message\">You must enter your clan name.</li>";
            $validate = false;

            header("location: ../make-clan.php");
        }

        $clan_description = $_POST['description'];
        if (strlen($clan_description) == 0) {
            echo "<li class=\"message\">You must enter your clan description.</li>";
            $validate = false;
            header("location: ../make-clan.php");
        }


        //picture upload
        $target_dir = "../clan-pics/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $filename = $target_dir . basename($clan_name . "." . "png");
        // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
                $validate = false;
                header("location: ../make-clan.php");
            }
        }
// Check file size
        if ($_FILES["fileToUpload"]["size"] > 50000000) {
            echo "Sorry, your file is too large.";
            $validate = false;
            $uploadOk = 0;
            header("location: ../make-clan.php");
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $validate = false;
            $uploadOk = 0;
            header("location: ../make-clan.php");
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            $validate = false;
            header("location: ../make-clan.php");
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $filename)) {
                echo "The file has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
                $validate = false;
                header("location: ../make-clan.php");

            }


        if ($validate == true) {
            $clan_name = mysqli_real_escape_string($connect, $_POST['clanname']);
            $clan_description = mysqli_real_escape_string($connect, $_POST['description']);
            $sql = "INSERT INTO teams (name, description, leader) VALUES ('$clan_name', '$clan_description', '$username')";
            mysqli_query($connect, $sql);
            mysqli_query($connect, "UPDATE users SET clan='$clan_name' WHERE id='$log_id'");
            header("location: ../clanPage.php");
        }

    }
?>