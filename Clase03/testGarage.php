<?php
//Eje 20 - Avalos Leandro Sebastian
/*Aplicación No 20 (Auto - Garage)
Crear la clase Garage que posea como atributos privados:

_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
Realizar un constructor capaz de poder instanciar objetos pasándole como

parámetros: i. La razón social.
ii. La razón social, y el precio por hora.

Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
que mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo). Ejemplo:
$miGarage->Remove($autoUno);
Crear un método de clase para poder hacer el alta de un Garage y, guardando los datos en un
archivo garages.csv.
Hacer los métodos necesarios en la clase Garage para poder leer el listado desde el archivo
garage.csv
Se deben cargar los datos en un array de garage.
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos
los métodos.*/

include_once "Auto.php";
include_once "Auto-Garage.php";

$elGarage = new Garage("Garage", 100);
$elGarage2 = new Garage("Garage2", 1000);

$autoMarcaColor1 = new Auto("Ferrari", "Rojo");
$autoMarcaColor2 = new Auto("Ferrari", "Rojo");
$autoMarcaColorPrecio1 = new Auto("McLaren", "Rojo", 5500.00);
$autoMarcaColorPrecioFecha = new Auto("Lamborghini", "Rojo", 10000.00, date("d/m/Y"));
$auto1 = new Auto("Fiat", "Verde");
$auto2 = new Auto("Peugeot", "Azul", 15000.00);
$auto3 = new Auto("Audi", "Violeta", 20000.00, date("d/m/Y"));

$arrayDeGarage = array($elGarage, $elGarage2);

$nuevoGarage = array();

$elGarage->add($autoMarcaColor1);
$elGarage->add($autoMarcaColor2);
$elGarage->add($autoMarcaColorPrecio1);
$elGarage->add($autoMarcaColorPrecioFecha);

$elGarage2->add($auto1);
$elGarage2->add($auto2);
$elGarage2->add($auto3);

echo $elGarage->mostrarGarage();

$elGarage->remove($autoMarcaColor1);

echo "<br/>";

echo $elGarage->mostrarGarage();

Garage::guardarInfoGarage($arrayDeGarage);

$nuevoGarage = Garage::leerInfoGarage();

foreach($nuevoGarage as $itemGarage)
{
    echo $itemGarage->mostrarGarage();
}

?>