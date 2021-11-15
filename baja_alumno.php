<?php
  //incluir el archivo qeu conecta a la BD
  include("conexion.php");

  //obtener la id de los datos desde la url
  $id = $_GET['id'];

  //borrar la fila de la tabla
  $result = mysqli_query($conexion, "DELETE FROM alumno WHERE id=$id");

  //redireccionar a la pagina principal
  header("Location:alumno.php");
?>
