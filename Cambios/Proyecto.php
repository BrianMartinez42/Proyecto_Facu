<?php
  class Proyecto{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $base = "proyecto";
    public $conexion;

    public function __construct(){
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->base) or die(mysql_error());
      $this->conexion->set_charset("utf8");
    }

    //BUSCAR
    public function buscar($tabla, $condicion){
      $resultado = $this->conexion->query("SELECT * FROM $tabla WHERE $condicion") or die($this->conexion->error);
      if ($resultado){
        return $resultado->fetch_all(MYSQLI_ASSOC);
      }
      else {
        return false;
      }
    }
    
  }
?>
