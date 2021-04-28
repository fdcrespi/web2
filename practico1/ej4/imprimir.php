<?php

    echo "
    <a href='imprimir.php?cantidad=5'>Ver los primeros 5</a>
    <a href='imprimir.php?cantidad=20'>Ver los primeros 20</a>
    <a href='imprimir.php?cantidad=100'>Ver los primeros 100</a>
    <a href='imprimir.php?cantidad=130'>Ver Todos</a>
    ";

    $cantidad = intval($_GET["cantidad"]);
    echo "<ul>";
    for ($i = 1; $i <= $cantidad; $i++){
        echo ("<li>Item $i</li>");
    }
    echo "</ul>";