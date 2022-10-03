<?php
//Eje 20 - Avalos Leandro Sebastian
/*Aplicación No 20 (Registro CSV)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer el alta,
guardando los datos en usuarios.csv.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario.*/ 

include_once "./Usuario.php";

$usuario1 = new Usuario($_POST['nombre'], $_POST['clave'], $_POST['mail']);

Usuario::guardarArchivoCSV($usuario1, "./RegistroCSV.csv");

?>
