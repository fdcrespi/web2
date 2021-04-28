<?php
    $altura = $_GET["altura"];
    $peso = $_GET["peso"];
    if ($altura && $peso){
        $ICM = $peso / pow($altura,2);
        echo "su ICM es: $ICM <br>";
        if ($ICM < 18.50) {
            echo "Su peso es bajo";
        } else if ($ICM < 24.99) {
            echo "Su peso es Normal";
        } else if (($ICM >= 25) && ($ICM < 30)) {
            echo "Usted tiene sobrepeso";
        } else if ($ICM >= 30) {
            echo "Posee Obesidad";
        }
    } else "error al ingresar los datos";
?>

<a href="index.php">Volver</a>