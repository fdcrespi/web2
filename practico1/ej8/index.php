<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <!--  8.   Crear una calculadora básica server side. Esta calculadora debe permitir generar
        operaciones básicas dado dos números leídos desde un formulario.
        Ademas, se deberá incluir una barra de navegación para
        - Acceder a una sección número pi: esta sección debe mostrar mostrar una
        descripción de lo que representa este número y su valor. Investigue diferentes
        formas de obtener este valor en PHP.
        - Acceder a una sección about que indique los creadores de la calculadora. 
    -->
    <ul class="nav nav-tabs m-2">
        <li class="nav-item">
            <a id="calc" class="nav-link" href="index.php?page=calculadora">Calculadora</a>
        </li>
        <li class="nav-item">
            <a id="pi" class="nav-link" href="index.php?page=pi">PI</a>
        </li>
        <li class="nav-item">
            <a id="ayuda" class="nav-link" href="index.php?page=about">Acerca de</a>
        </li>
    </ul>
    <?php
        if (isset($_GET["page"])){
            $pagina = $_GET["page"];
        } else {
            $pagina = "";
        }
        switch ($pagina){
            case "pi": 
                include("pi.php");
            break;
            case "about": 
                include("about.php");
            break;
            default:
                include("calculadora.php");
        }
    ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>