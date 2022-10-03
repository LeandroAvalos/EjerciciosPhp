<?php
//Eje 09 - Avalos Leandro Sebastian
/*Aplicación No 9 (Arrays asociativos)
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras.*/ 

$lapicera = array("color"=>"verde", "marca"=>"girasol", "trazo"=>10, "precio"=>50);

foreach($lapicera as $key => $valor)
{
    echo "$key:  $valor<br/>";
}

echo "<br/>";

$lapicera = array("color"=>"rojo", "marca"=>"jazmin", "trazo"=>15, "precio"=>75);

foreach($lapicera as $key => $valor)
{
    echo "$key:  $valor<br/>";
}

echo "<br/>";

$lapicera = array("color"=>"amarillo", "marca"=>"rosa", "trazo"=>20, "precio"=>100);

foreach($lapicera as $key => $valor)
{
    echo "$key:  $valor<br/>";
}



?>