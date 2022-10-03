<?php
//Ejercicio: 27 Avalos Leandro Sebastian
/*Aplicación No 27 (Registro BD)
Archivo: registro.php
método:POST
Recibe los datos del usuario( nombre,apellido, clave,mail,localidad )por POST ,
crear un objeto con la fecha de registro y utilizar sus métodos para poder hacer el alta,
guardando los datos la base de datos
retorna si se pudo agregar o no.*/

include_once "Usuario.php";

$nuevoUsuario = Usuario::crearUsuario($_POST["nombre"], $_POST["apellido"], $_POST["clave"], $_POST["mail"], $_POST["localidad"]);

if($nuevoUsuario->altaUsuario())
{
    echo "Usuario agregado exitosamente";
}
else
{
    echo "No se agrego al usuario";
}
?>