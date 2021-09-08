<?php
require 'database.php';
 $fecha=date('y-m-d');
 echo $fecha;
    $Correo_Electronico=$_POST['email'];
		$sql="UPDATE users SET fecha_sesion='$fecha' WHERE email='$Correo_Electronico'";

		$stmt = $conn->prepare($sql);

		if ($stmt->execute()) {
		//	echo "<script>alert('Usted ha modificado el grupo, correctamente.');window.location='cursos.php';</script>";
		}  else {
		//	echo 'Lo sentimos, ha ocurrido un error al momento de modificar.';
		}
	
?>