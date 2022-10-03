<?php
//Ejercicio: 30 Avalos Leandro Sebastian
/*Aplicación No 30 ( AltaProducto BD)
Archivo: altaProducto.php
método:POST
Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST
, carga la fecha de creación y crear un objeto ,se debe utilizar sus métodos para poder
verificar si es un producto existente,
si ya existe el producto se le suma el stock , de lo contrario se agrega .
Retorna un :
“Ingresado” si es un producto nuevo
“Actualizado” si ya existía y se actualiza el stock.
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en la clase.*/

include_once "Producto.php";

if(isset($_POST["codigoDeBarra"]) && isset($_POST["nombre"]) && isset($_POST["tipo"]) && isset($_POST["stock"]) && isset($_POST["precio"]))
{
    $codigoDeBarra = $_POST["codigoDeBarra"];
    $nombre = $_POST["nombre"];
    $tipo = $_POST["tipo"];
    $stock = intval($_POST["stock"]);
    $precio = intval($_POST["precio"]);

    $producto = Producto::crearProducto($codigoDeBarra, $nombre, $tipo, $stock, $precio);

    $producto->agregarOModificarProducto();
}

?>