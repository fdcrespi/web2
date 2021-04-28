<?php


class EmployeesModel{
    private $database;

    function __construct() {
        //conecto a la base de datos
        $this->database = $this->connect();
    }

    /** abro la coneccion con la Base de Datos */
    private function connect() {
        $database = new PDO('mysql:host=localhost;'.'dbname=db_jobs;charset=utf8', 'root', '');  
        //$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $database;
    }

    /** Devuelve un arreglo con todas los empleados */
    function getAll(){
        $query = $this->database->prepare('SELECT e.id as id_emp, c.id as id_prof, dni, apellido, email, telefono, nombre, profesion FROM employees e INNER JOIN professions c on e.id_profession = c.id ORDER by id_emp DESC');
        $query->execute();
        $employees = $query->fetchAll(PDO::FETCH_OBJ);
        return $employees;
    }

    /** Devuelve los empleados que tienen la categoria pasada por parametro */
    function getByCategory($typeEmployee){
        $query = $this->database-> prepare('SELECT e.id as id_emp, e.id_profession as id_prof, e.apellido as apellido, e.telefono as telefono, e.nombre as nombre, c.profesion FROM professions c INNER JOIN employees e ON e.id_profession = c.id WHERE e.id_profession=? or c.profesion LIKE "%'.$typeEmployee.'%" or nombre LIKE "%'.$typeEmployee.'%"');
        $query->execute([$typeEmployee]);
        $jobers= $query->fetchAll(PDO::FETCH_OBJ);
        return $jobers;
    } 

    // elimina a un trabajador ADMINISTRADOR
    function remove($id){
        $query = $this->database->prepare('DELETE FROM employees where id = ?');
        return $query->execute([$id]);
    }

    /** Obtiene un empleado */
    function get($id){
        $query = $this->database->prepare('SELECT e.id as id_emp, c.id as id_prof, dni, apellido, email, telefono, nombre, profesion FROM employees e INNER JOIN professions c ON e.id_profession = c.id WHERE e.id = ?');
        $query->execute([$id]);
        $person = $query->fetch(PDO::FETCH_OBJ);
        return $person;
    }

    //obtiene una persona segun el nro de dni
    function getByDni($dni){
        $query = $this->database->prepare('SELECT e.id as id_emp, c.id as id_prof, dni, apellido, email, telefono, nombre, profesion FROM employees e INNER JOIN professions c ON e.id_profession = c.id WHERE dni = ?');
        $query->execute([$dni]);
        $person = $query->fetch(PDO::FETCH_OBJ);
        return $person;
    }

    /** actualiza los datos de una persona ADMINISTRADOR */
    function update($id, $dni, $name, $last, $mail, $tel, $cat){
        $query = $this->database->prepare('UPDATE employees 
            SET dni = ?, nombre = ?, apellido = ?, email = ?, telefono = ?, id_profession = ?
            WHERE id = ?
        ');
        return $query->execute([$dni, $name, $last, $mail, $tel, $cat, $id]);
    }

    /** agrega un empleado a la base de datos */
    function insert($dni, $name, $last, $mail, $tel, $cat){
        $query = $this->database->prepare('INSERT INTO employees (dni, nombre, apellido, email, telefono, id_profession) VALUES (?, ?, ?, ?, ?, ?)');
        $query->execute([$dni, $name, $last, $mail, $tel, $cat]);
        return $this->database->lastInsertId();
    }

}