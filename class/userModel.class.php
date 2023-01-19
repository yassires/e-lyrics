<?php
include_once ("./DB.php");

class userModel extends DB
{
    
    protected function getAllUsers(){
        $sql = "SELECT * from user";
        $statement = $this->Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }
}