<?php

include_once "../../class/songController.class.php";
include_once "../../class/songModel.class.php";

if (isset($_POST["add"])) addSong();
if (isset($_POST["update"])) updateSong();

// add---------------------------------
// add---------------------------------
function addSong()
{

    //collecting the data
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

function updateSong()
{


    //collecting the data
    $song_img  = $_POST["img"];
    $title = $_POST["title"];
    $artist = $_POST["artist"];
    $genre = $_POST["genre"];
    $album = $_POST["album"];
    $date = $_POST["date"];
    $lyrics = $_POST["lyrics"];
    $id = $_POST["id"];

    // instantiate songContr class
    $songController = new songController();


    // Running handlers and add song
    $songController->updateSongs($song_img, $title, $artist, $date, $album, $lyrics, $genre, $id);

    // Going back to the front page

    header("location: ../../index.php");
}
