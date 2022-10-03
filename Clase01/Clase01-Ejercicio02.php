<?php
//Eje 02 - Avalos Leandro Sebastian
/*Aplicación No 2 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.*/ 
echo date("d m Y");
echo "<br/>", date("D M Y");
echo "<br/>", date("D M Y h:i:s");
echo "<br/>", date("D M Y h:i:s A");

switch(date("n"))
{
    case 1:
    case 2:
        echo "<br/> Es Verano";
        break;
    case 3:
        if(date("j") > 20)
        {
            echo "<br/> Es Otoño";
        }
        else
        {
            echo "<br/> Es Verano";
        }
        break;
    case 4:
    case 5:
        echo "<br/> Es Otoño";
        break;
    case 6:
        if(date("j") > 20)
        {
            echo "<br/> Es Invierno";
        }
        else
        {
            echo "<br/> Es Otoño";
        }
        break;
    case 7:
    case 8: 
        echo "<br/> Estamos en Invierno";
        break;
    case 9:
        if(date("j") > 20)
        {
            echo "<br/> Estamos en Primavera";
        }
        else
        {
            echo "<br/> Estamos en Invierno";
        }
    break;
    default:
        if(date("j") > 20)
        {
            echo "<br/> Es Verano";
        }
        else
        {
            echo "<br/> Es Primavera";
        }
        break;
}
?>