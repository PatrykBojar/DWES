<?php

class conexion {
     public function con(){
        $link= mysqli_connect("localhost", "root","", "usuario");
        return $link;
}
}
