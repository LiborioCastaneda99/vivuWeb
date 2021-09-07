<?php
include 'config.php';
require 'database.php';

$boton=$_POST['boton'];

if ($boton=='Vaciar tabla') {

  $codigoCursoPost=$_POST['txtCodigoCurso'];

  $result_laboratorios = $connexion->query(
    "SELECT users.nombres, users.apellidos, users.tipodocumento, users.documento As DocumentoId, users.tipoPoblacion, users.email, users.telefono, users.fechaNacimiento, `inscritos-cursos`.`codigo_curso` As codigoCurso,`inscritos-cursos`.`id` As id_inscrito FROM users,`inscritos-cursos` WHERE users.documento=`inscritos-cursos`.`documento` and `inscritos-cursos`.estado='Inscrito' and `inscritos-cursos`.codigo_curso=$codigoCursoPost");

  while ($row_actualizar = $result_laboratorios->fetch_assoc()) {
    $DocumentoIdSql=$row_actualizar['DocumentoId'];

    $sql = "UPDATE `inscritos-cursos` SET estado='Eliminado' WHERE documento=$DocumentoIdSql";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
      echo "<script>alert('Usted ha vaciado la tabla correctamente.');window.location='mis-cursos.php';</script>";


    }else {
      echo "<script>alert('Lo sentimos, ha ocurrido un error al momento de vaciar la tabla, por favor comuniquese con el desarrollador.');window.history.go(-1);</script>";
    }
  }
} else {

 
}
?>