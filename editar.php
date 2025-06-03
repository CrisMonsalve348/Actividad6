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