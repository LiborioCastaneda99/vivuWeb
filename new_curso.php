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
  <title>Nuevo curso | Oferta Complementaria</title>
  <meta name="csrf-param" content="authenticity_token" />
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <meta name="csrf-token" content="sD0hPoBuliGFd5InGhre2tEwqBOWq5IyYKAr5Wcj/6NdVI39jnyEqFx6JUMBQiSF2YRkJZbYZjp8VUo/qVtfog==" />
  <link rel="stylesheet" media="all" href="assets/general.css" data-turbolinks-track="reload" />
  <link rel="stylesheet" media="screen" href="assets/home.css" />
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
  <?php include 'header_admin.php'; ?>

  <?php 
  $curso=$_GET['name'];
  ?>

  <div class="mt-1 PopUpContainer">
    <div class="contentContainer">
      <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li><a href="cursos.php">Grupos</a></li><li><?php echo $curso;?></li><li class="active">Nuevo Curso: <?php echo $curso;?></li></ol>
    </div>
    <!-- ====== PopUpLogin ======-->
  <?php include 'popupLogin_admin.php'; ?>
    
  </div>

  <!--<div class="contenedor-vistas">-->
    <div class="container down">

      <div class="container down">
        <h2 class="text-center">Crear Curso Nuevo de <?php echo $curso;?></h2>
        <div class="container down">
          <form class="" id="edit_curso_1" action="save_cursos-new.php" method="post" accept-charset="UTF-8">

            <label class="control-label" for="curso_codigo"><abbr title="necesario">*</abbr> Codigo</label>
            <input class="form-control" required="required" aria-required="true" type="number" name="txtCodigo" id="curso_codigo" />

            <br>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group curso_nombre">
                  <label class="control-label" for="curso_nombre"><abbr title="necesario">*</abbr> Nombre</label>
                  <input class="form-control" required="required" aria-required="true" type="text"  name="txtCurso" id="curso_nombre" />
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group curso_jornada">
                  <label class="control-label" for="curso_jornada"><abbr title="necesario">*</abbr> Jornada</label>
                   <select class="form-control select required form-control input-lg" min="1" required="required" aria-required="true" name="txtJornada" id="curso_jornada">
                      <option value="DIURNA">DIURNA</option>
                      <option value="MIXTA">MIXTA</option>
                      <option value="NOCTURNA">NOCTURNA</option>
                    </select>
                </div>
              </div>  
              <div class="col-md-3">
                <div class="form-group curso_Grupo">
                  <label class="control-label" for="curso_Grupo"><abbr title="necesario">*</abbr> Grupo</label>
                  <input class="form-control" required="required" aria-required="true" type="text"  name="txtGrupo" id="curso_Grupo" value="<?php echo $curso; ?>" />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group select required curso_centro">
                  <label class="control-label select required" for="curso_centro_id"><abbr title="necesario">*</abbr> Centro de formación que ofrece</label>
                  <select class="form-control select required form-control input-lg" min="1" required="required" aria-required="true" name="txtCentro" id="curso_centro_id">
                    <option selected="selected" ></option>
                    <option value="CENTRO COLOMBO ALEMAN">CENTRO COLOMBO ALEMAN</option>
                    <option value="CENTRO COMERCIO Y SERVICIOS">CENTRO COMERCIO Y SERVICIOS</option>
                    <option value="CENTRO INDUSTRIAL Y DE AVIACION">CENTRO INDUSTRIAL Y DE AVIACION</option>
                    <option value="CENTRO DESARROLLO AGROECOLOGICO Y AGROINDUSTRIAL">CENTRO DESARROLLO AGROECOLOGICO Y AGROINDUSTRIAL</option>
                  </select>
                </div>
              </div>
              <div class="row">
              <div class="col-md-3">
                <div class="form-group curso_horario">
                  <label class="control-label" for="curso_horario"><abbr title="necesario">*</abbr> Horario</label>
                  <input class="form-control" required="required" aria-required="true" type="text"  name="txtHorario" id="curso_horario" />
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group curso_intensidad">
                  <label class="control-label" for="curso_intensidad"><abbr title="necesario">*</abbr> Intensidad</label>
                  <input class="form-control" required="required" aria-required="true" type="text"  name="txtIntensidad" id="curso_intensidad" />
                </div>
              </div>
                 <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label  required" for="curso_fecha_inicio_3i"><abbr title="necesario">*</abbr> Fecha inicio</label>
                  <div class="form-inline">
                    <input type="date" class="form-control" name="txtFecha" >
                  </div>
                </div>
              </div>
             
            </div>
            <div class="row">
            <div class="col-md-3">
                <div class="form-group curso_intensidad">
                  <label class="control-label" for="curso_intensidad"><abbr title="necesario">*</abbr> Municipio</label>
                  <input class="form-control" required="required" aria-required="true" type="text"  name="txtMunicipio" id="curso_Municipio" />
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group curso_Direccion">
                  <label class="control-label" for="curso_Direccion"><abbr title="necesario">*</abbr> Dirección</label>
                  <input class="form-control" required="required" aria-required="true" type="text" name="txtDireccion" id="curso_Direccion" />
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group curso_tipo_formacion">
                  <label class="control-label" for="curso_tipo_formacion"><abbr title="necesario">*</abbr> Tipo formación</label>
                  <input class="form-control" required="required" aria-required="true" type="text"name="txtTipoFormacion" id="curso_tipo_formacion" />
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group curso_tipo_formacion">
                  <label class="control-label" for="curso_tipo_formacion"><abbr title="necesario">*</abbr> Estado</label>
                  <select name="txtEstado" id="" class="form-control" required="">
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group text required curso_descripcion">
                  <label class="control-label text required" for="curso_descripcion"><abbr title="necesario">*</abbr> Descripcion</label>
                  <textarea class="form-control text required" required="required" aria-required="true" name="txtDescripcion" id="curso_descripcion"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
             <div class="col-md-4">
             </div>
             <div class="col-md-4">
               <input type="submit" name="commit" value="Guardar Curso" class="btn btn-default btn btn-nar"/>
               <a class="btn" href="view_cursos.php?name=<?php echo $curso; ?>" style="background-color: #FF6C00; color: white;">Regresar</a>
             </div>
             <div class="col-md-4">
             </div>
           </div>
         </form>
       </div>
     </div>
   </div>

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
    <script src="assets/nombre_grupos-e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855.js"></script>
    <!-- ====== Pie de pagina ======-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="assets/main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
  </body>

  </html>