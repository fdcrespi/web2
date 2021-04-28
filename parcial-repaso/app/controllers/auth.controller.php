<?php
include_once 'app/models/auth.model.php';
include_once 'app/views/jobs.view.php';


class AuthController{
    private $modelUser;
    private $view;
    private $authHelper;

    function __construct() {
        $this->modelUser = new AuthModel();
        $this->view = new JobView();
        $this->authHelper = new AuthHelper();
    }
// muestra el inicio de sesion
    function initSesion(){
      $this->view->popUpInitSesion();        
    }

    function logout(){
      $this->authHelper->logOut();
      header("Location: " . BASE_URL . "home"); 

    }

//obtiene los datos de usuario y otorga permisos segun corresponda (admin o usuario)

    function verinicio(){
      $user = $_POST['usuario'];
      $pass = $_POST['password'];
      $find = $this->modelUser->buscar($user);
      
      if ($find && password_verify ($pass , $find->password)){
        session_start();
        $_SESSION['USUARIO']=$user;     
        header("Location: " . BASE_URL . "home"); 
 
      }else{
          $this->view->popUpInitSesion('Usuario incorrecto');
      } 
    }
}