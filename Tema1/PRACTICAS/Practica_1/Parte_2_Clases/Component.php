<?php
class Component{

  public $num_serie = "";
  public $nombre = "";
  public $marca = "";
  public $precio = 0;
  //public $imprimir = "imprimir_descripcio";

  function __construct($num_serie, $nombre, $marca, $precio){
    $this->num_serie = $num_serie;
    $this->nombre = $nombre;
    $this->marca = $marca;
    $this->precio = $precio;
  }

  function imprimir_descripcio(){
    echo "Número de serie: $this->num_serie<br>";
    echo "Nombre: $this->nombre<br>";
    echo "Marca: $this->marca<br>";
  }


  function getNumSerie(){
    return $this->num_serie;
  }

  function setNumSerie ($newNumSerie){
    $this->num_serie = $newNumSerie;
  }

  function getNombre(){
    return $this->nombre;
  }

  function setNombre ($newNombre){
    $this->nombre = $newNombre;
  }

  function getMarca(){
    return $this->marca;
  }

  function setMarca(){
    $this->marca = $newMarca;
  }

  function getPrecio(){
    return $this->precio;
  }

  function setPrecio($newPrecio){
    $this->precio = $newPrecio;
  }


}





 ?>
