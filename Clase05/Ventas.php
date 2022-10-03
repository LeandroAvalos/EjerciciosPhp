<?php

date_default_timezone_set("America/Argentina/Buenos_Aires");
include_once "accesoDatos.php";
include_once "Producto.php";
include_once "Usuario.php";
class Ventas
{
    public $codigoDeBarra;
    public $idUsuario;
    public $cantidadDeItems;
    public $id;

    public static function crearVenta($codigoDeBarra, $idUsuario, $cantidadDeItems)
    {
        $venta = new self;
        $venta->codigoDeBarra = $codigoDeBarra;
        $venta->idUsuario = $idUsuario;
        $venta->cantidadDeItems = $cantidadDeItems;
        return $venta;
    }

    public static function verificarVenta($cantidadDeProductos, $idUsuarioAChequear, $codigoDeBarraAChequear)
    {
        $arrayDeProductos = Producto::TraerTodoLosProductosBD();
        $arrayDeUsuarios = Usuario::TraerTodoLosUsuariosBD();
        $usuarioOK = false;
        $ventaOK = false;
        
        for ($i=0; $i < count($arrayDeUsuarios); $i++)
        { 
            if($arrayDeUsuarios[$i]->getID() > $idUsuarioAChequear)
            {
                $usuarioOK = true;
                break;
            }
        }

        if($usuarioOK)
        {
            for ($i=0; $i < count($arrayDeProductos); $i++)
            { 
                if($arrayDeProductos[$i]->getCodigoDeBarra() == $codigoDeBarraAChequear && $arrayDeProductos[$i]->getStock() > $cantidadDeProductos)
                {
                    if(Producto::modificarProductoStockBD($arrayDeProductos[$i]->getCodigoDeBarra(), $arrayDeProductos[$i]->getStock() - $cantidadDeProductos))
                    {
                        $ventaOK = true;
                        return $ventaOK;
                    }
                }
            }
        }
        return $ventaOK; 
    }

    public function AltaVenta()
    {
        if(Ventas::verificarVenta($this->cantidadDeItems, $this->idUsuario, $this->codigoDeBarra))
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into ventas (CODIGO_DE_BARRA,ID_USUARIO,CANTIDAD_DE_ITEMS)values
            ('$this->codigoDeBarra','$this->idUsuario','$this->cantidadDeItems')");
            echo "Venta exitosa";
            return $consulta->execute();
        }
        else
        {
            echo "No se pudo realizar la venta";
        }
    }
}
?>