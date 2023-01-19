<?php

include_once "songModel.class.php";

class songController extends songModel
{
    


    public function getSongs()
    {
        return $this->getAllSongs();
    }


    public function addSongs($song_img,$title,$artist,$genre,$album,$date,$lyrics)
    {
        return $this->addSong($song_img,$title,$artist,$genre,$album,$date,$lyrics);
    }
}
