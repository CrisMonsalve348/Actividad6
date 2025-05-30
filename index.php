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
            <p>Bienvenido, <?php  echo $_SESSION["usuario"]["nombre"];  ?></p>
            <button id="boton3">Crear entrada</button>
            <button id="boton4">Crear categoria</button>
            <button id="boton5">Mis datos</button>
            <button id="boton6">Cerrar sesión</button>

        </div>

    </section>




</main>

<footer>
    No se lo que dice ahi
</footer>
</body>
</html>