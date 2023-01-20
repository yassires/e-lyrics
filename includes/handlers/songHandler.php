<?php

include_once "../../class/songController.class.php";
include_once "../../class/songModel.class.php";



// login---------------------------------
// login---------------------------------
if (isset($_POST["add"])) {

    //collecting the data
    // var_dump($_POST["add"]);
    // die();
    $song_img  = $_POST["img"];
    $title = $_POST["title"];
    $artist = $_POST["artist"];
    $genre = $_POST["genre"];
    $album = $_POST["album"];
    $date = $_POST["date"];
    // var_dump($date);
    // die();
    $lyrics = $_POST["lyrics"];
    // instantiate songContr class
    $songController = new songController();

    // Running handlers and add song
    $songController->addSongs($song_img, $title, $artist, $date, $album, $lyrics, $genre);
    // Going back to the front page

    header("location: ../../index.php");
}
