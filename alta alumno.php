<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/propio.css">
</head>
<body>
	<div id="contenedor">

		<div id="cabecera">
			Alta de Alumno
		</div>

		<div id="ventana">
			<form method="POST" action="programa.php ?accion=alta" >
				

				<div class="form-group">
                    Nombre de alumno
					<input class="form-control" type="text" autofocus name="nombre">
                    <br>
                    Edad alumno
                    <input class="form-control" type="text" autofocus name="edad">
				</div>

				<br>
				<div class="form-group">
					<button class="boton5" type="submit"> Guardar </button>
				</div>
				
			</form>
		</div>	

	</div>
</body>
</html>