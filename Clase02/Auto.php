<?php
class Auto
{
    private $_color;
    private $_precio;
    private $_marca;
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
        foreach($objetoAuto as $atributos)
        {
            echo $atributos;
            echo "<br/>";
        }
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
}

?>