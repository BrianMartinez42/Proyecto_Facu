<?php
  include_once "Proyecto.php";
  $baja = new Proyecto();

  $id = $_GET['aid'];
  $mensaje=$baja->borrar($id);
  echo json_encode($mensaje);
?>
