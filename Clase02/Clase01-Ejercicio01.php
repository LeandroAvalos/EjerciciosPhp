<?php
//Eje 01 - Avalos Leandro Sebastian
/*Enunciado: Aplicación No 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.*/ 

$suma = 0;
$contador = 0;

for($i = 0; $suma < 1000; $i++)
{
    $suma += $i;
    if($suma < 1000)
    {
        echo "<br/>", $suma;
        $contador++;
    }  
}
echo "<br/>";
printf("Se sumaron: %d numeros",$contador);
?>