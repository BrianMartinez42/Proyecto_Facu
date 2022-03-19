<?php
  include_once 'Proyecto.php';
  $alta = new Proyecto();

  $data = file_get_contents("php://input");
  $datos = json_decode($data,true);

  $nombre = $datos['nombre'];
  $apellido = $datos['apellido'];
  $dni = $datos['dni'];
  $fecha_nac = $datos['fecha_nac'];
  $sexo = $datos['sexo'];

  $mensaje=$alta->alta($nombre,$apellido,$dni,$fecha_nac,$sexo);
  echo json_encode($mensaje);
?>
