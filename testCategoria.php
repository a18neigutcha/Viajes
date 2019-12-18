<?php
//select OK
//insert OK
//update OK
    error_reporting(-1);
    ini_set('display_errors','on');
    require_once 'bd/model.php';
    require_once 'bd/core/login.php';

    


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
    $conn = new mysqli($servername, $username, $password,$db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully <br>";
    $sql="SELECT * FROM categories";
    $result=$conn->query($sql);
    $conn->close();
    //fi conexio
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["codCat"]. " - nom: " . $row["nomCat"]. "<br>";
        }
    } else {
        echo "0 results";
    }
?>