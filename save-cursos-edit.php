<?php
require 'database.php';

$Codigo=$_POST['txtCodigo'];
$Curso=$_POST['txtCurso'];
$Jornada=$_POST['txtJornada'];
$Centro=$_POST['txtCentro'];
$Horario=$_POST['txtHorario'];
$Intensidad=$_POST['txtIntensidad'];
$Fecha=$_POST['txtFecha'];
$Municipio=$_POST['txtMunicipio'];
$Direccion=$_POST['txtDireccion'];
$TipoFormacion=$_POST['txtTipoFormacion'];
$Estado=$_POST['txtEstado'];
$Descripcion=$_POST['txtDescripcion'];
$Grupo=$_POST['txtGrupo'];

$sql="UPDATE cursos SET curso='$Curso',jornada='$Jornada',horario='$Horario',intensidad='$Intensidad',fecha_inicio='$Fecha',municipio='$Municipio',direccion='$Direccion',formacion='$TipoFormacion',centro='$Centro',descripcion='$Descripcion',nombre_grupo='$Grupo',estado='$Estado' WHERE codigo_curso='$Codigo'";

$stmt = $conn->prepare($sql);

if ($stmt->execute()) {
	echo "<script>alert('Usted ha modificado el curso, correctamente.');window.location='cursos.php';</script>";
}  else {
	echo 'Lo sentimos, ha ocurrido un error al momento de modificar.';
}
?>