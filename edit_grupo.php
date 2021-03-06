<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT id, nombres, apellidos, tipodocumento, documento, tipoPoblacion, email, password, fechaRegistro,rol, fecha_sesion, telefono, fechaNacimiento, municipio, sexo, img FROM users WHERE id = :id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $user = null;

  if (count($results) > 0) {
    $user = $results;
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UFT-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <title>Editar grupo | Oferta Complementaria</title>
  <link rel="icon" href="assets/logoSena.png">
  <meta property="og:title" content="Cursos | Oferta Complementaria">
  <meta name="csrf-param" content="authenticity_token" />
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

  <meta name="csrf-token" content="sD0hPoBuliGFd5InGhre2tEwqBOWq5IyYKAr5Wcj/6NdVI39jnyEqFx6JUMBQiSF2YRkJZbYZjp8VUo/qVtfog==" />
  <link rel="stylesheet" media="all" href="assets/general.css" data-turbolinks-track="reload" />
  <link rel="stylesheet" media="screen" href="assets/grupos.css" />
  <script src="assets/general.js" data-turbolinks-track="reload"></script>
  <style type="text/css">
  .footer_new {
    bottom: 0;
    text-align: center;
    font-size: 15px;
    width: 100%;
    height: 50px; /* Set the fixed height of the footer here */
    line-height: 44px; /* Vertically center the text there */
    background-color: #FF6C00;
    color: white;
  }
</style>
</head>
<body>
  <?php if(!empty($user) && ($user['rol']=='Administrador')): ?>
  <!-- menu-->
  <?php include 'header_admin.php'; ?>

  <?php 
  include ("conexion.php");
  $id=$_GET['id'];
  $sql="SELECT id, nombre_grupo, tipo_archivo, nombre_archivo FROM grupos where id='$id'";
  $res=mysqli_query($cn,$sql);

  while ($data=mysqli_fetch_array($res))
  {
    ?>
    <div class="mt-1 PopUpContainer">
      <div class="contentContainer">
        <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li><a href="cursos.php">Grupos</a></li><li class="active">Editar Grupo: <?php echo $data['nombre_grupo']; ?></li></ol>
      </div>
      <?php include 'popupLogin_admin.php'; ?>
    </div>


    <!--<div class="contenedor-vistas">-->
      <div class="container down">

        <div class="container down">
          <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
              <form class="simple_form form-horizontal" id="edit_grupo_2" enctype="multipart/form-data" action="save-grupo-edit.php" accept-charset="UTF-8" method="post">
                <div class="form-group string required grupo_nombre">
                  <label class="control-label string required" for="grupo_nombre"><abbr title="necesario">*</abbr> Nombre</label>
                  <input class="form-control string required" type="text" value="<?php echo $data['nombre_grupo']; ?>" name="txtNombre" id="grupo_nombre" />
                </div>
                <div class="form-group file optional grupo_avatar">
                  <label class="control-label file optional" for="grupo_avatar">Logo del curso</label>
                  <input class="file optional" type="file" name="archivo" id="grupo_avatar" value="<?php echo $data['nombre_archivo']; ?>">
                  <p class="help-block">PNG, GIF o JPG. M??ximo %{size}. Ser?? escalado a %{dimensions}px</p>
                </div>
                <input type="hidden" name="txtCodigo" value="<?php echo $data['id']; ?>">
                <input type="hidden" name="txtImg" value="<?php echo $data['nombre_archivo']; ?>">
                <center><input type="submit" name="commit" value="Editar grupo" class="btn btn-default btn btn-nar"></center>
              </form>      
            </div>
            <div class="col-md-4">
            </div>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
    <footer class="footer_new">
      <div class="container">
        <span class="">Todos los derechos <?php echo '&copy'; echo date("Y"); ?>  SENA - Pol??ticas de privacidad y condiciones uso Portal Web SENA</span>
      </div>
    </footer>
    <?php else: ?>

    <?php endif; ?>

    <script>
      var dummyContent = $('.dummy-content').children(),
      i;


      $('#add-content').click(function(e){
        e.preventDefault();

        if($(dummyContent[0]).is(":visible")){
          for(i=0;i<dummyContent.length;i++){
            $(dummyContent[i]).fadeOut(600);
          }
        }
        else{
          for(i=0;i<dummyContent.length;i++){
            $(dummyContent[i]).delay(600*i).fadeIn(600);
          }
        }

      });
    </script>
    <!-- Demo ads. Please ignore and remove. -->
    <script src="http://cdn.tutorialzine.com/misc/enhance/v2.js" async></script>
    <script src="assets/nombre_grupos-e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855.js"></script>
    <!-- ====== Pie de pagina ======-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="assets/main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
  </body>