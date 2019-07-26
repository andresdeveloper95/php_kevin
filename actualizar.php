<?php

	include("conexion.php");

	$cedula=$_POST["txtcedula"];
	$nombre=$_POST['txttexto'];

	if(empty($cedula) or empty($nombre)){
		echo "Datos incompletos<br>";
	}
	else{
		$consulta=$conexion->prepare("SELECT * FROM USUARIO where cedula like '$cedula'");
		$consulta->execute(array(":cedula"=>$cedula));
		$fila = $consulta->fetch(PDO::FETCH_ASSOC);
		$cedulasql=$fila['cedula'];

		if($cedulasql==$cedula){
          $sentencia=$conexion->query("UPDATE  USUARIO set nombre='$nombre' WHERE cedula like'$cedula'");
			echo "Se actualizo el registro<br>";
			echo "<a href='index.html'>volver</a>";
		}
		else{
			echo "La cedula no se encuentra<br>";
			echo "<a href='index.html'>volver</a>";
		}
	}
	
?>