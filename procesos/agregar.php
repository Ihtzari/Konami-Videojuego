<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['nom'],
		$_POST['tip'],
		$_POST['fecha'],
		$_POST['descri']
				);

	echo $obj->agregar($datos);
	

 ?>