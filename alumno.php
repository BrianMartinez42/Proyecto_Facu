<?php
    include_once("conexion.php");
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
    <link rel="stylesheet" href="./css/estilo3.css">
  </head>

  <body>
    <div class="contenedor">
      <header>
        <h1 class="contenedor__title">Infinexus</h1>
      </header>
      <br>

      <div class="col-lg-12 col-md-8">
        <a href="alta_alumno.html" class="button-green" type="submit"> Registrar Alumno </a>
        <br><br>
        <table class="table bg-light table-bordered table-hover table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">DNI</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Edad</th>
              <th scope="col">Sexo</th>
              <th scope="col">Accion</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query="SELECT id, nombre, apellido, TIMESTAMPDIFF(YEAR,fecha_nac,CURDATE()) as edad, dni, sexo FROM alumno";
            $result=mysqli_query($conexion,$query);
              while($res = mysqli_fetch_array($result)) {
                switch ($res['sexo']) {
                  case 'i':
                    $sexo='Indefinido';
                    break;
                  case 'f':
                      $sexo='Femenino';
                    break;
                  case 'm':
                      $sexo='Masculino';
                    break;
                }
                echo "<tr>";
                echo "<td>".$res['dni']."</td>";
                echo "<td>".$res['nombre']."</td>";
                echo "<td>".$res['apellido']."</td>";
                echo "<td>".$res['edad']."</td>";
                echo "<td>".$sexo."</td>";
                echo "<td><a href=\"editar_alumno.php?id=$res[id]\" class='button-blue'>Editar</a>  <a href=\"baja_alumno.php?id=$res[id]\" onClick=\"return confirm('¿Seguro que quiere borrar?')\" class='button-red'>Borrar</a></td>";
              }
            ?>
          </tbody>
        </table>
      </div>

    </div>
  </body>
</html>
