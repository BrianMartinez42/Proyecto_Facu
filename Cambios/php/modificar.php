<?php
  include_once 'Proyecto.php';
  $modificar = new Proyecto();

  $data = file_get_contents("php://input");
  $datos = json_decode($data,true);

  $nombre = $datos['nombre'];
  $apellido = $datos['apellido'];
  $dni = $datos['dni'];
  $fecha_nac = $datos['fecha_nac'];
  $id = $datos['id'];

  $mensaje=$modificar->modificar($nombre,$apellido,$dni,$fecha_nac,$id);
  echo json_encode($mensaje);
?>
