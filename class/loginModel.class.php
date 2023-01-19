<?php

include_once("../DB.php");

class LoginModel extends DB{

    public function getUser($email,$password){
        $query = "SELECT * FROM user WHERE email = ? AND  password = ? ;";
        $statement = $this->connect()->prepare($query);
   
       
        if(!$statement->execute(array($email,$password))){
            $statement=null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }

        return $statement->fetch();
    }


       
}
