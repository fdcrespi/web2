<?php

include_once 'app/helpers/database.helper.php';

class AlbumModel{

    private $database;

    function __construct(){
        $dbHelpers = new DatabaseHelpers();
        $this->database = $dbHelpers->connect();
    }

    /** obtiene un album por su id */
    function get($id){
        $query = $this->database->prepare('SELECT * FROM album WHERE id = ?');
        $query->execute([$id]);
        $album = $query->fetch(PDO::FETCH_OBJ);
        return $album;
    }
}