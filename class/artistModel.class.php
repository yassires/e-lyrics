<?php
include_once("DB.php");

class artistModel extends DB
{
    protected function getAllArtists()
    {
        $sql = "SELECT * from artist";
        $statement = $this->Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }

    protected function getAllGenre()
    {
        $sql = "SELECT * from genre";
        $statement = $this->Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }


    public function addArtist($artist_img, $name, $genre)
    {

        $sql = "INSERT INTO `artist`(`artist_img`, `name`, `genre`) VALUES ('sng_img/$artist_img','$name','$genre')";
        // var_dump($sql);
        // die();
        $statement = $this->connect()->prepare($sql);
        if ($statement->execute()) {
            $_SESSION["Message-success"] = "artist has been Added successfully!";
            header("location: ./index.php");
        } else {
            $_SESSION["Message-field"] = "Sorry something went wrong.";
            header("location: ./index.php");
        }
    }
}
