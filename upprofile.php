<?php
require_once "./dao/UserDAO.php";
require_once "./db.php";
require_once "./Models/Messages.php";
require_once "./utils/helper.php";

$message = new Message($BASE_URL);
$userDAO = new UserDAO($conn);


if(!empty($_FILES["profile_upload"])){
    $profile = $_FILES["profile_upload"]["name"];
    $userDAO->setProfile($profile);

    $profile_tmp_name = $_FILES["profile_upload"]["tmp_name"];
    $profile_folder = "./profiles/" . $profile;

    if(move_uploaded_file($profile_tmp_name, $profile_folder)){
        return $message->setMessage("Profile photo updated!", "success", "index.php");
    }else{
        return $message->setMessage("Error to move image", "error", "index.php");
    }
}

?>