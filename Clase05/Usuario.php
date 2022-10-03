<?php
date_default_timezone_set("America/Argentina/Buenos_Aires");
include_once "accesoDatos.php";
class Usuario
{
    public $nombre;
    public $apellido;
    public $clave;
    public $mail;
    public $localidad;
    public $fechaDeRegistro;
    public $id;

    public static function crearUsuario($nombre, $apellido, $clave, $mail, $localidad)
    {
        $usuario = new self;
        $usuario->nombre = $nombre;
        $usuario->apellido = $apellido;
        $usuario->clave = $clave;
        $usuario->mail = $mail;
        $usuario->localidad = $localidad;
        $usuario->fechaDeRegistro = date("y/m/d");
        return $usuario;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getID()
    {
        return $this->id;
    }

    public function mostrarDatosDelUsuario()
    {
        return "\nDatos del Usuario:
        Nombre: {$this->nombre}
        Apellido: {$this->apellido}
        Clave: {$this->clave}
        Mail: {$this->mail}
        Localidad: {$this->localidad}
        Fecha de registro: {$this->fechaDeRegistro}
        ID: {$this->id}\n";
        
    }

    public function equals($objetoUsuario)
    {
        if($this->getID() == $objetoUsuario->getID() && is_a($objetoUsuario, "Usuario"))
        {
            return true;
        }
        return false;
    }

    public function estaEnElArrayUsuarios($arrayDeUsuarios)
    {
        if(is_array($arrayDeUsuarios) && isset($arrayDeUsuarios))
        {
            foreach($arrayDeUsuarios as $itemDelArray)
            {
                if($this->equals($itemDelArray))
                {
                    return true;
                }
            }
            return false;
        }
    }

    public static function verificarUsuario($unUsuario, $unID)
    {
        if($unUsuario->getID() == $unID)
        {
            return true;
        }
        return false;
    }

    public function altaUsuario()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (NOMBRE,APELLIDO,CLAVE,MAIL,LOCALIDAD,FECHA_DE_REGISTRO)values
        ('$this->nombre','$this->apellido','$this->clave','$this->mail','$this->localidad','$this->fechaDeRegistro')");
        return $consulta->execute();
    }

    public static function TraerTodoLosUsuariosBD()
	{
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT NOMBRE as nombre, APELLIDO as apellido, CLAVE as clave, MAIL as mail, 
        LOCALIDAD as localidad,FECHA_DE_REGISTRO as fechaDeRegistro, ID as id FROM usuarios");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");
	}

    public static function verificarUsuarioClaveMail($clave, $mail)
    {
        $arrayUsuarios = Usuario::TraerTodoLosUsuariosBD();
        $claveOK = false;
        $mailOK = false;

        foreach($arrayUsuarios as $itemUsuario)
        {
            if($itemUsuario->getClave() == $clave)
            {
                $claveOK = true;
            }

            if($itemUsuario->getMail() == $mail)
            {
                $mailOK = true;
            }
        }

        if($claveOK && $mailOK)
        {
            echo "Verificado";
        }
        else if($mailOK && !$claveOK)
        {
            echo "Error en los datos";
        }
        else if(!$mailOK)
        {
            echo "Usuario no registrado";
        }
    }
}
?>