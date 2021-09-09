<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['idCurso'],
		$_POST['idUsuario']
				);

	echo $obj->agregarInscripcion($datos);
	

 ?>