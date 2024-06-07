<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Compras</title>
</head>
<body>
    <h1>Calculadora de Compras</h1>
    <form method="post" action="">
        <label for="precioUnidad">Precio por unidad:</label>
        <input type="number" step="0.01" id="precioUnidad" name="precioUnidad" required><br><br>
        
        <label for="cantidadArticulos">Cantidad de artículos:</label>
        <input type="number" id="cantidadArticulos" name="cantidadArticulos" required><br><br>
        
        <label for="metodoPago">Método de pago:</label>
        <select id="metodoPago" name="metodoPago" required>
            <option value="tarjeta">Tarjeta de Crédito</option>
            <option value="efectivo">Efectivo</option>
        </select><br><br>
        
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $precioUnidad = floatval($_POST["precioUnidad"]);
        $cantidadArticulos = intval($_POST["cantidadArticulos"]);
        $metodoPago = $_POST["metodoPago"];

        function calcularDescuento($precioTotal, $metodoPago) {
            if ($metodoPago == "tarjeta") {
                return $precioTotal * 0.20; 
            } elseif ($metodoPago == "efectivo") {
                return $precioTotal * 0.15; 
            } else {
                return 0; 
            }
        }

        $precioSinDescuento = $precioUnidad * $cantidadArticulos;
        $descuento = calcularDescuento($precioSinDescuento, $metodoPago);
        $totalAPagar = $precioSinDescuento - $descuento;

        echo "<h2>Detalles de la Compra</h2>";
        echo "Precio por unidad: $" . number_format($precioUnidad, 2) . "<br>";
        echo "Precio sin descuento: $" . number_format($precioSinDescuento, 2) . "<br>";
        echo "Descuento: $" . number_format($descuento, 2) . "<br>";
        echo "Total a pagar: $" . number_format($totalAPagar, 2) . "<br>";
    }
    ?>
</body>
</html>