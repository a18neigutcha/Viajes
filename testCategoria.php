<?php
//select OK
//insert OK
//update OK
    error_reporting(-1);
    ini_set('display_errors','on');
    require_once 'bd/model.php';
    require_once 'bd/core/login.php';

    


    echo "TEST <br><hr>";
    echo"Metode 1<br>";
    // $arr = array("nomUsuari","pwd");
    // $arr_asoc = array(
    //     "titol"=>"viatgeProvaMod",
    //     "data"=>"2000-01-01",
    //     "text"=>"lorem",
    //     "img"=>"img.jpg",
    //     "coordenades"=>"posX,posY",
    //     "valPos"=>3,
    //     "valNeg"=>4,
    //     "estat"=>"acceptada",
    //     "usuari"=>"Ferran",
    //     "codExp"=>7

    // );
    
   // $usu=new usuari();
    //$exp->delete(7);
    //$newUsu=array("nomUsuari"=>"Root2","pwd"=>"1234");
   // $usu->insert($newUsu);
   // $result=$usu->selectUsuari($newUsu["nomUsuari"],$newUsu["pwd"]);
    // if($result){
    //     echo "ok";
    // }else{
    //     echo "Error";
    // }
    //$result = $exp->selectCategoriOrdenado(array("*"),"Platja","Descendent");
    //print_r($result);
    // $str = "";
    // foreach($result as $row){
    //     $str.="<p>".$row['codExp']."->".$row['titol']."->".$row['data']."<p>";
    // }
    // echo $str;
    
    /*
    //$dades=json_decode ($_REQUEST["nuevaExp"],true);
    //print_r($dades) ;
    $user=array(
        "titol"=>"titol prova",
        "data" =>"data prova"
    );
    $cod=1;/*
    function update ($codExp,$user_data = array()) {
        $this->query="UPDATE experiencia SET titol ='".$user_data["titol"]."',data ='".$user_data["data"]."' WHERE codExp='".$codExp."'";
        $this->execute_single_query();
        return $this->rows;
      }
      print_r(update($cod,$user))
    
    echo"<hr>Metode tradicional<br>";
    */
    //inici conexio
    // $conn = new mysqli($servername, $username, $password,$db);
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    // echo "Connected successfully <br>";
    // $sql="SELECT * FROM categories";
    // $result=$conn->query($sql);
    // $conn->close();
    // //fi conexio
    // if ($result->num_rows > 0) {
    // // output data of each row
    //     while($row = $result->fetch_assoc()) {
    //         echo "id: " . $row["codCat"]. " - nom: " . $row["nomCat"]. "<br>";
    //     }
    // } else {
    //     echo "0 results";
    // }
    $exp= new experiencia();

    $resul=$exp->select10Last(array("*"),1,3);

    print_r($resul);
?>