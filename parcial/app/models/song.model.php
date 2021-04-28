<?php

include_once 'app/helpers/database.helper.php';

class SongModel{ 
    private $database;

    function __construct(){
        $dbHelpers = new DatabaseHelpers();
        $this->database = $dbHelpers->connect();
    }


    /** Elimina una Cancion - Respuesta ejercicio 1*/
    function remove($id){
        $query = $this->database->prepare('DELETE FROM cancion where id = ?');
        return $query->execute([$id]);
    }

    /** Obtiene las canciones de un album pasado por parametro */
    function getSongsByAlbum($idAlbum){
        $query = $this->database->prepare('SELECT * FROM cancion WHERE id_album = ?');
        $query->execute([$idAlbum]);
        $songs = $query->fetchAll(PDO::FETCH_OBJ);
        return $songs;
    }

    /** Obtiene el total de reproducciones de las canciones de un album */
    function totalReproductions($idAlbum){
        $query = $this->database->prepare('SELECT SUM(reproducciones) as total FROM cancion WHERE id_album = ?');
        $query->execute([$idAlbum]);
        $total = $query->fetch(PDO::FETCH_OBJ);
        return $total;
    }

}