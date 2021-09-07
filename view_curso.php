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
  <link rel="icon" href="assets/logoSena.png">
  
  <title>Ver curso | Oferta Complementaria</title>
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

 <?php if(!empty($user)):?>
 <?php 
 $Documento=$user['documento'];
 $Correo_m=$user['email'];
 $Nombres_m=$user['nombres'];
 $Apellidos_m=$user['apellidos'];

 ?>
 <?php if ($user['rol']=='Aprendiz'): ?>
 <?php include 'header_aprendiz.php'; ?>
<?php elseif ($user['rol']=='Administrador'): ?>
 <?php include 'header_admin.php'; ?>
<?php elseif ($user['rol']=='ORIENTADOR'): ?>
 <?php include 'header_orientador.php'; ?>
 <?php endif; ?>

 <?php 
 include ("conexion.php");
 $CodigoCurso=$_GET['id'];
 $sql="SELECT id, codigo_curso, curso, jornada, horario, intensidad, fecha_inicio, municipio, direccion, formacion, centro, descripcion, nombre_grupo, estado FROM cursos where codigo_curso='$CodigoCurso'";
 $res=mysqli_query($cn,$sql);

 while ($data=mysqli_fetch_array($res))
 {
  ?>
  <div class="mt-1 PopUpContainer">
    <div class="contentContainer">
      <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li><a href="cursos.php">Grupos</a></li><li><?php echo $data['nombre_grupo'];?></li><li class="active">Ver Curso: <?php echo $data['nombre_grupo'];?></li></ol>
    </div>
    <!-- ====== PopUpLogin ======-->

 <?php if ($user['rol']=='Aprendiz'): ?>
 <?php include 'popupLogin_aprendiz.php'; ?>
<?php elseif ($user['rol']=='Administrador'): ?>
    <?php include 'popupLogin_admin.php'; ?>
<?php elseif ($user['rol']=='ORIENTADOR'): ?>
 <?php include 'popupLogin_orientador.php'; ?>
 <?php endif; ?>
  </div>

  <div class="container">
    <h4><?php echo $data['curso'];?></h4>
    <label>Codigo. </label><?php $codigo_curso=$data['codigo_curso']; echo $data['codigo_curso']; ?><br>
    <label><i class="fa fa-building"></i> Centro de formación. </label><br><?php echo $data['centro']; ?><br>
    <label><i class="fa fa-map-marker"></i> Cuidad. </label><br><?php echo $data['municipio']; ?><br>
    <label><i class="fa fa-building"></i> Lugar de realización. </label><br><?php echo $data['direccion']; ?><br>
    <hr>
    <label><i class="fa fa-object-group"></i> Aréa o grupo. </label><br><?php echo $data['nombre_grupo']; ?> <br>
    <label>Nombre del programa. </label><br><?php echo $data['curso']; ?> <br>
    <label>Modalidad de formación. </label><br><?php echo $data['formacion']; ?> <br>
    <label><i class="fa fa-calendar-times-o"></i> Intensidad horaría. </label><br><?php echo $data['intensidad']; ?> <br>
    <label><i class="fa fa-users"></i> Cupo. </label> <br> 25 <br>
    <label><i class="fa fa-indent"></i> Descripción del programa. </label><br><?php echo $data['descripcion']; ?>
    <hr>

    <?php 
    include ("conexion.php");
    $sql_c="SELECT Estado FROM `inscritos-cursos` where documento='$Documento' And codigo_curso=$codigo_curso";
    $res_c=mysqli_query($cn,$sql_c);

    $data_C=mysqli_fetch_array($res_c);

    ?>
    <?php if($data_C['Estado']=='Inscrito'): ?>
      <label>Usted ya se encuentra inscrito.</label>
      <?php else: ?>
        <div class="col-md-12 text-center">
          <form action="save_asignar.php" method="POST">
            <input type="hidden" name="txt" value="<?php echo $data['id'];?>">
            <input type="hidden" name="txtDocumento" value="<?php echo $Documento;?>">
            <input type="hidden" name="txtCorreo_m" value="<?php echo $Correo_m;?>">
            <input type="hidden" name="txtNombres_m" value="<?php echo $Nombres_m;?>">
            <input type="hidden" name="txtApellidos_m" value="<?php echo $Apellidos_m; ?>">
            <input type="hidden" name="txtCodigo" value="<?php echo $data['codigo_curso'];?>">
            <input type="hidden" name="txtCurso" value="<?php echo $data['curso'];?>">
            <input type="hidden" name="txtJornada" value="<?php echo $data['jornada'];?>">
            <input type="hidden" name="txtCentro" value="<?php echo $data['centro'];?>">
            <input type="hidden" name="txtHorario" value="<?php echo $data['horario'];?>">
            <input type="hidden" name="txtIntensidad" value="<?php echo $data['intensidad'];?>">
            <input type="hidden" name="txtFecha" value="<?php echo $data['fecha_inicio'];?>">
            <input type="hidden" name="txtMunicipio" value="<?php echo $data['municipio'];?>">
            <input type="hidden" name="txtDireccion" value="<?php echo $data['direccion'];?>">
            <input type="hidden" name="txtTipoFormacion" value="<?php echo $data['formacion'];?>">
            <input type="hidden" name="txtDescripcion" value="<?php echo $data['descripcion'];?>">
            <input type="submit" value="Inscribir" class="btn" style="background-color: #FF6C00; color: white; width: 50%;">
          </form>
        </div>    
      <?php endif; ?>
    </div>
    <?php
  }
  ?>

  <br>
  <footer class="footer_new">
    <div class="container">
      <span class="">Todos los derechos <?php echo '&copy'; echo date("Y"); ?>  SENA - Políticas de privacidad y condiciones uso Portal Web SENA</span>
    </div>
  </footer>

  <?php else: ?>
    <?php include 'header.php'; ?>

    <?php 
    include ("conexion.php");
    $CodigoCurso=$_GET['id'];
    $sql="SELECT id, codigo_curso, curso, jornada, horario, intensidad, fecha_inicio, municipio, direccion, formacion, centro, descripcion, nombre_grupo, estado FROM cursos where codigo_curso='$CodigoCurso'";
    $res=mysqli_query($cn,$sql);

    while ($data=mysqli_fetch_array($res))
    {
      ?>
      <div class="mt-1 PopUpContainer">
        <div class="contentContainer">
          <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li><a href="cursos.php">Grupos</a></li><li><?php echo $data['nombre_grupo'];?></li><li class="active">Ver Curso: <?php echo $data['nombre_grupo'];?></li></ol>
        </div>
        <!-- ====== PopUpLogin ======-->
        <?php include 'popupLogin_admin.php'; ?>
      </div>

      <div class="container">
        <h4><?php echo $data['curso'];?></h4>
        <label>Codigo. </label><?php $codigo_curso=$data['codigo_curso']; echo $data['codigo_curso']; ?><br>
        <label><i class="fa fa-building"></i> Centro de formación. </label><br><?php echo $data['centro']; ?><br>
        <label><i class="fa fa-map-marker"></i> Cuidad. </label><br><?php echo $data['municipio']; ?><br>
        <label><i class="fa fa-building"></i> Lugar de realización. </label><br><?php echo $data['direccion']; ?><br>
        <hr>
        <label><i class="fa fa-object-group"></i> Aréa o grupo. </label><br><?php echo $data['nombre_grupo']; ?> <br>
        <label>Nombre del programa. </label><br><?php echo $data['curso']; ?> <br>
        <label>Modalidad de formación. </label><br><?php echo $data['formacion']; ?> <br>
        <label><i class="fa fa-calendar-times-o"></i> Intensidad horaría. </label><br><?php echo $data['intensidad']; ?> <br>
        <label><i class="fa fa-users"></i> Cupo. </label> <br> 25 <br>
        <label><i class="fa fa-indent"></i> Descripción del programa. </label><br><?php echo $data['descripcion']; ?>
        <hr>

        <?php 
        include ("conexion.php");
        $sql_c="SELECT Estado FROM `inscritos-cursos` where documento='$Documento' And codigo_curso=$codigo_curso";
        $res_c=mysqli_query($cn,$sql_c);

        $data_C=mysqli_fetch_array($res_c);

        ?>
        <?php if($data_C['Estado']=='Inscrito'): ?>
          <label>Usted ya se encuentra inscrito.</label>
          <?php else: ?>
            <div class="col-md-12 text-center">
              <a href="sign_in.php" class="btn" style="background-color: #FF6C00;color: white; width: 50%;">Inscribir</a>
            </div>    
          <?php endif; ?>
        </div>
        <?php
      }
      ?>

      <br>
      <footer class="footer_new">
        <div class="container">
          <span class="">Todos los derechos <?php echo '&copy'; echo date("Y"); ?>  SENA - Políticas de privacidad y condiciones uso Portal Web SENA</span>
        </div>
      </footer>
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

  </html>