<?php
//Eje 26 - Avalos Leandro Sebastian
/*Aplicación No 26 (RealizarVenta)
Archivo: RealizarVenta.php
método:POST
Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems
,por POST .
Verificar que el usuario y el producto exista y tenga stock.
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
carga los datos necesarios para guardar la venta en un nuevo renglón.
Retorna un :
“venta realizada”Se hizo una venta
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesaris en las clases.*/ 
include_once "ventas.php";
include_once "producto.php";

if(Ventas::verificarDatos($_POST['codigoDeBarra'], $_POST['usuarioID'], $_POST['cantidadDeItems']))
{
    $venta1 = new Ventas($_POST['codigoDeBarra'], $_POST['usuarioID'], $_POST['cantidadDeItems']);
    if(Ventas::guardarArchivoCSV($venta1, "./Ventas.csv", "a"))
    {
        Producto::descontarStock($venta1->getCodigoDeBarra(), $venta1->getCantidadDeItems());
        echo "Stock descontado exitosamente del producto". "<br/>";
    }
    
    echo "Venta exitosa";
}
else{
    echo "No se pudo realizar la venta";
}


?>