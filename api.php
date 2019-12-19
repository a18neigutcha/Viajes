<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');


require_once 'bd/model.php';

function saneaCadena($cadena){
    $cadena = filter_var($cadena,FILTER_SANITIZE_STRING);
    $cadena = filter_var($cadena,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cadena = filter_var($cadena,FILTER_SANITIZE_SPECIAL_CHARS);
    return $cadena;
}


if($_REQUEST["nuevaExp"]){
    $exp = new experiencia();
    $dadesExp=json_decode ($_REQUEST["nuevaExp"],true);
    $verif=$exp->insert($dadesExp);
    if($verif){
        $dades="ok";
    }else{
        $dades="Error";
    }
}
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
            saneaCadena($_REQUEST['titol']);
            $dades = $exp->selectTitol($_REQUEST['titol']);
        }else $dades="INPUT DATA ERROR: cargaExpTitol";
        break;
    case "logInUsuario":
        if($_REQUEST['nomUsuari'] && $_REQUEST['pwd']){
            $usuari=new usuari();
            saneaCadena($_REQUEST['nomUsuari']);
            saneaCadena($_REQUEST['pwd']);
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
            saneaCadena($_REQUEST['nomUsuari']);
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
        $dades = $exp->selectCategori(array("*"),$_REQUEST['categoria']);  
        break;
    case "cargaDatosOrdenados":
        $dades = $exp->selectOrdenado(array("*"),$_REQUEST['orden']);  
        break;
    case "cargaDatosFiltradosYOrdenados":
        $dades = $exp->selectCategoriOrdenado(array("*"),$_REQUEST['categoria'],$_REQUEST['orden']);  
        break;
    case "insertaUsuarioEnBD":
        $usuari=new usuari();
        $verif=$usuari->select($_REQUEST['nomUsuari']);
        if($verif){
            $dades="Error->Usuario existente";
        }else{
            $newUsu=array("nomUsuari"=>$_REQUEST['nomUsuari'],"pwd"=>$_REQUEST['pwd']);
            $usuari->insert($newUsu);
            $verif=$usuari->selectUsuari($_REQUEST['nomUsuari'],$_REQUEST['pwd']);  
            $dades="ok";
            
        }
        break;
    case 'datosExperiencia':
        if($_REQUEST['codExp'])
            $dades=$exp->selectCodExp($_REQUEST['codExp']);     
        else $dades="error";
        break;
    case 'actualizaExperiencia':
            if($_REQUEST['codExp'] && $_REQUEST['experiencia']){
                $dadesExp=json_decode ($_REQUEST['experiencia'],true);
                $verif = $exp->updateCodExp($_REQUEST['codExp'],$dadesExp);
                if($verif){
                    $dades="ok";
                }else{
                    $dades="Error";
                }
            }
            else $dades = "ERROR PARAMETROS";
        break;
    default:
        $dades="REQUEST ERROR: TIPO ERRONEO";
        break;
    }
    


echo json_encode($dades);
?>
