<?php
// incluir el archivo que conecta con la BD
include_once("conexion.php");

if(isset($_POST['actualizar']))
{

	$id = mysqli_real_escape_string($conexion, $_POST['id']);

	$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
	$apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
	$fecha_nac = mysqli_real_escape_string($conexion, $_POST['fecha_nac']);
	$dni = mysqli_real_escape_string($conexion, $_POST['dni']);
	$sexo = mysqli_real_escape_string($conexion, $_POST['sexo']);

	// revisar campos vacios
	if(empty($nombre) || empty($apellido) || empty($fecha_nac) || empty($dni)) {

		if(empty($nombre)) {
			echo "<font color='red'>El campo Nombre está vacío.</font><br/>";
		}

		if(empty($apellido)) {
			echo "<font color='red'>El campo Apellido está vacío.</font><br/>";
		}

		if(empty($fecha_nac)) {
			echo "<font color='red'>El campo Fecha de Nacimiento está vacío.</font><br/>";
		}

		if(empty($dni)) {
			echo "<font color='red'>El campo Fecha de Nacimiento está vacío.</font><br/>";
		}

	} else {
		//actualizar la tabla
		$result = mysqli_query($conexion, "UPDATE alumno SET nombre='$nombre',apellido='$apellido',fecha_nac='$fecha_nac',dni='$dni',sexo='$sexo' WHERE id=$id");

		//redireccionar a la pagina principal
		header("Location: alumno.php");
	}
}
?>
<?php
	//obtengo la id desde la url
	$id = $_GET['id'];

	//selecciono los datos asociados con su id particular
	$resultado = mysqli_query($conexion, "SELECT * FROM alumno WHERE alumno.id=$id");

	while($res = mysqli_fetch_array($resultado))
	{
		$nombre = $res['nombre'];
		$apellido = $res['apellido'];
		$fecha_nac = $res['fecha_nac'];
		$dni = $res['dni'];
	}
?>
<html lang="es">
<head>
	<title>Editar Datos</title>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="./css/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./css/estilo3.css">
</head>

<body>
	<header>
		<h1 class="contenedor__title">Unidique</h1>
	</header>
	<br/>
	<a href="alumno.php" class="button-grey">Inicio</a>

	<div class="ventana">
		<form name="form1" method="post" action="editar_alumno.php">
			<h3>Editar Alumno</h3>
			Nombre
			<div class="form-group">
				<input class="form-control" type="text" name="nombre" autofocus required value="<?php echo $nombre;?>">
				<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
			</div>
			Apellido
			<div class="form-group">
				<input class="form-control" type="text" name="apellido" required value="<?php echo $apellido;?>">
			</div>
			Edad
			<div class="form-group">
				<input class="form-control" type="date" name="fecha_nac" required value="<?php echo $fecha_nac;?>">
			</div>
			DNI
			<div class="form-group">
				<input class="form-control" type="number" name="dni" required value="<?php echo $dni;?>">
			</div>
			<div class="form-group">
			<span class="datos">Sexo: </span><br>
				<span class="datos">Indefinido:</span> <input class="" type="radio" name="sexo" value="i" checked="">
				<span class="datos">Femenino:</span> <input class="" type="radio" name="sexo" value="f">
				<span class="datos">Masculino:</span> <input class="" type="radio" name="sexo" value="m"><br>
			</div>
			<input class="button-accept" type="submit" name="actualizar" value="Actualizar">
		</form>
	</div>
</body>
</html>
