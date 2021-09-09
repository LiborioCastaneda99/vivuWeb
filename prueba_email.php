<?php 
$to = "ldcastaneda06@misena.edu.co";
$subject = "Confirmación inscripción";

$message = "<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body style='font-family: ''; font-size: 14px;'>
<div style=''>
<img style='display:block;margin-left: auto; margin-right: auto;' src='https://planeacionsat.com/complementario/assets/unnamed.jpg' width='75%' />
</div>
<div style='width: 100%;margin-left: auto; margin-right: auto;background: #017e78; border-radius: 18px;display:block; float:center;'>
<h2 style='padding: 15px;color:white; font-weight: bold; text-align: center'>OFERTA COMPLEMENTARIA</h2> 
</div>
<p style='color: #4b5665; line-height: 21px;'>
<span style=''>Señor(a): Jonathan Olano
</p>

<p style='text-align: center;color: #4b5665; line-height: 21px;'>
<span style=''>Usted se ha inscrito satisfactoriamente en el curso de ELECTRICIDAD BASICA con una intensidad de 40 Horas el cual inicia el día 09-marzo-2020 en el ambiente/lugar de TALLER 2 - NODO con el instructor LUCAS GUTIERREZ con el siguiente horario lunes de 12 a 6p.m.
</p>

<p style='text-align: center;color: #4b5665; line-height: 21px;'>
<span style=''>La Formación del Sena es completamente gratuita y no requiere de intermediarios. Si alguien le solicita dinero o favores a cambio denúncielo a la oficina de atención al ciudadano, correo: Ijferreir@sena.edu.co
</p>

<p style='text-align: center;color: #4b5665; line-height: 21px;'>
<span style=''>RECUERDE QUE LA ASISTENCIA DESDE EL PRIMER DIA ES OBLIGATORIA
<br>
Si tiene alguna inquietud, por favor comuníquese con nuestra oficina:
<br>
Calle 30 # 3E-164 <br>
Teléfonos: + 57 (5) 3852131 Ext 52254 - Diana Amaya. <br>
Email: dpamaya1@misena.edu.co <br>
Barranquilla - Colombia
</p>



<div style=''>
<img style='display:block;margin-left: auto; margin-right: auto;' src='https://planeacionsat.com/complementario/assets/Logosimbolo.png' width='20%' />
</div>

</body>
</html>

";

ini_set("SMTP", "smtp.hostinger.co");
ini_set("sendmail_from", "complementario@planeacionsat.com");
ini_set("smtp_port", "587");
        // Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
$headers .= 'From: <complementario@planeacionsat.com>' . "\r\n";

mail($to,$subject,$message,$headers);



/*error_reporting( E_ALL );
$from = "complementario@planeacionsat.com";
$to = "ldcastaneda06@misena.edu.co";
$subject = "Restablecimiento de Clave";
$img="assets/logoSena.png";
$message = "Estimado usuario:


Usted ha solicitado el restablecimiento de su contraseña en COMPLEMENTARIO SENA. 
Para ingresar por favor introduce la siguiente clave: ".$Clave_Recuperada.", en 
el siguiente enlace: https://planeacionsat.com/complementario/sign_in.php, recuerda
que tu usuario es tú correo electrónico: ".$Correo."




**********************NO RESPONDER - Mensaje Generado Automáticamente**********************

Este correo es únicamente informativo y es de uso exclusivo del destinatario(a), puede contener información privilegiada y/o confidencial. Si no es usted el destinatario(a) deberá borrarlo inmediatamente. Queda notificado que el mal uso, divulgación no autorizada, alteración y/o  modificación malintencionada sobre este mensaje y sus anexos quedan estrictamente prohibidos y pueden ser legalmente sancionados. -El SENA  no asume ninguna responsabilidad por estas circunstancias-";
$headers = "From:" . $from;
mail($to,$subject,$message, $headers);*/