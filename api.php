<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

/*
$experiencias = [
    "1" => ["descripcion" =>"ir en barca"],
    "2" => "viaje a paris",
    "3" => "otra cosa",
    "4" => "y otra"
];*/

require_once 'bd/model.php';

if($_REQUEST['titol']){
    $exp = new experiencia();
    $dades = $exp->selectTitol($_REQUEST['titol']);
}
if($_REQUEST['nomUsuari'] && $_REQUEST['pwd']){
    $usuari=new usuari();
    $dades= $usuari->verificaUsuario($_REQUEST['nomUsuari'],$_REQUEST['pwd']);
    // if($verif['registrado']==1){
    //     $dades="logIn";
    // }else{
    //     $dades="logOut";
    // }
}
if($_REQUEST["logIn"]){
    $exp = new experiencia();
    if($_REQUEST['logIn']=="logIn"){
        $dades = $exp->select10Last(array("*"));  
    }else{
        $dades = $exp->select10Last(array("codExp","titol","text","imatge"));  
        
    }
    
}
echo json_encode($dades);
//echo json_encode($experiencias[$_REQUEST['id_experiencia']]);

?>

