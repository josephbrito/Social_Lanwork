<?php

class Photos {
    public $id;
    public $filename;
    public $user_id;
}

interface IPhotos {
    public function fetchPhotosFromUser($userid);
    public function setFilename($userid, $filename);
}