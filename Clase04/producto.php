<?php
include_once "ventas.php";
class Producto
{
    private $codigoDeBarra;
    private $nombre;
    private $tipo;
    private $stock;
    private $precio;
    private $id;

    public function __construct($codigoDeBarra, $nombre, $tipo, $stock, $precio, $id = 0)
    {
        $this->codigoDeBarra = $codigoDeBarra;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->stock = $stock;
        $this->precio = $precio;
        if($id != 0)
        {
            $this->id = $id;
        }
        else
        {
            $this->id = rand(1, 10000);
        }
    }

    public function getCodigoDeBarra()
    {
        return $this->codigoDeBarra;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public static function mostrarProducto($objetoProducto)
    {
        $auxProductos = array();
        $auxString = "";
        foreach($objetoProducto as $atributoProducto)
        {
            array_push($auxProductos ,$atributoProducto);
        }

        $auxString = implode(",", $auxProductos);
        return $auxString;
    }

    public static function verificarProducto($unProducto)
    {
        $arrayProductos = [];
        $productoRepetido = 0;
        if(file_exists("./Productos.csv"))
        {
            $arrayProductos = Producto::leerArchivo("./Productos.csv");
        }

        if(count($arrayProductos) > 0)
        {
            for($i = 0; $i < count($arrayProductos); $i++)
            {
                if(trim($arrayProductos[$i]->codigoDeBarra) == trim($unProducto->codigoDeBarra))
                {
                    $arrayProductos[$i]->stock += $unProducto->stock;
                    $productoRepetido = 1;
                    Producto::guardarArchivoArrayCSV($arrayProductos, "./Productos.csv", "w");
                    echo "Actualizado";
                    break;
                }
            }

            if($productoRepetido == 0)
            {
                Producto::guardarArchivoCSV($unProducto, "./Productos.csv", "a");
                echo "Ingresado if";
            }
        }
        else
        {
            Producto::guardarArchivoCSV($unProducto, "./Productos.csv", "a");
            echo "Ingresado";
        }
    }

    public static function descontarStock($ventaCodigoDeBarra, $ventaCantidadDeProductos)
    {
        $arrayDeProductosADescontar = [];
        $todoOK = 0;
        if(file_exists("./Productos.csv"))
        {
            $arrayDeProductosADescontar = Producto::leerArchivo("./Productos.csv");
        }

        for($i = 0; $i < count($arrayDeProductosADescontar); $i++)
        {
            if($arrayDeProductosADescontar[$i]->codigoDeBarra == $ventaCodigoDeBarra)
            {
                $arrayDeProductosADescontar[$i]->stock -= $ventaCantidadDeProductos;
                Producto::guardarArchivoArrayCSV($arrayDeProductosADescontar, "./Productos.csv", "w");
                $todoOK = 1;
                break;
            }
        }
        return $todoOK;
    }

    public static function guardarArchivoArrayCSV($productos, $ruta, $manejoDelArchivo)
    {
        $seAgrego = 0;
        $archivo = fopen($ruta, $manejoDelArchivo);

        if($archivo != 0)
        {
            foreach($productos as $itemProductos)
            {
                fwrite($archivo, Producto::mostrarProducto($itemProductos) . PHP_EOL);
                $seAgrego = 1;
            }
        }

        fclose($archivo);

        return $seAgrego;
    }

    public static function guardarArchivoCSV($producto, $ruta, $manejoDelArchivo)
    {
        $seAgrego = 0;
        $archivo = fopen($ruta, $manejoDelArchivo);

        if($archivo != 0)
        {
            fwrite($archivo, Producto::mostrarProducto($producto) . PHP_EOL);
            $seAgrego = 1;
        }

        fclose($archivo);

        return $seAgrego;
    }

    public static function leerArchivo($ruta)
    {
        $archivo = fopen($ruta, "r");
        $arrayAuxiliar = array();
        $arrayDeProductos = array();
        $lineaLeida = "";

        if($archivo != 0)
        {
            while(!feof($archivo))
            {
                $lineaLeida = fgets($archivo);
                
                if($lineaLeida != "")
                {
                    $arrayAuxiliar = explode(",", trim($lineaLeida, " \t\n\r\0\x0B") );
                    array_push($arrayDeProductos, new Producto($arrayAuxiliar[0], $arrayAuxiliar[1], $arrayAuxiliar[2], $arrayAuxiliar[3], $arrayAuxiliar[4], $arrayAuxiliar[5]));
                }
            }
        }

        fclose($archivo);

        return $arrayDeProductos;
    }
}
?>