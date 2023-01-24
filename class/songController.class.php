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

    public function updateSongs($song_img, $title, $artist, $date, $album, $lyrics, $genre,$id)
    {
        return $this->updateSong($song_img, $title, $artist, $date, $album, $lyrics, $genre,$id);
    }

    public function deleteSongs($id)
    {
        return $this->deleteSong($id);
    }
}
