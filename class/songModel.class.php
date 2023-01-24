<?php
include_once("DB.php");

class songModel extends DB
{
    protected function getAllSongs()
    {
        $sql = "SELECT genre.id as genre_id , genre.name as g_name , songs.id as idSong,artist.id as idArtist, songs.title as title ,artist.name as name, songs.release_date as date, songs.album as album ,songs.lyrics as lyrics, songs.sng_img as sng_img FROM songs INNER JOIN artist
        ON songs.artist_id = artist.id
        INNER JOIN genre
        ON songs.genre_id = genre.id";
        $statement = $this->Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }


    public function addSong($song_img, $title, $artist, $date, $album, $lyrics, $genre)
    {
        for ($i = 0; $i < count($title); $i++) {
            $sql = "INSERT INTO `songs`(`sng_img`, `title`, `release_date`, `album`, `lyrics`, `artist_id`, `genre_id`) VALUES ('sng_img/$song_img[$i]','$title[$i]','$date[$i]','$album[$i]','$lyrics[$i]','$artist[$i]','$genre[$i]')";
            // var_dump($sql);
            // die();
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

    public function updateSong($song_img, $title, $artist, $date, $album, $lyrics, $genre, $id)
    {

        //CODE HERE
        if ($song_img == "") {
            //SQL UPDATE
            $sql =  "UPDATE `songs` SET `title`='$title',`artist_name`='$artist',`release_date`='$date',`album`='$album',`lyrics`='$lyrics',`genre`='$genre',`artist_id`='',`genre_id`='' WHERE id = $id";
            $statement = $this->connect()->prepare($sql);
            if ($statement->execute()) {
                $_SESSION["Message-success"] = "Song has been Updated successfully!";
                header("location: ./index.php");
            } else {
                $_SESSION["Message-field"] = "Sorry something went wrong.";
                header("location: ./index.php");
            }
        } else {
            //SQL UPDATE
            $sql =  "UPDATE `songs` SET `sng_img`='sng_img/$song_img', `title`='$title',`release_date`='$date',`album`='$album',`lyrics`='$lyrics',`artist_id`='$artist',`genre_id`='$genre' WHERE id = $id";
            $statement = $this->connect()->prepare($sql);
            if ($statement->execute()) {
                $_SESSION["Message-success"] = "Song has been Updated successfully!";
                header("location: ./index.php");
            } else {
                $_SESSION["Message-field"] = "Sorry something went wrong.";
                header("location: ./index.php");
            }
        }
    }

    public function deleteSong($id)
    {
        $sql = "DELETE FROM `songs` WHERE id=?";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(array($id));
    }

    public function song_count()
    {
        $sql = "SELECT * FROM `songs`";
        $statement = $this->Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->rowCount();
        return $res;
    }
    public function users_count()
    {
        $sql = "SELECT * FROM `user`";
        $statement = $this->Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->rowCount();
        return $res;
    }
    public function artist_count()
    {
        $sql = "SELECT * FROM `artist`";
        $statement = $this->Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->rowCount();
        return $res;
    }
}
