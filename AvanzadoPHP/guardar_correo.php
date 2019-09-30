<?php

	// Recibir el dato por GET que hemos llamado en el <input> como "input_correo_electronico"
	$correo_recibido = $_GET["input_correo_electronico"];

	echo "El código PHP ha recibido: " . $correo_recibido;



	// Comprobar que sea un correo electrónico correcto desde el lado del servidor:
	$patron = "/[A-Za-z]+@[a-z]+\.[a-z]+/";
	$esCoincidente = preg_match($patron, $correo_recibido);

	if (!$esCoincidente) {
		exit("<br/>No es un correo electrónico válido: " . $correo_recibido);
	}



	// Conectarse a la base de datos para guardar el dato
	$nombreDelServidor = "127.0.0.1";   // "localhost"
	$nombreDeUsuario = "MiUsuarioDeMiBaseDeDeatos";
	$contrasenia = "grY3h5%5dDsJJbdXj";
	$nombreDeLaBaseDeDatos = "MiBaseDeDatos";

	echo '<br/>Abriendo conexión con la base de datos MySQL';
 	$conexion_bd = new mysqli($nombreDelServidor, $nombreDeUsuario, $contrasenia, $nombreDeLaBaseDeDatos);

 	echo '<br/>Comprobando conexión con la base de datos MySQL';
	if ($conexion_bd->connect_error) {
	    exit('No pudo conectarse: ' . $conexion_bd->connect_error);
	}
	
	echo '<br/>Creando consulta de INSERT para la base de datos MySQL';

	$sentencia_sql = $conexion_bd->prepare("INSERT INTO MiTabla (correo_electronico) VALUES (?)");
	$sentencia_sql->bind_param('s', $correo_recibido);

	echo '<br/>Insertando en la base de datos MySQL';
	$sentencia_sql->execute();

	echo '<br/>Cerrando conexión con la base de datos MySQL';
	$conexion_bd->close();

?>
