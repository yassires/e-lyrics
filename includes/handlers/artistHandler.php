<?php

include_once "../../class/artistController.class.php";
include_once "../../class/artistModel.class.php";

// var_dump($_POST["name"]);
// add artist---------------------------------
// add artist---------------------------------
if (isset($_POST["add"])) {

    //collecting the data

    $artist_img  = $_POST["img"];
    $name = $_POST["name"];
    $genre = $_POST["genre"];


    // instantiate artistContr class
    $artistController = new artistController();

    // Running handlers and add artist
    $artistController->addArtists($artist_img, $name, $genre);
    // Going back to the front page
    header("location: ../../index.php");
}
