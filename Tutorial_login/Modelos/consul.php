<?php
include 'conexion.php';
class consul {
    
    private $lista;
    
    public function _construct(){
        $this->lista=array();
    }
    
    public function login($nom,$cla){
      $query=mysqli_query(conexion::con(), "call login('$nom','$cla')");
      while ($row=mysqli_fetch_array($query)){
          $this->lista[]=$row;
      }
      return $this->lista;
    }
    
    
}
