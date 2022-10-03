<?php
//Eje 10 - Avalos Leandro Sebastian
/*Aplicación No 10 (Arrays de Arrays)
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays.*/ 

$lapicerasAsociativas["lapicera1"]= array("color"=>"verde", "marca"=>"girasol", "trazo"=>10, "precio"=>50);
$lapicerasAsociativas["lapicera2"]= array("color"=>"rojo", "marca"=>"jazmin", "trazo"=>15, "precio"=>75);
$lapicerasAsociativas["lapicera3"]= array("color"=>"amarillo", "marca"=>"rosa", "trazo"=>20, "precio"=>100);

foreach($lapicerasAsociativas as $key => $valor)
{
    foreach($valor as $clave => $value)
    {
        echo "$clave:  $value<br/>";
    }
    echo "<br/>";
}

$lapicerasIndexadas[0] = array("color"=>"verde", "marca"=>"girasol", "trazo"=>10, "precio"=>50);
$lapicerasIndexadas[1] = array("color"=>"rojo", "marca"=>"jazmin", "trazo"=>15, "precio"=>75);
$lapicerasIndexadas[2] = array("color"=>"amarillo", "marca"=>"rosa", "trazo"=>20, "precio"=>100);

foreach($lapicerasIndexadas as $key => $valor)
{
    foreach($valor as $clave => $value)
    {
        echo "$clave:  $value<br/>";
    }
    echo "<br/>";
}
?>