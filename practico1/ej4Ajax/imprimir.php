<?php

    $cantidad = intval($_GET["cantidad"]);
    echo "<ul>";
    for ($i = 1; $i <= $cantidad; $i++){
        echo ("<li>Item $i</li>");
    }
    echo "</ul>";
?>