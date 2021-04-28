<?php

class DatabaseHelpers{

    function connect()
    {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_musicfy;charset=utf8', 'root', '');
        return $db;
    }


}