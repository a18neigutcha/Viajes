<?php

require_once 'model.php';
require_once 'view.php';

class controller {
  
  //rutes o esdeveniments possibles
  //view1: nom i edat
  //view2: nom i alçada
  private $peticions = array('view1', 'view2');
  
  public function handler () {
    
    // Què em demanen?
    $event = 'inici';
    
    $uri = $_SERVER['REQUEST_URI'];
    echo $uri;
 
    foreach ($this->peticions as $peticio)
      if (strpos($uri,$peticio) == true)
        $event = $peticio;
          
    $cat = new categories();
    
    $view = new view();
    
    switch ($event) {
        
        
        case 'view1':
          $dades = $cat->selectAll(array("nom","edat"));
          $view->retornar_vista($event, $dades);
          break;
        
        case 'view2':
          $dades = $cat->selectAll(array("nom","alcada"));
          $view->retornar_vista($event, $dades);
          break;
        
        case 'inici':
            $view->retornar_vista($event, array());
        
              
        }
      
  }

  
}





?>