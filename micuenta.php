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
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <title>Mi cuenta | Oferta Complementaria</title>
  <link rel="icon" href="assets/logoSena.png">
  <meta property="og:title" content="Mi cuenta | Oferta Complementaria">
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
  <?php if(!empty($user) && ($user['rol']=='ORIENTADOR')): ?>
  <!-- ====== Barra de navegacion ======-->
  <?php  include 'header_orientador.php';?>


  <div class="mt-1 PopUpContainer">
    <!-- ====== PopUpLogin ======-->
    <?php  include 'popupLogin_orientador.php';?>

  </div>
  <center>
    <h1>Bienvenido al aplicativo <br> de las poblaciones victimas y vulnerables.</h1>
    <p>Hola, <?php echo $user['nombres']." ".$user['apellidos']; ?></p><br>
    <p><?php echo $user['rol'];?></p>
    <br><br>

    <?php elseif(!empty($user) && ($user['rol']=='Aprendiz')): ?>
    <!-- ====== Barra de navegacion ======-->
    <?php  include 'header_aprendiz.php';?>


    <div class="mt-1 PopUpContainer">
      <!-- ====== PopUpLogin ======-->
      <?php  include 'popupLogin_aprendiz.php';?>

    </div>
    <center>
      <h1>Bienvenido al aplicativo <br> de las poblaciones victimas y vulnerables.</h1>
      <p>Hola, <?php echo $user['nombres']." ".$user['apellidos']; ?></p><br>
      <p><?php echo $user['rol'];?></p>
      <br><br>


      <?php elseif(!empty($user) && ($user['rol']=='Administrador')): ?>
      <?php  include 'header_admin.php';?>

      <div class="mt-1 PopUpContainer">
        <!-- ====== PopUpLogin ======-->
        <?php include 'popupLogin_admin.php'; ?>
        <!-- ====== PopUpLogin ======-->

      </div>
      <center>
        <h1>Bienvenido al aplicativo <br> de las poblaciones victimas y vulnerables.</h1>
        <p>Hola, <?php echo $user['nombres']." ".$user['apellidos']; ?></p><br>
        <p><?php echo $user['rol'];?></p>
        <br><br>
        <?php elseif(!empty($user) && ($user['rol']=='Gestor')): ?>
        <?php  include 'header_gestor.php';?>

        <div class="mt-1 PopUpContainer">
          <!-- ====== PopUpLogin ======-->
          <?php include 'popupLogin_gestor.php'; ?>
          <!-- ====== PopUpLogin ======-->

        </div>
        <center>
          <h1>Bienvenido al aplicativo <br> de las poblaciones victimas y vulnerables.</h1>
          <p>Hola, <?php echo $user['nombres']." ".$user['apellidos']; ?></p><br>
          <p><?php echo $user['rol'];?></p>
          <br><br>

        <?php elseif(!empty($user) && ($user['rol']=='Certificacion')): ?>
        <?php  include 'header_certificacion.php';?>

        <div class="mt-1 PopUpContainer">
          <!-- ====== PopUpLogin ======-->
          <?php include 'popupLogin_certificacion.php'; ?>
          <!-- ====== PopUpLogin ======-->

        </div>
        <center>
          <h1>Bienvenido al aplicativo <br> de las poblaciones victimas y vulnerables.</h1>
          <p>Hola, <?php echo $user['nombres']." ".$user['apellidos']; ?></p><br>
          <p><?php echo $user['rol'];?></p>
          <br><br>

          <?php else: ?>
            <?php echo "<script>window.location='sign_in.php';</script>"; ?>

          <?php endif; ?>
        </center>
        <footer class="footer_new">
          <div class="container">
            <span class="">Todos los derechos <?php echo '&copy'; echo date("Y"); ?>  SENA - Políticas de privacidad y condiciones uso Portal Web SENA</span>
          </div>
        </footer>
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
        <!-- ====== Pie de pagina ======-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="assets/main.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
      </body>

      </html>
