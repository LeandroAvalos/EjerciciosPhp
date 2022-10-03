<?php
//Eje 13 - Avalos Leandro Sebastian
/*Aplicación No 13 (Invertir palabra)
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario.*/ 

echo validarPalabra("recuperatorio", 15);


function validarPalabra($palabra, $max)
{
    $retorno = 0;
    if(strlen($palabra) < $max && verificarPalabra($palabra) == 1)
    {
        $retorno = 1;
    }

    return $retorno;
}

function verificarPalabra($palabra)
{
    $listadoPalabras = array("recuperatorio", "parcial", "programacion");
    $retorno = 0;
    for($i = 0; $i < 3; $i++)
    {
        if($palabra == $listadoPalabras[$i])
        {
            $retorno = 1;
        }
    }

    return $retorno;
}

?>