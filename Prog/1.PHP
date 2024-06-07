<?php

$num1 =$_POST['numero1'];
$num2 =$_POST['numero2'];
$num3 =$_POST['numero3'];
echo $num1,$num2,$num3;

$menor = min($num1, $num2, $num3);

    // calcular el producto
    $producto = $num1 * $num2 * $num3;

    // mostrar los resultados
    echo "El número más pequeño es: " . $menor;
    echo "<br>";
    echo "El producto de los números es: " . $producto;
    echo "<br>";



    

    ?>