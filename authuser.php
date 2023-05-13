<?php
require_once("./utils/helper.php");
require_once("./dao/UserDAO.php");
require_once("./db.php");
require_once("./Models/Messages.php");

$userDAO = new UserDAO($conn);
$message = new Message($BASE_URL);

$type = filter_input(INPUT_POST, "type");

if($type === "register"){
    $name = filter_input(INPUT_POST, "name");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");

    if($name && $email && $password){
        
        $verifyEmail = $userDAO->findByEmail($email);
        if(!$verifyEmail){
         return $message->setMessage("User already exists!", "error", "back");
        }else{
            $user = new User;

            $user->name = $name;
            $user->email = $email;
            $user->profile = "";
            $user->password = $password;
            $userDAO->createUser($user);
            return $message->setMessage("You can log in now!", "success", "signin.php");

        }
    }else{
        return $message->setMessage("Please, fill in all fields!", "error", "back");
    }

}else if($type === "login"){
    $email = filter_input(INPUT_POST, "email");

    $userAlreadyExists = $userDAO->findByEmail($email);

    if($userAlreadyExists){
        return $message->setMessage("User not found!", "error", "back");
    }

    $password = filter_input(INPUT_POST, "password");

    $user = $userDAO->findUser($email, $password);

    if(!$user){
        return $message->setMessage("User not found!", "error", "back");
    } else {
        $_SESSION["userislogged"] = true;
        $userDAO->setUserToSession($user);
        return $message->setMessage("Hello", "success", "index.php"); 
    }

}else{
    header("Location: " . $BASE_URL);
}