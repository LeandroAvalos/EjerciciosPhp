<?php
//Eje 07 - Avalos Leandro Sebastian
/*Aplicación No 7 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números utilizando
las estructuras while y foreach.*/ 

$vector = array();
$contadorFor = 0;
$contadorWhile = 0;

for($i = 0; count($vector) < 10; $i++)
{
    if($i % 2 == 1)
    {
        $vector[$contadorFor] = $i;
        $contadorFor++;
    }
}

for($i = 0; $i < 10; $i++)
{
    echo "$vector[$i] <br/>";
}

while($contadorWhile < count($vector))
{
    echo "<br/> $vector[$contadorWhile]";
    $contadorWhile++;
}

echo "<br/>";

foreach($vector as $valor)
{
    echo "<br/> $valor";
}

?>