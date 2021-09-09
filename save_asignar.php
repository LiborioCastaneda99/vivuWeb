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
//$Estado=$_POST['txtEstado'];
	$Descripcion=$_POST['txtDescripcion'];
	$Documento=$_POST['txtDocumento'];
	$Correo_m=$_POST['txtCorreo_m'];
	$Nombres_m=$_POST['txtNombres_m'];
	$Apellidos_m=$_POST['txtApellidos_m'];
	$FechaRegistro=date('y-m-d');
	$sql_c="SELECT count(Documento) As ConteoPass FROM `inscritos-cursos` where documento='$Documento' and estado='Inscrito'";
	$res_c=mysqli_query($cn,$sql_c);

	$data_C=mysqli_fetch_array($res_c);

	$Conteo=$data_C['ConteoPass'];
	if ($Conteo<2) {

		$sql="INSERT INTO `inscritos-cursos` (codigo_curso, curso, jornada, horario, intensidad, fecha_inicio, municipio, direccion ,formacion, centro, descripcion, documento, estado, fechaRegistro) VALUE('$Codigo','$Curso','$Jornada','$Horario','$Intensidad','$Fecha','$Municipio', '$Direccion','$TipoFormacion','$Centro','$Descripcion','$Documento','Inscrito','$FechaRegistro')";

		$res=mysqli_query($cn,$sql);

		$data=mysqli_fetch_array($res);

		$to = $Correo_m;
		$subject = "Confirmación inscripción";

		$message = "<!DOCTYPE html>
		<html>
		<head>
		<meta charset='UTF-8'>
		<title></title>
		</head>
		<body style='font-family: Arial; font-size: 15px;'>
		<div style=''>
		<img style='display:block;margin-left: auto; margin-right: auto;' src='http://vivu.com.co/assets/Oferta_Complementaria_Mesa.png' width='75%' />
		</div>

		<p style='color: #4d4d4d; line-height: 21px;'>
		<span style=''>Señor(a): <b>".$Nombres_m." ".$Apellidos_m."</b>
		</p>

		<p style='text-align: center;color: #4d4d4d; line-height: 21px;'>
		<span style=''>Usted se ha inscrito satisfactoriamente en el curso de ".$Curso." con una intensidad de ".$Intensidad." el cual inicia el día ".$Fecha." en el Municipio/dirección de ".$Municipio.", ".$Direccion." con el siguiente horario de lunes a viernes de ".$Horario."
		</p>

		<p style='text-align: center;color: #4d4d4d; line-height: 21px;'>
		<span style=''>La Formación del Sena es completamente gratuita y no requiere de intermediarios. Si alguien le solicita dinero o favores a cambio denúncielo a la oficina de atención al ciudadano, correo: comunicaciones@vivu.com.co
		</p>

		<p style='text-align: center;color: #4d4d4d; line-height: 21px;'>
		<span style=''>RECUERDE QUE LA ASISTENCIA DESDE EL PRIMER DIA ES OBLIGATORIA
		<br>
		Si tiene alguna inquietud, por favor comuníquese con nuestra oficina:
		<br>
		CRA 43 # 42-40 Piso 3, Oficina de Población Vulnerable <br>
		Barranquilla - Colombia
		</p>



		<div style=''>
		<img style='display:block;margin-left: auto; margin-right: auto;' src='http://vivu.com.co/assets/Logosimbolo.png' width='20%' />
		</div>

		</body>
		</html>

		";

		ini_set("SMTP", "smtp.hostinger.co");
		ini_set("sendmail_from", "inscripciones@vivu.com.co");
		ini_set("smtp_port", "587");
        // Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
		$headers .= 'From: <inscripciones@vivu.com.co>' . "\r\n";

		mail($to,$subject,$message,$headers);



		echo "<script>alert('Usted ha sido asignado al curso, correctamente.');window.location='cursos.php';</script>";


	}else {
		echo "<script>alert('Lo sentimos, ha ocurrido un error al momento de asignar, ya usted está asignado en un curso.');window.location='cursos.php';</script>";

	}

	?>