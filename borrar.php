<?php
	
	include("conexion.php");

	$cedula=$_POST["txtcedula"];

	if(empty($cedula)){
		echo "Datos incompletos";;
	}
	else{
		$consulta=$conexion->prepare("SELECT * FROM USUARIO where cedula like '$cedula'");
		$consulta->execute(array(":cedula"=>$cedula));
		$fila = $consulta->fetch(PDO::FETCH_ASSOC);
		$cedulasql=$fila['cedula'];

		if($cedulasql==$cedula){
			$conexion->query("DELETE FROM USUARIO WHERE cedula like '$cedula'");
			
			echo "Se ha eliminado la persona<br>";
			echo "<a href='index.html'>volver</a>";
		}
		else{
			echo "La cedula no existe<br>";
			echo "<a href='index.html'>volver</a>";			
		}

	}

	
	

?>