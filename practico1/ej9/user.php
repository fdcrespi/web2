<?php
    $nombre = $_GET["nombre"];
    $apellido = $_GET["apellido"];
    $edad = $_GET["edad"];
    $sexo = $_GET["sexo"];
    $pais = $_GET["pais"];
    $intereses = $_GET['intereses'];
    if ($nombre && $apellido && $edad) {
        echo "el nombre de la persona es $nombre, $apellido <br>";
        echo "Edad: $edad años <br>";
        echo "Sexo: $sexo <br>";
        echo "Nacionalidad: $pais <br>";
        if (!empty($intereses)){
            echo "Y sus intereses son: <br>";
            foreach ($_GET['intereses'] as $interes){
                echo "<li>".$interes."</li>";
            }
        }
    } else {
        echo "Error al completar los datos";
    }
    echo "<br>";
    echo "a. La diferencia entre el metodo de envio GET Y POST es que en ambas respuestas HTTP esta es codificada, pero
    en la primera se envia a traves de la url, y en la segunda se hace en el cuerpo de la respuesta, por lo tanto no es 
    visible en esta URL.
        En caso de que querramos enviar url dinamicas con ciertos parametros no necesariamente seguros, es mejor utilizar GET, 
    pero para mayor seguridad es mejor POST. <br>";
    echo "c. La diferencia entre realizar las verificaciones del lado del servidor y del cliente, es que en ambos casos cada uno revisa que
    la informacion este correcta, El cliente que la que envia y en tanto el servidor que la que recibe.";