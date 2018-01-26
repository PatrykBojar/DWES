<?php
require_once("Component.php");
class Placa_Base extends Component{

  private $chipset;

  function __construct($num_serie, $nombre, $marca, $precio, $chipset) {
    parent::__construct($num_serie, $nombre, $marca, $precio);
    $this->chipset = $chipset;
  }

  function setChipset($newChipset){
    $this->chipset = $newChipset;
  }

  function imprimir_descripcio(){
    echo "Placa Base " . $this->getNombre() . ", ID " .
    $this->getNumSerie(). ", marca " . $this->getMarca().
    ", " . "chipset " . $this->chipset;
  }

}

?>
