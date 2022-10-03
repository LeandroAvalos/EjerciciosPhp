<?php
//Eje 06 - Avalos Leandro Sebastian
/*Aplicación No 6 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.*/ 

$vector = array();
$acumulador = 0;
$promedio;

for($i = 0; $i < 5; $i++)
{
    $vector[$i] = rand(1,10);
    $acumulador += $vector[$i];
}

$promedio = $acumulador / 5;

if($promedio > 6)
{
    echo "El promedio es: $promedio, es mayor que 6";
}
else if($promedio == 6)
{
    echo "El promedio es: $promedio, es igual que 6";
}
else
{
    echo "El promedio es: $promedio, es menor que 6";
}
?>