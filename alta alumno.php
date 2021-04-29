<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap/css/bootstrap.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./css/propio.css">
</head>
<body>
	<div class="contenedor">
		<header>
			<h1 class="contenedor__title">Unidique</h1>
		</header>

		<div class="ventana">
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
					<button class="boton1" type="submit"> Guardar </button>
				</div>

			</form>
		</div>
	</div>
</body>
</html>
