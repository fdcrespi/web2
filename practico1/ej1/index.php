<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <!-- 
    1. Escriba un script php que muestre una página html completa generada desde el
    servidor con un encabezado de primer nivel (h1) con el famoso “Hola mundo!”.
    a. ¿Qué extensión debe tener la página?
    b. Lo que acabas de hacer: ¿Es una página dinámica o una página estática? ¿Cuál
    es la diferencia?
    c. ¿Por qué es necesario tener un servidor web para realizar esto? 
    -->

    <?php
        echo "<h1>Hola mundo!</h1>";
        echo "<h2>Respuestas: </h2>";
        echo "<p> a. La página para su funcionamiento debe tener la extensión '.php' </p>";
        echo "<p> b. Es una página dinamica, ya que el cliente le consulta al servidor por la página y este a php, el cual devolverá la parte
        dinamica de la misma. </p>";
        echo "<p> c. El servidor es quien recibe las peticiones del/los clientes para procesarlas y enviar una respuesta.
        En las páginas dinamicas este servidor es capaz de interpretar el programa que va a generar dinamicamente el contenido
        de la respuesta que se le envia al usuario (server-side scripting): </p>
            <li>Procesando información que les llega del mismo. </li>
            <li>Consultando informacion en base de datos. </li>"

    ?>
</body>
</html>