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

    if(!empty($nombre_error && $contraseña_error)){
        echo '<a href="logout.php"><button>Volver a página de inicio</button></a>';
    }
    if(empty($nombre_error && $contraseña_error)){
        $sql="SELECT * FROM usuarios WHERE nombre=? AND password=?";
        $stmt=mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $nombre,$contraseña);
        mysqli_stmt_execute($stmt);
        $resultado=mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) == 1){
        $usuario = mysqli_fetch_assoc($resultado);
        session_start();
        $_SESSION["usuario"]=$usuario;
        header("location:index.php");
    }
    else{
        echo "El nombre o la contraseña son incorrectos";
        echo "<br>";
       echo '<a href="logout.php"><button>Volver a página de inicio</button></a>';
       echo $usuario[nombre];
    }
       
    }

}



?>