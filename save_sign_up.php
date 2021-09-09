<?php

require 'database.php';
  $Documento=$_POST['txtDocumento'];
  $Correo=$_POST['txtCorreo'];


$sql_c="SELECT count(documento) As ConteoPass FROM `users` where documento='$Documento' and email='$Correo'";
$res_c=mysqli_query($conn,$sql_c);

$data_C=mysqli_fetch_array($res_c);

$Conteo=$data_C['ConteoPass'];

if ($Conteo<1) {
  $Nombres=$_POST['txtNombres'];
  $Apellidos=$_POST['txtApellidos'];
  $TipoDocumento=$_POST['txtTipoDocumento'];
  $Documento=$_POST['txtDocumento'];
  $TipoPoblacion=$_POST['txtTipoPoblacion'];
  $Sexo=$_POST['txtSexo'];
  $Municipio=$_POST['txtMunicipio'];
  $Nacimiento=$_POST['txtFechaNacimiento'];
  $Telefono=$_POST['txtTelefono'];
  $Correo=$_POST['txtCorreo'];
  $Password=$_POST['txtPassword'];
  $Fecha=date('y-m-d');
  $sql = "INSERT INTO users(`nombres`, `apellidos`, `sexo`, `tipodocumento`, `documento`, `fechaNacimiento`, `telefono`, `tipoPoblacion`, `municipio`, `email`, `password`, `rol`, `fechaRegistro`) VALUES ('$Nombres','$Apellidos','$Sexo', '$TipoDocumento','$Documento','$Nacimiento','$Telefono','$TipoPoblacion','$Municipio','$Correo','$Password','Aprendiz','$Fecha')";
  $stmt = $conn->prepare($sql);

  if ($stmt->execute()) {
    echo "<script>alert('Nuevo usuario creado con éxito, puedes iniciar sesión.');window.location='sign_in.php';</script>";

    /*ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "concurso@planeacionsat.com";
    $to = "lcricom@sena.edu.co,rcervantes@sena.edu.co";
    $subject = "Hola, soy ".$Nombre." ya me registré satisfactoriamente.";
    $message = "Mis datos son los siguientes:
    Nombres y Apellidos: ".$Nombre." ".$Apellido.".
    Tipo de documento es ".$TipoDocumento.", mi número de documento es: ".$Documento.".
    Mi correo electronico es: ".$Correo.".
    Tengo ".$Edad." años, soy del genero: ".$Sexo.".
    Mi número de teléfono es: ".$Telefono.".
    Vivo en el municipio de ".$Municipio.", en la dirección: ".$Direccion.".
    Estudio ".$Nivel." en ".$Programa." de la ficha de caracterización: ".$Ficha." y estoy en ".$Trimestre.".";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);*/

  } 
}else {
    echo  "<script>alert('Lo sentimos, debe haber habido un problema al crear su cuenta, ya existe.');window.location='sign_in.php';</script>";
  }
?>