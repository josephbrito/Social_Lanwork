<?php
class User {
    public $id;
    public $name;
    public $profile;
    public $email;
    public $password;
}

interface IUserDAO {
    public function createUser(User $user);
    public function findByEmail($email);
    public function findUser($email, $password);
    public function setProfile($profile);
    public function setUserToSession($user);
}