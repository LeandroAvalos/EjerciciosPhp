<?php
//Eje 12 - Avalos Leandro Sebastian
/*Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.*/ 

$palabra = array("H", "O", "L", "A");

echo invertirCadena($palabra);

function invertirCadena($cadena)
{
    $arrayDadoVuelta = " ";

    for($i = count($cadena) - 1; $i >= 0; $i--)
    {
        $arrayDadoVuelta .= $cadena[$i];
    }

    return $arrayDadoVuelta;
}

?>