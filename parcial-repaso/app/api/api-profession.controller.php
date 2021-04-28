<?php

require_once 'app/models/professions.model.php';
require_once 'app/api/api.view.php';

class ApiProfessionController{

    private $model;
    private $view;
    private $data;

    function __construct(){
        $this->model = new ProfessionModel();
        $this->view = new APIView();
        /**Obtengo lo que tengo por post, como texto */
        $this->data = file_get_contents('php://input');
    }

    /**Funcion que convierte la variable data en JSON */
    private function getData($params = null){
        return json_decode($this->data);
    }

    /** Agrega una profesion */
    public function add($params = null){
        $body = $this->getData();
        //recupero en variable el cuerpo de lo que tiene $body
        $nombre = $body->nombre;
        echo ($nombre);
        $id = $this->model->insert($nombre);
        if ($id){
            $this->view->response($id, 200);
        } else {
            $this->view->response("No se pudo insertar", 404);
        }   
    }

    /** Actualiza una profesion */
    public function update($params = null){
        $idProfession = $params[':ID'];
        $body = $this->getData();
        $newName = $body->nombre;
        $id = $this->model->update($idProfession, $newName);
        if ($id){
            $this->view->response($idProfession, 200);
        } else {
            $this->view->response("No se pudo actualizar", 404);
        }
    }

    /** obtiene todas las profesiones */
    public function getAll($params = null){
        //retorna json
        $professions = $this->model->getAll();
        if ($professions){
            $this->view->response($professions, 200);
        } else {
            $this->view->response("No se encontraron profesiones", 500);
        }
    }

    /** obtiene una profesion */
    public function get($params = null){
        $idProfession = $params[':ID'];
        $profession = $this->model->get($idProfession);
        if ($profession){
            $this->view->response($profession, 200);
        } else {
            $this->view->response("la profesion con el id=$idProfession no existe", 404);  
        }
    }

    /** Elimina una profesion */
    public function delete($params = null){
        $idProfession = $params[":ID"];
        $success = $this->model->remove($idProfession);
        if ($success){
            $this->view->response("La profesion se elimino satisfactoriamente", 200);
        } else {
            $this->view->response("La profesion no puede ser eliminada", 404);
        }
    }

}