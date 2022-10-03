<?php
include_once "producto.php";
include_once "Usuario.php";
class Ventas
{
    private $_codigoDeBarra;
    private $_idUsuario;
    private $_cantidadDeItems;
    private $_id;

    public function __construct($_codigoDeBarra, $_idUsuario, $_cantidadDeItems, $_id = 0)
    {
        $this->_codigoDeBarra = $_codigoDeBarra;
        $this->_idUsuario = $_idUsuario;
        $this->_cantidadDeItems = $_cantidadDeItems;
        if($_id != 0)
        {
            $this->_id = $_id;
        }
        else
        {
            $this->_id = rand(1, 10000);
        }
    }

    public function getCodigoDeBarra()
    {
        return $this->_codigoDeBarra;
    }

    public function getCantidadDeItems()
    {
        return $this->_cantidadDeItems;
    }

    public static function mostrarVenta($objetoVenta)
    {
        $auxProductos = array();
        $auxString = "";
        foreach($objetoVenta as $atributoProducto)
        {
            array_push($auxProductos ,$atributoProducto);
        }

        $auxString = implode(",", $auxProductos);
        return $auxString;
    }

    public static function guardarArchivoCSV($venta, $ruta, $manejoDelArchivo)
    {
        $seAgrego = 0;
        $archivo = fopen($ruta, $manejoDelArchivo);

        if($archivo != 0)
        {
            if(fwrite($archivo, Ventas::mostrarVenta($venta) . PHP_EOL) > 0)
            {
                $seAgrego = 1;
            }
        }

        fclose($archivo);

        return $seAgrego;
    }


    public static function verificarDatos($codigoDeBarraProducto, $usuarioID, $cantidadAComprar)
    {
        $arrayProductos = Producto::leerArchivo("./Productos.csv");
        $arrayUsuarios = Usuario::leerArchivo("./Usuario.csv");
        $productoOK = 0;
        $usuarioOK = 0;
        $ventaOK = 0;

        foreach($arrayProductos as $itemProducto)
        {
            if(trim($itemProducto->getCodigoDeBarra() == $codigoDeBarraProducto) && trim($itemProducto->getStock() >= $cantidadAComprar))
            {
                $productoOK = 1;
            }
        }

        foreach($arrayUsuarios as $itemUsuario)
        {
            if(trim($itemUsuario->getId() == $usuarioID))
            {
                $usuarioOK = 1;
            }
        }

        if($productoOK == 1 && $usuarioOK == 1)
        {
            $ventaOK = 1;
        }

        return $ventaOK;
    }

}


?>