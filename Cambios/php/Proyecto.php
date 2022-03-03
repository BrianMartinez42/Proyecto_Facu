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
      $consulta = $this->conexion->query("SELECT * FROM $tabla WHERE $condicion") or die($this->conexion->error);
      if ($consulta){
        return $consulta->fetch_all(MYSQLI_ASSOC);
      }
      else {
        return false;
      }
    }

    //BORRAR
    public function borrar($id){
      if ($consulta = $this->conexion->query("DELETE FROM alumno WHERE id={$id}")){
        return $array = array('delete' => 'success');
        $consulta->close();
      } else {
        return $array = array('delete' => 'failed');
        $consulta->close();
      }
    }

    
  }
?>
