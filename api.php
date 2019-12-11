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


$exp = new experiencia();
$dades = $exp->select10Last(array("*"));
echo json_encode($dades);
//echo json_encode($experiencias[$_REQUEST['id_experiencia']]);

?>

