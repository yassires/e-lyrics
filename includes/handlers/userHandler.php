<?php

include_once "../../class/userController.class.php";
include_once "../../class/loginContr.class.php";



// login---------------------------------
// login---------------------------------
if(isset($_POST["login"]))
{

   //collecting the data
   $email = $_POST["email"]; 
   $password = $_POST["password"]; 

   // instantiate LoginContr class
    $LoginCtr=new LoginContr($email,$password);

   // Running error handlers and user signup
    $LoginCtr->LoginUr();
   // Going back to the front page

}
// login---------------------------------
// login---------------------------------








