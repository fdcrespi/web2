<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<?php

    $dinero = (float)$_POST["inversion"];
    $porcentaje = (float)$_POST["porcentaje"];
    $ganancias = round($dinero,2);
    echo "<table class='table'><thead><tr><th>mes</th><th>dinero</th><th>dinero con ganancias</th></tr><tbody>";
    for ($i = 1; $i <= 12; $i++){
        echo "<tr>";
        echo "<th> $i </th>";
        echo "<th> $ganancias </th>";
        $ganancias = round($ganancias + ($ganancias * $porcentaje / 100),2);
        echo "<th> $ganancias</th>";
        echo "</tr>";
    }
    echo "</tbody></table>";