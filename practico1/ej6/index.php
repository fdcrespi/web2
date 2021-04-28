<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once("head.php")
    ?>
</head>

<body>
    <form action="tabla.php" method="GET">
        <label for="numero">Numero:</label>
        <input type="number" name="numero" id="number">
        <button type="submit">Imprimir Tabla</button>
    </form>
</body>

</html>