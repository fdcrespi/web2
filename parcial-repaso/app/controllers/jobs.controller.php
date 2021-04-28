<?php
include_once 'app/models/employees.model.php';
include_once 'app/models/professions.model.php';
include_once 'app/views/jobs.view.php';
include_once 'app/helpers/auth.helper.php';


class JobController{
    private $modelEmployees;
    private $modelProfessions;
    private $view;
    private $authHelper;

    function __construct() {
        $this->modelEmployees = new EmployeesModel();
        $this->modelProfessions = new ProfessionModel();
        $this->view = new JobView();
        /* Incluye el helper del control de usuario */
        $this->authHelper = new AuthHelper();
    }

    function showHome(){
        //llama a la clase del taskview para mostrar el home
        $professions=$this->modelProfessions->getAll();
        $this->view->showProfessions($professions);
        $show=$this->modelEmployees->getAll();
        $this->view->showEmployees($show);
    }

    /** obtiene los trabajadores de una categoria seleccionada */
    function listJobs($foundJobs){
       $jobs=$this->modelProfessions->getAll();
       $this->view->showProfessions($jobs);
       $listemploy = $this->modelEmployees->getByCategory($foundJobs);
       if ($listemploy){
            $this->view->showEmployees($listemploy);
        }else{
            $msg='No existen empleados para esta categoria';
            $this->view->showError($msg);
        }
    }

    /** filtra los empleados segun el oficio que se elija desde la columna de profesiones */
    function listJobsFilter(){
        $jobs=$this->modelProfessions->getAll();
        $this->view->showProfessions($jobs);
        $foundJobs = $_GET['buscar'];
        $listemploy = $this->modelEmployees->getByCategory($foundJobs);
        if ($listemploy){
            $this->view->showEmployees($listemploy);
        }else{
            $msg='No se han encontrado empleados con: '.$foundJobs;
            $this->view->showError($msg);
        }    
    }

    /** Pide datos para mostrar menu del administrador, para que este pueda hacer ABM de personas y categorias */
    function showMenuManage(){
        if ($this->authHelper->checkLogin()){
            $employees=$this->modelEmployees->getAll();
            $professions=$this->modelProfessions->getAll();
            //$this->view->showMenuManage($workers, $categories);
        }else{
            $this->view->popUpInitSesion('Debe estar logueado');
        }
        
    }
  
    /** Lista todas las profesiones */ 
    function showCategories(){
        $professions=$this->modelProfessions->getAll();
        $this->view->showProfessions($professions);
    }

    /** Pide datos para mostrar menu del administrador, para que este pueda hacer ABM de personas y categorias */
    function showMenuManageCat($msg){
        if ($this->authHelper->checkLogin()){
            $categories=$this->modelProfessions->getAll();
            $this->view->showMenuManageCat($categories, $msg);
        }else{
            $this->view->popUpInitSesion('Debe estar logueado');
        }
        
    }

    /** va al menu para administrar empleados */
    function showMenuManageWork($msg){
        if ($this->authHelper->checkLogin()){
            $employees=$this->modelEmployees->getAll();
            $this->view->showMenuManageWork($employees, $msg);
        }else{
            $this->view->popUpInitSesion('Debe estar logueado');
        }
    }

    /** Agrega una profesion */
    function addCategory(){
        if ($this->authHelper->checkLogin()){
            $profession = $_POST['inputCategory'];
            if(empty($profession) || $profession == $this->modelProfessions->getByName($profession)->profesion){
                $this->showMenuManageCat("El nombre de la profesion esta vacia o ya existe");
                die();
            }
            $id = $this->modelProfessions->insert($profession);
            header("Location: " . BASE_URL . "manageCategory");
        }else{
            $this->view->popUpInitSesion('Debe estar logueado');
        }
    }

    /** Elimina una profesion */
    function deleteCategory($id){        
        if ($this->authHelper->checkLogin()){
            $success = $this->modelProfessions->remove($id);
            if ($success) {
                $this->view->showInfoCat("Categoria eliminada", "manageCategory");
            } else {
                $this->view->showInfoCat("Error al eliminar la categoria", "manageCategory");
            }
        }else{
            $this->view->popUpInitSesion('Debe estar logueado');
        }
        
    }

    /** Elimina un empleado */
    function deleteWorker($id){
        if ($this->authHelper->checkLogin()){
            $this->modelEmployees->remove($id);
            $this->view->showInfoCat("Trabajador eliminado", "manageWorkers");
        }else{
            $this->view->popUpInitSesion('Debe estar logueado');
        }
    }

    /** muestra el cuadro de edicion de la profesion seleccionada */
    function showEditCategory($id){
        if ($this->authHelper->checkLogin()){
            $category = $this->modelProfessions->get($id);
            $this->view->showEditCat($category);
        }else{
            $this->view->popUpInitSesion('Debe estar logueado');
        }
    }

