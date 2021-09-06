<html lang="es">
  <head>
  	<title>Registro Profesor</title>
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
      	$mail = mysqli_real_escape_string($mysqli, $_POST['mail']);
        $pass = mysqli_real_escape_string($mysqli, $_POST['pass']);

      	// verificar campos vacios
      	if(empty($nombre) || empty($mail)) {

      		if(empty($nombre)) {
      			echo "<font color='red'>El campo de NOMBRE no fue llenado.</font><br/>";
      		}

      		if(empty($mail)) {
      			echo "<font color='red'>El campo de EMAIL no fue llenado.</font><br/>";
      		}

          if(empty($pass)) {
      			echo "<font color='red'>El campo de CLAVE no fue llenado.</font><br/>";
      		}

      		echo "<br/><a class='button-grey' href='javascript:self.history.back();'>Volver</a>";
      	} else {
      		// si todos los campos fueron llenados...

      		//insertar datos en la base de datos
          $pass=password_hash($_POST['pass'],PASSWORD_DEFAULT);
      		$result = mysqli_query($mysqli, "INSERT INTO profe(nombre,mail,pass) VALUES('$nombre','$mail','$pass')");

      		//mostrar mensaje de exito
      		echo "<font color='green'>Datos agregados correctamente.";
      		echo "<br/><a class='button-grey' href='login_profe.html'>Iniciar Sesión</a>";
      	}
      }
    ?>
  </body>
</html>
