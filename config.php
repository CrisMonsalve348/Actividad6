<?php 
define("DB_SERVIDOR", "localhost");
define("DB_USUARIO", "root");
define("DB_CONTRASEÑA", "");
define("DB_NOMBRE", "blogtematicas");

//Crear conexion a la base e datos 
$conexion=mysqli_connect(DB_SERVIDOR, DB_USUARIO, DB_CONTRASEÑA, DB_NOMBRE);

// Revisar la conexion
if($conexion === false){
    die("ERROR: No se puede conectar" . mysqli_connect_error());
} 


?>