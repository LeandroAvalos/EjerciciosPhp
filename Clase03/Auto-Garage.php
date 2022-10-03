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
        $informacionGarage = "Razon social: " . $this->_razonSocial . 
        "<br/> Precio por hora: " . $this->_precioPorHora . "<br/>";
        
        foreach($this->_autos as $autosGarage)
        {
            $informacionGarage .= Auto::mostrarAuto($autosGarage) . "<br/>";
        }
        echo "<br/>";

        return $informacionGarage;
    }

    public static function infoGarage($garage)
    {
        $arrayAutosGarage = array();

        foreach($garage->_autos as $autitos)
        {
            array_push($arrayAutosGarage, Auto::mostrarAuto($autitos));
        }

        return $garage->_razonSocial . ',' . $garage->_precioPorHora . '-' . implode('-', $arrayAutosGarage);
    }

    public static function guardarInfoGarage($garages)
    {
        $archivo = fopen("Garage.csv", "w");

        if($archivo != 0)
        {
            foreach($garages as $unGarage)
            {
                fwrite($archivo, Garage::infoGarage($unGarage) . PHP_EOL);
            }
        }

        fclose($archivo);
    }

    public static function leerInfoGarage()
    {
        $archivo = fopen("Garage.csv", "r");
        $lineaLeida = "";
        $arrayAuxiliarAutos = array();
        $arrayAuxiliarInfo = array();
        $arrayAuxiliarAutosSeparados = array();
        $nuevoGarage = array();

        if($archivo != 0)
        {
            while(!feof($archivo))
            {
                $lineaLeida = fgets($archivo);
                if($lineaLeida != "")
                {
                    $arrayAuxiliarInfo = explode(",", $lineaLeida);
                    $auxiliarGarage = new Garage($arrayAuxiliarInfo[0],(float) $arrayAuxiliarInfo[1]);
                    $arrayAuxiliarAutos = explode("-", $lineaLeida);
                    for($i = 1; $i < count($arrayAuxiliarAutos); $i++)
                    {
                        $arrayAuxiliarAutosSeparados = explode(",", $arrayAuxiliarAutos[$i]);
                        $auxiliarGarage->add(new Auto($arrayAuxiliarAutosSeparados[0], $arrayAuxiliarAutosSeparados[1], floatval($arrayAuxiliarAutosSeparados[2]), $arrayAuxiliarAutosSeparados[3]));
                    }
                    array_push($nuevoGarage, $auxiliarGarage);
                }
            }
        }
        fclose($archivo);
        return $nuevoGarage;
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
            echo "Este auto se encuentra en el garage <br/>";
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