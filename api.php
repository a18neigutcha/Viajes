<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');


require_once 'bd/model.php';

/*if($_REQUEST['titol']){
    $exp = new experiencia();
    $dades = $exp->selectTitol($_REQUEST['titol']);
}
if($_REQUEST['nomUsuari'] && $_REQUEST['pwd']){
    $usuari=new usuari();
    $rows= $usuari->selectUsuari($_REQUEST['nomUsuari'],$_REQUEST['pwd']);
    if($rows)
        $dades="logIn";
    else
        $dades="logOut";
}
if($_REQUEST['logIn']){
    $exp = new experiencia();
    if($_REQUEST['logIn']=="logIn"){
        $dades = $exp->select10Last(array("*"));  
    }else{
        $dades = $exp->select10Last(array("codExp","titol","text","imatge"));  
        
    }

}
if($_REQUEST["nuevaExp"]){
    $exp = new experiencia();
    $dadesExp=json_decode ($_REQUEST["nuevaExp"],true);
    $verif=$exp->insert($dadesExp);
    if($verif>0){
        $dades="ok";
    }else{
        $dades="Error";
    }
}*/
$exp =new experiencia();
switch ($_REQUEST['tipo']){
    case "cargaDatosIniciales":
        if($_REQUEST['logIn']){
            if($_REQUEST['logIn']=="logIn"){
                $dades = $exp->select10Last(array("*"));  
            }else{
                $dades = $exp->select10Last(array("codExp","titol","text","imatge"));   
            }
        }else $dades="INPUT DATA ERROR: cargaDatosUsuario";
        break;
    case "cargaDatosActualizados":
        if($_REQUEST['logIn']){
            if($_REQUEST['logIn']=="logIn"){
                $dades = $exp->select10Last(array("*"));  
            }else{
                $dades = $exp->select10Last(array("codExp","titol","text","imatge"));   
            }
        }else $dades="INPUT DATA ERROR: cargaDatosActualizados";
        break;
    case "cargaExpTitol":
        if($_REQUEST['titol']){
            $dades = $exp->selectTitol($_REQUEST['titol']);
        }else $dades="INPUT DATA ERROR: cargaExpTitol";
        break;
    case "logInUsuario":
        if($_REQUEST['nomUsuari'] && $_REQUEST['pwd']){
            $usuari=new usuari();
            $rows= $usuari->selectUsuari($_REQUEST['nomUsuari'],$_REQUEST['pwd']);
            if($rows)
                $dades="logIn";
            else
                $dades="logOut";
        }
        else $dades="INPUT DATA ERROR: logInUsuario";
        break;
    case "listaExpUsuario":
        if($_REQUEST['nomUsuari']){
            $dades = $exp->selectUsuari($_REQUEST['nomUsuari']);
        }else $dades="INPUT DATA ERROR: ListaExpUsuario";
        break;
    case "insertaNuevaExp":
        if($_REQUEST["nuevaExp"]){
            $dadesExp=json_decode ($_REQUEST["nuevaExp"],true);
            $verif=$exp->insert($dadesExp);
            if($verif>0){
                $dades="ok";
            }else{
                $dades="Error";
            }
        }else $dades="INPUT DATA ERROR: NuevaExp";
        break;
    case "valoracion":
        if($_REQUEST["codExp"] && $_REQUEST["newVal"]){
            $verif=$exp->updateValoracion($_REQUEST["codExp"], $_REQUEST["newVal"], $_REQUEST["positiva"]);
            if($verif>0){
                $dades=$varif;
            }else{
                $dades="Error";
            }
        }
        break;
    case "cargaDatosPorCategoria":
        if($_REQUEST["categoria"]){
            if($_REQUEST['logIn']=="logIn"){
                $dades = $exp->selectCategori(array("*"),$_REQUEST["categoria"]);  
            }else{
                $dades = $exp->selectCategori(array("codExp","titol","text","imatge"),$_REQUEST["categoria"]);   
            }
        }else $dades="Error categoria";
            
        break;
    default:
        $dades="REQUEST ERROR: TIPO ERRONEO";
        break;
    }  


echo json_encode($dades);
?>
