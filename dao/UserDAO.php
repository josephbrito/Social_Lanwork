<?php
session_start();
require_once __DIR__ . "/../Models/User.php";

class UserDAO implements IUserDAO {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }


    public function createUser(User $user) {
        $stmt = $this->conn->prepare("INSERT INTO users(name, email, password, profile) VALUES(:name, :email, :password, :profile)");
        $name = $user->name;
        $email = $user->email;
        $password = $user->password;
        $profile = $user->profile;

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":profile", $profile);

        $stmt->execute();
        return $user;
    }
    public function findByEmail($email) {
        $stmt = $this->conn->prepare("SELECT email FROM users WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $result = $stmt->rowCount();
        
        if($result == 0){
            return true;
        }else{
            return false;
        }
    }

    public function findUser($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();

        $result = $stmt->rowCount();

        if($result == 0){
            return false;
        }else{
           $user = $stmt->fetch();
           return $user;
        }
    }

    public function setUserToSession($user) {
        $_SESSION["userdata"] = ["id" => $user["id"] ,"name" => $user["name"], "profile" => $user["profile"], "email" => $user["email"]];
    }

    public function getUser(){
        

        $userid = $_SESSION["userdata"]["id"];
        $useremail = $_SESSION["userdata"]["email"];

        if(!$userid || !$useremail){
             header("Location: index.php");
             return false;
        }

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id AND email = :email");
        $stmt->bindParam(":id", $userid);
        $stmt->bindParam(":email", $useremail);
        $stmt->execute();
        $result = $stmt->rowCount();

        if($result == 0){
            header("Location: index.php");
            return false;
        }else{
            $user = $stmt->fetch();
            return $user;
        }
    }

    public function setProfile($profile){
        $user = $this->getUser();

        if(!$user){
            return header("Location: index.php");
        }

        $stmt = $this->conn->prepare("UPDATE users SET profile = :profile WHERE id = :id");
        $stmt->bindParam(":profile", $profile);
        $stmt->bindParam(":id", $user['id']);
        $stmt->execute();
        
        $user["profile"] = $profile;
        return $this->setUserToSession($user);


      
    }
}

?>