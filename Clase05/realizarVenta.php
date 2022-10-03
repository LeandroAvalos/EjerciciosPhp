<?php
//Ejercicio: 31 Avalos Leandro Sebastian
/*Aplicación No 31 (RealizarVenta BD )
Archivo: RealizarVenta.php
método:POST
Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems ,por
POST .
Verificar que el usuario y el producto exista y tenga stock.
Retorna un :
“venta realizada”Se hizo una venta
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en las clases.*/

include_once "Ventas.php";

if(isset($_POST["codigoDeBarra"]) && isset($_POST["usuarioID"]) && isset($_POST["cantidadDeItems"]))
{
    $codigoDeBarra = $_POST["codigoDeBarra"];
    $usuarioID = $_POST["usuarioID"];
    $cantidadDeItems = $_POST["cantidadDeItems"];
    $venta = Ventas::crearVenta($codigoDeBarra, $usuarioID, $cantidadDeItems);

    $venta->AltaVenta();
}

?>