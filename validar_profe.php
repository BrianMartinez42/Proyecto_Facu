<?php

  $nombre=$_POST['nombre'];
  $pass=$_POST['pass'];

  $conexion=mysqli_connect("localhost", "root", "", "proyecto");
  $consulta="SELECT pass FROM profe WHERE nombre='$nombre'";
  $resultado=mysqli_query($conexion, $consulta);

  while($fila=mysqli_fetch_row($resultado)){
    if (password_verify($pass, $fila[0])) {
    header("location:profesor.html");
    } else {
      echo"Error en la autentificacion";
    $errorlogin = "Nombre de usuario y/o password incorrecto";
    include_once 'login_profe.html';
    }
  }
  mysqli_free_result($resultado);
  mysqli_close($conexion);

?>
