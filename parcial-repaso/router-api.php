<?php
    /* Incluyo la libreria para el ruteo */
    include_once 'libs/Router.php';
    /* Incluyo el controlador de profesiones */
    include_once 'app/api/api-profession.controller.php';

    /* creo el ruteo */
    $router = new Router();

    /* Creando la tabla de ruteo */
    $router->addRoute('profesion', 'GET', 'ApiProfessionController' , 'getAll');
    $router->addRoute('profesion/:ID', 'GET', 'ApiProfessionController' , 'get');
    $router->addRoute('profesion/:ID', 'DELETE', 'ApiProfessionController' , 'delete');
    $router->addRoute('profesion', 'POST', 'ApiProfessionController', 'add'); // no uso parametros porque es POST
    $router->addRoute('profesion/:ID', 'PUT', 'ApiProfessionController', 'update');

    /* rutea -> obteniendo el RECURSO y el METODO por el que me llamaron */
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);