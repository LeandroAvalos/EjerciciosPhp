<?php
class Usuario
{
    private $nombre;
    private $clave;
    private $mail;
    private $id;
    private $fecha;

    public function __construct($nombre = "Sin nombre",$clave, $mail, $id)
    {
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
        if($id != 0)
        {
            $this->id = $id;
        }
        else
        {
            $this->id = rand(1, 10000);
        }
        $this->fecha = date("d/m/Y");
    }

    public function getId()
    {
        return $this->id;
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
        $seAgrego = 0;
        $archivo = fopen($ruta, "a");

        if($archivo != 0)
        {
            if(filesize($ruta) == 0)
            {
                fwrite($archivo, Usuario::mostrarUsuario($usuario));
                $seAgrego = 1;
            }
            else
            {
                fwrite($archivo, PHP_EOL . Usuario::mostrarUsuario($usuario));
                $seAgrego = 1;
            }
            
        }

        fclose($archivo);

        return $seAgrego;
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
                    array_push($arrayDeUsuarios, new Usuario($arrayAuxiliar[0], $arrayAuxiliar[1], $arrayAuxiliar[2], $arrayAuxiliar[3]));
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

        foreach($arrayUsuarios as $itemUsuarios)
        {
            if(trim($usuarioAChequear->clave, " \t\n\r\0\x0B")  == trim($itemUsuarios->clave, " \t\n\r\0\x0B")  && trim($usuarioAChequear->mail, " \t\n\r\0\x0B") == trim($itemUsuarios->mail, " \t\n\r\0\x0B"))
            {
                return "Verificado";
            }
            else if(trim($usuarioAChequear->mail, " \t\n\r\0\x0B") != trim($itemUsuarios->mail, " \t\n\r\0\x0B"))
            {
                return "Usuario no Registrado";
            }
            else if (trim($usuarioAChequear->clave, " \t\n\r\0\x0B") != trim($itemUsuarios->clave, " \t\n\r\0\x0B"))
            {
                return "Error en los datos";
            }
        }
    }
}
?>