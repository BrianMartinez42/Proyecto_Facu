<html lang="es">
  <head>
  	<title>Registro Alumno</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/estilo3.css">
  </head>

  <body>
    <?php
      //incluir el archivo que conecta con la base de datos
      include_once("conexion.php");

      if(isset($_POST['Enviar'])) {
      	$nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
      	$apellido = mysqli_real_escape_string($mysqli, $_POST['apellido']);
        $edad = mysqli_real_escape_string($mysqli, $_POST['edad']);
        $dni = mysqli_real_escape_string($mysqli, $_POST['dni']);
        $sexo = mysqli_real_escape_string($mysqli, $_POST['sexo']);

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
      	} else {
      		// si todos los campos fueron llenados...

      		//insertar datos en la base de datos
      		$result = mysqli_query($mysqli, "INSERT INTO alumno(nombre,apellido,edad,dni,sexo) VALUES('$nombre','$apellido','$edad','$dni','$sexo')");

      		//mostrar mensaje de exito
      		echo "<font color='green'>Datos agregados correctamente.";
      		echo "<br/><a class='button-grey' href='alumno.php'>Volver</a>";
      	}
      }
    ?>
  </body>
</html>
