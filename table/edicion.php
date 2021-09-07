<?php

//action.php

include('dbconect.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':personal_nombre'  => $_POST['personal_nombre'],
  ':personal_edad'  => $_POST['personal_edad'],
  ':personal_salario'   => $_POST['personal_salario'],
  ':idp'    => $_POST['idp']
 );

 $query = "
 UPDATE personal 
 SET personal_nombre = :personal_nombre, 
 personal_edad = :personal_edad, 
 personal_salario = :personal_salario 
 WHERE idp = :idp
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM personal 
 WHERE idp = '".$_POST["idp"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>