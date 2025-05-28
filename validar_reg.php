<?php 

require_once "config.php";


$nombre =$apellido = $correo = $contraseña=$fecha = "";
$nombre_error=$apellido_error = $correo_error = $contraseña_error=$fecha_error = "";

//procesar formulario
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    //VALIDAR NOMBRE
    $input_nombre=trim($_POST["Nombre"]);
    if(empty($input_nombre)){
        $nombre_error="El campo est vacio";
    }
    elseif(!filter_var($input_nombre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nombre_error="El nombre solo puede contener caractres de A_Z y a_z";
    }
    else{
        $nombre=$input_nombre;
    }
     //VALIDAR apellido
    $input_apellido=trim($_POST["apellido"]);
    if(empty($input_apellido)){
        $apellido_error="El campo est vacio";
    }
    elseif(!filter_var($input_apellido, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $apellido_error="El nombre solo puede contener caractres de A_Z y a_z";
    }
    else{
        $apellido=$input_apellido;
    }
    //validar correo
    $input_correo=trim($_POST["correo"]);
    if(empty($input_correo)){
        $correo_error="el campo est avacio";
    }
    elseif(!filter_var($input_correo, FILTER_VALIDATE_EMAIL)){
        $correo_error="el correo no es valido";
    }
    else{
        $correo=$input_correo;

    }
    //validar fecha
    $input_contraseña=trim($_POST["contraseña"]);
    if(empty($input_contraseña)){
        $contraseña_error="el campo esta vacio";
    }
    else{
        $contraseña=$input_contraseña;
    }
    $input_fecha=trim($_POST["fecha"]);
    if(empty($input_fecha)){
        $fecha_error="el campo esta vacio";
    }
    else{
        $fecha=$input_fecha;
    }


    if(empty($nombre_error) && empty($correo_error) && empty($contraseña_error) && empty($fecha_error)){
        $sql="INSERT INTO usuarios (nombre, apellidos, email, password, fecha) VALUES (?,?,?,?,?)";

        if($stmt=mysqli_prepare($conexion, $sql)){

            mysqli_stmt_bind_param($stmt, "sssss", $param_nombre, $param_apellido, $param_email, $param_password, $param_fecha);//las letras isssss son el tipo de dto de cada parametro
            
            $param_nombre = $nombre;
            $param_apellido = $apellido;
            $param_email = $correo;
            $param_password = $contraseña;
            $param_fecha = $fecha;
            if(mysqli_stmt_execute($stmt)){
                header("Location: logout.php");
                exit();
            } else {
                echo "Ocurrio un error";
            }
        }
        mysqli_stmt_close($stmt);
    }

mysqli_close($conexion);
}



?>