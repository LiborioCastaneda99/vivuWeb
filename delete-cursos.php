  
<?php

require 'database.php';

$id=$_GET['id'];

$sql = "DELETE FROM cursos Where codigo_curso=$id";
		$stmt = $conn->prepare($sql);

		if ($stmt->execute()) {
			echo "<script>alert('Usted ha eliminado un curso, correctamente.');window.location='cursos.php';</script>";
		}  else {
			echo "<script>alert('Lo sentimos, debe haber habido un problema al eliminarse.');window.location='index-1.php';</script>";
		}

?>