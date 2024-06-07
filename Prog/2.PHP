<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // recoger los valores del formulario
    $cliente = $_POST['clint'];
    $producto = $_POST['nprod'];
    $cantidad = $_POST['capro'];
    $precio = $_POST['prpro'];

    // calcular el total a pagar
    $total = $cantidad * $precio;

    // aplicar el descuento si es necesario
    if ($total > 100) {
        $total = $total * 0.9;  // aplicar un descuento del 10%
    }

    // mostrar los resultados
    echo "Cliente: " . $cliente;
    echo "<br>";
    echo "Producto: " . $producto;
    echo "<br>";
    echo "Cantidad: " . $cantidad;
    echo "<br>";
    echo "Precio: " . $precio;
    echo "<br>";
    echo "Total a pagar: " . $total;
   
}