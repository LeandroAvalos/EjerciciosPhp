<?php
class Auto
{
    private $_marca;
    private $_color;
    private $_precio;
    private $_fecha;

    public function __construct($marca, $color, $precio = 0, $fecha = "")
    {
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio;
        $this->_fecha = $fecha;
        
    }

    public function agregarImpuestos($impuesto)
    {
        $this->_precio += $impuesto;
    }

    public static function mostrarAuto($objetoAuto)
    {
        $auxAutos = array();
        $auxString = "";
        foreach($objetoAuto as $atributoAuto)
        {
            array_push($auxAutos ,$atributoAuto);
        }

        $auxString = implode(",", $auxAutos);
        return $auxString;
    }

    public function equals($auto1)
    {
        if($this->_marca == $auto1->_marca)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function add(Auto $auto1, Auto $auto2)
    {
        $importe = 0.0;
        if($auto1->equals($auto2) && $auto1->_color == $auto2->_color)
        {
            $importe = $auto1->_precio + $auto2->_precio;
        }
        return $importe;
    }

    public static function guardarArchivo($auto)
    {
        $archivo = fopen("Autos.csv", "w");

        if($archivo != 0)
        {
            foreach($auto as $itemAuto)
            {
                fwrite($archivo, Auto::mostrarAuto($itemAuto) . PHP_EOL);
            }
        }

        fclose($archivo);
    }

    public static function leerArchivo()
    {
        $archivo = fopen("Autos.csv", "r");
        $arrayAuxiliar = array();
        $arrayDeAutos = array();
        $lineaLeida = "";

        if($archivo != 0)
        {
            while(!feof($archivo))
            {
                $lineaLeida = fgets($archivo);
                
                if($lineaLeida != "")
                {
                    $arrayAuxiliar = explode(",", $lineaLeida);
                    array_push($arrayDeAutos, new Auto($arrayAuxiliar[0], $arrayAuxiliar[1], $arrayAuxiliar[2], $arrayAuxiliar[3]));
                }
            }
        }

        fclose($archivo);

        return $arrayDeAutos;
    }
}

?>