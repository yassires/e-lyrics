<?php

include_once "userModel.class.php";

class userController extends userModel
{
  
   public $name;
   public $email;

   public function __construct($name="default",$email="default")
   {
       $this->name = $name;
       $this->email = $email;

   } 

 public function getUsers(){
    
    return $this->getAllUsers();
 } 
}