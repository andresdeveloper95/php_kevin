<?php

	include("conexion.php");
	
	$cedula=$_POST['txtcedula'];
	$nombre=$_POST['txttexto'];

	if (empty($cedula) or empty($nombre)){
		echo "Datos incompletos <br>";
		echo "<a href='index.html'>volver</a>";
		}

	else{
		$consulta=$conexion->prepare("SELECT * FROM USUARIO where cedula like '$cedula'");
		$consulta->execute(array(":cedula"=>$cedula));
		$fila = $consulta->fetch(PDO::FETCH_ASSOC);
		$cedulasql=$fila['cedula'];

			if($cedulasql==$cedula){
			echo "la persona ya existe <br>";
			echo "<a href='index.html'>volver</a>";
			}
			else{
			$sentencia=$conexion->prepare("INSERT INTO USUARIO values(:cedula,:nombre)");

			$sentencia->execute(array("cedula"=>$cedula,":nombre"=>$nombre));

			echo "<script type='text/javascript'>
				alert('Datos ingresados correctamente');
				window.location='index.html';
				</script>";

			}
		}
?>