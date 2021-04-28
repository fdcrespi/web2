<?php
class AuthHelper{

    function __construct(){
        $this->logIn();
    }
    
    //
    function logIn(){
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    
    //controla que el usuario este logueado
    function checkLogin(){
        if (isset($_SESSION['USUARIO'])) {
            return true;
            die() ;
        }
        return false;
    }

}