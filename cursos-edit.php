<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT id, nombres, apellidos, tipodocumento, documento, tipoPoblacion, email, password,rol, fechaRegistro FROM users WHERE id = :id');
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
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <title>Oferta Complementaria</title>
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <meta name="csrf-param" content="authenticity_token" />
  <meta name="csrf-token" content="y89R2gmuDftYUad7o8YvKCfdNJjeBmbwBjnegFgJScQmpv0ZB7wfcoFcEB+4ntV3L2n4rt51kvgazL9alnHpxQ==" />
  <link rel="stylesheet" media="all" href="assets/general.css" data-turbolinks-track="reload" />

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
  <!-- ====== Barra de navegacion ======-->
  <div class="navHeader">
    <div class = "container">
      <div class="row">
        <div class="col-md-12">        
          <div class="logo ml-1">
            <a href="index.php"><img src="assets/logoSena.png" alt="Logosena" /></a>
          </div>

          <nav class=" full-width NavBar-Nav">
            <div class="full-width NavBar-Nav-bg hidden-md hidden-lg show-menu-mobile"></div>
            <ul class="list-unstyled menu-mobile-c mr-1">
              <div class="full-width hidden-md hidden-lg header-menu-mobile">
                <i class="fa fa-times header-menu-mobile-close-btn show-menu-mobile" aria-hidden="true"></i>
                <div class="row">
                  <div class="col-md-12">
                    <center>
                      <a href="sign_in.php" class="btn btn-nar header-menu-mobile-btn">INICIAR SESIÓN</a>
                      <a class="btn btn-nar header-menu-mobile-btn" href="sign_up.php">REGISTRARME</a>
                    </center>
                  </div>
                </div>
                <div class="divider"></div>
              </div>
              <li class="menu">
                <a href="cursos.php">
                  <i class="fa fa-list-ul fa-fw hidden-md hidden-lg" aria-hidden="true"></i> CURSOS
                </a>
              </li>
              <li>
                <a href="user-edit.php">
                  <i class="fa fa-user fa-fw hidden-md hidden-lg" aria-hidden="true"></i><?php echo $user['nombres']." ".$user['apellidos']; ?></a>
                </li>
                <li class="hidden-xs hidden-sm">
                  <!--Verifica si el usuario actual tiene foto-->
                  <i class="fa fa-user NavBar-Nav-icon btn-PopUpLogin" aria-hidden="true">
                  </i>
                </li>
              </ul>
            </nav>
            <i class="fa fa-bars hidden-md hidden-lg btn-mobile-menu show-menu-mobile" aria-hidden="true"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php 
  include ("conexion.php");
  $CodigoCurso=$_GET['id'];
  $sql="SELECT id, codigo_curso, curso, jornada, horario, intensidad, fecha_inicio, ambiente, formacion, centro, descripcion, nombre_grupo, estado FROM cursos where codigo_curso='$CodigoCurso'";
  $res=mysqli_query($cn,$sql);

  while ($data=mysqli_fetch_array($res))
  {
    ?>
    <div class="mt-1 PopUpContainer">
      <div class="contentContainer">
        <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li><a href="cursos.php">Grupos</a></li><li><?php echo $data['nombre_grupo'];?></li><li class="active">Editar Curso: <?php echo $data['nombre_grupo'];?></li></ol>
      </div>
      <!-- ====== PopUpLogin ======-->
      <section class="full-width PopUpLogin PopUpLogin-2">
        <div class="full-width">
          <a href="user-edit.php"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Tu perfil</a>
          <a href="mis-cursos.php"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Mis Cursos</a>
          <div role="separator" class="divider"></div>
          <a rel="nofollow" data-method="delete" href="logout.php">
            <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Cerrar sesión
          </a>
        </div>            
      </section>
    </div>

    <!--<div class="contenedor-vistas">-->
      <div class="container down">

        <div class="container down">
          <h2>Editar curso del grupo <?php   $curso=$data['nombre_grupo'];
          echo $data['nombre_grupo'];?></h2>
          <div class="container down">
            <form class="" id="edit_curso_1" action="save-cursos-edit.php" method="post">

              <label class="control-label" for="curso_codigo"><abbr title="necesario">*</abbr> Codigo</label>
              <input class="form-control" required="required" aria-required="true" type="text" value="<?php echo $data['codigo_curso']; ?>" name="Codigo" id="curso_codigo" disabled="true" />
              <input class="form-control" required="required" aria-required="true" type="hidden" value="<?php echo $data['codigo_curso']; ?>" name="txtCodigo" id="curso_codigo" />
              <br>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group curso_nombre">
                    <label class="control-label" for="curso_nombre"><abbr title="necesario">*</abbr> Nombre</label>
                    <input class="form-control" required="required" aria-required="true" type="text" value="<?php echo $data['curso'];?>" name="txtCurso" id="curso_nombre" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group curso_jornada">
                    <label class="control-label" for="curso_jornada"><abbr title="necesario">*</abbr> Jornada</label>
                    <input class="form-control" required="required" aria-required="true" type="text" value="<?php echo $data['jornada'];?>" name="txtJornada" id="curso_jornada" />
                  </div>
                </div>  
                <div class="col-md-3">
                  <div class="form-group curso_Grupo">
                    <label class="control-label" for="curso_Grupo"><abbr title="necesario">*</abbr> Grupo</label>
                    <input class="form-control" required="required" aria-required="true" type="text" value="<?php echo $data['nombre_grupo'];?>" name="txtGrupo" id="curso_Grupo" />
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group select required curso_centro">
                    <label class="control-label select required" for="curso_centro_id"><abbr title="necesario">*</abbr> Centro</label>
                    <select class="form-control select required form-control input-lg" min="1" required="required" aria-required="true" name="txtCentro" id="curso_centro_id">
                      <option selected="selected" value="<?php echo $data['centro'];?>"><?php echo $data['centro'];?></option>
                      <option value="CENTRO COLOMBO ALEMAN">CENTRO COLOMBO ALEMAN</option>
                      <option value="CENTRO COMERCIO Y SERVICIOS">CENTRO COMERCIO Y SERVICIOS</option>
                      <option value="CENTRO INDUSTRIAL Y DE AVIACION">CENTRO INDUSTRIAL Y DE AVIACION</option>
                      <option value="CENTRO DESARROLLO AGROECOLOGICO Y AGROINDUSTRIAL">CENTRO DESARROLLO AGROECOLOGICO Y AGROINDUSTRIAL</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group curso_horario">
                    <label class="control-label" for="curso_horario"><abbr title="necesario">*</abbr> Horario</label>
                    <input class="form-control" required="required" aria-required="true" type="text" value="<?php echo $data['horario'];?>" name="txtHorario" id="curso_horario" />
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group curso_intensidad">
                    <label class="control-label" for="curso_intensidad"><abbr title="necesario">*</abbr> Intensidad</label>
                    <input class="form-control" required="required" aria-required="true" type="text" value="<?php echo $data['intensidad'];?>" name="txtIntensidad" id="curso_intensidad" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group date required curso_fecha_inicio">
                    <label class="control-label date required" for="curso_fecha_inicio_3i"><abbr title="necesario">*</abbr> Fecha inicio</label>
                    <div class="form-inline">
                      <input type="date" class="form-control" name="txtFecha" value="<?php echo $data['fecha_inicio'];?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group curso_ambiente">
                    <label class="control-label" for="curso_ambiente"><abbr title="necesario">*</abbr> Ambiente</label>
                    <input class="form-control" required="required" aria-required="true" type="text" value="<?php echo $data['ambiente'];?>" name="txtAmbiente" id="curso_ambiente" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group curso_tipo_formacion">
                    <label class="control-label" for="curso_tipo_formacion"><abbr title="necesario">*</abbr> Tipo formacion</label>
                    <input class="form-control" required="required" aria-required="true" type="text" value="<?php echo $data['formacion'];?>" name="txtTipoFormacion" id="curso_tipo_formacion" />
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
                    <textarea class="form-control text required" required="required" aria-required="true" name="txtDescripcion" id="curso_descripcion"><?php echo $data['descripcion'];?></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
               <div class="col-md-4">
               </div>
               <div class="col-md-4">
                 <input type="submit" name="commit" value="Guardar Curso" class="btn btn-default btn btn-nar"/>
                 <a class="btn btn-danger"  href="view_cursos.php?name=<?php echo $curso; ?>" style="background-color: #FF6C00; color: white; border-color: #FF6C00;">Regresar</a>
               </div>
               <div class="col-md-4">
               </div>
             </div>
             <?php
           }
           ?>
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
  <script src="/assets/grupos/cursos-e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855.js"></script>
  <!-- ====== Pie de pagina ======-->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="/assets/main-817f5c201c0e3c8b60d1b39dc9deda557b6afd7d716d4ee778732e68924afd3e.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</body>

</html>
