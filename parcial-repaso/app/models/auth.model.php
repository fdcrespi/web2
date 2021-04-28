<?php


class AuthModel{
    private $database;

    function __construct() {
        $this->database = $this->connect();
    }

    //abro la coneccion
    private function connect() {
        $database = new PDO('mysql:host=localhost;'.'dbname=db_jobs;charset=utf8', 'root', '');  
        //$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $database;
    }
    //busca que exista el usuario
    function buscar ($user){
        $query = $this->database->prepare ('SELECT * FROM users WHERE user=?');
        $query->execute([$user]);
        $find=$query->fetch(PDO::FETCH_OBJ);
        return $find;



    }




}