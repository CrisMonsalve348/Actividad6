<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad_6</title>
    <link rel="stylesheet" href="./estilos/main_style.css">
</head>
<body>
    <?php 
    session_start();
    require_once "config.php";
    
    ?>
    <h1 class="main_title">Blog de "Inserte tema"</h1>

    <nav>
        <ul>
            <li class="primerli">
                <a href="#">Inicio</a>
            </li>
            <li>
               <a href="#">Noticias</a> 
            </li>
            <li>
                <a href="#">Sobre mi</a>
            </li>
            <li>
                <a href="#">Contacto</a>

            </li>

        </ul>
    </nav>
    <main>
    <section class="main">
    <?php 
    echo "Nombre: ". $_SESSION["usuario"]["nombre"];
    echo "<br>";
    echo "Apellido: ". $_SESSION["usuario"]["apellidos"];
    echo "<br>";
    echo "Correo electrónico: ".$_SESSION["usuario"]["email"];
    echo "<br>";
    ?>
    <form action="editar.php" method="post">
    Nuevo nombre
    <input type="text" name="newname">
    <br>
    nuevoapellido
    <input type="text" name="newlastname">
    <br>
    nuevo correo 
    <input type="text" name="newemail">
    <br>
    <input type="date" name="newdate">
    <br>
    <input type="submit" value="enviar">
    

    
    </form>

    <?php 
    
$nombre =$apellido = $correo = $contraseña=$fecha = "";
$nombre_error=$apellido_error = $correo_error = $contraseña_error=$fecha_error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

     //VALIDAR NOMBRE
    $input_nombre=trim($_POST["newname"]);
    if(empty($input_nombre)){
        $nombre_error="El campo esta vacio";
    }
    elseif(!filter_var($input_nombre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nombre_error="El nombre solo puede contener caractres de A_Z y a_z";
    }
    else{
        $nombre=$input_nombre;
    }
     //VALIDAR apellido
    $input_apellido=trim($_POST["newlastname"]);
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
    $input_correo=trim($_POST["newemail"]);
    if(empty($input_correo)){
        $correo_error="el campo est avacio";
    }
    elseif(!filter_var($input_correo, FILTER_VALIDATE_EMAIL)){
        $correo_error="el correo no es valido";
    }
    else{
        $correo=$input_correo;

    }
     $input_fecha=trim($_POST["newdate"]);
    if(empty($input_fecha)){
        $fecha_error="el campo esta vacio";
    }
    else{
        $fecha=$input_fecha;
    }
     if(empty($nombre_error) && empty($correo_error) && empty($fecha_error)){
        $sql="UPDATE usuarios SET nombre=?, apellidos=?, email=?, fecha=? WHERE id=".$_SESSION["usuario"]["id"];

        if($stmt=mysqli_prepare($conexion, $sql)){

            mysqli_stmt_bind_param($stmt, "ssss", $param_nombre, $param_apellido, $param_email, $param_fecha);//las letras isssss son el tipo de dto de cada parametro
            
            $param_nombre = $nombre;
            $param_apellido = $apellido;
            $param_email = $correo;
            $param_fecha = $fecha;
            if(mysqli_stmt_execute($stmt)){
                header("location:logout.php");
                exit();
                session_destroy();
                
            } else {
                echo "Ocurrio un error";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conexion);
}
    
    
    ?>

    
    
   
        

    </section>
    
    <section class="lateral">
        <div class="buscador">
            <h2>Buscar</h2>
            <input type="text">
            <button>Buscar</button>
        </div>

        <div class="opciones">
            <form action="index.php" method="get">
            <p>Bienvenido, <?php  echo $_SESSION["usuario"]["nombre"];  ?></p>
            <button id="boton3">Crear entrada</button>
            <button id="boton4">Crear categoria</button>
           <input type="submit" id="boton5" name="boton5" value="Mis datos">
            <input type="submit" id="boton6" name="boton6" value="cerrar sesion">
            </form>

        </div>

    </section>




</main>

<footer>
    No se lo que dice ahi
</footer>
</body>
</html>
<?php

//editar datos
if(isset($_GET["boton5"])){
    header("location:editar.php");
}

//cerrar sesion
if(isset($_GET["boton6"])){
    session_destroy();
    header("location:logout.php");
}


?>