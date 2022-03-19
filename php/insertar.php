<?php
  include_once "Proyecto.php";
  $alta = new Proyecto();
  
  $alum = array();
  $alum = $_GET['alumno'];
  $mensaje=$alta->agregar($alum);
  echo json_encode($mensaje);
?>
