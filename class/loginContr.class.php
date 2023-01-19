<?php

include_once("LoginModel.class.php");
session_start();
// if(!isset($userinfo)) 
//     { 
//         session_start(); 
//     } 

class LoginContr extends LoginModel {
    public $email;
    public $password;

    public function __construct($email,$password)

    {

        $this->email = $email;
        $this->password = $password;
    }

    public function LoginUr()
    {
        if ($this->emptyInput() == false) {
            header("location:../../login.php?msg=fill all fields");
           
            exit();
        }
        $userinfo =  $this->getUser($this->email, $this->password);
        $this->verifyRecords($userinfo);
    }

    public function emptyInput()
    {
        if (empty($this->email) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    public function verifyRecords($userinfo)
    {
        if($this->password != $userinfo["password"]){
                header("location:../login.php?msg=The password that you've entered is incorrect."); 
        }else{
            $_SESSION["user"] = $userinfo;
            header("location:../home.php");
        }
        
    }
}    