<?php

	include("conexion.php");

	$cedula=$_POST["txtcedula"];
	$nombre=$_POST['txtTexto'];
	
	$sentencia=$conexion->query("UPDATE  USUARIO set nombre='$nombre' WHERE cedula='$cedula'");
	
?>