<?php


class ProfessionModel{
    private $database;

    function __construct() {
        $this->database = $this->connect();
    }

    /** Abro la conexión de la base de datos */
    private function connect() {
        $database = new PDO('mysql:host=localhost;'.'dbname=db_jobs;charset=utf8', 'root', '');  
        //$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $database;
    }

    /** Devuelve todas las profesiones */
    function getAll(){
        $query = $this->database->prepare('SELECT * FROM professions ORDER BY id DESC');
        $query->execute();
        $professions = $query->fetchAll(PDO::FETCH_OBJ);
        return $professions;
    }

    /** Devuelve una profesion dependiendo el parametro recibido */
    function get($id){
        $query = $this->database->prepare('SELECT * FROM professions WHERE id=?');
        $query->execute([$id]);
        $profession = $query->fetch(PDO::FETCH_OBJ);
        return $profession;
    }

    /** Devuelve una profesion segun un nombre pasado por parametro */
    function getByName($name){
        $query = $this->database->prepare('SELECT * FROM professions WHERE profesion=?');
        $query->execute([$name]);
        $profession = $query->fetch(PDO::FETCH_OBJ);
        return $profession;
    }

    /** Elimina una profesion */
    function remove($id){
        $query = $this->database->prepare('DELETE FROM professions where id = ?');
        return $query->execute([$id]);
    }

    /** Agrega una profesion */
    function insert($name){
        $query = $this->database->prepare('INSERT INTO professions (profesion) VALUES (?)');
        return $query->execute([$name]);
    }

    /** Actualiza una profesion */
    function update($id, $name){
        $query = $this->database->prepare('UPDATE professions SET profesion = ? WHERE id = ?');
        return $query->execute([$name, $id]);
    }

}