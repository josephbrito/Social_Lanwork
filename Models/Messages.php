<?php
session_start();

class Message {
    
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function setMessage($message, $type, $redirect = "index.php"){

        $_SESSION["msg"] = $message;
        $_SESSION["type_message"] = $type;

        if($redirect === "back"){
            return header("Location: " . $_SERVER["HTTP_REFERER"]);
        }else{
            return header("Location: " . $redirect);
        }
    }

    public function clearMessage(){
            unset($_SESSION["msg"]);
            unset($_SESSION["type"]);
            return true;
    }

}

?>