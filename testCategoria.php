<?php
//select OK
//insert OK
//update OK

    echo "START testCategoria.php <br>";
    error_reporting(-1);
    ini_set('display_errors','on');
require_once 'bd/model.php';
require_once 'bd/core/login.php';

    
    echo "TEST <br><hr>";
    echo"Metode 1<br>";
    $arr = array("codCat","nomCat");
    $cat = new categories();
    $cat->delete(7);
    $result= $cat->selectAll(array("*"));
    $str = "";
    foreach($result as $row){
        $str.="<p>".$row['codCat']."->".$row['nomCat']."<p>";
    }
    echo $str;
    echo"<hr>Metode tradicional<br>";
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
    echo "<br>fi<br>"
?>