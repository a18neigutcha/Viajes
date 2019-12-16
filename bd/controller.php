<?php

require_once 'model.php';
require_once 'view.php';

class controller {
  
  public function cargaDatosInicio () {     


    $exp = new experiencia();
    $view = new view();

    $dades = $exp->selectAll(array("*"));
    $view->retornarVista($dades);     
  } 
}
?>