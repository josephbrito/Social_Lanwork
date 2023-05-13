<?php
session_start();
$_SESSION["data"] = [];
$dir = "./images";
$files = scandir($dir);

$allowed = ["jpg", "JPG", "jpeg", "png", "avif"];

foreach($files as $file){
   $ext = pathinfo($file, PATHINFO_EXTENSION);
   if(in_array($ext, $allowed)){
       return array_push($_SESSION["data"], $file);
   }else{
        echo "Error";
        return;
   }
}

print_r($_SESSION["data"]);

    if(!empty($_FILES["image"]) && !empty($_POST["submit"])){
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "images/" . $filename;

        if(move_uploaded_file($tempname, $folder)){

            array_push($_SESSION["data"], $filename);
            header("Location: index.php");
            
        }else{
            echo "Something went error";
        }
    }else{
        echo "cadê";
    }
?>