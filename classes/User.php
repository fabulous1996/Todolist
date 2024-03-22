<?php

class User {
    private $userID;
    private $prenom;
    private $email;
    private $password;

    
    public function __construct($userID, $prenom,$email,$password)
    {
       $this->userID =$userID; 
       $this->prenom =$prenom; 
       $this->email =$email; 
       $this->password =$password; 
    }

    public function getUserID (){
        return $this->userID;
    }
    public function setUserID($userID){
        $this->userID=$userID;
    }

    public function getPrenom (){
        return $this->prenom;
    }
    public function setPrenom($prenom){
        $this->prenom=$prenom;
    }

    public function getEmail (){
        return $this->email;
    }
    public function setEmail($email){
        $this->email=$email;
    }

    public function getPassword (){
        return $this->password;
    }
    public function setPassword($password){
        $this->password=$password;
    }


}