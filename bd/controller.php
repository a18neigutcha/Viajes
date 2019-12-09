<?php

require_once 'model.php';
//require_once 'view.php';

class controller {
  
  public function handler () {
          
    $per = new usuari();
    
    //$view = new view();
        
        
    $dades = $per->selectAll(array("nomUsuari","pwd"));
    print_r($dades);
      
  }

  
}





?>