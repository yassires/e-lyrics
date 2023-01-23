<?php

include_once "artistModel.class.php";

class artistController extends artistModel
{
    


    public function getArtists()
    {
        return $this->getAllArtists();
    }


    public function getGenre()
    {
        return $this->getAllGenre();
    }



    public function addArtists($artist_img, $name, $genre)
    {
        return $this->addArtist($artist_img, $name, $genre);
    }
}