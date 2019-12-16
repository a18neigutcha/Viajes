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
}else
if($_REQUEST['nomUsuari'] && $_REQUEST['pwd']){
    $usuari=new usuari();
    $rows= $usuari->selectUsuari($_REQUEST['nomUsuari'],$_REQUEST['pwd']);
    if($rows)
        $dades="logIn";
    else
        $dades="logOut";
}
if($_REQUEST["tipo"]==){
    $exp = new experiencia();
    if($_REQUEST['logIn']=="logIn"){
        $dades = $exp->select10Last(array("*"));  
    }else{
        $dades = $exp->select10Last(array("codExp","titol","text","imatge"));  
        
    }

}
if($_REQUEST['nomUsuari']){
    $exp =new experiencia();
    $dades = $exp->selectUsuari($_REQUEST['nomUsuari']);
}
echo json_encode($dades);
//echo json_encode($experiencias[$_REQUEST['id_experiencia']]);

switch($_REQUEST['tipo']){
    case: "iniciarSesion"
    case:"seleccionar10primeros"
}   
?>



