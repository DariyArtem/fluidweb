<?php
session_start();
$user_id = $_SESSION['user']['id'];
include "config_DBO.php";

if(isset($_POST['submit'])){

    // Prepared statement
    $query = "INSERT INTO images (name,image,userid) VALUES(?,?,?)";

    $statement = $db->prepare($query);
        // File name
        $filename = $_FILES['file']['name'];

        // Location
        $target_file = 'uploads/'.$filename;

        // file extension
        $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);

        // Valid image extension
        $valid_extension = array("png","jpeg","jpg");

        if(in_array($file_extension, $valid_extension)){

            // Upload file
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){

                // Execute query
                $statement->execute(array($filename,$target_file,$user_id));

            } else{

            }
        }


    $_SESSION["is_success"] = true;
    $_SESSION["success_msg"] = "File upload successfully";
    header('Location: /profile.php');
}
?>