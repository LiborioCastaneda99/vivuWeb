<?php 
include ("conexion.php");
$Correo=$_POST['txtCorreo'];

$sql_c="SELECT count(password) As ConteoPass,email, password FROM users where email='$Correo'";
$res_c=mysqli_query($cn,$sql_c);

$data_C=mysqli_fetch_array($res_c);

$Clave_Recuperada=$data_C['password'];
$Correo_Recuperado=$data_C['email'];
$Conteo=$data_C['ConteoPass'];
if (($Conteo>0) && ($Correo==$Correo_Recuperado)) {
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "recuperar-clave@vivu.com.co";
$to = $Correo.",recuperar-clave@vivu.com.co";
$subject = "Restablecimiento de Clave";
$message = "Estimado usuario:


Usted ha solicitado el restablecimiento de su contraseña en VIVU SENA. 
Para ingresar por favor introduce la siguiente clave: ".$Clave_Recuperada.", en 
el siguiente enlace: http://vivu.com.co/sign_in.php, recuerda
que tu usuario es tú correo electrónico: ".$Correo."




**********************NO RESPONDER - Mensaje Generado Automáticamente**********************

Este correo es únicamente informativo y es de uso exclusivo del destinatario(a), puede contener información privilegiada y/o confidencial. Si no es usted el destinatario(a) deberá borrarlo inmediatamente. Queda notificado que el mal uso, divulgación no autorizada, alteración y/o  modificación malintencionada sobre este mensaje y sus anexos quedan estrictamente prohibidos y pueden ser legalmente sancionados. -El SENA  no asume ninguna responsabilidad por estas circunstancias-";
$headers = "From:" . $from;
mail($to,$subject,$message, $headers);

  echo "<script>alert('Su contraseña ha sido enviada a su correo electrónico, por favor entre 5 minutos verifique e inicie sesión.');window.location='sign_in.php';</script>";
}else{
    echo "<script>alert('Su correo electrónico no se encuentra registrado en nuestra base de datos, por favor registrate.');window.location='sign_up.php';</script>";
}

?>