<?php
session_start();
require_once __DIR__ . "/../Models/Photos.php";

class PhotosDAO implements IPhotos {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function fetchPhotosFromUser($userid){ 
        try{
            $stmt = $this->conn->prepare("SELECT * FROM photos WHERE user_id = :userid");
            $stmt->bindParam(":userid", $userid);
            $stmt->execute();
            $result = $stmt->rowCount();

            if(!$result){
                $_SESSION["photosfromuser"] = [];
            }else{
                $photos_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $_SESSION["photosfromuser"] = $photos_result;

            }
        }catch(Exception $e){
            echo "Error on fetch photos: " . $e->getMessage();
            return $e;
        }
    }
    public function setFilename($userid, $filename){
        $stmt = $this->conn->prepare("INSERT INTO photos(filename, user_id) VALUES (:filename, :userid)");
        $stmt->bindParam(":filename", $filename);
        $stmt->bindParam(":userid", $userid);
        $stmt->execute();
        
       
    }
}

?>