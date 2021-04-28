<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 2. Escribir un programa que muestre una lista html generada desde el servidor a través de
        un arreglo. Identifique las diferencias entre arreglos asociativos e indexados (ver docu
        oficial) 
    -->
    <?php
        $arreglo = array("fede","bauti","estefi");
        $arrasoc = array(
            "bebe" => "bauti",
            "mama" => "estefi",
            "papa" => "fede"
        );
        echo "<ol> lista de arreglo";
        foreach ($arrasoc as $clave => $valor){
            echo"<li>$clave - $valor</li>";
        }
        echo "</ol>";
        echo "<p> La diferencia entre un arreglo asociativo e indexado es que en los primeros, la clave asociada al valor es un numero, 
        comenzando por el 0(cero), en cambio en los segundos esa clave puede ser personalizada por cada uno. 
        En el ejercicio anterior, estan los ejemplos de ambos.";
    ?>
</body>
</html>