    /** actualiza la profesion */
    function updateCategory(){
        if ($this->authHelper->checkLogin()){
            $name = $_POST['nameCategory'];
            $id = $_POST['idCategory'];
            if(empty($name) || $name == $this->modelProfessions->getByName($name)->profesion){
                $this->showMenuManageCat("El nombre de la profesion esta vacia o ya existe");
                die();
            }
            $category = $this->modelProfessions->update($id, $name);
            header("Location: " . BASE_URL . "manageCategory"); 
            
        }else{
            $this->view->popUpInitSesion('Debe estar logueado');
        }       
    }

    /** muestra el cuadro de edicion con la persona seleccionada */
    function showEditPerson($id){
        if ($this->authHelper->checkLogin()){
            $person = $this->modelEmployees->get($id);
            $professions = $this->modelProfessions->getAll();
            $this->view->showPers($person, $professions);
        }else{
            $this->view->popUpInitSesion('Debe estar logueado');
        }
              
    }

    /** actualiza los datos luego de ser modificados ADMINISTRADOR */
    function updatePerson(){
        if ($this->authHelper->checkLogin()){
            $id = $_POST['id'];
            $dni = $_POST['dni'];
            $name = $_POST['nombre'];
            $lastname = $_POST['apellido'];
            $mail = $_POST['email'];
            $tel = $_POST['telefono'];
            $prof = $_POST['profesion'];
            $campos = array($dni, $name, $lastname, $mail, $tel, $prof);
            if (!($this->comprobarCampos($campos))){
                $this->showMenuManageWork('Debe completar todos los campos');
                die();
            }
            $this->modelEmployees->update($id, $dni, $name, $lastname, $mail, $tel, $prof);
            header("Location: " . BASE_URL . "manageWorkers");
        }else{
            $this->view->popUpInitSesion('Debe estar logueado');
        }       
    }

    /** lista empleados para la edicion de los mismos */
    function showAgreePerson(){
        if ($this->authHelper->checkLogin()){
            $person = (object) [
                "id_emp" => "",
                "nombre" => "",
                "apellido" => "",
                "id_prof" => "",
                "email" => "",
                "telefono" => "",
                "dni" => ""
            ];
            $categories = $this->modelProfessions->getAll();
            $this->view->showPers($person, $categories);
        }else{
            $this->view->popUpInitSesion('Debe estar logueado');
        }        
    }

    /** agrega una persona ADMINISTRADOR */
    function addPerson(){
        if ($this->authHelper->checkLogin()){
            $dni = $_POST['dni'];
            $name = $_POST['nombre'];
            $lastname = $_POST['apellido'];
            $mail = $_POST['email'];
            $tel = $_POST['telefono'];
            $prof = $_POST['profesion'];
            $campos = array($dni, $name, $lastname, $mail, $tel, $prof);
            if (!($this->comprobarCampos($campos))){
                $this->showMenuManageWork('Debe completar todos los campos');
                die();
            }
            if ($dni == $this->modelEmployees->getByDni($dni)->dni){
                $this->showMenuManageWork('Ya existe una persona con ese DNI');
                die();
            }
            $sucess = $this->modelEmployees->insert($dni, $name, $lastname, $mail, $tel, $prof);
            header("Location: " . BASE_URL . "manageWorkers");
        }else{
            $this->view->popUpInitSesion('Debe estar logueado');
        }
    }

    /** comprueba que los campos no esten vacios durante la edicion */
    function comprobarCampos($campos){
        foreach($campos as $campo){
            if (empty($campo)){
                return false;
                die();
            }
        }
        return true;
    }

    /** obtiene los datos de las personas */
    function verPerfil($persona){
        $perfil = $this->modelEmployees->get($persona);        
        $this->view->Perfil($perfil);
    }

    /** redirije a la pagina para crear una cuenta */
    function createAcount(){
        $jobs=$this->modelProfessions->getAll();
        $this->view->crearAcount($jobs);

    }

    /** crea una cuenta  */
    function upPerson(){

        if (!$this->authHelper->checkLogin()){
            $lastname = $_POST['apellido'];
            $name = $_POST['nombre'];
            $dni = $_POST['dni'];
            $email = $_POST['email'];
            $phone = $_POST['telefono'];
            $categ = $_POST['oficio'];
            $this->showCategories();
            if ($this->modelEmployees->getByDni($dni)!=null){
                $this->view->showError('No se pudo crear el usuario, ya existe uno con ese DNI');
                
            }else{
                $id=$this->modelProfessions->get($categ);
                $this->modelEmployees->insert($dni,$name,$lastname,$email,$phone,$id->id);
                $this->view->showGood($name);
            }
        }
       
    }
}