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
    $this->query="SELECT * FROM usuari WHERE nomUsuari='".$nom."'";
    $this->get_results_from_query();
    return $this->rows;
  }
  public function selectUsuari($nomUsuari="",$pwd="") {
    $this->query="SELECT * FROM usuari WHERE nomUsuari='".$nomUsuari."' AND  pwd='".$pwd."' ";
    $this->get_results_from_query();
    return $this->rows;
  }
  
  
  public function insert($user_data = array()) {
    $this->query ="INSERT INTO usuari values('".$user_data["nomUsuari"]."','".$user_data["pwd"]."')";
    $this->execute_single_query();
    return $this->rows; 
  }
  
  public function update ($user_data = array()) {
    $this->query ="UPDATE usuari SET nomUsuari='".$user_data["nomUsuari"]."', pwd='".$user_data["pwd"]."' WHERE nomUsuari='".$user_data["oldNomUsuari"]."'";
    $this->execute_single_query();
    return $this->rows;  
  }

  public function delete ($nom="") {
    $this->query="DELETE FROM usuari where nomUsuari='".$nom."'";
    $this->execute_single_query();
    return $this->rows; 
  }

  public function verificaUsuario($nom="",$pwd=""){
    $this->query="SELECT * from usuari where nomUsuari='".$nom."'and pwd='".$pwd."'";
    $this->execute_single_query();
    return $this->rows;
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
  
  
  public function select($titol="") {
    $this->query="SELECT * FROM experiencia WHERE titol=".$titol;
    $this->get_results_from_query();
    return $this->rows;
  }
  public function selectTitol($titol){
    $this->query="SELECT * FROM experiencia WHERE titol='".$titol."'";
    $this->get_results_from_query();
    return $this->rows;
  }
  public function selectConCategoria(){
    $this->query="SELECT E.*, C.nomCat FROM experiencia E, categories C, pertany P WHERE E.codExp = P.codExp AND P.codCat = C.codCat";
    $this->get_results_from_query();
    return $this->rows;
  }
  public function selectCodExp($codExp){
    $this->query ="SELECT * FROM experiencia WHERE codExp='".$codExp."'";
    $this->get_results_from_query();
    return $this->rows;
  }
  public function selectUsuari($usuari){
    $this->query="SELECT * FROM experiencia WHERE usuari='".$usuari."'";
    $this->get_results_from_query();
    return $this->rows;
  }
  public function select10Last($fields=array()){
    $this->query="SELECT ";
    $firstField = true;
    for ($i=0; $i<count($fields); $i++) {
      if ($firstField) {
        $this->query .= "E.".$fields[$i];
        $firstField=false;
      }
      else $this->query .= ", " . $fields[$i];
    }
    $this->query .= ", C.nomCat";
    $this->query .= " FROM experiencia E, categories C, pertany P WHERE E.codExp = P.codExp AND P.codCat = C.codCat ORDER BY codExp DESC LIMIT 10";
    $this->get_results_from_query();
    return $this->rows;
  }

  public function insert($user_data = array()) {
    $this->query="INSERT INTO experiencia (titol,data,text,imatge,coordenades,valPos,valNeg,estat,usuari) 
                  VALUES ('".$user_data["titol"]."','".$user_data["data"]."','".$user_data["text"]."','".$user_data["img"]."','".$user_data["coordenades"]."','".
                  $user_data["valPos"]."','".$user_data["valNeg"]."','".$user_data["estat"]."','".$user_data["usuari"]."')";
    $this->execute_single_query();
    return $this->rows;
  }
  
  public function update ($user_data = array()) {
    $this->query="UPDATE experiencia SET titol ='".$user_data["titol"]."',data ='".$user_data["data"]."', text='".$user_data["text"]."',
    imatge ='".$user_data["imatge"]."',coordenades ='".$user_data["coordenades"]."',valPos ='".$user_data["valPos"]."',valNeg ='".$user_data["valNeg"]."',
    estat ='".$user_data["estat"]."',usuari ='".$user_data["usuari"]."' WHERE codExp='".$user_data["codExp"]."'";
    $this->execute_single_query();
    return $this->rows;
  }
  public function updateCodExp ($codExp,$user_data = array()) {
    $this->query="UPDATE experiencia SET titol ='".$user_data["titol"]."', text='".$user_data["text"]."',
    imatge ='".$user_data["imatge"]."',coordenades ='".$user_data["coordenades"]."',valPos ='".$user_data["valPos"]."',valNeg ='".$user_data["valNeg"]."',
    estat ='".$user_data["estat"]."',usuari ='".$user_data["usuari"]."' WHERE codExp='".$codExp."'";
    $this->execute_single_query();
    return $this->rows;
  }
  public function updateValoracion ($codExp,$newVal,$tipo) {
    if($tipo==1){
      $this->query="UPDATE experiencia SET valPos ='".$newVal."' WHERE codExp='".$codExp."'";
    }else{
      $this->query="UPDATE experiencia SET valNeg ='".$newVal."' WHERE codExp='".$codExp."'";
    }
    $this->execute_single_query();
    return $this->rows;
  }
 
  public function delete ($codExp="") {
    $this->query="DELETE FROM experiencia where codExp='".$codExp."'";
    $this->execute_single_query();
    return $this->rows;
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
