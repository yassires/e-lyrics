<?php

if(isset($_POST["login"])){

    $email = $_POST["email"];
    $password = $_POST["password"];


    include "../DB.php";
    include "../class/loginModel.class.php";
    include "../class/loginContr.class.php";
    
    $srt = new LoginContr($email,$password);

    $srt->LoginUr();

    // header("location: ../home.php?error=none");
}