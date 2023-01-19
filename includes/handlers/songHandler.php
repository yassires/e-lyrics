<?php

include_once "../../class/songController.class.php";
include_once "../../class/songModel.class.php";



// login---------------------------------
// login---------------------------------
if (isset($_POST["add"])) {

    //collecting the data
    $song_img  = $_POST["img"];
    $title = $_POST["title"];
    $artist = $_POST["artist"];
    $genre = $_POST["genre"];
    $album = $_POST["album"];
    $date = $_POST["date"];
    $lyrics = $_POST["lyrics"];
    // instantiate LoginContr class
    $songController = new songController();

    // Running handlers and add song
    $songController->addSongs($song_img, $title, $artist, $genre, $album, $date, $lyrics);
    // Going back to the front page

    header("location: ../home.php?error=none");


}
