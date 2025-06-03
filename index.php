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
            <?php 
            $lista_cat=$_SESSION["categorias"];
            foreach($lista_cat as $item){
                echo "<li> <a>". $item ."</a></li>";
            }
            
            
            ?>

        </ul>
    </nav>
    <main>
    <section class="main">
        <h1>inserte titulo weon</h1>
        <h4>subtitulo weon</h4>
        <h6>fecha y nombre weon</h6>
        <p class="informacion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur placeat cupiditate a nam necessitatibus dolorem autem tempore praesentium debitis, sapiente unde aut, consequuntur accusamus natus. Repellendus eius laudantium error impedit?</p>

        <div class="botones">
            <button id="boton1">Editar entrada</button>
            <button id="boton2">Eliminar entrada</button>
        </div>
        

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
            <input type="submit" id="boton3" name="boton3" value="Crear Entrada">
            <input type="submit" id="boton4" name="boton4" value="Crear categoria">
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
//crear entradas
if(isset($_GET["boton3"])){
    header("location:entrada.php");
}
//crear categorias
if(isset($_GET["boton4"])){
    header("location:categoria.php");
}
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