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

    $cat = new categories();
    $exp=new experiencia();

    foreach ($this->peticions as $peticio)
      if (strpos($uri,$peticio) == true){
          $event = $peticio;
          $posInicio=strpos($uri,"codCat");
          $codCat=substr($uri,$posInicio+7);
          if(strpos($uri,"delete")==true){
            $cat->delete($codCat);
          }
          if(strpos($uri,"update")==true){
           // $cat->update($codCat,$nom);
           echo "categoria modificada";
          }
      }
        
          
    
    
    $view = new view();
    
    switch ($event) {
        
        
        case 'view1':
          $dades = $cat->selectAll(array("*"));
          $view->retornar_vista($event, $dades);
          break;
        
        case 'view2':
          $dades = $exp->selectAll(array('codExp','titol','data','text','imatge','valPos','valNeg','estat','usuari'));
          $view->retornar_vista($event, $dades);
          break;
        
        case 'inici':
            $view->retornar_vista($event, array());
        
              
        }
      
  }

  
}





?>