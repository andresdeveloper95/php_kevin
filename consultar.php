<?php

	include("conexion.php");

	$sentencia=$conexion->prepare("SELECT * FROM USUARIO");
	$sentencia->execute();

	$resultado=$sentencia->fetchAll(PDO::FETCH_ASSOC);

	
	foreach ($resultado as $vector) {

		echo $vector['cedula']."  ". $vector['nombre']."<br>";
	}

?>

