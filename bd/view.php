<?php

	class view {
	
		//De momento no es necesario trabajar con diccionarios
		private $diccionari = array ('experiencias');
		

		public function retornarVista ($dades) {
			
			$html = file_get_contents('Modelo(index).html');

			$html = str_replace('{experiencias}', $this->buildExp($dades), $html);

			print $html;
		} 


		private function buildExp($dades) {
			$str = "";
			foreach($dades as $row){
				$str.="<p>".$row['titol']."<p>";
			}
			return $str;
		}
	} 

?>