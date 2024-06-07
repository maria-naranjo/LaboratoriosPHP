<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // recoger los valores del formulario
    $monto = $_POST['monto'];
    $empleado = $_POST['empleado'];

    // calcular el interés y el monto a pagar
    if ($empleado == "publico") {
        $interes = $monto * 0.07;  // interés del 7%
    } else {
        $interes = $monto * 0.09;  // interés del 9%
    }
    $total = $monto + $interes;

    // mostrar los resultados
    echo "Monto del préstamo: " . $monto;
    echo "<br>";
    echo "Tipo de empleado: " . ($empleado == "publico" ? "Público" : "Privado");
    echo "<br>";
    echo "Interés: " . $interes;
    echo "<br>";
    echo "Total a pagar: " . $total;
}
?>