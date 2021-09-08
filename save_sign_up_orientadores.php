<?php

require 'database.php';


if (!empty($_POST['txtCorreo']) && !empty($_POST['txtPassword'])) {
  $Nombres=$_POST['txtNombres'];
  $Apellidos=$_POST['txtApellidos'];
  $TipoDocumento=$_POST['txtTipoDocumento'];
  $Documento=$_POST['txtDocumento'];
  $FechaNacimiento=$_POST['txtFechaNacimiento'];
  $Centro=$_POST['txtCentro'];
  $Sexo=$_POST['txtSexo'];
  $Municipio=$_POST['txtMunicipio'];
  $Rol=$_POST['txtRol'];
  $Fecha=date('y-m-d');
  $sql = "INSERT INTO users(`nombres`, `apellidos`, `sexo`, `tipodocumento`, `documento`, `fechaNacimiento`, `centro`, `municipio`, `email`, `password`, `rol`, `fechaRegistro`) VALUES ('$Nombres','$Apellidos','$Sexo', '$TipoDocumento','$Documento','$FechaNacimiento','$Centro','$Municipio',:txtCorreo, :txtPassword,'$Rol','$Fecha')";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':txtCorreo', $_POST['txtCorreo']);
  $stmt->bindParam(':txtPassword', $_POST['txtPassword']);

  if ($stmt->execute()) {
    echo "<script>alert('Nuevo usuario creado con éxito, puedes iniciar sesión.');window.location='sign_up_orientadores.php';</script>";

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

  } else {
    echo  "<script>alert('Lo sentimos, debe haber habido un problema al crear su cuenta, ya existe.');window.location='sign_up_orientadores.php';</script>";
  }
}
?>