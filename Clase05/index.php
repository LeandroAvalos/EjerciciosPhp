<?php

switch($_SERVER["REQUEST_METHOD"])
{
    case "POST":
        switch (key($_POST)) 
        {
            case "registro":
                include_once "registro.php";
                break;
            case "login":
                include_once "login.php";
                break;
            case "altaProducto":
                include_once "altaProducto.php";
                break;
            case "realizarVenta":
                include_once "realizarVenta.php";
                break;
            case "modificacionUsuario":
                include_once "modificacionUsuario.php.php";
                break;
        }
        break;
    case "GET":
        switch (key($_GET)) 
        {
            case "listado":
                include_once "listado.php";
                break;
        }
        break;
}

?>