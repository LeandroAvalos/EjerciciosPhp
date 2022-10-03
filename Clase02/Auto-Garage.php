<?php
include_once "Auto.php";
class Garage
{
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;

    public function __construct($razonSocial, $precioPorHora = 0)
    {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
        $this->_autos = array();
    }

    public function mostrarGarage()
    {
        echo "Razon Social: ", $this->_razonSocial . "<br/>";
        echo "Precio por hora: ", $this->_precioPorHora . "<br/>";

        foreach($this->_autos as $auto)
        {
            Auto::mostrarAuto($auto);
        }
    }

    public function equals($auto)
    {
        foreach($this->_autos as $item)
        {
            if($item->equals($auto))
            {
                return true;
            }
        }
        return false;
    }

    public function add($auto)
    {
        if($this->equals($auto) == false)
        {
            array_push($this->_autos, $auto);
        }
        else
        {
            echo "Este auto se encuentra en el garage <br/>", Auto::mostrarAuto($auto);
        }
    }

    public function remove($auto)
    {
        if($this->equals($auto))
        {
            $indice = array_search($auto, $this->_autos);
            unset($this->_autos[$indice]);
        }
        else
        {
            echo "Este auto se encuentra en el garage <br/>";
        }
    }

    
}

?>