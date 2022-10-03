<?php
//Eje 03 - Avalos Leandro Sebastian
/*Aplicación No 3 (Obtener el valor del medio)
Dadas tres variables numéricas de tipo entero $a, $b y $c realizar una aplicación que muestre
el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido.
Ejemplo 1: $a = 6; $b = 9; $c = 8; => se muestra 8.
Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”*/ 

$a = 1;
$b = 5;
$c = 1;

if($a == $b || $a == $c || $b == $c)
{
    echo "No hay valor del medio";
}
else if($a > $c && $a < $b || $a > $b && $a < $c)
{
    echo "El del medio es $a";
}
else if($b > $c && $b < $a || $b > $a && $b < $c)
{
    echo "El del medio es $b";
}
else
{
    echo "El del medio es $c";
}


?>