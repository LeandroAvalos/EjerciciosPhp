<?php
//Eje 23 - Avalos Leandro Sebastian
/*Aplicación No 23 (Registro JSON)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un dato
con la fecha de registro , toma todos los datos y utilizar sus métodos para poder hacer
el alta,
guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
Usuario/Fotos/.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario.*/ 

include_once "./Usuario.php";

$usuario1 = new Usuario($_POST['nombre'], $_POST['clave'], $_POST['mail']);

if(!file_exists("./Usuario/Fotos/"))
{
    mkdir("./Usuario/Fotos/",0777, true);
    $destino = "./Usuario/Fotos/" . $_FILES['fotito']['name'];
    move_uploaded_file($_FILES['fotito']['tmp_name'], $destino);
}
else
{
    $destino = "./Usuario/Fotos/" . $_FILES['fotito']['name'];
    move_uploaded_file($_FILES['fotito']['tmp_name'], $destino);
}

if(Usuario::guardarArchivoCSV($usuario1, "./Usuario.csv"))
{
    echo "Usuario agregado exitosamente";
}
else{
    echo "Hubo un problema al agregar el usuario";
}



?>