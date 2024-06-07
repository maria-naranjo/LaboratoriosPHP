<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Compras</title>
    <style>
        body {
            font-family: 'Dancing Script', cursive;
            background-color: #ffe4e1;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h1, h2 {
            text-align: center;
        }
        label {
            font-size: 1.2em;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #ff69b4;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1.2em;
        }
        input[type="submit"]:hover {
            background-color: #ff1493;
        }
    </style>
    
</head>
<body>
    <div class="container">
        <h1>Calculadora de Compras</h1>
        <form method="post" action="">
            <label for="precioUnidad">Precio por unidad:</label>
            <input type="number" step="0.01" id="precioUnidad" name="precioUnidad" required><br>
            
            <label for="cantidadArticulos">Cantidad de artículos:</label>
            <input type="number" id="cantidadArticulos" name="cantidadArticulos" required><br>
            
            <label for="metodoPago">Método de pago:</label>
            <select id="metodoPago" name="metodoPago" required>
                <option value="tarjeta">Tarjeta de Crédito</option>
                <option value="efectivo">Efectivo</option>
            </select><br>
            
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
    </div>
</body>
</html>
