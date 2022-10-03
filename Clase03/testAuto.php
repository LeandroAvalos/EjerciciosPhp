<?php
//Eje 19 - Avalos Leandro Sebastian
/*Aplicación No 19 (Auto)
Realizar una clase llamada “Auto” que posea los siguientes atributos

privados: _color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)

Realizar un constructor capaz de poder instanciar objetos pasándole como

parámetros: i. La marca y el color.
ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.

Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble
por parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
por parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
la suma de los precios o cero si no se pudo realizar la operación.
Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);
Crear un método de clase para poder hacer el alta de un Auto, guardando los datos en un
archivo autos.csv.
Hacer los métodos necesarios en la clase Auto para poder leer el listado desde el archivo
autos.csv
Se deben cargar los datos en un array de autos.
En testAuto.php:
● Crear dos objetos “Auto” de la misma marca y distinto color.
● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
● Crear un objeto “Auto” utilizando la sobrecarga restante.
● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
al atributo precio.
● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
resultado obtenido.
● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
no.
● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,
5)*/ 

include_once "Auto.php";

$autoMarcaColor1 = new Auto("Ferrari", "Rojo");
$autoMarcaColor2 = new Auto("Ferrari", "Amarillo");

$autoMarcaColorPrecio1 = new Auto("McLaren", "Rojo", 5500.00);
$autoMarcaColorPrecio2 = new Auto("McLaren", "Rojo", 6500.00);

$autoMarcaColorPrecioFecha = new Auto("Lamborghini", "Rojo", 10000.00, date("d/m/Y"));

$autoMarcaColorPrecio1->agregarImpuestos(1500.00);
$autoMarcaColorPrecio2->agregarImpuestos(1500.00);
$autoMarcaColorPrecioFecha->agregarImpuestos(1500.00);

$arrayAutos = array($autoMarcaColor1, $autoMarcaColor2, $autoMarcaColorPrecio1, $autoMarcaColorPrecio2, $autoMarcaColorPrecioFecha);
$arrayAutosPrueba = array();

// echo "La suma del importe del primero auto y del segundo auto es:". Auto::add($autoMarcaColor1, $autoMarcaColor2);

// echo "<br/>";

if($autoMarcaColor1->equals($autoMarcaColor2))
{
    echo "Estos 2 autos son iguales";
}
else
{
    echo "Estos 2 autos no son iguales";
}

echo "<br/>";

if($autoMarcaColor1->equals($autoMarcaColorPrecioFecha))
{
    echo "Estos 2 autos son iguales";
}
else
{
    echo "Estos 2 autos no son iguales";
}

echo "<br/>";

echo Auto::mostrarAuto($autoMarcaColor1);
echo "<br/>";
echo Auto::mostrarAuto($autoMarcaColorPrecio1);
echo "<br/>";
echo Auto::mostrarAuto($autoMarcaColorPrecioFecha);

Auto::guardarArchivo($arrayAutos);
echo "<br/>";
$arrayAutosPrueba = Auto::leerArchivo();
foreach($arrayAutosPrueba as $pruebaAutos)
{
    echo Auto::mostrarAuto($pruebaAutos) . "<br/>";
}
?>