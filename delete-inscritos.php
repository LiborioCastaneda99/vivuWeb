  
<?php

require 'database.php';

$id=$_GET['id'];

$sql = "DELETE FROM `inscritos-cursos` Where id=$id";
		$stmt = $conn->prepare($sql);

		if ($stmt->execute()) {
			echo "<script>alert('Usted ha eliminado a un inscrito, correctamente.');window.location='mis-cursos.php';</script>";
		}  else {
			echo "<script>alert('Lo sentimos, debe haber habido un problema al eliminar.');window.location='mis-cursos.php';</script>";
		}

?>