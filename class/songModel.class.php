<?php
dir('DB.php');

class songModel extends DB
{
    protected function getAllSongs()
    {
        $sql = "SELECT * from songs";
        $statement = $this->Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }


    public function addSong($song_img, $title, $artist, $date, $album, $lyrics, $genre)
    {

        $sql = "INSERT INTO `songs`(`sng_img`, `title`, `artist_name`, `release_date`, `album`, `lyrics`, `genre`) VALUES ('sng_img/$song_img','$title','$artist','$date','$album','$lyrics','$genre')";
        $statement = $this->connect()->prepare($sql);
        if ($statement->execute()) {
            $_SESSION["Message-success"] = "Song has been Added successfully!";
            header("location: ./dashboard.php");
        } else {
            $_SESSION["Message-field"] = "Sorry something went wrong.";
            header("location: ./dashboard.php");
        }
    }
}
