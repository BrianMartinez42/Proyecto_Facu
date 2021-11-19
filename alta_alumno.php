<html lang="es">
  <head>
  	<title>Registro Alumno</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/estilo3.css">
  </head>

  <body>
    <header>
      <h1 class="contenedor__title">Infinexus</h1>
    </header>
    <?php
      //incluir el archivo que conecta con la base de datos
      include_once("conexion.php");

      if(isset($_POST['Enviar'])) {
      	$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
      	$apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
        $fecha_nac = mysqli_real_escape_string($conexion, $_POST['fecha_nac']);
        $dni = mysqli_real_escape_string($conexion, $_POST['dni']);
        $sexo = mysqli_real_escape_string($conexion, $_POST['sexo']);

        $resultado = mysqli_query($conexion, "SELECT * FROM alumno");
        $cont=0;
        while($res = mysqli_fetch_array($resultado)){
          if ($dni == $res['dni']) {
            $cont=$cont+1;
          }
        }
      	// verificar campos vacios
      	if(empty($nombre) || empty($apellido)) {

      		if(empty($nombre)) {
      			echo "<font color='red'>El campo de NOMBRE no fue llenado.</font><br/>";
      		}

      		if(empty($apellido)) {
      			echo "<font color='red'>El campo de APELLIDO no fue llenado.</font><br/>";
      		}

          if(empty($edad)) {
      			echo "<font color='red'>El campo de EDAD no fue llenado.</font><br/>";
      		}

          if(empty($dni)) {
            echo "<font color='red'>El campo de DNI no fue llenado.</font><br/>";
          }

          if(empty($sexo)) {
      			echo "<font color='red'>El campo de SEXO no fue llenado.</font><br/>";
      		}

      		echo "<br/><a class='button-grey' href='javascript:self.history.back();'>Volver</a>";
      	} elseif ($cont>0) {
          ?>
          <div class='mensaje-m'>
            <h3>Ya hay un alumno con ese DNI.</h3><br>
            <div class="form-group">
              <a class='button-accept' href='javascript:self.history.back();'>Volver</a>
            </div>
          </div>

          <?php
        }else {
      		// si todos los campos fueron llenados...

      		//insertar datos en la base de datos
      		$result = mysqli_query($conexion, "INSERT INTO alumno(nombre,apellido,fecha_nac,dni,sexo) VALUES('$nombre','$apellido','$fecha_nac','$dni','$sexo')");
          //mostrar mensaje de exito
          ?>

          <div class='mensaje-b'>
          <h3>Datos registrados correctamente.</h3><br>
            <div class="form-group">
              <a class='button-accept' href='alumno.php'>Volver</a>
            </div>
          </div>
          <?php
          }
      }
    ?>
  </body>
</html>
