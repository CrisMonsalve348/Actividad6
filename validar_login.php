<?php

require_once "config.php";

$nombre = $contraseña = "";
$nombre_error = $contraseña_error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //VALIDAR NOMBRE
    $input_nombre=trim($_POST["nombre"]);
    if(empty($input_nombre)){
        $nombre_error="El campo est vacio";
    }
    elseif(!filter_var($input_nombre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nombre_error="El nombre solo puede contener caractres de A_Z y a_z";
    }
    else{
        $nombre=$input_nombre;
    }
    //validar contraseña
    $input_contraseña=trim($_POST["password"]);
    if(empty($input_contraseña)){
        $contraseña_error="el campo esta vacio";
    }
    else{
        $contraseña=$input_contraseña;
    }

}



?>