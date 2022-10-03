<?php
class Usuario
{
    private $nombre;
    private $clave;
    private $mail;

    public function __construct($nombre = "Sin nombre",$clave, $mail)
    {
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
    }

    public static function mostrarUsuario($objetoUsuario)
    {
        $auxUsuarios = array();
        $auxString = "";
        foreach($objetoUsuario as $atributoUsuario)
        {
            array_push($auxUsuarios ,$atributoUsuario);
        }

        $auxString = implode(",", $auxUsuarios);
        return $auxString;
    }

    public static function guardarArchivoCSV($usuario, $ruta)
    {
        $archivo = fopen($ruta, "a");

        if($archivo != 0)
        {
            fwrite($archivo, Usuario::mostrarUsuario($usuario) . PHP_EOL);
        }

        fclose($archivo);
    }

    public static function leerArchivo($ruta)
    {
        $archivo = fopen($ruta, "r");
        $arrayAuxiliar = array();
        $arrayDeUsuarios = array();
        $lineaLeida = "";

        if($archivo != 0)
        {
            while(!feof($archivo))
            {
                $lineaLeida = fgets($archivo);
                
                if($lineaLeida != "")
                {
                    $arrayAuxiliar = explode(",", $lineaLeida);
                    array_push($arrayDeUsuarios, new Usuario($arrayAuxiliar[0], $arrayAuxiliar[1], $arrayAuxiliar[2]));
                }
            }
        }

        fclose($archivo);

        return $arrayDeUsuarios;
    }

    public static function chequearUsuario($usuarioAChequear)
    {
        $arrayUsuarios = [];
        $arrayUsuarios = Usuario::leerArchivo("./RegistroCSV.csv");
        //var_dump($arrayUsuarios);
        $retorno = "";

        foreach($arrayUsuarios as $itemUsuarios)
        {
            if(trim($usuarioAChequear->clave, " \t\n\r\0\x0B")  == trim($itemUsuarios->clave, " \t\n\r\0\x0B")  && trim($usuarioAChequear->mail, " \t\n\r\0\x0B") == trim($itemUsuarios->mail, " \t\n\r\0\x0B"))
            {
                return "Verificado";
            }
            else if(trim($usuarioAChequear->mail, " \t\n\r\0\x0B") != trim($itemUsuarios->mail, " \t\n\r\0\x0B"))
            {
                $retorno =  "Usuario no Registrado";
            }
            else if ((trim($usuarioAChequear->clave, " \t\n\r\0\x0B") != trim($itemUsuarios->clave, " \t\n\r\0\x0B")) && (trim($usuarioAChequear->mail, " \t\n\r\0\x0B") == trim($itemUsuarios->mail, " \t\n\r\0\x0B")))
            {
                return "Error en los datos";
            }
        }

        return $retorno;
    }
}
?>