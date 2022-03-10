<?php
  include_once 'Proyecto.php';
  $traer = new Proyecto();

  $id = $_GET['id'];
  $datos=$traer->traerDatos($id);
  echo json_encode($datos);
?>
