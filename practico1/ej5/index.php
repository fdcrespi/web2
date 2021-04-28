<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 5. Construir un programa que calcule el índice de masa corporal de una persona (IMC =
        peso [kg] / altura [m]²) e informe el estado en el que se encuentra esa persona en
        función del valor de IMC.
    -->
    <form action="estado.php" method="GET">
        <label for="peso">Peso (kg):</label>
        <input type="number" name="peso">
        <label for="altura">Altura (m²)</label>
        <input type="float" name="altura">
        <button type="submit">Consultar Estado</button>
    </form>
</body>
</html>