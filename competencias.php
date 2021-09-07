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
  <link rel="icon" href="assets/logoSena.png">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <title>Competencias | Oferta Complementaria</title>
  <meta property="og:title" content="Competencias | Oferta Complementaria">
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
  <?php if(!empty($user) && ($user['rol']=='Aprendiz')): ?>
  <!-- ====== Barra de navegacion ======-->
  <?php include 'header_aprendiz.php'; ?>

  <div class="mt-1 PopUpContainer">
    <div class="contentContainer">
      <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li class="active">Certificación por competencias</li></ol>
    </div>
    <!-- ====== PopUpLogin ======-->
    <?php include 'popupLogin_aprendiz.php'; ?>
  </div>


 
  <!--<div class="contenedor-vistas">-->
    <div class="container down">
      <h2 class="text-center">Solicitud de certificación por competencias</h2>
      <div class="container down">
        <form class="" action="save_competencias.php" method="post">
          <div class="row">
            <div class="row">
              <div class="col-md-6">
                <label for="nombres">Nombres</label><br>
                <input required="" type="text" id="txtNombres" name="txtNombres" placeholder="Nombres" class="form-control " value=""><br>
              </div>
              <div class="col-md-6">
                <label for="apellidos">Apellidos</label><br>
                <input required="" type="text" id="txtApellidos" name="txtApellidos" placeholder="Apellidos" class="form-control " value=""><br>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label class="input-group-text" for="tipo_doc">Tipo de documento</label><br>
                <select required="" class="custom-select form-control" id="tipo_doc" name="txtTipo_doc"><br>
                  <option selected>Seleccione...</option>
                  <option value="CEDULA DE CIUDADANIA">CEDULA DE CIUDADANIA</option>
                  <option value="TARJETA DE IDENTIDAD">TARJETA DE IDENTIDAD</option>
                  <option value="REGISTRO UNICO">REGISTRO UNICO</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="documento">Documento</label><br>
                <input required="" type="number" id="documento" name="txtDocumento" placeholder="Documento" class="form-control " min="1" value="">
              </div>

              <div class="col-md-3">
                <label for="fech_nac">Fecha de Nacimiento</label><br>
                <input required="" type="date" id="fech_nac" name="txtFechaNacimiento" class="form-control" value=""><br>
              </div>
            </div>
            <div class="row">

              <div class="col-md-3">
                <label for="fech_nac">Teléfono:</label><br>
                <input required="" type="number" id="" name="txtTelefono" class="form-control" value="" placeholder="Teléfono"><br>
              </div>
              <div class="col-md-5">
                <label class="input-group-text" for="poblacion">Población</label><br>
                <select required="" class="custom-select form-control" id="poblacion" name="txtPoblacion"><br>
                  <option selected>Seleccione...</option>
                  <option value="Desplazados por la violencia">Desplazados por la violencia</option>
                  <option value="Jovenes vulnerables">Jovenes vulnerables</option>
                  <option value="Afrocolombianos">Afrocolombianos</option>
                  <option value="Otro">Otro.</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="fech_nac">Fecha de Nacimiento</label><br>
                <input required="" type="date" id="fech_nac" name="txtFechaNacimiento" class="form-control" value=""><br>
              </div>
              <div class="col-md-4">
                <label for="ocupacion">Ocupación</label><br>
                <input required="" type="text" id="ocupacion" name="txtOcupacion" placeholder="Ocupación" class="form-control " value=""><br>
              </div>
            </div>
          </div>
          <div class="row">
           <input type="submit" class="btn form-control" style="background-color: #FF6C00; color: white;">
         </div>
       </form>
     </div>
   </div>
      <?php elseif(!empty($user) && ($user['rol']=='Administrador')): ?>

   <!--Menú admin-->
   <?php include 'header_admin.php'; ?>
   <div class="mt-1 PopUpContainer">
    <div class="contentContainer">
      <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li class="active">Certificación por competencias</li></ol>
    </div>
    <!-- ====== PopUpLogin ======-->
    <?php include 'popupLogin_admin.php'; ?>
  </div>

 
