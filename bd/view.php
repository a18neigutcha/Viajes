<?php

class view {
  
  private $diccionari = array (
    'subtitle' => array ('inici' => 'Categorias',
                         'view1' => 'Mostrar categorias',
                         'view2' => 'Mostrar experiencias'),
    'capçalera' => array ('view1' => array('codCat','nomCat','Opcion 1','Opcion 2'),
                         'view2' => array('codExp','titol','data','text','imatge','valPos','valNeg','estat','usuari')));
  

public function retornar_vista ($vista, $dades=array(), $message="Dades de l'usuari") {
	
	// the main template is read (menu, message and the main body (a form or select result)
        // read entire file into a string
	$html = file_get_contents("../admin/site_media/html/persones_template.html");
        //print_r ($html);
	
	// subtitle of the page is writen 
	$html = str_replace('{subtitle}', $this->diccionari['subtitle'][$vista], $html);
        //print_r($html);
	
	// message passed by controller is writen 
	$html = str_replace('{message}', $message, $html);
        //print_r($html);
	
	// the HTML table with the select result is built 
	if ($vista=='view1' || $vista=='view2' ) {
		
		// the view template is read and its contents is included in the main template
		$view = file_get_contents('../admin/site_media/html/view_template.html');
		$html = str_replace ('{main}', $view, $html);
		
		// the table header is built and writen on the template
		$capçalera = $this->buildHeader ($vista);
		$html = str_replace('{capçalera}', $capçalera,$html);
		
		// the table contents is built and writen on the template
		$contingut = $this->buildContents ($dades,$vista);
		$html = str_replace('{contingut}', $contingut, $html);
	}
	
	 
	if ($vista=='inici' || ($vista=='view_select' && count($dades)==0) || $vista=='view_insert')
		$vista='form_select';



	print $html;
} 


private function buildHeader ($vista) {
	$str = "";
	foreach ($this->diccionari['capçalera'][$vista] as $value) 
		$str .= "<th>" . $value . "</th>";
	return $str;
} 


private function buildContents ($dades,$vista) {
	$str = "";
	for ($i=0; $i<count($dades); $i++) {
		$str .= "<tr>";
		foreach ($dades[$i] as $value) 
			$str .= "<td>$value</td>";
		$str .="<td>";
			 
			$str .="<a href=\"./index.php?action=".$vista."&opcion=delete&codCat=".$dades[$i]['codCat']."\">Delete</a>";

		$str .="</td>";
		$str .="<td>";
			 
		$str .="<a href=\"./index.php?action=".$vista."&opcion=update&codCat=".$dades[$i]['codCat']."\">Update</a>";

		$str .="</td>";
		$str .= "</tr>";
	}
	return $str;
}
private function buildDelete(){
	$str = "";
	for ($i=0; $i<count($dades); $i++) {
		$str .= "<tr> <a href=\"./index.php?codCat=".$dades['codCat']."\">Delete</a></tr>";
	}
	return $str;
}


private function buildForm ($vista) {
	$str = "";
	foreach ($this->diccionari['form'][$vista] as $value) {
	
		$str .= "<div> $value </div>";
		$str .= "<div><input type='text' name='$value' id='$value'></div>";	
	}	
	return $str;
	}

}
?>