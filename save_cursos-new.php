<?php 
include ("conexion.php");

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

$sql_c="SELECT count(codigo_curso) As ConteoPass FROM cursos where codigo_curso='$Codigo'";
$res_c=mysqli_query($cn,$sql_c);

$data_C=mysqli_fetch_array($res_c);

$Conteo=$data_C['ConteoPass'];
if ($Conteo<1) {

	$sql="INSERT INTO cursos ( codigo_curso, curso, jornada, horario, intensidad, fecha_inicio, municipio, direccion, formacion, centro, descripcion, nombre_grupo, estado) VALUE('$Codigo','$Curso','$Jornada','$Horario','$Intensidad','$Fecha','$Municipio','$Direccion','$TipoFormacion','$Centro','$Descripcion','$Grupo','$Estado')";

	$res=mysqli_query($cn,$sql);

	$data=mysqli_fetch_array($res);  
	echo "<script>alert('Usted ha creado un nuevo curso, correctamente.');window.location='cursos.php';</script>";
}
else {
	echo "<script>alert('Lo sentimos, ha ocurrido un error al momento de crear, ese codigo ya existe.');window.location='cursos.php';</script>";
}

?>