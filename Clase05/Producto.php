<?php
date_default_timezone_set("America/Argentina/Buenos_Aires");
include_once "accesoDatos.php";
class Producto
{
    public $codigoDeBarra;
    public $nombre;
    public $tipo;
    public $stock;
    public $precio;
    public $fechaDeCreacion;

    public static function crearProducto($codigoDeBarra, $nombre, $tipo, $stock, $precio)
    {
        $producto = new self;
        $producto->codigoDeBarra = $codigoDeBarra;
        $producto->nombre = $nombre;
        $producto->tipo = $tipo;
        $producto->stock = $stock;
        $producto->precio = $precio;
        $producto->fechaDeCreacion = date("y/m/d");
        return $producto;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getCodigoDeBarra()
    {
        return $this->codigoDeBarra;
    }

    public function equals($objetoProducto)
    {
        if($this->getCodigoDeBarra() == $objetoProducto->getCodigoDeBarra() && is_a($objetoProducto, "Producto"))
        {
            return true;
        }
        return false;
    }

    public function estaEnElArrayProductos($arrayDeProductos)
    {
        if(is_array($arrayDeProductos) && isset($arrayDeProductos))
        {
            foreach($arrayDeProductos as $itemDelArray)
            {
                if($this->equals($itemDelArray))
                {
                    return true;
                }
            }
            return false;
        }
    }

    public function agregarOModificarProducto()
    {
        $arrayProductos = Producto::TraerTodoLosProductosBD();

        if(!$this->estaEnElArrayProductos($arrayProductos))
        {
            $this->AltaProducto();
            echo "Producto ingresado a la BD";
        }
        else
        {
            for ($i=0;$i <= count($arrayProductos); $i++)
            { 
                if($arrayProductos[$i]->equals($this))
                {
                    Producto::modificarProductoStockBD($arrayProductos[$i]->codigoDeBarra, $arrayProductos[$i]->stock + $this->stock);
                    echo "Actualizado";
                    break;
                }
            }
        }
    }

    public static function verificarProducto($unProducto, $unCodigoDeBarra)
    {
        if($unProducto->getCodigoDeBarra() == $unCodigoDeBarra)
        {
            return true;
        }
        return false;
    }

    public function AltaProducto()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into productos (CODIGO_DE_BARRA,NOMBRE,TIPO,STOCK,PRECIO,FECHA_DE_CREACION)values
        ('$this->codigoDeBarra','$this->nombre','$this->tipo','$this->stock','$this->precio','$this->fechaDeCreacion')");
        return $consulta->execute();
    }

    public static function TraerTodoLosProductosBD()
	{
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT CODIGO_DE_BARRA as codigoDeBarra, NOMBRE as nombre, TIPO as tipo, STOCK as stock,
        PRECIO as precio, FECHA_DE_CREACION as fechaDeCreacion FROM productos");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "Producto");
	}

    public static function modificarProductoStockBD($codigoDeBarraProducto, $nuevoStock)
	 {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("
            update productos 
            set STOCK='$nuevoStock'
            WHERE CODIGO_DE_BARRA='$codigoDeBarraProducto'");
        return $consulta->execute();
	 }
}
?>