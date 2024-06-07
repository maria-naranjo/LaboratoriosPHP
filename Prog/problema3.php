<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Salario con Horas Extras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            margin-bottom: 20px;
        }
        .container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }
        .container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculadora de Salario</h1>
        <form method="post" action="">
            <label for="valorPorHora">Valor por hora:</label>
            <input type="number" step="0.01" id="valorPorHora" name="valorPorHora" required>
            <label for="horasTrabajadas">Horas trabajadas:</label>
            <input type="number" id="horasTrabajadas" name="horasTrabajadas" required>
            <button type="submit">Calcular</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valorPorHora = $_POST["valorPorHora"];
            $horasTrabajadas = $_POST["horasTrabajadas"];

            function calcularSalario($valorPorHora, $horasTrabajadas) {
                $salarioNormal = 0;
                $salarioExtra = 0;
                $horasNormales = 40;
                $doblePago = 2;
                $triplePago = 3;
                $limiteHorasDobles = 8;

                if ($horasTrabajadas <= $horasNormales) {
                    $salarioNormal = $valorPorHora * $horasTrabajadas;
                } else {
                    $horasExtras = $horasTrabajadas - $horasNormales;
                    $salarioNormal = $valorPorHora * $horasNormales;

                    if ($horasExtras <= $limiteHorasDobles) {
                        $salarioExtra = $horasExtras * $valorPorHora * $doblePago;
                    } else {
                        $salarioExtra = ($limiteHorasDobles * $valorPorHora * $doblePago) + 
                                        (($horasExtras - $limiteHorasDobles) * $valorPorHora * $triplePago);
                    }
                }

                return $salarioNormal + $salarioExtra;
            }

            $salario = calcularSalario($valorPorHora, $horasTrabajadas);
            echo "<p>El salario total del trabajador es: $" . number_format($salario, 2) . "</p>";
        }
        ?>
    </div>
</body>
</html>
