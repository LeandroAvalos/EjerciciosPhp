<?php
//Eje 18 - Avalos Leandro Sebastian
/*Aplicación No 18 (Auto - Garage)
Crear la clase Garage que posea como atributos privados:

_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)

Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:

i. La razón social.
ii. La razón social, y el precio por hora.

Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
que mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Remove($autoUno);
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los
métodos.*/

include_once "Auto.php";
include_once "Auto-Garage.php";

$elGarage = new Garage("Garage", 100);

$autoMarcaColor1 = new Auto("Ferrari", "Rojo");
$autoMarcaColor2 = new Auto("Ferrari", "Rojo");
$autoMarcaColorPrecio1 = new Auto("McLaren", "Rojo", 5500.00);
$autoMarcaColorPrecioFecha = new Auto("Lamborghini", "Rojo", 10000.00, date("d/m/Y"));

$elGarage->add($autoMarcaColor1);
$elGarage->add($autoMarcaColor2);
$elGarage->add($autoMarcaColorPrecio1);
$elGarage->add($autoMarcaColorPrecioFecha);

$elGarage->mostrarGarage();

$elGarage->remove($autoMarcaColor1);

echo "<br/>";

$elGarage->mostrarGarage();

?>