<?php

/**
 * Entity of User 
 */
class User {

    protected $userName;
    protected $Password;
    
    public function setUsername(string $username){
        $this->userName = $username;
    }
    public function setPassword(string $password){
        $this->Password = $password;
    }
    public function getUsername(){
        return $this->userName;
    }
    public function getPassword(){
        return $this->Password;

    }
}
