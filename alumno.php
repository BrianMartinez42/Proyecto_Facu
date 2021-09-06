<?php
    $conexion=mysqli_connect('localhost','root','','proyecto');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv=”Expires” content=”0″>
    <meta http-equiv=”Last-Modified” content=”0″>
    <meta http-equiv=”Cache-Control” content=”no-cache, mustrevalidate”>
    <meta http-equiv=”Pragma” content=”no-cache”>
    <title>Operaciones Alumno</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/estilo2.css">
  </head>

  <body>
    <div class="contenedor">
      <header>
        <h1 class="contenedor__title">Unidique</h1>
      </header>
      <br>
      <a href="alta_alumno.html" class="botona" type="submit"> Alta </a>
      <div class="col-lg-12 col-md-8">
        <table class="table bg-light table-bordered table-hover">
          <thead class="thead-dark">
          <tr>
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Edad</th>
            <th scope="col">Sexo</th>
            <th scope="col">Accion</th>
          </tr>
          <tbody>
            <?php
              $sql="SELECT * FROM alumno";
              $result=mysqli_query($conexion,$sql);
              while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
              <td><?php echo $mostrar['dni']?></td>
          		<td><?php echo $mostrar['nombre']?></td>
              <td><?php echo $mostrar['apellido']?></td>
              <td><?php echo $mostrar['edad']?></td>
              <td><?php echo $mostrar['sexo']?></td>
          		<td>
            		<a href="borrar.php?id='.$alumno['id'].'" class="botonb">Borrar</a>
            		<a href="editar.php?id='.$alumno['id'].'" class="botonm">Editar</a>
          		</td>
            </tr>
            <?php
                }
            ?>
          </tbody>
        </table>
      </div>

    </div>
  </body>
</html>
