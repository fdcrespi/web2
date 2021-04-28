<?php
include_once 'controller/functions.php';

// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'listar'; // acción por defecto si no envían
}

// parsea la accion Ej: suma/1/2 --> ['suma', 1, 2]
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'listar':
        showPayments();
        break;
    case 'formadd':
        getFormAdd();
        break;
    case 'agregar':
        addPayments($_POST['deudor'], $_POST['cuota'], $_POST['cuota_capital'], $_POST['fecha']);
        break;
    case 'eliminar': // eliminar/:ID
        $id = $params[1];
        eliminar($id);
        break;
    default:
        echo('404 Page not found');
        break;
}