<!--<div class="contenedor-vistas">-->
    <div class="container down">
      <h2 class="text-center">Solicitud de certificación por competencias</h2>
      <div class="container down">
        <form class="" action="save_competencias.php" method="post">
          <div class="row">
            <div class="row">
              <div class="col-md-6">
                <label for="nombres">Nombres</label><br>
                <input required="" type="text" id="txtNombres" name="txtNombres" placeholder="Nombres" class="form-control " value=""><br>
              </div>
              <div class="col-md-6">
                <label for="apellidos">Apellidos</label><br>
                <input required="" type="text" id="txtApellidos" name="txtApellidos" placeholder="Apellidos" class="form-control " value=""><br>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label class="input-group-text" for="tipo_doc">Tipo de documento</label><br>
                <select required="" class="custom-select form-control" id="tipo_doc" name="txtTipo_doc"><br>
                  <option selected>Seleccione...</option>
                  <option value="CEDULA DE CIUDADANIA">CEDULA DE CIUDADANIA</option>
                  <option value="TARJETA DE IDENTIDAD">TARJETA DE IDENTIDAD</option>
                  <option value="REGISTRO UNICO">REGISTRO UNICO</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="documento">Documento</label><br>
                <input required="" type="number" id="documento" name="txtDocumento" placeholder="Documento" class="form-control " min="1" value="">
              </div>

              <div class="col-md-3">
                <label for="fech_nac">Fecha de Nacimiento</label><br>
                <input required="" type="date" id="fech_nac" name="txtFechaNacimiento" class="form-control" value=""><br>
              </div>
            </div>
            <div class="row">

              <div class="col-md-3">
                <label for="fech_nac">Teléfono:</label><br>
                <input required="" type="number" id="" name="txtTelefono" class="form-control" value="" placeholder="Teléfono"><br>
              </div>
              <div class="col-md-5">
                <label class="input-group-text" for="poblacion">Población</label><br>
                <select required="" class="custom-select form-control" id="poblacion" name="txtPoblacion"><br>
                  <option selected>Seleccione...</option>
                  <option value="Desplazados por la violencia">Desplazados por la violencia</option>
                  <option value="Jovenes vulnerables">Jovenes vulnerables</option>
                  <option value="Afrocolombianos">Afrocolombianos</option>
                  <option value="Otro">Otro.</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="ocupacion">Ocupación</label><br>
                <input required="" type="text" id="ocupacion" name="txtOcupacion" placeholder="Ocupación" class="form-control " value=""><br>
              </div>
            </div>
          </div>
          <div class="row">
           <input type="submit" class="btn form-control" style="background-color: #FF6C00; color: white;">
         </div>
       </form>
     </div>
   </div>

   <?php else: ?>
    <?php include 'header.php'; ?>


    <div class="mt-1 PopUpContainer">
      <div class="contentContainer">
        <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li class="active">Certificación por competencias</li></ol>
      </div>
    </div>

    <!--<div class="contenedor-vistas">-->
    <div class="container down">
      <h2 class="text-center">Solicitud de certificación por competencias</h2>
      <div class="container down">
        <form class="" action="save_competencias.php" method="post">
          <div class="row">
            <div class="row">
              <div class="col-md-6">
                <label for="nombres">Nombres</label><br>
                <input required="" type="text" id="txtNombres" name="txtNombres" placeholder="Nombres" class="form-control " value=""><br>
              </div>
              <div class="col-md-6">
                <label for="apellidos">Apellidos</label><br>
                <input required="" type="text" id="txtApellidos" name="txtApellidos" placeholder="Apellidos" class="form-control " value=""><br>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label class="input-group-text" for="tipo_doc">Tipo de documento</label><br>
                <select required="" class="custom-select form-control" id="tipo_doc" name="txtTipo_doc"><br>
                  <option selected>Seleccione...</option>
                  <option value="CEDULA DE CIUDADANIA">CEDULA DE CIUDADANIA</option>
                  <option value="TARJETA DE IDENTIDAD">TARJETA DE IDENTIDAD</option>
                  <option value="REGISTRO UNICO">REGISTRO UNICO</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="documento">Documento</label><br>
                <input required="" type="number" id="documento" name="txtDocumento" placeholder="Documento" class="form-control " min="1" value="">
              </div>

              <div class="col-md-3">
                <label for="fech_nac">Fecha de Nacimiento</label><br>
                <input required="" type="date" id="fech_nac" name="txtFechaNacimiento" class="form-control" value=""><br>
              </div>
            </div>
            <div class="row">

              <div class="col-md-3">
                <label for="fech_nac">Teléfono:</label><br>
                <input required="" type="number" id="" name="txtTelefono" class="form-control" value="" placeholder="Teléfono"><br>
              </div>
              <div class="col-md-5">
                <label class="input-group-text" for="poblacion">Población</label><br>
                <select required="" class="custom-select form-control" id="poblacion" name="txtPoblacion"><br>
                  <option selected>Seleccione...</option>
                  <option value="Desplazados por la violencia">Desplazados por la violencia</option>
                  <option value="Jovenes vulnerables">Jovenes vulnerables</option>
                  <option value="Afrocolombianos">Afrocolombianos</option>
                  <option value="Otro">Otro.</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="ocupacion">Ocupación</label><br>
                <input required="" type="text" id="ocupacion" name="txtOcupacion" placeholder="Ocupación" class="form-control " value=""><br>
              </div>
            </div>
          </div>
          <div class="row">
           <input type="submit" class="btn form-control" style="background-color: #FF6C00; color: white;">
         </div>
       </form>
     </div>
   </div>
   <?php endif; ?>
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
  <script src="assets/competencias-e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855.js"></script>
  <!-- ====== Pie de pagina ======-->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="/assets/main-817f5c201c0e3c8b60d1b39dc9deda557b6afd7d716d4ee778732e68924afd3e.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</body>

</html>
