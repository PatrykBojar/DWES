<?php
require_once("Component.php");
class Processador extends Component{

    private $nucleos;
    private $hilos;
    private $frecuencia;

    function __construct($num_serie, $nombre, $marca, $precio, $nucleos, $hilos, $frecuencia) {
      parent::__construct($num_serie, $nombre, $marca, $precio);
      $this->nucleos = $nucleos;
      $this->hilos = $hilos;
      $this->frecuencia = $frecuencia;
    }

    function setNucleos($newNucleos){
      $this->nucleos = $newNucleos;
    }
    function setHilos($newHilos){
      $this->hilos = $newHilos;
    }

    function setFrecuencia($newFrecuencia){
      $this->frecuencia = $newFrecuencia;
    }

    function imprimir_descripcio(){
      echo "Procesador " . $this->getNombre() . ", ID " .
      $this->getNumSerie() . ", marca " . $this->getMarca() . ", " .
      $this->nucleos . " núcleos, " . $this->frecuencia . " GHz, " .
      $this->hilos . " hilos";
    }
}


 ?>
