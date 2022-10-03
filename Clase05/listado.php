<?php
//Ejercicio: 28 Avalos Leandro Sebastian
/*Aplicación No 28 ( Listado BD)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,ventas)
cada objeto o clase tendrán los métodos para responder a la petición.*/

include_once "Usuario.php";

if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET["listado"] == "usuarios")
{
    $arrayUsuarios = Usuario::TraerTodoLosUsuariosBD();
    
    foreach ($arrayUsuarios as $itemUsuario) {
        echo $itemUsuario->mostrarDatosDelUsuario();
    }
}

?>