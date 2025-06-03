<?php 
session_start();
require_once "config.php";
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
    echo "<h1>Escribe aqui tu entrada, ".$_SESSION["usuario"]["nombre"];
    echo "</h1>";
    ?>
<form action="Entrada.php" method="post">
    Agregar titulo
    <input type="text" name="titulo">
    <br>
    agregar subtitulo
    <input type="text" name="subtitulo">
    <br>
   <textarea name="explicacion" id="explicacion" placeholder="aqui tu exolicacion" rows="20" cols="80"></textarea>
    <br>
    <input type="submit" value="enviar entrada">
</form>  

<?php 
$titulo=$subtitulo=$explicacion="";
$tituloerror=$subtituloerror=$explicacionerror="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
$input_titulo=trim($_POST["titulo"]);
if(empty($input_titulo)){
    $tituloerror="El campo de titulo está vacio";
    echo $tituloerror;
    
}
else{
    $titulo=$input_titulo;
}
if(empty($input_subtitulo)){
    $subtituloerror="El campo de subtitulo está vacio";
    echo $subtituloerror;
    
}
else{
    $subtitulo=$input_subtitulo;
}
if(empty($input_titulo)){
    $tituloerror="El campo de titulo está vacio";
    echo $tituloerror;
    
}
else{
    $titulo=$input_titulo;
}
if(empty($input_explicacion)){
    $explicacionerror="El campo de descripcion está vacio";
    echo $explicacionerror;
    
}
else{
    $explicacion=$input_explicacion;
}
}


?>
</body>
</html>