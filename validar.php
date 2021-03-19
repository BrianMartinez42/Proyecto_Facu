	<?php 
	if (isset($_POST['contrasena'])) {
		if (empty($nombre)) {
			echo "<p class = 'error'>* Nombre no Ingresado </p>";
		}
		if (empty($contraseña)) {
			echo "<p class = 'error'>* Contraseña no Ingresado </p>";
		}				
	}

	?>