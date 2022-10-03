<?php
//Eje 05 - Avalos Leandro Sebastian
/*Aplicación No 5 (Números en letras)
Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.*/ 

$decena;
$numero = 46;
$numeroConvertidoAString = strval($numero);
$otroNumero = substr($numeroConvertidoAString, -1);
switch($otroNumero)
{
    case "1":
        $decena = "uno";
        break;
    case "2":
        $decena = "dos";
        break;
    case "3":
        $decena = "tres";
        break;        
    case "4":
        $decena = "cuatro";
        break;
    case "5": 
        $decena = "cinco";
        break;
    case "6":
        $decena = "seis";
        break;
    case "7";
        $decena = "siete";
        break;
    case "8":
        $decena = "ocho";
        break;  
    case "9":
        $decena = "nueve";
        break;                     
}

if($numero > 19 && $numero < 30)
{
    if($numero == 20)
    {
        echo "Veinte";
    }
    else{
        echo "Veinti", $decena; 
    }
}
else if($numero > 29 && $numero < 40){
    if($numero == 30)
    {
        echo "Treinta";
    }
    else{
        echo "Treinta y", $decena; 
    }
}
else if($numero > 39 && $numero < 50){
    if($numero == 40)
    {
        echo "Cuarenta";
    }
    else{
        echo "Cuarenta y", $decena; 
    }
}
else if($numero > 49 && $numero < 60){
    if($numero == 50)
    {
        echo "Cincuenta";
    }
    else{
        echo "Cincuenta y", $decena; 
    }
}
else if($numero == 60)
{
    echo "Sesenta";
}
else
{
    echo "Ingrese un numero valido";
}
?>