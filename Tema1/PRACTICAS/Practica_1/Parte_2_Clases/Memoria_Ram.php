<?php
require_once("Component.php");
class Memoria_Ram extends Component{

  private $tipo;
  private $capacidad;
  private $velocidad;

  function __construct($num_serie, $nombre, $marca, $precio, $tipo, $capacidad, $velocidad) {
    parent::__construct($num_serie, $nombre, $marca, $precio);
    $this->tipo = $tipo;
    $this->capacidad = $capacidad;
    $this->velocidad = $velocidad;
  }

  function setTipo($newTipo){
    $this->tipo = $newTipo;
  }
  function setCapacidad($newCapacidad){
    $this->capacidad = $newCapacidad;
  }

  function setVelocidad($newVelocidad){
    $this->velocidad = $newVelocidad;
  }
  function imprimir_descripcio(){
    echo "Memoria RAM " . $this->getNombre() . ", ID " .
    $this->getNumSerie() . ", marca " . $this->getMarca() .
    ", " . $this->tipo . ", " . $this->capacidad . " GB, " .
    $this->velocidad . " MHz";
  }
}
 ?>
