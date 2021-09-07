<?php
require 'database.php';

$Codigo=$_POST['txtCodigo'];
$Nombre_Grupo=$_POST['txtNombre'];
$Img=$_POST['txtImg'];

$nombre = $_FILES['archivo']['name'];
$tipo = $_FILES['archivo']['type'];
$ruta = $_FILES['archivo']['tmp_name'];

$destino = "assets/" .time(). $nombre;
$destinon = time(). $nombre;
if ($nombre != "") {
	if (copy($ruta, $destino)) {

		$sql="UPDATE grupos SET nombre_grupo='$Nombre_Grupo', tipo_archivo='$tipo', nombre_archivo='$destinon' WHERE id='$Codigo'";

		$stmt = $conn->prepare($sql);

		if ($stmt->execute()) {
			echo "<script>alert('Usted ha modificado el grupo, correctamente.');window.location='cursos.php';</script>";
		}  else {
			echo 'Lo sentimos, ha ocurrido un error al momento de modificar.';
		}	
	}
}else{
	
	$sql="UPDATE grupos SET nombre_grupo='$Nombre_Grupo',  nombre_archivo='$Img' WHERE id='$Codigo'";

	$stmt = $conn->prepare($sql);

	if ($stmt->execute()) {
		echo "<script>alert('Usted ha modificado el grupo, correctamente.');window.location='cursos.php';</script>";
	}  else {
		echo 'Lo sentimos, ha ocurrido un error al momento de modificar.';
	}	
}


?>