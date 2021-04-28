<?php
  include_once 'libs/smarty/libs/Smarty.class.php';

class JobView {

  /** muestra la barra lateral que lista las profesiones  */
  function showProfessions($show) {
    $smarty = new Smarty ();
    $smarty->assign('professions' , $show);
    $smarty->display('./templates/workerslist.tpl');
  }
 
  /** muestra en el home todos los trabajadores */
  function showEmployees($employees){  
    $smarty = new Smarty ();
    $smarty->assign('employees', $employees);
    $smarty->display('./templates/lista.tpl');       
  }

  // muestra los trabajadores al elegir la categoria de la barra lateral
  function filterCategories($employees){
    $smarty = new Smarty ();
    $smarty->assign('employees', $employees);
    $smarty->display('./templates/lista.tpl');                
  }  
  // muestra el popup de inicio de sesion
  function popUpInitSesion($msg=null){
    $smarty = new Smarty ();
    $smarty->assign('msg', $msg);
    $smarty->display('./templates/loguin.tpl');
  }
  
  //muestra el menu de manejo de categorias
  function showMenuManageCat($professions, $msg = null){
    $smarty = new Smarty();
    $smarty->assign('professions', $professions);
    $smarty->assign('msg', $msg);
    $smarty->display('templates/menuCategories.tpl');
  }
  //muestra el menu de manejo de empleados
  function showMenuManageWork($employees, $msg = null){
    $smarty = new Smarty();
    $smarty->assign('employees', $employees);
    $smarty->assign('msg', $msg);
    $smarty->display('templates/menuWorkers.tpl');
  }
  //muestra el menu de edicion de empleados
  function showEditCat($category){
    $smarty = new Smarty();
    $smarty->assign('category', $category);
    $smarty->display('modalEditCategory.tpl');
  }
  
  function showPers($person, $professions){
    $smarty = new Smarty();
    $smarty->assign('person', $person);
    $smarty->assign('professions', $professions);
    $smarty->assign('msg', "error");
    $smarty->display('modalEditPerson.tpl');
  }
  //muestra el modal de categorias
  function showInfoCat($msg, $link){
    $smarty = new Smarty();
    $smarty->assign('msg', $msg);
    $smarty->assign('link', $link);
    $smarty->display('modalInfo.tpl');
  }
  // muestra el popup de la persona seleccionada
  function perfil($person){
    $smarty = new Smarty ();
    $smarty->assign('person' , $person);
    $smarty->display('./templates/perfil.tpl');


  }
  //muestra error si es que no existen empleados en esa categoria
  function showError($msg){
    $smarty = new Smarty ();
    $smarty->assign('msg', $msg);
    $smarty->display('./templates/error.tpl');
  }
  //muestra el formulario de creacion de cuenta
  function crearAcount($categories){
     $smarty =new Smarty();
     $smarty->assign('categories', $categories);
     $smarty->display('./templates/newAcount.tpl'); 
  }
  //muestra confirmacion en caso de que se haya podido dar de alta un usuario
  function showGood($nombre){
    $smarty = new Smarty();
    $smarty->assign('nombre',$nombre);
    $smarty->display('./templates/showGood.tpl');
  }
 
     
}               
          
