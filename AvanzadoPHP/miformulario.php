<!DOCTYPE html>
<html>


	<head>
		<meta charset="UTF-8">
		<title>Formulario</title>
	</head>


	<body>

		<form action="/guardar_correo.php" method="get">
		  Inserte su correo electrónico:
		  <br>
		  <input type="email" name="input_correo_electronico">
		  <br>
		  <input type="submit" value="Enviar">
		</form>


		<h2>Correos guardados:</h2>

		<?php
			$nombreDelServidor = "127.0.0.1";
			$nombreDeUsuario = "MiUsuarioDeMiBaseDeDeatos";
			$contrasenia = "grY3h5%5dDsJJbdXj";
			$nombreDeLaBaseDeDatos = "MiBaseDeDatos";

		 	$conexion_bd = new mysqli($nombreDelServidor, $nombreDeUsuario, $contrasenia, $nombreDeLaBaseDeDatos);
			if ($conexion_bd->connect_error) {
			    exit('No pudo conectarse: ' . $conexion_bd->connect_error);
			}
			
			$sentencia_sql = $conexion_bd->prepare("SELECT correo_electronico FROM MiTabla");
			$sentencia_sql->execute();

			$resultado = $sentencia_sql->get_result();
			while ($fila = $resultado->fetch_assoc()) {
			    echo '<br/> * ' . $fila["correo_electronico"];
			}
			$resultado->free();

			$conexion_bd->close();
		?>

	</body>


</html>