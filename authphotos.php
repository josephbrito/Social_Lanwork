<?php
require_once "./dao/PhotosDAO.php";
require_once "./Models/Messages.php";
require_once "./utils/helper.php";
require_once "./db.php";

$photosDAO = new PhotosDAO($conn);
$message = new Message($BASE_URL);

$userId = $_SESSION["userdata"]["id"];

if(isset($_POST["submit"])){

    if(!$userId){
        return header("Location: index.php");
    }

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "./images/" . $filename;

    $photosDAO->setFilename($userId, $filename);

    if(move_uploaded_file($tempname, $folder)){
        return $message->setMessage("Photo posted!", "success", "dashboard.php");
    }else{
        return $message->setMessage("Something went wrong", "error", "index.php");
    }
}