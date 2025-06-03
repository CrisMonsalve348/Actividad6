<?php
require_once "config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    echo "<h1>haz aqui tu categoria, ". $_SESSION["usuario"]["nombre"];
    echo "</h1>"; 
    ?>
    <br>
    <form action="categoria.php" method="post">
        Nombre de categoria 
        <br>
        <input type="text" name="categoria">
        <br>
        <input type="submit" value="enviar">
    </form>


    <?php  
    $categoria="";
    $categoriaerror="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //VALIDAR CATEGORIA
        $inputcategoria=trim($_POST["categoria"]);
        if(empty($inputcategoria)){
            $categoriaerror="El campo esta vacio";
            echo $categoriaerror;

        }
        else{
            $categoria=$inputcategoria;
        }
        if(empty($categoriaerror)){
            $sql="INSERT INTO categorias (nombre) VALUES(?)";
            if($stmt=mysqli_prepare($conexion, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_categoria);
            
            $param_categoria=$categoria;
            
            if(mysqli_stmt_execute($stmt)){
                
               $_SESSION["categorias"][] = $categoria;
                header("Location:index.php");
                 exit();
            } 
            else {
                echo "Ocurrio un error";
            }
        }
         mysqli_stmt_close($stmt);

        }
        mysqli_close($conexion);
    }
    ?>
</body>
</html>