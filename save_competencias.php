<?php 
include ("conexion.php");

$Nombres=$_POST['txtNombres'];
$Apellidos=$_POST['txtApellidos'];
$Tipo_doc=$_POST['txtTipo_doc'];
$Documento=$_POST['txtDocumento'];
$Poblacion=$_POST['txtPoblacion'];
$FechaNacimiento=$_POST['txtFechaNacimiento'];
$Ocupacion=$_POST['txtOcupacion'];
$Telefono=$_POST['txtTelefono'];
$FechaRegistro=date('y-m-d');


$sql_c="SELECT count(documento) As ConteoPass FROM competencias where documento='$Documento'";
$res_c=mysqli_query($cn,$sql_c);

$data_C=mysqli_fetch_array($res_c);

$Conteo=$data_C['ConteoPass'];
if ($Conteo<1) {

	$sql="INSERT INTO competencias (nombres, apellidos, tipodocumento, documento, fechaNacimiento, telefono,poblacion, ocupacion, fechaRegistro) VALUE('$Nombres','$Apellidos','$Tipo_doc','$Documento','$FechaNacimiento','$Telefono','$Poblacion','$Ocupacion', '$FechaRegistro')";

	$res=mysqli_query($cn,$sql);

	$data=mysqli_fetch_array($res);  
	echo "<script>alert('Usted ha enviado su solicitud de certificación por competencias, correctamente.');window.location='competencias.php';</script>";
}
else {
	echo "<script>alert('Lo sentimos, ha ocurrido un error al momento de enviar su solicitud, usted ya tiene una solicitud en proceso.');window.location='competencias.php';</script>";
}

?>