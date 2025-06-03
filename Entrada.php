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
<form action="index.php" method="post">
    Agregar titulo
    <input type="text" name="titulo">
    <br>
    agregar subtitulo
    <input type="text" name="subtitulo">
    <br>
   <textarea name="explicacion" id="explicacion" placeholder="aqui tu exolicacion" rows="5" cols="40"></textarea>
    <br>
    <input type="submit" value="enviar entrada">
</form>    
</body>
</html>