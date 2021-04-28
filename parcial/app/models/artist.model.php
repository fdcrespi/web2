<?php

include_once 'app/helpers/database.helper.php';

class ArtistModel{

    private $database;

    function __construct(){
        $dbHelpers = new DatabaseHelpers();
        $this->database = $dbHelpers->connect();
    }

    /** inserta un artista */
    function insert($nombre, $destacado){
        $query = $this->database->prepare('INSERT INTO artista (nombre, destacado) VALUES (?, ?)');
        $query->execute([$nombre, $destacado]);
        return $this->database->lastInsertId();
    }

    /** Obtiene un artista por su nombre */
    function getByName($nombre){
        $query = $this->database->prepare('SELECT * FROM artista WHERE nombre = ?');
        $query->execute([$nombre]);
        $songs = $query->fetch(PDO::FETCH_OBJ);
        return $songs;
    }

    
}