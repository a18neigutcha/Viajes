<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <?php
            require_once '../bd/model.php';
        ?>
    </head>
    <body>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                print_r($_POST);
                if($_POST["submit"]=="Update"){
                    echo "Update";
                }else{
                    $cat=new categories();
                    $cat->delete($_POST["codCat"]);
                }
              }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <table class="egt">
                <tr>
                    <td>Codigo</td>
                    <td>Nombre</td>
                    <td>Option</td>
                </tr>
                
                <?php
                    $cat=new categories();
                    $datos=$cat->selectAll(array("*"));
                    print_r($datos);
                    for($i=0;$i<count($datos);$i++){
                        echo "<tr>";
                            foreach($datos[$i] as $key => $value){
                                echo "<td>";
                                echo $value;
                                echo "<input style=\"display: none;\" type=\"text\" name=".$key." value=".$value.">";
                                echo "</td>";
                            }
                            echo "<td>";
                                
                                echo "<input type=\"submit\" name=\"submit\" value=\"Update\">";
                                echo "<input type=\"submit\" name=\"submit\" value=\"Delete\">";
                            echo "</td>";
                        echo "</tr>";
                    }
                    
                ?>
                
            </table>
        </form>
        
        <br>
        <a href="../index.php">Volver pagina inicio<a>
    </body>
</html>
