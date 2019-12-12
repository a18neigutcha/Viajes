<?php

// magic constant
require_once ("core/DBAbstractModel.php");
class usuari extends DBAbstractModel {
  
  private $nomUsuari;
  private $pwd;

  public $message;
  
  function __construct() {
    $this->db_name = "viajes";
    }
  
  function __toString() {
    echo "entro string <br>";
    return "(" . $this->nomUsuari . ", " . $this->pwd . ")";
  }
  
  function __destruct() {
   // unset ($this);
  }
  

  
  //select dels camps passats de tots els registres
  //stored in $rows property
  public function selectAll($fields=array()) {
    
    $this->query="SELECT ";
    $firstField = true;
    for ($i=0; $i<count($fields); $i++) {
      if ($firstField) {
        $this->query .= $fields[$i];
        $firstField=false;
      }
      else $this->query .= ", " . $fields[$i];
    }
    $this->query .= " FROM usuari";
    $this->get_results_from_query();
    return $this->rows;
    
  }
  
  public function select($nom="") {

  }
  
  
  public function insert($user_data = array()) {
    
  }
  
  public function update ($userData = array()) {
   
  }
 
  public function delete ($nom="") {
  
  }
 
    
}
class experiencia extends DBAbstractModel {
  
  private $codExp;
  private $titol;
  private $data;
  private $text;
  private $imatge;
  private $cordenades;
  private $valPos;
  private $valNeg;
  private $estat;
  private $usuari;

  public $message;
  
  function __construct() {
    $this->db_name = "viajes";
    }
  
  function __toString() {
    echo "entro string <br>";
    return "(" . $this->codExp . ", " . $this->titol .", " . $this->data .", " . $this->text .", " . $this->imatge .", " . $this->cordenades 
    .", " . $this->valPos .", " . $this->valNeg .", " . $this->estat .", " . $this->usuari . ")";
  }
  
  function __destruct() {
   // unset ($this);
  }
  

  
  //select dels camps passats de tots els registres
  //stored in $rows property
  public function selectAll($fields=array()) {
    
    $this->query="SELECT ";
    $firstField = true;
    for ($i=0; $i<count($fields); $i++) {
      if ($firstField) {
        $this->query .= $fields[$i];
        $firstField=false;
      }
      else $this->query .= ", " . $fields[$i];
    }
    $this->query .= " FROM experiencia";
    $this->get_results_from_query();
    return $this->rows;
    
  }
  
  public function selectTitol($titol="") {
    $this->query="SELECT * FROM experiencia WHERE titol=".$titol;
    $this->get_results_from_query();
    return $this->rows;
  }
  public function select($titol="") {
    $this->query="SELECT * FROM experiencia WHERE titol=".$titol;
    $this->get_results_from_query();
    return $this->rows;
  }
  public function select10Last($fields=array()){
    $this->query="SELECT ";
    $firstField = true;
    for ($i=0; $i<count($fields); $i++) {
      if ($firstField) {
        $this->query .= $fields[$i];
        $firstField=false;
      }
      else $this->query .= ", " . $fields[$i];
    }
    $this->query .= " FROM experiencia ORDER BY codExp DESC LIMIT 10";
    $this->get_results_from_query();
    return $this->rows;
  }

  public function insert($user_data = array()) {
  }
  
  public function update ($userData = array()) {
   
  }
 
  public function delete ($nom="") {
  
  }
 
    
}

class categories extends DBAbstractModel{
  
  private $codCat;
  private $nomCat;
  
  function __construct() {
    $this->db_name = "viajes";
    }
  
  function __toString() {
    return "(" . $this->codCat . ", " . $this->nomCat  . ")";
  }
  
  function __destruct() {
   // unset ($this);
  }
  
  public function selectAll($fields=array()){
    
    $this->query="SELECT ";
    $firstField = true;
    for ($i=0; $i<count($fields); $i++) {
      if ($firstField) {
        $this->query .= $fields[$i];
        $firstField=false;
      }
      else $this->query .= ", " . $fields[$i];
    }
    $this->query .= " FROM categories";
    $this->get_results_from_query();
    return $this->rows;

  }
  
  public function select($nomCat=""){
    
    $this->query="SELECT * FROM categories WHERE nomCat='".$nomCat."'";
    $this->get_results_from_query();
    return $this->rows;
    
  }
  public function insert($value=""){
    
    $this->query="INSERT INTO categories (nomCat) VALUE ('".$value."')";
    $this->execute_single_query();
    return $this->rows;
    
    
  }
  public function update($id="",$nouNom=""){
    
    $this->query ="UPDATE categories SET nomCat='".$nouNom."' WHERE codCat='".$id."'";
    $this->execute_single_query();
    return $this->rows;  
    
  }
  public function updateNom($nom="",$nouNom=""){
    
    $this->query ="UPDATE categories SET nomCat='".$nouNom."' WHERE nomCat='".$nom."'";
    $this->execute_single_query();
    return $this->rows;
    
  }
  public function delete($codCat=""){
    
    $this->query="DELETE FROM categories WHERE codCat='".$codCat."'";
    $this->execute_single_query();
    return $this->rows;
    
  }
} 
?>
